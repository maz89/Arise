<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
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

        'name',

    ];

    /**
     * Affichage de la liste de tous les business units
     *
     * @return  array
     */

    public static function allNationalityActifs()
    {

        return   $nationalities = Nationality::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter une nationalité
     *
     * @param  string $name
 * @return Nationality
     */

    public static function addNationality($name)
    {
        $nationality = new Nationality();

        $nationality->name = $name;

        $nationality->created_at = Carbon::now();

        $nationality->save();

        return $nationality;
    }

    /**
     * Affichage d'une nationalité
     * @param int $id
     * @return  Nationality
     */

    public static function rechercheNationalityById($id)
    {

        return   $nationality = Nationality::findOrFail($id);
    }

    /**
     * Update d'une nationalité
     * @param  string $name
     * @param int $id
     * @return  Nationality
     */

    public static function updateNationality($name, $id)
    {


        return   $nationality = Nationality::findOrFail($id)->update([

            'name' => $name,

            'id' => $id,


        ]);
    }


    /**
     * Supprimer une nationalité
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteNationality($id)
    {

        $nationality = Nationality::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($nationality) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si le département  existe déja

     * @param  string $name

     * @return  boolean
     */

    public static function isUnique($name)
    {

        $nationality = Nationality::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('name', '=', $name)

            ->first();


        if ($nationality) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout

     * @param  integer $name



     * @return  array
     */

    public static function isValid($name)
    {

        $data = array();
        $isValid = false;
        $erreurName = '';


        // Verification de la validité des données


        if ($name=='') {
            $erreurName = "Le libellé est obligatoire" ;
        }
        elseif (Nationality::isUnique($name)) {
            $erreurName = "Cette nationalité existe déjà " ;
        }


        else {

            $erreurName = '';

            $isValid = true;
        }

        return  $data = [


            'isValid' => $isValid,
            'erreurName' => $erreurName,

        ];
    }



}
