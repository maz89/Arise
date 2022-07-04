<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
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
     * Affichage de la liste de toutes  les Diseases
     *
     * @return  array
     */

    public static function allDiseaseActifs()
    {

        return   $diseases = Disease::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter une Disease
     *

     * @param  string $libelle

     * @return Disease
     */

    public static function addDisease($libelle )
    {
        $disease = new Disease();


        $disease->libelle = $libelle;

        $disease->created_at = Carbon::now();

        $disease->save();

        return $disease;
    }

    /**
     * Affichage d'une Disease
     * @param int $id
     * @return  Disease
     */

    public static function rechercheDiseaseById($id)
    {

        return   $disease = Disease::findOrFail($id);
    }

    /**
     * Update d'une Disease
     * @param  string $libelle

     * @param int $id
     * @return  Disease
     */

    public static function updateDisease($libelle, $id)
    {


        return   $disease = Disease::findOrFail($id)->update([



            'libelle' => $libelle,


            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Disease
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteDisease($id)
    {

        $disease = Disease::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($disease) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si l'Disease   existe deja
     *


     * @param  string $libelle

     * @return  boolean
     */

    public static function isUnique($libelle)
    {

        $disease = Disease::where('status', '!=', TypeStatus::SUPPRIME)


            ->where('libelle', '=', $libelle)

            ->first();


        if ($disease) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout


     * @param  string $libelle
     * @param  Disease $old_disease

     * @return  array
     */

    public static function isValid($libelle, $old_disease=null)
    {

        $data = array();

        $isValid = false;

        $erreurLibelle = '';



        // Verification de la validité des données


        if ($libelle ==='') {
            $erreurLibelle = "Le libelle est obligatoire" ;
        }

        elseif (
            $old_disease == null ||
            $old_disease->libelle !=$libelle

        ){
            $erreurLibelle = (Continent::isUnique($libelle))?'Ce disease  existe déja ':'';

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
