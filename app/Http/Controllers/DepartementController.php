<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Business;
use App\Models\Contract;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DepartementController extends Controller
{



    /**
     * Affiche la  liste
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $departements = Departement::allDepartementActifs();

        return view('departement.index')->with('departements',$departements);


    }

    /**
     * Affiche le formulaire d'ajout
     *
     * @return \Illuminate\Http\Response
     */

    public function add()
    {



        return view('departement.add');


    }

    /**
     * Ajouter
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Departement::isValid(
            $request->title


        );

        if ($data['isValid'])
        {
            // Enregistrement

            Departement::addDepartement(
                $request->title

            );

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher
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
     * Update
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {


        $data = Departement::isValid(
            $request->title


        );

        if ($data['isValid'])
        {
            // UpDate
            Departement::updateDepartement(
                $request->title,
                $id
            );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Departement::rechercheDepartementById($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Entry deleted";
        } else {
            $success = true;
            $message = "This Department does not exist";
        }

        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

}
