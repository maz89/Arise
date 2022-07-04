<?php

namespace App\Http\Controllers;

use App\Models\Departure;
use App\Types\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DepartureController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::DEPARTURE;
    }


    /**
     * Affiche la  liste des Departures
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $departures = Departure::allDepartureActifs();

        return view('departure.index')->with(
            [
                'departures' => $departures,
                 'active' => $this->active

            ]


        );


    }






    /**
     * Ajouter une nouvelle Departure   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Departure::isValid(
            $request->date_departure,
            $request->flight,
            $request->border,
            $request->traveler_id,



        );

        if ($data['isValid'])
        {
            // Enregistrement du Departure

            Departure::addDeparture(
                $request->date_departure,
                $request->flight,
                $request->border,
                $request->traveler_id,




            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Departure
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Departure::rechercheDepartureById($id);



        return response()->json($data);


    }


    /**
     * Update  un Departure
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {
        $old_departure = Departure::rechercheDepartureById($id);

        $data = Departure::isValid(
            $request->date_departure,
            $request->flight,
            $request->border,
            $request->traveler_id,

            $old_departure

        );


        if ($data['isValid'])
        {
            // UpDate du Departure
            Departure::updateDeparture(
                $request->date_departure,
                $request->flight,
                $request->border,
                $request->traveler_id,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Departure scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Departure::deleteDeparture($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "Le Departure  n est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
