<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
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
        'countrie_id',
        'region_id',
        'continent_id',

        'status',

    ];

    /**
     * Affichage de la liste de toutes  les Prefectures
     *
     * @return  array
     */

    public static function allPrefectureActifs()
    {

        return   $prefectures = Prefecture::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter une Prefecture
     *

     * @param  string $libelle
     * @param  integer $countrie_id


     * @return Prefecture
     */

    public static function addPrefecture($libelle, $countrie_id   )
    {
        $prefecture = new Prefecture();

        $continent_id = Countrie::rechercheCountrieById($countrie_id)->continent->id;
        $region_id = Countrie::rechercheCountrieById($countrie_id)->region->id;

        $prefecture->libelle = $libelle;
        $prefecture->countrie_id = $countrie_id;
        $prefecture->region_id = $region_id;
        $prefecture->continent_id = $continent_id;

        $prefecture->created_at = Carbon::now();

        $prefecture->save();

        return $prefecture;
    }

    /**
     * Affichage d'une Prefecture
     * @param int $id
     * @return  Prefecture
     */

    public static function recherchePrefectureById($id)
    {

        return   $prefecture = Prefecture::findOrFail($id);
    }

    /**
     * Update d'une Prefecture
     * @param  string $libelle
     * @param  integer $countrie_id

     * @param int $id
     * @return  Prefecture
     */

    public static function updatePrefecture($libelle,$countrie_id, $id)
    {


        return   $prefecture = Prefecture::findOrFail($id)->update([



            'libelle' => $libelle,
            'countrie_id' => $countrie_id,

            'region_id' => Countrie::rechercheCountrieById($countrie_id)->region->id,
            'continent_id' => Countrie::rechercheCountrieById($countrie_id)->continent->id,


            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Prefecture
     *
     * @param int $id
     * @return  boolean
     */

    public static function deletePrefecture($id)
    {

        $prefecture = Prefecture::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($prefecture) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si l'Prefecture   existe deja
     *


     * @param  string $libelle
     * @param  integer $countrie_id

     * @return  boolean
     */

    public static function isUnique($libelle,$countrie_id)
    {

        $prefecture = Prefecture::where('status', '!=', TypeStatus::SUPPRIME)


            ->where('libelle', '=', $libelle)
            ->where('countrie_id', '=', $countrie_id)

            ->first();


        if ($prefecture) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout


     * @param  string $libelle
     * @param  integer $countrie_id
     * @param  Prefecture $old_prefecture

     * @return  array
     */

    public static function isValid($libelle, $countrie_id, $old_prefecture=null)
    {

        $data = array();

        $isValid = false;

        $erreurLibelle = '';
        $erreurCountrie = '';



        // Verification de la validité des données


        if ($libelle ==='') {
            $erreurLibelle = "Le libelle est obligatoire" ;
        }

        elseif ($countrie_id === 0) {
            $erreurCountrie = "Le choix de la prefecture est obligatoire  " ;
        }

        elseif (
            $old_prefecture == null ||
            $old_prefecture->libelle !=$libelle ||
            $old_prefecture->countrie_id !=$countrie_id

        ){
            $erreurLibelle = (Prefecture::isUnique($libelle,$countrie_id))?'Cette préfecture  existe déja ':'';

            $isValid = (Prefecture::isUnique($libelle,$countrie_id))?false:true;
        }



        else {



            $erreurCountrie = '';
            $erreurLibelle = '';


            $isValid = true;
        }

        return  $data = [


            'isValid' => $isValid,


            'erreurLibelle' => $erreurLibelle,
            'erreurCountrie' => $erreurCountrie,


        ];
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
