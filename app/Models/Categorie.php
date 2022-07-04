<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
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
     * Affichage de la liste de toutes  les Categories
     *
     * @return  array
     */

    public static function allCategorieActifs()
    {

        return   $categories = Categorie::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter une Categorie
     *

     * @param  string $libelle

     * @return Categorie
     */

    public static function addCategorie($libelle )
    {
        $categorie = new Categorie();


        $categorie->libelle = $libelle;

        $categorie->created_at = Carbon::now();

        $categorie->save();

        return $categorie;
    }

    /**
     * Affichage d'une Categorie
     * @param int $id
     * @return  Categorie
     */

    public static function rechercheCategorieById($id)
    {

        return   $categorie = Categorie::findOrFail($id);
    }

    /**
     * Update d'une Categorie
     * @param  string $libelle

     * @param int $id
     * @return  Categorie
     */

    public static function updateCategorie($libelle, $id)
    {


        return   $categorie = Categorie::findOrFail($id)->update([



            'libelle' => $libelle,


            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Categorie
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteCategorie($id)
    {

        $categorie = Categorie::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($categorie) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si l'Categorie   existe deja
     *


     * @param  string $libelle

     * @return  boolean
     */

    public static function isUnique($libelle)
    {

        $categorie = Categorie::where('status', '!=', TypeStatus::SUPPRIME)


            ->where('libelle', '=', $libelle)

            ->first();


        if ($categorie) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout


     * @param  string $libelle

     * @return  array
     */

    public static function isValid($libelle)
    {

        $data = array();

        $isValid = false;

        $erreurLibelle = '';



        // Verification de la validité des données


        if ($libelle ==='') {
            $erreurLibelle = "Le libelle est obligatoire" ;
        }

        elseif (Categorie::isUnique($libelle)) {
            $erreurLibelle = "Cette Categorie est déja renseignée " ;
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
