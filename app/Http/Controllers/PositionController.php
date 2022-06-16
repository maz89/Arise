<?php

namespace App\Http\Controllers;

use App\Models\BusinessUnit;
use App\Models\Employee;
use App\Models\Experience;
use App\Models\Family;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PositionController extends Controller
{



    /**
     * Affiche la  liste des Businesss
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $positions = Position::allPositionActifs();

        return view('position.index')->with('positions',$positions);


    }


    /**
     * Ajouter une nouvelle Business   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Position::isValid(
            $request->name,
            $request->departement_id,
            $request->business_id
        );



        if ($data['isValid'])
        {
            // Enregistrement du Business

            Position::addPosition(
                $request->name,
                $request->departement_id,
                $request->business_id

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

        $data = Position::recherchePositionById($id);

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


        $data = Position::isValid(
            $request->name,
            $request->departement_id,
            $request->business_id

        );

        if ($data['isValid'])
        {
            // UpDate du Business
            Position::updatePosition(

                $request->name,
                $request->departement_id,
                $request->business_id,
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
        $delete = Position::deletePosition($id);

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
