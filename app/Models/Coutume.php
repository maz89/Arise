<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coutume extends Model
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
        'prefecture_id',

        'status',

    ];

    /**
     * Affichage de la liste de toutes  les Coutumes
     *
     * @return  array
     */

    public static function allCoutumeActifs()
    {

        return   $coutumes = Coutume::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter une Coutume
     *

     * @param  string $libelle
     * @param  integer $prefecture_id

     * @return Coutume
     */

    public static function addCoutume($libelle, $prefecture_id )
    {
        $coutume = new Coutume();


        $continent_id = Prefecture::recherchePrefectureById($prefecture_id)->continent->id;
        $region_id = Prefecture::recherchePrefectureById($prefecture_id)->region->id;
        $countrie_id = Prefecture::recherchePrefectureById($prefecture_id)->region->id;

        $coutume->libelle = $libelle;
        $coutume->prefecture_id = $prefecture_id;
        $coutume->countrie_id = $countrie_id;
        $coutume->region_id = $region_id;
        $coutume->continent_id = $continent_id;

        $coutume->created_at = Carbon::now();

        $coutume->save();

        return $coutume;
    }

    /**
     * Affichage d'une Coutume
     * @param int $id
     * @return  Coutume
     */

    public static function rechercheCoutumeById($id)
    {

        return   $coutume = Coutume::findOrFail($id);
    }

    /**
     * Update d'une Coutume
     * @param  string $libelle
     * @param  integer $prefecture_id

     * @param int $id
     * @return  Coutume
     */

    public static function updateCoutume($libelle,$prefecture_id, $id)
    {


        return   $coutume = Coutume::findOrFail($id)->update([



            'libelle' => $libelle,
            'prefecture_id' => $prefecture_id,

            'countrie_id' => Prefecture::recherchePrefectureById($prefecture_id)->countrie->id,
            'region_id' => Prefecture::recherchePrefectureById($prefecture_id)->region->id,
            'continent_id' => Prefecture::recherchePrefectureById($prefecture_id)->continent->id,


            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Coutume
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteCoutume($id)
    {

        $coutume = Coutume::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($coutume) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si l'Coutume   existe deja
     *


     * @param  string $libelle
     * @param  integer $prefecture_id

     * @return  boolean
     */

    public static function isUnique($libelle,$prefecture_id)
    {

        $coutume = Coutume::where('status', '!=', TypeStatus::SUPPRIME)


            ->where('libelle', '=', $libelle)
            ->where('prefecture_id', '=', $prefecture_id)

            ->first();


        if ($coutume) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout


     * @param  string $libelle
     * @param  integer $prefecture_id
     * @param  Coutume $old_coutume

     * @return  array
     */

    public static function isValid($libelle, $prefecture_id, $old_coutume= null)
    {

        $data = array();

        $isValid = false;

        $erreurLibelle = '';
        $erreurPrefecture = '';



        // Verification de la validité des données


        if ($libelle ==='') {
            $erreurLibelle = "Le libelle est obligatoire" ;
        }

        elseif ($prefecture_id === 0) {
            $erreurPrefecture = "Le choix de la prefecture est obligatoire  " ;
        }

        elseif (
            $old_coutume == null ||
            $old_coutume->libelle !=$libelle

        ){
            $erreurLibelle = (Coutume::isUnique($libelle, $prefecture_id))?'Ce libellé existe déja ':'';

            $isValid = (Coutume::isUnique($libelle, $prefecture_id))?false:true;
        }


        else {



            $erreurPrefecture = '';
            $erreurLibelle = '';


            $isValid = true;
        }

        return  $data = [


            'isValid' => $isValid,


            'erreurLibelle' => $erreurLibelle,
            'erreurPrefecture' => $erreurPrefecture,


        ];
    }



    /**
     * Obtenir l'employé concerné
     *
     */
    public function prefecture()
    {


        return $this->belongsTo(Prefecture::class, 'prefecture_id');
    }


    /**
     * Obtenir l'employé concerné
     *
     */
    public function countrie()
    {


        return $this->belongsTo(Countrie::class, 'countrie_id');
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
