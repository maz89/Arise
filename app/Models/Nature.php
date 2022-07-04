<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nature extends Model
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
     * Affichage de la liste de toutes  les Natures
     *
     * @return  array
     */

    public static function allNatureActifs()
    {

        return   $natures = Nature::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter une Nature
     *

     * @param  string $libelle

     * @return Nature
     */

    public static function addNature($libelle )
    {
        $nature = new Nature();


        $nature->libelle = $libelle;

        $nature->created_at = Carbon::now();

        $nature->save();

        return $nature;
    }

    /**
     * Affichage d'une Nature
     * @param int $id
     * @return  Nature
     */

    public static function rechercheNatureById($id)
    {

        return   $nature = Nature::findOrFail($id);
    }

    /**
     * Update d'une Nature
     * @param  string $libelle

     * @param int $id
     * @return  Nature
     */

    public static function updateNature($libelle, $id)
    {


        return   $nature = Nature::findOrFail($id)->update([



            'libelle' => $libelle,


            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Nature
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteNature($id)
    {

        $nature = Nature::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($nature) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si l'Nature   existe deja
     *


     * @param  string $libelle

     * @return  boolean
     */

    public static function isUnique($libelle)
    {

        $nature = Nature::where('status', '!=', TypeStatus::SUPPRIME)


            ->where('libelle', '=', $libelle)

            ->first();


        if ($nature) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout


     * @param  string $libelle
     * @param  Nature $old_nature

     * @return  array
     */

    public static function isValid($libelle, $old_nature= null)
    {

        $data = array();

        $isValid = false;

        $erreurLibelle = '';



        // Verification de la validité des données


        if ($libelle ==='') {
            $erreurLibelle = "Le libelle est obligatoire" ;
        }

        elseif (
            $old_nature == null ||
            $old_nature->libelle !=$libelle

        ){
            $erreurLibelle = (Nature::isUnique($libelle))?'This nature exist ':'';

            $isValid = (Nature::isUnique($libelle))?false:true;
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




