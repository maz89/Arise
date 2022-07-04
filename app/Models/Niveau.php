<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
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
     * Affichage de la liste de toutes  les Niveaus
     *
     * @return  array
     */

    public static function allNiveauActifs()
    {

        return   $niveaus = Niveau::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter une Niveau
     *

     * @param  string $libelle

     * @return Niveau
     */

    public static function addNiveau($libelle )
    {
        $niveau = new Niveau();


        $niveau->libelle = $libelle;

        $niveau->created_at = Carbon::now();

        $niveau->save();

        return $niveau;
    }

    /**
     * Affichage d'une Niveau
     * @param int $id
     * @return  Niveau
     */

    public static function rechercheNiveauById($id)
    {

        return   $niveau = Niveau::findOrFail($id);
    }

    /**
     * Update d'une Niveau
     * @param  string $libelle

     * @param int $id
     * @return  Niveau
     */

    public static function updateNiveau($libelle, $id)
    {


        return   $niveau = Niveau::findOrFail($id)->update([



            'libelle' => $libelle,


            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Niveau
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteNiveau($id)
    {

        $niveau = Niveau::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($niveau) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si l'Niveau   existe deja
     *


     * @param  string $libelle

     * @return  boolean
     */

    public static function isUnique($libelle)
    {

        $niveau = Niveau::where('status', '!=', TypeStatus::SUPPRIME)


            ->where('libelle', '=', $libelle)

            ->first();


        if ($niveau) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout


     * @param  string $libelle
     * @param  Niveau $old_niveau

     * @return  array
     */

    public static function isValid($libelle, $old_niveau = null)
    {

        $data = array();

        $isValid = false;

        $erreurLibelle = '';



        // Verification de la validité des données


        if ($libelle ==='') {
            $erreurLibelle = "Le  libellé  est obligatoire" ;
        }

        elseif (
            $old_niveau == null ||
            $old_niveau->libelle !=$libelle

        ){
            $erreurLibelle = (Niveau::isUnique($libelle))?'Ce libellé existe déja ':'';

            $isValid = (Niveau::isUnique($libelle))?false:true;
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
