<?php

namespace App\Http\Controllers;

use App\Models\BusinessUnit;
use App\Models\Employee;
use App\Models\Experience;
use App\Models\Family;
use App\Models\Position;
use App\Models\Study;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class VaccinController extends Controller
{



    /**
     * Affiche la  liste des Businesss
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $vaccines = Vaccine::allVaccineActifs();

        return view('vaccin.index')->with('vaccines',$vaccines);


    }


    /**
     * Ajouter une nouvelle Business   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Vaccine::isValid(
            $request->name,
            $request->status_Vaccine,
            $request->vaccine_type_id
        );



        if ($data['isValid'])
        {
            // Enregistrement du Business

            Vaccine::addVaccine(
                $request->name,
                $request->status_Vaccine,
                $request->vaccine_type_id

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

        $data = Vaccine::rechercheVaccineById($id);

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


        $data = Vaccine::isValid(
            $request->name,
            $request->status_Vaccine,
            $request->vaccine_type_id
        );

        if ($data['isValid'])
        {
            // UpDate du Business
            Vaccine::updateVaccine(

                $request->name,
                $request->status_Vaccine,
                $request->vaccine_type_id,
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
        $delete = Vaccine::deleteVaccine($id);

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
