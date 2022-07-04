<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use App\Types\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class VaccineController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::VACCINE;
    }


    /**
     * Affiche la  liste des Vaccines
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $vaccines = Vaccine::allVaccineActifs();

        return view('vaccine.index')->with(
            [
                'vaccines' => $vaccines,
                 'active' => $this->active

            ]


        );


    }






    /**
     * Ajouter une nouvelle Vaccine   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {


        $data = Vaccine::isValid(
            $request->name,
            $request->nb_doses,
            $request->disease_id,



        );

        if ($data['isValid'])
        {
            // Enregistrement du Vaccine

            Vaccine::addVaccine(
                $request->name,
                $request->nb_doses,
                $request->disease_id,



            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Vaccine
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
     * Update  un Vaccine
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {
        $old_vaccine = Vaccine::rechercheVaccineById($id);

        $data = Vaccine::isValid(
            $request->name,
            $request->nb_doses,
            $request->disease_id,
            $old_vaccine

        );


        if ($data['isValid'])
        {
            // UpDate du Vaccine
            Vaccine::updateVaccine(
                $request->name,
                $request->nb_doses,
                $request->disease_id,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Vaccine scolaire .
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
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "Le  Vaccine  n' est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
