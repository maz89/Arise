<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
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
     * Affichage de la liste de toutes  les Bands
     *
     * @return  array
     */

    public static function allBandActifs()
    {

        return   $bands = Band::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter une Band
     *

     * @param  string $libelle

     * @return Band
     */

    public static function addBand($libelle )
    {
        $band = new Band();


        $band->libelle = $libelle;

        $band->created_at = Carbon::now();

        $band->save();

        return $band;
    }

    /**
     * Affichage d'une Band
     * @param int $id
     * @return  Band
     */

    public static function rechercheBandById($id)
    {

        return   $band = Band::findOrFail($id);
    }

    /**
     * Update d'une Band
     * @param  string $libelle

     * @param int $id
     * @return  Band
     */

    public static function updateBand($libelle, $id)
    {


        return   $band = Band::findOrFail($id)->update([



            'libelle' => $libelle,


            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Band
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteBand($id)
    {

        $band = Band::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($band) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si l'Band   existe deja
     *


     * @param  string $libelle

     * @return  boolean
     */

    public static function isUnique($libelle)
    {

        $band = Band::where('status', '!=', TypeStatus::SUPPRIME)


            ->where('libelle', '=', $libelle)

            ->first();


        if ($band) {
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

        elseif (Band::isUnique($libelle)) {
            $erreurLibelle = "Cette Band est déja renseignée " ;
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
