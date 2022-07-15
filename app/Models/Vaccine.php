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
        'nb_doses',
        'disease_id',

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
     * @param  integer $nb_doses
     * @param  integer $disease_id
 * @return  Vaccine
     */

    public static function addVaccine($name, $nb_doses, $disease_id)
    {


        $vaccine = new Vaccine();
        $vaccine->name = $name;
        $vaccine->nb_doses = $nb_doses;
        $vaccine->disease_id=$disease_id;


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
     * @param  string $nb_doses
     * @param  string $disease_id
 * @param int $id
     * @return  Vaccine
     */

    public static function updateVaccine($name, $nb_doses, $disease_id,   $id)
    {


        return   $vaccine = Vaccine::findOrFail($id)->update([
            'name' => $name,
            'nb_doses' => $nb_doses,
            'disease_id'=> $disease_id,

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
     * @param  string $nb_doses
     * @param  string $disease_id

     * @return  boolean
     */

    public static function isUnique($name, $nb_doses, $disease_id)
    {

        $vaccine = Vaccine::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('nb_doses', '=', $nb_doses)
            ->where('name', '=', $name)
            ->where('disease_id', '=', $disease_id)

            ->first();


        if ($vaccine ) {
            return 1;
        }
        return 0;
    }




    /**
     * Verifier  si l' ajout est valide '
     *
     * @param  string $name
     * @param  string $nb_doses
     * @param  string $disease_id
     * @param  Vaccine $old_vaccine



     * @return  array
     */

    public static function isValid($name, $nb_doses, $disease_id,  $old_vaccine=null)
    {

        $data = array();

        $isValid = false;
        $erreurName = '';
        $erreurnb_doses = '';
        $erreurdisease_id= '';



        // Verification validite des données


        if ($name === '') {
            $erreurName = "Le name est obligatoire" ;
        }
        elseif ($disease_id ===0 ) {
            $erreurdisease_id = "La maladie  est obligatoire " ;
        }

        elseif ($nb_doses ===0 ) {
            $erreurnb_doses = "Le nombre de doses   est obligatoire " ;
        }

        elseif (
            $old_vaccine == null ||
            $old_vaccine->name !=$name ||
            $old_vaccine->nb_doses !=$nb_doses ||
            $old_vaccine->name !=$disease_id

        ){
            $erreurName = (Vaccine::isUnique($name, $nb_doses, $disease_id))?'Ce vaccin existe déja ':'';

            $isValid = (Vaccine::isUnique($name, $nb_doses, $disease_id))?false:true;
        }



        else {

            $erreurName = '';
            $erreurnb_doses = '';
            $erreurdisease_id='';


            $isValid = true;
        }

        return  $data = [

            'isValid' => $isValid,

            'erreurname' => $erreurName,
            'erreurnb_doses' => $erreurnb_doses,
            'erreurdisease_id' => $erreurdisease_id,



        ];
    }

    /**
     * Obtenir le type lié au Vaccine
     */
    public function disease ()
    {


        return $this->belongsTo(Disease::class, 'disease_id');
    }



}
