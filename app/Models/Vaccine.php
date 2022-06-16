<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->status = TypeStatus::ACTIF;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'status_Vaccine',
        'Vaccine_type_id',

        'status',

    ];


    /**
     * Affiche la liste de toutes  les  Vaccines
     *
     * @return  array
     */

    public static function allVaccineActifs()
    {

        return   $vaccines = Vaccine::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }



    /**
     * Ajouter une Vaccine
     *
     * @param  string $name
     * @param  string $status_Vaccine
     * @param  string $vaccine_type_id
 * @return  Vaccine
     */

    public static function addVaccine($name, $status_Vaccine, $vaccine_type_id)
    {


        $vaccine = new Vaccine();
        $vaccine->name = $name;
        $vaccine->status_Vaccine = $status_Vaccine;
        $vaccine->type_vacin_id=$vaccine_type_id;


        $vaccine->created_at = Carbon::now();

        $vaccine->save();

        return $vaccine;
    }


    /**
     * Affiche une Vaccine
     * @param int $id
     * @return  Vaccine
     */

    public static function rechercheVaccineById($id)
    {

        return   $vaccine = Vaccine::findOrFail($id);
    }


    /**
     * Update d'un Vaccine
     *
     * @param  string $name
     * @param  string $status_Vaccine
     * @param  string $vaccine_type_id
 * @param int $id
     * @return  Vaccine
     */

    public static function updateVaccine($name, $status_Vaccine, $vaccine_type_id,   $id)
    {


        return   $vaccine = Vaccine::findOrFail($id)->update([
            'name' => $name,
            'status_Vaccine' => $status_Vaccine,
            'Vaccine_type_id'=> $vaccine_type_id,

            'id' => $id,


        ]);
    }


    /**
     * Supprimer un Vaccine
     *

     * @param int $id
     * @return  boolean
     */

    public static function deleteVaccine($id)
    {

        $vaccine = Vaccine::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($vaccine) {
            return 1;
        }
        return 0;
    }


    /**
     * Verifier si le Vaccine existe deja
     *

     * @param  string $name
     * @param  string $status_Vaccine
     * @param  string $vaccine_type_id

     * @return  boolean
     */

    public static function isUnique($name, $status_Vaccine, $vaccine_type_id)
    {

        $vaccine = Vaccine::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('status_Vaccine', '=', $status_Vaccine)
            ->where('name', '=', $name)
            ->where('Vaccine_type_id', '=', $vaccine_type_id)

            ->first();


        if ($vaccine === null) {
            return 1;
        }
        return 0;
    }




    /**
     * Verifier  si l' ajout est valide '
     *
     * @param  string $name
     * @param  string $status_Vaccine
     * @param  string $vaccine_type_id



     * @return  array
     */

    public static function isValid($name, $status_Vaccine, $vaccine_type_id )
    {

        $data = array();

        $isValid = false;
        $erreurName = '';
        $erreurStatus_Vaccine = '';
        $erreurVaccine_type_id= '';



        // Verification validite des données


        if (isEmpty($name)) {
            $erreurName = "Le name est obligatoire" ;
        }
        elseif (isEmpty($vaccine_type_id )) {
            $erreurVaccine_type_id = "Le type de Vaccine est obligatoire " ;
        }
        elseif (Vaccine::isUnique($name, $status_Vaccine, $vaccine_type_id )) {
            $erreurName = "Ce Vaccine existe   dejà " ;
        }


        else {

            $erreurName = '';
            $erreurStatus_Vaccine = '';
            $erreurVaccine_type_id='';


            $isValid = true;
        }

        return  $data = [

            'isValid' => $isValid,

            'erreurname' => $erreurName,
            'erreurstatus_Vaccine' => $erreurStatus_Vaccine,
            'erreurVaccine_type_id' => $erreurVaccine_type_id,



        ];
    }

    /**
     * Obtenir le type lié au Vaccine
     */
    public function typeVaccine ()
    {


        return $this->belongsTo(VaccineType::class, 'vaccine_type_id');
    }



}
