<?php

namespace App\Http\Controllers;

use App\Models\BusinessUnit;
use App\Models\Employee;
use App\Models\Experience;
use App\Models\Family;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FamilyController extends Controller
{



    /**
     * Affiche la  liste des Businesss
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $families = Family::allFamilyActifs();

        return view('family.index')->with('families',$families);


    }


    /**
     * Ajouter une nouvelle Business   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Family::isValid(
            $request->first_name,
            $request->last_name,
            $request->relationship,
            $request->telephone,
            $request->address,
            $request->employee_id
        );



        if ($data['isValid'])
        {
            // Enregistrement du Business

            Family::addFamily(

                $request->first_name,
                $request->last_name,
                $request->relationship,
                $request->telephone,
                $request->address,
                $request->employee_id

            );


        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Business
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Family::rechercheFamilyById($id);

        return response()->json($data);


    }


    /**
     * Update  un Business
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {


        $data = Family::isValid(
            $request->first_name,
            $request->last_name,
            $request->relationship,
            $request->telephone,
            $request->address,
            $request->employee_id

        );

        if ($data['isValid'])
        {
            // UpDate du Business
            Family::updateFamily(

                $request->first_name,
                $request->last_name,
                $request->relationship,
                $request->telephone,
                $request->address,
                $request->employee_id,
                $request->id


            );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Business scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Family::deleteFamily($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "successful deletion";
        } else {
            $success = true;
            $message = "Employee not found";
        }

        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
