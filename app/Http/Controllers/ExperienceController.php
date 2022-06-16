<?php

namespace App\Http\Controllers;

use App\Models\BusinessUnit;
use App\Models\Employee;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ExperienceController extends Controller
{



    /**
     * Affiche la  liste des Businesss
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $experiences = Experience::allExperienceActifs();

        return view('experience.index')->with('experiences',$experiences);


    }


    /**
     * Ajouter une nouvelle Business   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Experience::isValid(
            $request->name_company,
            $request->position,
            $request->employee_id
        );



        if ($data['isValid'])
        {
            // Enregistrement du Business

            Experience::addExperience(

                $request->name_company,
                $request->position,
                $request->address,
                $request->date_start,
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

        $data = Experience::rechercheExperienceById($id);

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


        $data = Experience::isValid(
            $request->name_company,
            $request->position,
            $request->employee_id

        );

        if ($data['isValid'])
        {
            // UpDate du Business
            Experience::updateExperience(

                $request->name_company,
                $request->position,
                $request->address,
                $request->date_start,
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
        $delete = Experience::deleteExperience($id);

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
