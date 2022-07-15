<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
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
     * Affichage de la liste de toutes  les Visas
     *
     * @return  array
     */

    public static function allVisaActifs()
    {

        return   $visas = Visa::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter une Visa
     *

     * @param  date $validity
     * @param  date $expiry
     * @param  integer $traveler_id

     * @return Visa
     */

    public static function addVisa($validity, $expiry,$traveler_id )
    {
        $visa = new Visa();


        $visa->validity = $validity;
        $visa->expiry = $expiry;
        $visa->traveler_id = $traveler_id;

        $visa->created_at = Carbon::now();

        $visa->save();

        return $visa;
    }

    /**
     * Affichage d'une Visa
     * @param int $id
     * @return  Visa
     */

    public static function rechercheVisaById($id)
    {

        return   $visa = Visa::findOrFail($id);
    }

    /**
     * Update d'une Visa
     * @param  date $validity
     * @param  date $expiry
     * @param  integer $traveler_id
     * @param int $id
     * @return  Visa
     */

    public static function updateVisa($validity, $expiry,$traveler_id, $id)
    {


        return   $visa = Visa::findOrFail($id)->update([



            'validity' => $validity,
            'expiry' => $expiry,
            'traveler_id' => $traveler_id,

            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Visa
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteVisa($id)
    {

        $visa = Visa::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($visa) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si l'Visa   existe deja
     *

     * @param  date $validity
     * @param  date $expiry
     * @param  integer $traveler_id

     * @return  boolean
     */

    public static function isUnique($validity, $expiry,$traveler_id)
    {

        $visa = Visa::where('status', '!=', TypeStatus::SUPPRIME)


            ->where('validity', '=', $validity)
            ->where('expiry', '=', $expiry)
            ->where('traveler_id', '=', $traveler_id)

            ->first();


        if ($visa) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout

     * @param  date $validity
     * @param  date $expiry
     * @param  integer $traveler_id
     * @param  Visa $old_visa

     * @return  array
     */

    public static function isValid($validity, $expiry,$traveler_id, $old_visa = null)
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
        }elseif ($traveler_id ==='') {
            $erreurTraveler = "Requiered" ;
        }


       /* elseif ($validity > $expiry) {
            $erreurValidity = " The validity date cannot be later than the expiration date " ;
        }*/

        elseif (
            $old_visa == null ||
            $old_visa->validity !=$validity||
            $old_visa->expiry !=$expiry||
            $old_visa->traveler_id !=$traveler_id

        ){
            $erreurValidity = (Visa::isUnique($validity, $expiry,$traveler_id))?'This visa exist ':'';

            $isValid = (Visa::isUnique($validity, $expiry,$traveler_id))?false:true;
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
     * Obtenir l employe  lié au contract
     *
     */
    public function traveler()
    {


        return $this->belongsTo(Traveler::class, 'traveler_id');
    }



    /**
     * Retourne le nombre de jours
     * @param  int $id


     * @return  int $days
     */

    public static function getNbJourBetween  ($id){

        $visa = Visa::rechercheVisaById($id);

        $date_du_jour = \Carbon\Carbon::now()->format('d/m/Y');
        $date = \Carbon\Carbon::parse($visa->expiry)->translatedFormat('d/m/Y');


        $mois = \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('m');
        $days = \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('d');
        $annee = \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y');

        $date_expiry = "$days/$mois/$annee";


        $to = \Carbon\Carbon::createFromFormat('d/m/Y', $date_du_jour);
        $from = \Carbon\Carbon::createFromFormat('d/m/Y', $date_expiry);

        $diff_in_days = $to->diffInDays($from, false);


        return $diff_in_days;

    }

}
