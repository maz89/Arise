<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BusinessController extends Controller
{



    /**
     * Affiche la  liste des Familys
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $businesses = Business::allBusinessActifs();

        return view('business.index')->with('businesses',$businesses);


    }




    /**
     * Affiche le formulaire d'ajout
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {



        return view('business.add');


    }


    /**
     * Ajouter une nouvelle Family   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Business::isValid(
            $request->code,
            $request->title


        );

        if ($data['isValid'])
        {
            // Enregistrement du Family

            Business::addBusiness(

                $request->code,
                $request->title

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

        $data = Business::rechercheBusinessById($id);

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


        $data = Business::isValid(
            $request->code,
            $request->libelle


        );

        if ($data['isValid'])
        {
            // UpDate du Family
            Business::updateBusiness(
                $request->code,
                $request->libelle,

                $id );


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
        $delete = Business::deleteBusiness($id);

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
