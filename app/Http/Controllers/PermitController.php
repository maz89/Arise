<?php

namespace App\Http\Controllers;

use App\Models\Permit;
use App\Types\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PermitController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::PERMITS;
    }


    /**
     * Affiche la  liste des Permits
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $permits = Permit::allPermitActifs();

        return view('permit.index')->with(
            [
                'permits' => $permits,
                 'active' => $this->active

            ]


        );


    }






    /**
     * Ajouter une nouvelle Permit   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Permit::isValid(
            $request->validity,
            $request->expiry,
            $request->traveler_id,



        );

        if ($data['isValid'])
        {
            // Enregistrement du Permit

            Permit::addPermit(
                $request->validity,
                $request->expiry,
                $request->traveler_id,



            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Permit
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Permit::recherchePermitById($id);



        return response()->json($data);


    }


    /**
     * Update  un Permit
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {
        $old_permit = Permit::recherchePermitById($id);

        $data = Permit::isValid(
            $request->validity,
            $request->expiry,
            $request->traveler_id,
            $old_permit

        );


        if ($data['isValid'])
        {
            // UpDate du Permit
            Permit::updatePermit(
                $request->validity,
                $request->expiry,
                $request->traveler_id,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Permit scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Permit::deletePermit($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "Le Permit  n est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
