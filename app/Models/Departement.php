<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
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

        'title',

    ];

    /**
     * Affichage de la liste de tous les business units
     *
     * @return  array
     */

    public static function allDepartementActifs()
    {

        return   $departements = Departement::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter une Business Unit
     *
     * @param  string $title

     * @return Departement
     */

    public static function addDepartement($title)
    {
        $departement = new Departement();

        $departement->title = $title;

        $departement->created_at = Carbon::now();

        $departement->save();

        return $departement;
    }

    /**
     * Affichage d'un Département
     * @param int $id
     * @return  Departement
     */

    public static function rechercheDepartementById($id)
    {

        return   $departement = Departement::findOrFail($id);
    }

    /**
     * Update d'un département
     * @param  integer $title
     * @param int $id
     * @return  Departement
     */

    public static function updateDepartement($title, $id)
    {


        return   $departement = Departement::findOrFail($id)->update([

            'title' => $title,

            'id' => $id,


        ]);
    }


    /**
     * Supprimer un département
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteDepartement($id)
    {

        $departement = Departement::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($departement) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si le département  existe déja

     * @param  integer $title

     * @return  boolean
     */

    public static function isUnique($title)
    {

        $departement = Departement::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('title', '=', $title)

            ->first();


        if ($departement) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout

     * @param  integer $title


     * @return  array
     */

    public static function isValid($title)
    {

        $data = array();

        $isValid = false;

        $erreurTitle = '';


        // Verification de la validité des données


        if ($title==='') {
            $erreurTitle = "Le libellé est obligatoire" ;
        }
        elseif (Departement::isUnique($title)) {
            $erreurTitle = "Ce département existe déjà " ;
        }


        else {

            $erreurTitle = '';

            $isValid = true;
        }

        return  $data = [


            'isValid' => $isValid,
            'erreurTitle' => $erreurTitle,

        ];
    }


}
