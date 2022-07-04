<?php

namespace App\Http\Controllers;

use App\Models\Arrival;
use App\Types\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ArrivalController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::ARRIVALS;
    }


    /**
     * Affiche la  liste des Arrivals
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $arrivals = Arrival::allArrivalActifs();

        return view('arrival.index')->with(
            [
                'arrivals' => $arrivals,
                 'active' => $this->active

            ]


        );


    }






    /**
     * Ajouter une nouvelle Arrival   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {



        $data = Arrival::isValid(
            $request->date_arrival,
            $request->flight,
            $request->border,
            $request->traveler_id,



        );

        if ($data['isValid'])
        {
            // Enregistrement du Arrival

            Arrival::addArrival(
                $request->date_arrival,
                $request->flight,
                $request->border,
                $request->traveler_id,



            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Arrival
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Arrival::rechercheArrivalById($id);



        return response()->json($data);


    }


    /**
     * Update  un Arrival
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {
        $old_arrival = Arrival::rechercheArrivalById($id);

        $data = Arrival::isValid(
            $request->date_arrival,
            $request->flight,
            $request->border,
            $request->traveler_id,
            $old_arrival

        );


        if ($data['isValid'])
        {
            // UpDate du Arrival
            Arrival::updateArrival(
                $request->date_arrival,
                $request->flight,
                $request->border,
                $request->traveler_id,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Arrival scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Arrival::deleteArrival($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "L arrival  n est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
