<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccineType extends Model
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
        'nb_doses',

        'status',

    ];


    /**
     * Affiche la liste de tous les Type de Vaccins
     *
     * @return  array
     */

    public static function allVaccineTypeActifs()
    {

        return   $vaccine_types = VaccineType::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }



    /**
     * Ajouter un Type de Vaccine
     *
     * @param  string $name
 * @param  integer $nb_doses
 * @return  VaccineType
     */

    public static function addVaccineType($name,$nb_doses  )
    {


        $vaccine_type = new VaccineType();
        $vaccine_type->name = $name;
        $vaccine_type->nb_doses = $nb_doses;


        $vaccine_type->created_at = Carbon::now();

        $vaccine_type->save();

        return $vaccine_type;
    }


    /**
     * Affichage d'un VaccineType
     * @param int $id
     * @return  VaccineType
     */

    public static function rechercheVaccineTypeById($id)
    {

        return   $vaccine_type = VaccineType::findOrFail($id);
    }


    /**
     * Update d'un Type de Vaccine
     *
     * @param  string $name

     * @param  integer $nb_doses


     * @param int $id
     * @return  VaccineType
     */

    public static function updateVaccineType($name,$nb_doses,  $id)
    {


        return   $vaccine_type = VaccineType::findOrFail($id)->update([
            'name' => $name,
            'nb_doses' => $nb_doses,


            'id' => $id,


        ]);
    }


    /**
     * Supprimer un Type de Vaccine
     *

     * @param int $id
     * @return  boolean
     */

    public static function deleteVaccineType($id)
    {

        $vaccine_type = VaccineType::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($vaccine_type) {
            return 1;
        }
        return 0;
    }


    /**
     * Verifier si le Type de Vaccine existe deja
     *


     * @param string $name
     * @return  boolean
     */

    public static function isUnique($name )
    {

        $vaccine_type = VaccineType::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('name', '=', $name)

            ->first();


        if ($vaccine_type === null) {
            return 1;
        }
        return 0;
    }




    /**
     * Verifier  si l' ajout est valide '
     *
     * @param string $name


     * @return  array
     */

    public static function isValid($name )
    {

        $data = array();

        $isValid = false;
        $erreurName = '';



        // Verification validite des données


        if (isEmpty($name)) {
            $erreurName = "Le libellé    est obligatoire" ;
        }

        elseif (VaccineType::isUnique($name)) {
            $erreurName  = "Ce VaccineType  existe dejà " ;
        }


        else {

            $erreurName = '';


            $isValid = true;
        }

        return  $data = [

            'isValid' => $isValid,
            'erreurname' => $erreurName,



        ];
    }



}
