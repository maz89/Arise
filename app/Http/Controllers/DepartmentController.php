<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Types\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DepartmentController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::DEPARTEMENT;
    }


    /**
     * Affiche la  liste des Departements
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $departements = Departement::allDepartementActifs();

        return view('departement.index')->with(
            [
                'departements' => $departements,
                 'active' => $this->active

            ]


        );


    }






    /**
     * Ajouter une nouvelle Departement   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Departement::isValid(
            $request->title,



        );

        if ($data['isValid'])
        {
            // Enregistrement du Departement

            Departement::addDepartement(
               $request->title,



            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Departement
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Departement::rechercheDepartementById($id);



        return response()->json($data);


    }


    /**
     * Update  un Departement
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {
        $old_departement = Departement::rechercheDepartementById($id);

        $data = Departement::isValid(
            $request->title,
            $old_departement

        );


        if ($data['isValid'])
        {
            // UpDate du Departement
            Departement::updateDepartement(
                $request->title,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Departement scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Departement::deleteDepartement($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "Le Departement  n' est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
