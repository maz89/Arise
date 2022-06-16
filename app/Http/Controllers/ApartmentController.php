<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ApartmentController extends Controller
{



    /**
     * Affiche la  liste des Familys
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $apartments = Apartment::allApartmentActifs();

        return view('apartment.index')->with('apartments',$apartments);


    }




    /**
     * Affiche le formulaire d'ajout
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {



        return view('apartment.add');


    }


    /**
     * Ajouter une nouvelle Family   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Apartment::isValid(
            $request->num_apartment,
            $request->nb_rooms
        );

        if ($data['isValid'])
        {
            // Enregistrement du Family

            Apartment::addApartment(
                $request->num_apartment,
                $request->nb_rooms,
                $request->building_id
            );

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Family
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Apartment::rechercheApartmentById($id);

        return response()->json($data);


    }


    /**
     * Update  un Family
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {


        $data = Apartment::isValid(
            $request->num_apartment,
            $request->nb_rooms

        );

        if ($data['isValid'])
        {
            // UpDate du Family
            Apartment::updateApartment(
                $request->num_apartment,
                $request->nb_rooms,
                $request->building_id,
                $id
            );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Family scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Apartment::deleteApartment($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Business deleted";
        } else {
            $success = false;
            $message = "This business does not exist";
        }

        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
