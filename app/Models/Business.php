<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
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
        'code',
        'title',

    ];

    /**
     * Affichage de la liste de tous les business units
     *
     * @return  array
     */

    public static function allBusinessActifs()
    {

        return   $business= Business::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter une Business Unit
     *
     * @param  string $code
     * @param  string $title

     * @return Business
     */

    public static function addBusiness($code, $title)
    {
        $business = new Business();
        $business->code = $code;
        $business->title = $title;

        $business->created_at = Carbon::now();

        $business->save();

        return $business;
    }

    /**
     * Affichage d'un Business
     * @param int $id
     * @return  Business
     */

    public static function rechercheBusinessById($id)
    {

        return   $business = Business::findOrFail($id);
    }

    /**
     * Update d'une Business
     * @param  integer $code
     * @param  integer $title
     * @param int $id
     * @return  Business
     */

    public static function updateBusiness($code, $title, $id)
    {


        return   $business = Business::findOrFail($id)->update([

            'code' => $code,
            'title' => $title,

            'id' => $id,


        ]);
    }


    /**
     * Supprimer un business unit
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteBusiness($id)
    {

        $business = Business::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($business) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si le business unit   existe déja

     * @param  integer $code
     * @param  integer $title

     * @return  boolean
     */

    public static function isUnique($code, $title)
    {

        $business = Business::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('code', '=', $code)
            ->where('title', '=', $title)

            ->first();


        if ($business) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout

     * @param  integer $code
     * @param  integer $title


     * @return  array
     */

    public static function isValid($code, $title)
    {

        $data = array();

        $isValid = false;
        $erreurCode = '';
        $erreurtitle = '';


        // Verification de la validité des données


        if ($code =='') {
            $erreurCode= "Le code du business est obligatoire" ;
        }  elseif ($title =='') {
            $erreurtitle = "Le libellé est obligatoire" ;
        }
        elseif (Business::isUnique($code, $title)) {
            $erreurtitle = "Cet Business Unit existe déjà " ;
        }


        else {

            $erreurCode = '';
            $erreurtitle = '';

            $isValid = true;
        }

        return  $data = [


            'isValid' => $isValid,
            'erreurCode' => $erreurCode,
            'erreurtitle' => $erreurtitle,

        ];
    }

}
