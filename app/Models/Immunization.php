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
        'Vaccine_id',
        'date',

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

     * @param  string $date
     * @param  string $employee_id
     * @param  string $Vaccine_id
     * @return Immunization
     */

    public static function addImmunization($employee_id,$Vaccine_id, $date )
    {
        $immunization = new Immunization();


        $immunization->employee_id = $employee_id;
        $immunization->Vaccine_id = $Vaccine_id;
        $immunization->date_fin = $date;

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
     * @param  integer $Vaccine_id
     *      * @param  date $date
     * @param int $id
     * @return  Immunization
     */

    public static function updateImmunization($employee_id, $Vaccine_id,$date, $id)
    {


        return   $immunization = Immunization::findOrFail($id)->update([



            'employee_id' => $employee_id,
            'Vaccine_id' => $Vaccine_id,
            'date' => $date,

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
     * @param  integer $Vaccine_id
     *      * @param  date $date

     * @return  boolean
     */

    public static function isUnique($employee_id, $Vaccine_id, $date)
    {

        $immunization = Immunization::where('status', '!=', TypeStatus::SUPPRIME)


            ->where('employee_id', '=', $employee_id)
            ->where('Vaccine_id', '=', $Vaccine_id)
            ->where('date_fin', '=', $date)

            ->first();


        if ($immunization === null) {
            return 1;
        }
return 0;
}

/**
 * Verification de la validité de l'ajout


 * @param  integer $employee_id
 * @param  integer $Vaccine_id
 * @param  date $date


 * @return  array
 */

public static function isValid($employee_id, $Vaccine_id,$date)
{

    $data = array();

    $isValid = false;

    $erreurEmployee_id = '';
    $erreurVaccine_id = '';
    $erreurDate = '';



    // Verification de la validité des données


    if (isEmpty($employee_id)) {
        $erreurEmployee_id = "L'identité de l'employé est obligatoire" ;
    }
    elseif (isEmpty($Vaccine_id)) {
        $erreurVaccine_id = "Le Vaccine est obligatoire" ;
    }
    elseif (isEmpty($date)) {
        $erreurDate = "La date de Immunization est obligatoire" ;
    }
    elseif (Immunization::isUnique($employee_id, $Vaccine_id,$date)) {
        $erreurNom = "Cette Immunization est déja renseignée " ;
    }


    else {



        $erreurEmployee_id = '';
        $erreurVaccine_id = '';
        $erreurDate = '';

        $isValid = true;
    }

    return  $data = [


        'isValid' => $isValid,


        'erreuremployee_id' => $erreurEmployee_id,
        'erreurVaccine_id' => $erreurVaccine_id,
        'erreurDate' => $erreurDate,

    ];
}

/**
 * Obtenir le Vaccine de la Immunization
 *
 */
public function Vaccin()
{


    return $this->belongsTo(Vaccine::class, 'Vaccine_id');
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
