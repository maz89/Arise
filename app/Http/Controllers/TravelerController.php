<?php

namespace App\Http\Controllers;

use App\Models\Traveler;
use App\Types\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TravelerController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::TRAVELERS;
    }


    /**
     * Affiche la  liste des Travelers
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $travelers = Traveler::allTravelerActifs();

        return view('traveler.index')->with(
            [
                'travelers' => $travelers,
                 'active' => $this->active

            ]


        );


    }






    /**
     * Ajouter une nouvelle Traveler   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {

        $data = Traveler::isValid(
            $request->firstname,
            $request->lastname,
            $request->countrie_id,
            $request->nature_id,



        );

        if ($data['isValid'])
        {
            // Enregistrement du Traveler

            Traveler::addTraveler(
                $request->firstname,
                $request->lastname,
                $request->countrie_id,
                $request->business_id,
                $request->nature_id,
                $request->trip_purpose,



            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Traveler
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Traveler::rechercheTravelerById($id);



        return response()->json($data);


    }


    /**
     * Update  un Traveler
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {
        $old_traveler = Traveler::rechercheTravelerById($id);

        $data = Traveler::isValid(
            $request->firstname,
            $request->lastname,
            $request->countrie_id,
            $request->nature_id,
            $old_traveler

        );


        if ($data['isValid'])
        {
            // UpDate du Traveler
            Traveler::updateTraveler(
                $request->firstname,
                $request->lastname,
                $request->countrie_id,
                $request->business_id,
                $request->nature_id,
                $request->trip_purpose,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Traveler scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Traveler::deleteTraveler($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "Le Traveler  n est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
