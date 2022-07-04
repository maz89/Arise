<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrival extends Model
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


        'date_arrival',
        'flight',
        'border',
        'traveler_id',

        'status',

    ];

    /**
     * Affichage de la liste de toutes  les Arrivals
     *
     * @return  array
     */

    public static function allArrivalActifs()
    {

        return   $arrivals = Arrival::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter une Arrival
     *

     * @param  date $date_arrival
     * @param  string $flight
     * @param  string $border
     * @param  integer $traveler_id

     * @return Arrival
     */

    public static function addArrival($date_arrival,$flight, $border, $traveler_id  )
    {
        $arrival = new Arrival();


        $arrival->date_arrival = $date_arrival;
        $arrival->flight = $flight;
        $arrival->border = $border;
        $arrival->traveler_id = $traveler_id;

        $arrival->created_at = Carbon::now();

        $arrival->save();

        return $arrival;
    }

    /**
     * Affichage d'une Arrival
     * @param int $id
     * @return  Arrival
     */

    public static function rechercheArrivalById($id)
    {

        return   $arrival = Arrival::findOrFail($id);
    }

    /**
     * Update d'une Arrival
     * @param  string $libelle

     * @param int $id
     * @return  Arrival
     */

    public static function updateArrival($date_arrival,$flight, $border, $traveler_id , $id)
    {


        return   $arrival = Arrival::findOrFail($id)->update([



            'date_arrival' => $date_arrival,
            'flight' => $flight,
            'border' => $border,
            'traveler_id' => $traveler_id,


            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Arrival
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteArrival($id)
    {

        $arrival = Arrival::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($arrival) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si l'Arrival   existe deja
     *


     * @param  string $traveler_id
     * @param  string $date_arrival

     * @return  boolean
     */

    public static function isUnique($traveler_id, $date_arrival)
    {

        $arrival = Arrival::where('status', '!=', TypeStatus::SUPPRIME)


            ->where('traveler_id', '=', $traveler_id)
            ->where('date_arrival', '=', $date_arrival)

            ->first();


        if ($arrival) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout


     * @param  date $date_arrival
     * @param  date $flight
     * @param  date $border
     * @param  date $traveler_id
     * @param  Arrival $old_arrival

     * @return  array
     */

    public static function isValid($date_arrival,$flight, $border,  $traveler_id, $old_arrival=null)
    {

        $data = array();

        $isValid = false;

        $erreurDate = '';
        $erreurFlight = '';
        $erreurBorder = '';
        $erreurTraveller = '';



        // Verification de la validité des données


        if ($date_arrival ==='') {
            $erreurDate = "La date d ' arrivée  est obligatoire" ;
        }elseif ($flight===''){

            $erreurFlight = "Le flight   est obligatoire" ;

        }

        elseif ($border===''){

            $erreurBorder = "Le border    est obligatoire" ;

        }

        elseif ($traveler_id=== 0){

            $erreurBorder = "Le  choix du voyageur     est obligatoire" ;

        }

        elseif (
            $old_arrival == null ||
            $old_arrival->traveler_id !=$traveler_id ||
            $old_arrival->date_arrival !=$date_arrival

        ){
            $erreurTraveller = (Arrival::isUnique($traveler_id, $date_arrival))?'Cette arrivée de ce voyageur  existe déja ':'';

            $isValid = (Arrival::isUnique($traveler_id, $date_arrival))?false:true;
        }


        else {



            $erreurDate = '';
            $erreurFlight = '';
            $erreurBorder = '';
            $erreurTraveller = '';


            $isValid = true;
        }

        return  $data = [


            'isValid' => $isValid,


            'erreurDate' => $erreurDate,
            'erreurFlight' => $erreurFlight,
            'erreurBorder' => $erreurBorder,
            'erreurTraveller' => $erreurTraveller,


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
