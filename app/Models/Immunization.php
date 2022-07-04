<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immunization extends Model
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


        'employee_id',
        'vaccine_id',
        'date_immunization',
        'is_vaccine',
        'reason',
        'status',

    ];

    /**
     * Affichage de la liste de toutes  les Immunizations
     *
     * @return  array
     */

    public static function allImmunizationActifs()
    {

        return   $immunizations = Immunization::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter une Immunization
     *

     * @param  integer $employee_id
     * @param  integer $vaccine_id
     * @param  date $date_immunization
     * @param  integer $is_vaccine
     * @param  string $reason

     * @return Immunization
     */

    public static function addImmunization($employee_id,$vaccine_id, $date_immunization, $is_vaccine, $reason )
    {
        $immunization = new Immunization();


        $immunization->employee_id = $employee_id;
        $immunization->vaccine_id = $vaccine_id;
        $immunization->date_immunization = $date_immunization;
        $immunization->is_vaccine = $is_vaccine;
        $immunization->reason = $reason;

        $immunization->created_at = Carbon::now();

        $immunization->save();

        return $immunization;
    }

    /**
     * Affichage d'une Immunization
     * @param int $id
     * @return  Immunization
     */

    public static function rechercheImmunizationById($id)
    {

        return   $immunization = Immunization::findOrFail($id);
    }

    /**
     * Update d'une Immunization
 * @param  integer $employee_id
     * @param  integer $vaccine_id
     *      * @param  date $date_immunization
     * @param int $id
     * @return  Immunization
     */

    public static function updateImmunization($employee_id,$vaccine_id, $date_immunization, $is_vaccine, $reason, $id)
    {


        return   $immunization = Immunization::findOrFail($id)->update([



            'employee_id' => $employee_id,
            'vaccine_id' => $vaccine_id,
            'date_immunization' => $date_immunization,
            'is_vaccine' => $is_vaccine,
            'reason' => $reason,

            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Immunization
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteImmunization($id)
    {

        $immunization = Immunization::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($immunization) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si l'Immunization   existe deja
     *


     * @param  integer $employee_id
     * @param  integer $vaccine_id
     *      * @param  date $date_immunization

     * @return  boolean
     */

    public static function isUnique($employee_id, $vaccine_id, $date_immunization)
    {

        $immunization = Immunization::where('status', '!=', TypeStatus::SUPPRIME)


            ->where('employee_id', '=', $employee_id)
            ->where('vaccine_id', '=', $vaccine_id)
            ->where('date_immunization', '=', $date_immunization)

            ->first();


        if ($immunization === null) {
            return 1;
        }
return 0;
}

/**
 * Verification de la validité de l'ajout


 * @param  integer $employee_id
 * @param  integer $vaccine_id
 * @param  date $date_immunization
 * @param  Immunization $old_immunization


 * @return  array
 */

public static function isValid($employee_id, $vaccine_id,$date_immunization, $old_immunization = null)
{

    $data = array();

    $isValid = false;

    $erreurEmployee_id = '';
    $erreurvaccine_id = '';
    $erreurDate = '';



    // Verification de la validité des données


    if ($employee_id ===0) {
        $erreurEmployee_id = "L'identité de l'employé est obligatoire" ;
    }
    elseif ($vaccine_id ===0) {
        $erreurvaccine_id = "Le choix du vaccin  est obligatoire" ;
    }
    elseif ($date_immunization === '') {
        $erreurDate = "La date de Immunization est obligatoire" ;
    }
    elseif (
        $old_immunization == null ||
        $old_immunization->employee_id !=$employee_id ||
        $old_immunization->vaccine_id !=$vaccine_id ||
        $old_immunization->date_immunization !=$date_immunization

    ){
        $erreurEmployee_id = (Immunization::isUnique($employee_id, $vaccine_id, $date_immunization))?'Ce employé a déjà reçu ce vaccin à cette date  ':'';

        $isValid = (Immunization::isUnique($employee_id, $vaccine_id, $date_immunization))?false:true;
    }



    else {



        $erreurEmployee_id = '';
        $erreurvaccine_id = '';
        $erreurDate = '';

        $isValid = true;
    }

    return  $data = [


        'isValid' => $isValid,


        'erreuremployee_id' => $erreurEmployee_id,
        'erreurvaccine_id' => $erreurvaccine_id,
        'erreurDate' => $erreurDate,

    ];
}

/**
 * Obtenir le Vaccine de la Immunization
 *
 */
public function Vaccin()
{


    return $this->belongsTo(Vaccine::class, 'vaccine_id');
}

/**
 * Obtenir l'employé concerné
 *
 */
public function employee()
{


    return $this->belongsTo(Employe::class, 'employee_id');
}


    /**
     * Obtenir l'employé concerné
     *
     */
    public function vaccine()
    {


        return $this->belongsTo(Vaccine::class, 'vaccine_id');
    }

}
