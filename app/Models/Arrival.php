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
        'time_arrival',
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
     * @param  string $time_arrival
     * @param  string $flight
     * @param  string $border
     * @param  integer $traveler_id

     * @return Arrival
     */

    public static function addArrival($date_arrival,$time_arrival,$flight, $border, $traveler_id  )
    {
        $arrival = new Arrival();


        $arrival->date_arrival = $date_arrival;
        $arrival->time_arrival = $time_arrival;
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
     * @param  date $date_arrival
     * @param  string $time_arrival
     * @param  string $flight
     * @param  string $border
     * @param  integer $traveler_id

     * @param int $id
     * @return  Arrival
     */

    public static function updateArrival($date_arrival,$time_arrival,$flight,$border, $traveler_id , $id)
    {


        return   $arrival = Arrival::findOrFail($id)->update([



            'date_arrival' => $date_arrival,
            'time_arrival' => $time_arrival,
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
     * @param  string $time_arrival
     * @param  string $flight
     * @param  string $border
     * @param  integer $traveler_id
     * @param  Arrival $old_arrival

     * @return  array
     */

    public static function isValid($date_arrival,$time_arrival,$flight, $border,  $traveler_id, $old_arrival=null)
    {

        $data = array();

        $isValid = false;

        $erreurDate = '';
        $erreurTime = '';
        $erreurFlight = '';
        $erreurBorder = '';
        $erreurTraveller = '';



        // Verification de la validité des données


        if ($date_arrival ==='') {
            $erreurDate = "Requiered" ;
        }elseif ($flight===''){

            $erreurFlight = "Requiered" ;

        }

        elseif ($time_arrival===''){

            $erreurTime = "Requiered" ;

        }

        elseif ($border===''){

            $erreurBorder = "Requiered" ;

        }

        elseif ($traveler_id=== 0){

            $erreurBorder = "Requiered" ;

        }

        elseif (
            $old_arrival == null ||
            $old_arrival->traveler_id !=$traveler_id ||
            $old_arrival->date_arrival !=$date_arrival


        ){
            $erreurTraveller = (Arrival::isUnique($traveler_id, $date_arrival))?'This arrival exist  ':'';

            $isValid = (Arrival::isUnique($traveler_id, $date_arrival))?false:true;
        }


        else {



            $erreurDate = '';
            $erreurFlight = '';
            $erreurBorder = '';
            $erreurTraveller = '';
            $erreurTime = '';


            $isValid = true;
        }

        return  $data = [


            'isValid' => $isValid,


            'erreurDate' => $erreurDate,
            'erreurFlight' => $erreurFlight,
            'erreurBorder' => $erreurBorder,
            'erreurTraveller' => $erreurTraveller,
            'erreurTime' => $erreurTime,


        ];
    }


    /**
     * Obtenir le traveler   lié au permit
     *
     */
    public function traveler()
    {


        return $this->belongsTo(Traveler::class, 'traveler_id');
    }



    /**
     * Retourne la date d' arrivée  du traveller
     * @param  int $id


     * @return  int $days
     */

    public static function getDateArrive  ($id){


        $date = '';

        $arrival = Arrival::rechercheArrivalById($id);

        $date_arrival  =   $date = \Carbon\Carbon::parse($arrival->date_arrival)->translatedFormat('d/m/Y');

        $date = $date_arrival.' '.$arrival->time_arrival;
        return $date;

    }


}
