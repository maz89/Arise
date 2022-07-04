<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Types\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DiseaseController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::DISEASE;
    }


    /**
     * Affiche la  liste des Diseases
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $diseases = Disease::allDiseaseActifs();

        return view('disease.index')->with(
            [
                'diseases' => $diseases,
                 'active' => $this->active

            ]


        );


    }






    /**
     * Ajouter une nouvelle Disease   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Disease::isValid(
            $request->libelle,



        );

        if ($data['isValid'])
        {
            // Enregistrement du Disease

            Disease::addDisease(
               $request->libelle,



            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Disease
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Disease::rechercheDiseaseById($id);



        return response()->json($data);


    }


    /**
     * Update  un Disease
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {
        $old_disease = Disease::rechercheDiseaseById($id);

        $data = Disease::isValid(
          $request->libelle,
            $old_disease

        );


        if ($data['isValid'])
        {
            // UpDate du Disease
            Disease::updateDisease(
                 $request->libelle,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Disease scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Disease::deleteDisease($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "Le Disease  n est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
