<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AssignmentController extends Controller
{



    /**
     * Affiche la  liste des Familys
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $assignments = Assignment::allAssignmentActifs();

        return view('assignment.index')->with('assignments',$assignments);


    }


    /**
     * Affiche
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {



        return view('assignment.index');


    }


    /**
     * Ajouter une nouvelle Family   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Assignment::isValid(
            $request->date_start,
            $request->date_end,
            $request->employe_id,
            $request->position_id


        );

        if ($data['isValid'])
        {
            // Enregistrement du Family

            Assignment::addAssignment(
                $request->date_start,
                $request->date_end,
                $request->employe_id,
                $request->position_id

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

        $data = Assignment::rechercheAssignmentById($id);

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


        $data = Assignment::isValid(
            $request->date_start,
            $request->date_end,
            $request->employe_id,
            $request->position_id


        );

        if ($data['isValid'])
        {
            // UpDate du Family
            Assignment::updateAssignment(
                $request->date_start,
                $request->date_end,
                $request->employe_id,
                $request->position_id,
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
        $delete = Assignment::rechercheAssignmentById($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Successful deletion";
        } else {
            $success = true;
            $message = "This business does not exist";
        }

        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }






}
