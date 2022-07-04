<?php

namespace App\Http\Controllers;

use App\Models\Visa;
use App\Types\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class VisaController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::VISA;
    }


    /**
     * Affiche la  liste des Visas
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $visas = Visa::allVisaActifs();

        return view('visa.index')->with(
            [
                'visas' => $visas,
                 'active' => $this->active

            ]


        );


    }






    /**
     * Ajouter une nouvelle Visa   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Visa::isValid(
            $request->validity,
            $request->expiry,
            $request->traveler_id,



        );

        if ($data['isValid'])
        {
            // Enregistrement du Visa

            Visa::addVisa(
                $request->validity,
                $request->expiry,
                $request->traveler_id,



            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Visa
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Visa::rechercheVisaById($id);



        return response()->json($data);


    }


    /**
     * Update  un Visa
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {
        $old_visa = Visa::rechercheVisaById($id);

        $data = Visa::isValid(
          $request->validity,
          $request->expiry,
          $request->traveler_id,
            $old_visa

        );


        if ($data['isValid'])
        {
            // UpDate du Visa
            Visa::updateVisa(
                $request->validity,
                $request->expiry,
                $request->traveler_id,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Visa scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Visa::deleteVisa($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "Le Visa  n est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
