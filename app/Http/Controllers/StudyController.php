<?php

namespace App\Http\Controllers;

use App\Models\BusinessUnit;
use App\Models\Employee;
use App\Models\Experience;
use App\Models\Family;
use App\Models\Position;
use App\Models\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class StudyController extends Controller
{



    /**
     * Affiche la  liste des Businesss
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $studies = Study::allStudyActifs();

        return view('study.index')->with('studies',$studies);


    }


    /**
     * Ajouter une nouvelle Business   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Study::isValid(
            $request->level
        );



        if ($data['isValid'])
        {
            // Enregistrement du Business

            Study::addStudy(
                $request->level,
                $request->specialization,
                $request->institute,
                $request->date_end,
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

        $data = Study::rechercheStudyById($id);

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


        $data = Study::isValid(
            $request->level

        );

        if ($data['isValid'])
        {
            // UpDate du Business
            Study::updateStudy(

                $request->level,
                $request->specialization,
                $request->institute,
                $request->date_end,
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
        $delete = Study::deleteStudy($id);

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
