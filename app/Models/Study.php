<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
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
        'level',
        'specialization',
        'institute',
        'date_end',
        'employee_id',

        'status',

    ];


    /**
     * Affiche la liste de toutes  les  Studys
     *
     * @return  array
     */

    public static function allStudyActifs()
    {

        return   $studies = Study::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }



    /**
     * Ajouter une Study
     *
     * @param  string $level
     * @param  string $specialization
     * @param  date $institute
     * @param  string $date_end
     * @param  integer $employee_id
 * @return  Study
     */

    public static function addStudy($level, $specialization, $institute,$date_end,
                                        $employee_id  )
    {


        $study = new Study();
        $study->level = $level;
        $study->specialization = $specialization;
        $study->institute = $institute;
        $study->date_end = $date_end;
        $study->employee_id = $employee_id;


        $study->created_at = Carbon::now();

        $study->save();

        return $study;
    }


    /**
     * Affiche une Study
     * @param int $id
     * @return  Study
     */

    public static function rechercheStudyById($id)
    {

        return   $study = Study::findOrFail($id);
    }


    /**
     * Update d ' une Study
     *
     * @param  string $level
     * @param  string $specialization
     * @param  date $institute
     * @param  string $date_end
     * @param  integer $employee_id
 * @param int $id
     * @return  Study
     */

    public static function updateStudy($level, $specialization, $institute,$date_end,
                                           $employee_id,  $id)
    {


        return   $study = Study::findOrFail($id)->update([
            'level' => $level,
            'specialization' => $specialization,
            'institute' => $institute,

            'date_end' => $date_end,
            'employee_id' => $employee_id,

            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Study
     *

     * @param int $id
     * @return  boolean
     */

    public static function deleteStudy($id)
    {

        $study = Study::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($study) {
            return 1;
        }
        return 0;
    }


    /**
     * Verifier si la Study existe deja
     *

     * @param string $level

     * @return  boolean
     */

    public static function isUnique($level)
    {

        $study = Study::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('level', '=', $level)

            ->first();


        if ($study === null) {
            return 1;
        }
        return 0;
    }




    /**
     * Verifier  si l'ajout est valide '
     *
     * @param string $level


     * @return  array
     */

    public static function isValid($level)
    {

        $data = array();

        $isValid = false;
        $erreurLevel = '';


        // Verification validite des données


        if (isEmpty($level)) {
            $erreurLevel = "Le level   est obligatoire" ;
        }
        elseif (Study::isUnique($level)) {
            $erreurLevel = "Cette Study existe dejà " ;
        }


        else {

            $erreurLevel = '';


            $isValid = true;
        }

        return  $data = [

            'isValid' => $isValid,
            'erreurlevel' => $erreurLevel,


        ];
    }

    /**
     * Obtenir l' employe liée à la Study
     *
     */
    public function employee ()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

}
