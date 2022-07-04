<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permit extends Model
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


        'validity',
        'expiry',
        'traveler_id',

        'status',

    ];

    /**
     * Affichage de la liste de toutes  les Permits
     *
     * @return  array
     */

    public static function allPermitActifs()
    {

        return   $permits = Permit::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter une Permit
     *

     * @param  string $validity
     * @param  string $expiry
     * @param  string $traveler_id

     * @return Permit
     */

    public static function addPermit($validity, $expiry,$traveler_id )
    {
        $permit = new Permit();


        $permit->validity = $validity;
        $permit->expiry = $expiry;
        $permit->traveler_id = $traveler_id;

        $permit->created_at = Carbon::now();

        $permit->save();

        return $permit;
    }

    /**
     * Affichage d'une Permit
     * @param int $id
     * @return  Permit
     */

    public static function recherchePermitById($id)
    {

        return   $permit = Permit::findOrFail($id);
    }

    /**
     * Update d'une Permit
     * @param  string $validity
     * @param  string $expiry
     * @param  string $traveler_id
     * @param int $id
     * @return  Permit
     */

    public static function updatePermit($validity, $expiry,$traveler_id, $id)
    {


        return   $Permit = Permit::findOrFail($id)->update([



            'validity' => $validity,
            'expiry' => $expiry,
            'traveler_id' => $traveler_id,

            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Permit
     *
     * @param int $id
     * @return  boolean
     */

    public static function deletePermit($id)
    {

        $permit = Permit::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($permit) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si l'Permit   existe deja
     *

     * @param  string $validity
     * @param  string $expiry
     * @param  string $traveler_id

     * @return  boolean
     */

    public static function isUnique($validity, $expiry,$traveler_id)
    {

        $permit = Permit::where('status', '!=', TypeStatus::SUPPRIME)


            ->where('validity', '=', $validity)
            ->where('expiry', '=', $expiry)
            ->where('traveler_id', '=', $traveler_id)

            ->first();


        if ($permit) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout

     * @param  string $validity
     * @param  string $expiry
     * @param  string $traveler_id
     * @param  Permit  $old_permit

     * @return  array
     */

    public static function isValid($validity, $expiry,$traveler_id,$old_permit = null )
    {

        $data = array();

        $isValid = false;

        $erreurValidity = '';
        $erreurExpiry = '';
        $erreurTraveler = '';



        // Verification de la validité des données


        if ($validity ==='') {
            $erreurValidity = "Requiered" ;
        }elseif ($expiry ==='') {
            $erreurExpiry = "Requiered" ;
        }elseif ($traveler_id === 0) {
            $erreurTraveler = "Requiered" ;
        }

        elseif (
            $old_permit == null ||
            $old_permit->validity !=$validity ||
            $old_permit->expiry !=$expiry ||
            $old_permit->traveler_id !=$traveler_id

        ){
            $erreurValidity = (Permit::isUnique($validity, $expiry,$traveler_id))?'This permit exist  ':'';

            $isValid = (Permit::isUnique($validity, $expiry,$traveler_id))?false:true;
        }



        else {

            $erreurValidity = '';
            $erreurExpiry = '';
            $erreurTraveler = '';


            $isValid = true;
        }

        return  $data = [


            'isValid' => $isValid,


            'erreurValidity' => $erreurValidity,
            'erreurExpiry' => $erreurExpiry,
            'erreurTraveler' => $erreurTraveler,


        ];
    }
    /**
     * Obtenir l
     *
     */
    public function traveler()
    {


        return $this->belongsTo(Traveler::class, 'traveler_id');
    }


}
