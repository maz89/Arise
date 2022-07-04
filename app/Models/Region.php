<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
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
        'continent_id',

        'status',

    ];

    /**
     * Affichage de la liste de toutes  les Regions
     *
     * @return  array
     */

    public static function allRegionActifs()
    {

        return   $regions = Region::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter une Region
     *

     * @param  string $libelle
     * @param  integer $continent_id

     * @return Region
     */

    public static function addRegion($libelle, $continent_id )
    {
        $region = new Region();


        $region->libelle = $libelle;
        $region->continent_id = $continent_id;

        $region->created_at = Carbon::now();

        $region->save();

        return $region;
    }

    /**
     * Affichage d'une Region
     * @param int $id
     * @return  Region
     */

    public static function rechercheRegionById($id)
    {

        return   $region = Region::findOrFail($id);
    }

    /**
     * Update d'une Region
     * @param  string $libelle
     * @param  integer $continent_id

     * @param int $id
     * @return  Region
     */

    public static function updateRegion($libelle,$continent_id, $id)
    {


        return   $region = Region::findOrFail($id)->update([



            'libelle' => $libelle,
            'continent_id' => $continent_id,


            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Region
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteRegion($id)
    {

        $region = Region::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($region) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si l'Region   existe deja
     *


     * @param  string $libelle
     * @param  integer $continent_id

     * @return  boolean
     */

    public static function isUnique($libelle,$continent_id)
    {

        $region = Region::where('status', '!=', TypeStatus::SUPPRIME)


            ->where('libelle', '=', $libelle)
            ->where('continent_id', '=', $continent_id)

            ->first();


        if ($region) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout


     * @param  string $libelle
     * @param  integer $continent_id
     * @param  Region $old_region

     * @return  array
     */

    public static function isValid($libelle, $continent_id,$old_region=null )
    {

        $data = array();

        $isValid = false;

        $erreurLibelle = '';
        $erreurContinent = '';



        // Verification de la validité des données


        if ($libelle ==='') {
            $erreurLibelle = "Le libelle est obligatoire" ;
        }

        elseif ($continent_id === 0) {
            $erreurContinent = "Le choix du continent  est obligatoire  " ;
        }


        elseif (
            $old_region == null ||
            $old_region->libelle !=$libelle

        ){
            $erreurLibelle = (Region::isUnique($libelle, $continent_id))?'Ce libellé existe déja ':'';

            $isValid = (Region::isUnique($libelle, $continent_id))?false:true;
        }


        else {



            $erreurContinent = '';
            $erreurLibelle = '';


            $isValid = true;
        }

        return  $data = [


            'isValid' => $isValid,


            'erreurLibelle' => $erreurLibelle,
            'erreurContinent' => $erreurContinent,


        ];
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
