<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
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
        'employee_id',

        'status',

    ];


    /**
     * Affiche la liste de toutes  les  Profils
     *
     * @return  array
     */

    public static function allProfilActifs()
    {

        return   $profils = Profil::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }



    /**
     * Ajouter une Profil
     *
     * @param  string $name

     * @param  integer $employee_id

     * @return  Profil
     */

    public static function addProfil($name,$employee_id  )
    {


        $profil = new Profil();
        $profil->name = $name;
        $profil->employee_id = $employee_id;


        $profil->created_at = Carbon::now();

        $profil->save();

        return $profil;
    }


    /**
     * Affichage d'un Profil
     * @param int $id
     * @return  Profil
     */

    public static function rechercheProfilById($id)
    {

        return   $profil = Profil::findOrFail($id);
    }


    /**
     * Update d'un Profil
     *
     * @param  string $name

     * @param  integer $employee_id


     * @param int $id
     * @return  Profil
     */

    public static function updateProfil($name,$employee_id,  $id)
    {


        return   $profil = Profil::findOrFail($id)->update([
            'name' => $name,
            'employee_id' => $employee_id,


            'id' => $id,


        ]);
    }


    /**
     * Supprimer un Profil
     *

     * @param int $id
     * @return  boolean
     */

    public static function deleteProfil($id)
    {

        $profil = Profil::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($profil) {
            return 1;
        }
        return 0;
    }


    /**
     * Verifier si le Profil existe deja
     *


     * @param string $name
     * @return  boolean
     */

    public static function isUnique($name )
    {

        $profil = Profil::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('name', '=', $name)

            ->first();


        if ($profil === null) {
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

        elseif (Profil::isUnique($name)) {
            $erreurName  = "Ce profil  existe dejà " ;
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



    /**
     * Obtenir l'employe  lié au profil
     */
    public function employe ()
    {


        return $this->belongsTo(Employee::class, 'employee_id');
    }



}
