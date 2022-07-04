<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countrie extends Model
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
        'nationality',
        'region_id',
        'continent_id',

        'status',

    ];

    /**
     * Affichage de la liste de toutes  les Countries
     *
     * @return  array
     */

    public static function allCountrieActifs()
    {

        return   $countries = Countrie::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter une Countrie
     *

     * @param  string $libelle
     * @param  string $nationality
     * @param  integer $region_id

     * @return Countrie
     */

    public static function addCountrie($libelle,$nationality, $region_id )
    {
        $countrie = new Countrie();
        $continent_id = Region::rechercheRegionById($region_id)->continent->id;

        $countrie->libelle = $libelle;
        $countrie->nationality = $nationality;
        $countrie->region_id = $region_id;
        $countrie->continent_id = $continent_id;

        $countrie->created_at = Carbon::now();

        $countrie->save();

        return $countrie;
    }

    /**
     * Affichage d'une Countrie
     * @param int $id
     * @return  Countrie
     */

    public static function rechercheCountrieById($id)
    {

        return   $countrie = Countrie::findOrFail($id);
    }

    /**
     * Update d'une Countrie
     * @param  string $libelle
     * @param  string $nationality
     * @param  integer $region_id

     * @param int $id
     * @return  Countrie
     */

    public static function updateCountrie($libelle,$nationality,$region_id, $id)
    {


        return   $countrie = Countrie::findOrFail($id)->update([



            'libelle' => $libelle,
            'nationality' => $nationality,
            'region_id' => $region_id,
            'continent_id' => Region::rechercheRegionById($region_id)->continent->id,

            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Countrie
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteCountrie($id)
    {

        $countrie = Countrie::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($countrie) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si l'Countrie   existe deja
     *


     * @param  string $libelle
     * @param  integer $region_id

     * @return  boolean
     */

    public static function isUnique($libelle,$region_id)
    {

        $countrie = Countrie::where('status', '!=', TypeStatus::SUPPRIME)


            ->where('libelle', '=', $libelle)
            ->where('region_id', '=', $region_id)

            ->first();


        if ($countrie) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout


     * @param  string $libelle
     * @param  integer $region_id
     * @param  countrie $old_countrie

     * @return  array
     */

    public static function isValid($libelle, $region_id, $old_countrie=null)
    {

        $data = array();

        $isValid = false;

        $erreurLibelle = '';
        $erreurRegion = '';



        // Verification de la validité des données


        if ($libelle ==='') {
            $erreurLibelle = "Le libelle est obligatoire" ;
        }

        elseif ($region_id === 0) {
            $erreurRegion = "Le choix de la Countrie est obligatoire  " ;
        }

        elseif (
            $old_countrie == null ||
            $old_countrie->libelle !=$libelle

        ){
            $erreurLibelle = (Countrie::isUnique($libelle, $region_id))?'Ce libellé existe déja ':'';

            $isValid = (Countrie::isUnique($libelle, $region_id))?false:true;
        }


        else {



            $erreurRegion = '';
            $erreurLibelle = '';


            $isValid = true;
        }

        return  $data = [


            'isValid' => $isValid,

            'erreurLibelle' => $erreurLibelle,
            'erreurRegion' => $erreurRegion,


        ];
    }

    /**
     * Obtenir l'employé concerné
     *
     */
    public function region()
    {


        return $this->belongsTo(Region::class, 'region_id');
    }

    /**
     * Obtenir l'employé concerné
     *
     */
    public function continent()
    {


        return $this->belongsTo(Continent::class, 'continent_id');
    }

}
