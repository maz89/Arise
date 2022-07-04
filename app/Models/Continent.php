<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
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


        'libelle',

        'status',

    ];

    /**
     * Affichage de la liste de toutes  les Continents
     *
     * @return  array
     */

    public static function allContinentActifs()
    {

        return   $continents = Continent::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter une Continent
     *

     * @param  string $libelle

     * @return Continent
     */

    public static function addContinent($libelle )
    {
        $continent = new Continent();


        $continent->libelle = $libelle;

        $continent->created_at = Carbon::now();

        $continent->save();

        return $continent;
    }

    /**
     * Affichage d'une Continent
     * @param int $id
     * @return  Continent
     */

    public static function rechercheContinentById($id)
    {

        return   $continent = Continent::findOrFail($id);
    }

    /**
     * Update d'une Continent
     * @param  string $libelle

     * @param int $id
     * @return  Continent
     */

    public static function updateContinent($libelle, $id)
    {


        return   $continent = Continent::findOrFail($id)->update([



            'libelle' => $libelle,


            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Continent
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteContinent($id)
    {

        $continent = Continent::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($continent) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si l'Continent   existe deja
     *


     * @param  string $libelle

     * @return  boolean
     */

    public static function isUnique($libelle)
    {

        $continent = Continent::where('status', '!=', TypeStatus::SUPPRIME)


            ->where('libelle', '=', $libelle)

            ->first();


        if ($continent) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout


     * @param  string $libelle
     * @param  Continent $old_continent

     * @return  array
     */

    public static function isValid($libelle, $old_continent=null)
    {

        $data = array();

        $isValid = false;

        $erreurLibelle = '';



        // Verification de la validité des données


        if ($libelle ==='') {
            $erreurLibelle = "Le libelle est obligatoire" ;
        }

        elseif (
            $old_continent == null ||
            $old_continent->libelle !=$libelle

        ){
            $erreurLibelle = (Continent::isUnique($libelle))?'Ce libellé existe déja ':'';

            $isValid = (Continent::isUnique($libelle))?false:true;
        }


        else {



            $erreurLibelle = '';


            $isValid = true;
        }

        return  $data = [


            'isValid' => $isValid,


            'erreurLibelle' => $erreurLibelle,


        ];
    }



}
