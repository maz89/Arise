<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
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
        'brand_id',
        'modele',

        'status',

    ];


    /**
     * Affiche la liste de toutes  les  Modeles
     *
     * @return  array
     */

    public static function allModeleActifs()
    {

        return   $modeles = Modele::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }



    /**
     * Ajouter une Modele
     *
     * @param  string $modele
     * @param  integer $brand_id


     * @return  Modele
     */

    public static function addModele($modele, $brand_id  )
    {


        $modele = new Modele();
        $modele->modele = $modele;
        $modele->brand_id = $brand_id;



        $modele->created_at = Carbon::now();

        $modele->save();

        return $modele;
    }


    /**
     * Affiche une Modele
     * @param int $id
     * @return  Modele
     */

    public static function rechercheModeleById($id)
    {

        return   $modele = Modele::findOrFail($id);
    }


    /**
     * Update d ' une Modele
     *
     * @param  string $modele
     * @param  string $rappel_marque
     * @param  integer $brand_id


     * @param int $id
     * @return  Modele
     */

    public static function updateModele($modele, $brand_id,  $id)
    {


        return   $modele = Modele::findOrFail($id)->update([

            'brand_id' => $brand_id,
            'modele' => $modele,

            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Modele
     *

     * @param int $id
     * @return  boolean
     */

    public static function deleteModele($id)
    {

        $modele = Modele::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($modele) {
            return 1;
        }
        return 0;
    }


    /**
     * Verifier si l' Modele   existe deja
     *

     * @param integer $modele
     * @param integer $brand_id

     * @return  boolean
     */

    public static function isUnique($modele, $brand_id )
    {

        $modele = Modele::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('modele', '=', $modele)
            ->where('brand_id', '=', $brand_id)

            ->first();


        if ($modele === null) {
            return 1;
        }
        return 0;
    }




    /**
     * Verifier  si l' ajout est valide '
     *
     * @param integer $modele
     * @param integer $brand_id


     * @return  array
     */

    public static function isValid($modele, $brand_id )
    {

        $data = array();

        $isValid = false;
        $erreurModele = '';

        $erreurBrand = '';


        // Verification validite des données


        if (isEmpty($modele)) {
            $erreurModele = "Le modele   est obligatoire" ;
        }  elseif (isEmpty($brand_id)) {
            $erreurBrand = "Le choix de la marque  est obligatoire" ;
        }

        elseif (Modele::isUnique($modele, $brand_id)) {
            $erreurModele = "Ce modèle   existe dejà " ;
        }


        else {

            $erreurModele = '';

            $erreurBrand = '';

            $isValid = true;
        }

        return  $data = [

            'isValid' => $isValid,
            'erreurModele' => $erreurModele,

            'erreurMarque' => $erreurBrand,



        ];
    }



    /**
     * Obtenir la marque     liée au modèle
     *
     */
    public function brand()
    {


        return $this->belongsTo(Brand::class, 'brand_id');
    }


}
