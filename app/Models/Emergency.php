<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    use HasFactory;

    public function __construct(array $attributes=[])
    {
        parent::__construct($attributes);
        $this->status=TypeStatus::ACTIF;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'relationship',
        'telephone',
        'address',
        'employee_id',
    ];

    /**
     * Affichage de la liste des contacts d'Emergency
     *
     * @return  array
     */

    public static function allEmergencyActifs()
    {

        return   $emergencies = Emergency::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajout d'un contact d'Emergency
     *
     * @param  string $first_name
     * @param  string $last_name
     * @param  string $relationship
     * @param  string $telephone
     * @param  string $address
     * @param  string $employee_id
     * @return Emergency
     */

    public static function addEmergency($first_name, $last_name, $relationship,$telephone,$address, $employee_id)
    {
        $emergency = new Emergency();
        $emergency->first_name = $first_name;
        $emergency->last_name = $last_name;
        $emergency->relationship = $relationship;
        $emergency->telephone = $telephone;
        $emergency->address = $address;
        $emergency->employee_id=$employee_id;

        $emergency->created_at = Carbon::now();

        $emergency->save();

        return $emergency;
    }

    /**
     * Affichage d'une Contact Emergency
     * @param int $id
     * @return  Emergency
     */

    public static function rechercheEmergencyById($id)
    {

        return   $emergency = Emergency::findOrFail($id);
    }

    /**
     * @param  string $first_name
     * @param  string $last_name
     * @param  string $relationship
     * @param  string $telephone
     * @param  string $address
     * @param  string $employee_id
     * @param int $id
     * @return  Emergency
     */

    public static function updateEmergency( $first_name, $last_name, $relationship,$telephone,$address, $employee_id, $id)
    {


        return   $emergency = Emergency::findOrFail($id)->update([

            'first_name' => $first_name,
            'last_name' => $last_name,
            'relationship' => $relationship,
            'telephone' => $telephone,
            'address' => $address,
            'employee_id'=>$employee_id,

            'id' => $id,


        ]);
    }


    /**
     * Supprimer un Contact d'Emergency
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteEmergency($id)
    {

        $emergency = Emergency::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($emergency) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si le contact existe déjà
     *
     * @param  string $first_name
     * @param  string $last_name
     * @param  string $relationship
     * @param  string $telephone
     * @param  string $address
     * @param  string $employee_id

     * @return  boolean
     */

    public static function isUnique($first_name, $last_name, $relationship,$telephone,$address, $employee_id )
    {

        $emergency = Emergency::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('first_name', '=', $first_name)
            ->where('last_name', '=', $last_name)
            ->where('relationship', '=', $relationship)
            ->where('telephone', '=', $telephone)
            ->where('address', '=', $address)
            ->where('employee_id', '=', $employee_id)

            ->first();


        if ($emergency === null) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout
     * @param  string $first_name
     * @param  string $last_name
     * @param  string $relationship
     * @param  string $telephone
     * @param  string $address
     * @param  string $employee_id


     * @return  array
     */

    public static function isValid($first_name, $last_name, $relationship,$telephone,$address, $employee_id)
    {

        $data = array();

        $isValid = false;
        $erreurFirst_name = '';
        $erreurLast_name = '';
        $erreurRelationship = '';
        $erreurTelephone = '';
        $erreurAddress='';
        $erreurEmployee_id='';



        // Verification de la validité des données


        if (isEmpty($first_name)) {
            $erreurFirst_name = "Le prélast_name est obligatoire" ;
        }  elseif (isEmpty($last_name)) {
            $erreurLast_name = "Le last_name est obligatoire" ;
        }elseif (isEmpty($relationship)) {
            $erreurRelationship = "La relationship est obligatoire" ;
        }
        elseif (isEmpty($telephone)) {
            $erreurTelephone = "Le téléphone est obligatoire" ;
        }
        elseif (isEmpty($address)) {
            $erreurAddress = "L'address est obligatoire" ;
        }
        elseif (isEmpty($employee_id)) {
            $erreurEmployee_id = "Le last_name de l'employé est obligatoire" ;
        }

        elseif (Emergency::isUnique($first_name, $last_name, $relationship,$telephone,$address, $employee_id)) {
            $erreurLast_name = "Ce contact existe déjà " ;
        }


        else {

            $erreurFirst_name = '';
            $erreurLast_name = '';
            $erreurRelationship = '';
            $erreurTelephone = '';
            $erreurAddress ='';
            $erreurEmployee_id ='';

            $isValid = true;
        }

        return  $data = [

            'isValid' => $isValid,
            'erreurfirst_name' => $erreurFirst_name,
            'erreurlast_name' => $erreurLast_name,
            'erreurrelationship' => $erreurRelationship,
            'erreurTelephone' => $erreurTelephone,
            'erreuraddress'=>$erreurAddress,
            'erreuremployee_id'=>$erreurEmployee_id,

        ];
    }

    /**
     * Obtenir l'employé concerné
     *
     */
    public function employee()
    {


        return $this->belongsTo(Employee::class, 'employee_id');
    }


}
