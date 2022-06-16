<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Nationality;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NationalityController extends Controller
{



    /**
     * Affiche la  liste des Familys
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $nationalities = Nationality::allNationalityActifs();

        return view('nationality.index')->with('nationalities',$nationalities);


    }


    /**
     * Affiche le formulaire d'ajout
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {

        return view('nationality.add');

    }


    /**
     * Ajouter une nouvelle Family   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Nationality::isValid(
            $request->name



        );

        if ($data['isValid'])
        {
            // Enregistrement du Family

            Nationality::addNationality(

                $request->name


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

        $data = Nationality::rechercheNationalityById($id);

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


        $data = Nationality::isValid(
            $request->name



        );

        if ($data['isValid'])
        {
            // UpDate du Family
            Nationality::updateNationality(
                $request->name,


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
        $delete = Nationality::deleteNationality($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Nationality deleted";
        } else {
            $success = false;
            $message = "This nationality does not exist";
        }

        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
