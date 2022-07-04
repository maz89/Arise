<?php

namespace App\Http\Controllers;

use App\Models\Immunization;
use App\Types\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ImmunizationController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::IMMUNIZATION;
    }


    /**
     * Affiche la  liste des Immunizations
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $immunizations = Immunization::allImmunizationActifs();

        return view('immunization.index')->with(
            [
                'immunizations' => $immunizations,
                 'active' => $this->active

            ]


        );


    }






    /**
     * Ajouter une nouvelle Immunization   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {


        $data = Immunization::isValid(
            $request->employee_id,
            $request->vaccine_id,
            $request->date_immunization,

        );

        if ($data['isValid'])
        {
            // Enregistrement du Immunization

            Immunization::addImmunization(
               $request->employee_id,
               $request->vaccine_id,
               $request->date_immunization,
               $request->is_vaccine,
               $request->reason,


            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Immunization
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Immunization::rechercheImmunizationById($id);



        return response()->json($data);


    }


    /**
     * Update  un Immunization
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {
        $old_immunization = Immunization::rechercheImmunizationById($id);

        $data = Immunization::isValid(
            $request->employee_id,
            $request->vaccine_id,
            $request->date_immunization,
            $old_immunization

        );


        if ($data['isValid'])
        {
            // UpDate du Immunization
            Immunization::updateImmunization(
                $request->employee_id,
                $request->vaccine_id,
                $request->date_immunization,
                $request->is_vaccine,
                $request->reason,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Immunization scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Immunization::deleteImmunization($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "Le Immunization  n' est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
