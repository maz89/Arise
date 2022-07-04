<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormerEmployer extends Model
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
     * Affichage de la liste de toutes  les FormerEmployers
     *
     * @return  array
     */

    public static function allFormerEmployerActifs()
    {

        return   $formeremployers = FormerEmployer::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter une FormerEmployer
     *

     * @param  string $libelle

     * @return FormerEmployer
     */

    public static function addFormerEmployer($libelle )
    {
        $formeremployer = new FormerEmployer();


        $formeremployer->libelle = $libelle;

        $formeremployer->created_at = Carbon::now();

        $formeremployer->save();

        return $formeremployer;
    }

    /**
     * Affichage d'une FormerEmployer
     * @param int $id
     * @return  FormerEmployer
     */

    public static function rechercheFormerEmployerById($id)
    {

        return   $formeremployer = FormerEmployer::findOrFail($id);
    }

    /**
     * Update d'une FormerEmployer
     * @param  string $libelle

     * @param int $id
     * @return  FormerEmployer
     */

    public static function updateFormerEmployer($libelle, $id)
    {


        return   $formeremployer = FormerEmployer::findOrFail($id)->update([



            'libelle' => $libelle,


            'id' => $id,


        ]);
    }


    /**
     * Supprimer une FormerEmployer
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteFormerEmployer($id)
    {

        $formeremployer = FormerEmployer::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($formeremployer) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si l'FormerEmployer   existe deja
     *


     * @param  string $libelle

     * @return  boolean
     */

    public static function isUnique($libelle)
    {

        $formeremployer = FormerEmployer::where('status', '!=', TypeStatus::SUPPRIME)


            ->where('libelle', '=', $libelle)

            ->first();


        if ($formeremployer) {
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
            $erreurLibelle = "Le libelle  est obligatoire" ;
        }

        elseif (FormerEmployer::isUnique($libelle)) {
            $erreurLibelle = "Cette entreprise  est déja renseignée " ;
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
