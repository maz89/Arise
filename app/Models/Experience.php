<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
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
        'name_company',
        'position',
        'address',
        'date_start',
        'date_end',
        'employee_id',

        'status',

    ];


    /**
     * Affiche la liste de toutes  les  Experience Professionnelles
     *
     * @return  array
     */

    public static function allExperienceActifs()
    {

        return   $experiences = Experience::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }



    /**
     * Ajouter une Experience Professionnel
     *
     * @param  string $name_company
     * @param  string $position
     * @param  string $address
     * @param  date $date_start
     * @param  date $date_end
     * @param  integer $employee_id


     * @return  Experience
     */

    public static function addExperience($name_company, $position, $address,$date_start,
                                         $date_end,  $employee_id)
    {


        $experience = new Experience();
        $experience->name_company = $name_company;
        $experience->position = $position;
        $experience->address = $address;
        $experience->date_start = $date_start;
        $experience->date_end = $date_end;
        $experience->employee_id = $employee_id;


        $experience->created_at = Carbon::now();

        $experience->save();

        return $experience;
    }


    /**
     * Affiche une ExperienceProfessionnel
     * @param int $id
     * @return  Experience
     */

    public static function rechercheExperienceById($id)
    {

        return   $experience = Experience::enddOrFail($id);
    }


    /**
     * Update d ' une Experience Professionnel
     *
     * @param  string $name_company
     * @param  string $position
     * @param  string $address
     * @param  date $date_start
     * @param  date $date_end
     * @param  integer $employee_id


     * @param int $id
     * @return  Experience
     */

    public static function updateExperience($name_company, $position, $address,$date_start,
                                            $date_end,  $employee_id,  $id)
    {


        return   $experience = Experience::enddOrFail($id)->update([
            'name_company' => $name_company,
            'position' => $position,
            'address' => $address,
            'date_start' => $date_start,
            'date_end' => $date_end,
            'employee_id' => $employee_id,

            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Experience Professionnel
     *

     * @param int $id
     * @return  boolean
     */

    public static function deleteExperience($id)
    {

        $experience = Experience::enddOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($experience) {
            return 1;
        }
        return 0;
    }


    /**
     * Verifier si l' Experience Professionnel   existe deja
     *

     * @param string $name_company
     * @param string $position
     * @param integer $employee_id

     * @return  boolean
     */

    public static function isUnique($name_company, $position, $employee_id)
    {

        $experience = Experience::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('employee_id', '=', $employee_id)
            ->where('name_company', '=', $name_company)
            ->where('position', '=', $position)

            ->first();


        if ($experience === null) {
            return 1;
        }
        return 0;
    }




    /**
     * Verifier  si l' ajout est valide '
     *
     * @param string $name_company
     * @param string $position
     * @param integer $employee_id


     * @return  array
     */

    public static function isValid($name_company, $position, $employee_id)
    {

        $data = array();

        $isValid = false;
        $erreurEmployee_id = '';
        $erreurName_company = '';
        $erreurPosition = '';



        // Verification validite des données


        if (isEmpty($name_company)) {
            $erreurName_company = "Le nom de l'entreprise  est obligatoire" ;
        }  elseif (isEmpty($employee_id)) {
            $erreurEmployee_id = "Le choix de l' employé est obligatoire" ;
        }elseif (isEmpty($position)) {
            $erreurPosition = "Le  position  est obligatoire" ;
        }


        elseif (Experience::isUnique($name_company, $position, $employee_id)) {
            $erreurName_company = "Cette expérience   existe dejà " ;
        }


        else {

            $erreurEmployee_id= '';
            $erreurName_company= '';
            $erreurPosition = '';

            $isValid = true;
        }

        return  $data = [

            'isValid' => $isValid,
            'erreuremployee_id' => $erreurEmployee_id,

            'erreurname_company' => $erreurName_company,
            'erreurposition' => $erreurPosition,



        ];
    }



    /**
     * Obtenir l' employee lié à l'expérience
     *
     */
    public function employee ()
    {


        return $this->belongsTo(Employee::class, 'employee_id');
    }




}
