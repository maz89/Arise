<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departure extends Model
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


        'date_departure',

        'flight',
        'border',
        'traveler_id',

        'status',

    ];

    /**
     * Affichage de la liste de toutes  les Departures
     *
     * @return  array
     */

    public static function allDepartureActifs()
    {

        return   $departures = Departure::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter une Departure
     *

     * @param  datetime $date_departure
     * @param  string $flight
     * @param  string $border
     * @param  integer $traveler_id

     * @return Departure
     */

    public static function addDeparture($date_departure,$flight, $border, $traveler_id )
    {
        $departure = new Departure();


        $departure->date_departure = $date_departure;
        $departure->border = $border;
        $departure->flight = $flight;
        $departure->traveler_id = $traveler_id;

        $departure->created_at = Carbon::now();

        $departure->save();

        return $departure;
    }

    /**
     * Affichage d'une Departure
     * @param int $id
     * @return  Departure
     */

    public static function rechercheDepartureById($id)
    {

        return   $departure = Departure::findOrFail($id);
    }

    /**
     * Update d'une Departure
     * @param  datetime $date_departure
     * @param  string $flight
     * @param  string $border
     * @param  integer $traveler_id
     * @param int $id
     * @return  Departure
     */

    public static function updateDeparture($date_departure,$flight, $border,$traveler_id, $id)
    {


        return   $departure = Departure::findOrFail($id)->update([



            'date_departure' => $date_departure,

            'flight' => $flight,
            'border' => $border,
            'traveler_id' => $traveler_id,

            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Departure
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteDeparture($id)
    {

        $departure = Departure::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($departure) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si l'Departure   existe deja
     *

     * @param  datetime $date_departure

     * @param  string $flight
     * @param  string $border
     * @param  integer $traveler_id

     * @return  boolean
     */

    public static function isUnique($date_departure,  $flight,$border, $traveler_id)
    {

        $departure = Departure::where('status', '!=', TypeStatus::SUPPRIME)


            ->where('date_departure', '=', $date_departure)

            ->where('flight', '=', $flight)
            ->where('border', '=', $border)
            ->where('traveler_id', '=', $traveler_id)

            ->first();


        if ($departure) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout

     * @param  datetime $date_departure

     * @param  string $flight
     * @param  string $border
     * @param  integer $traveler_id
     * @param  Departure $old_departure

     * @return  array
     */

    public static function isValid($date_departure, $flight, $border, $traveler_id,$old_departure = null)
    {

        $data = array();

        $isValid = false;

        $erreurDate = '';

        $erreurFlight = '';
        $erreurBorder = '';
        $erreurTraveler = '';



        // Verification de la validité des données


        if ($date_departure ==='') {
            $erreurDate = "Requiered" ;
        }elseif ($flight ==='') {
            $erreurFlight = "Requiered" ;
        }elseif ($border ==='') {
            $erreurBorder = "Requiered" ;
        }

        elseif ((int)$traveler_id === 0) {
            $erreurTraveler = "Requiered" ;
        }

        elseif (
            $old_departure == null ||
            $old_departure->date_departure !=$date_departure ||
            $old_departure->flight !=$flight ||
            $old_departure->border !=$border

        ){
            $erreurTraveler = (Departure::isUnique($date_departure, $flight, $border, $traveler_id))?'This departure exist ':'';

            $isValid = (Departure::isUnique($date_departure, $flight, $border, $traveler_id))?false:true;
        }



        else {

            $erreurDate = '';
            $erreurFlight = '';
            $erreurBorder = '';
            $erreurTraveler = '';


            $isValid = true;
        }

        return  $data = [


            'isValid' => $isValid,


            'erreurDate' => $erreurDate,
            'erreurFlight' => $erreurFlight,
            'erreurBorder' => $erreurBorder,
            'erreurTraveler' => $erreurTraveler,


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


}
