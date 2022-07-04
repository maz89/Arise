<?php

namespace App\Http\Controllers;

use App\Models\Coutume;
use App\Types\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CoutumeController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::COUTUME;
    }


    /**
     * Affiche la  liste des Coutumes
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $coutumes = Coutume::allCoutumeActifs();

        return view('coutume.index')->with(
            [
                'coutumes' => $coutumes,
                 'active' => $this->active

            ]


        );


    }






    /**
     * Ajouter une nouvelle Coutume   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Coutume::isValid(
            $request->libelle,
            $request->prefecture_id,



        );

        if ($data['isValid'])
        {
            // Enregistrement du Coutume

            Coutume::addCoutume(
               $request->libelle,
               $request->prefecture_id,



            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Coutume
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Coutume::rechercheCoutumeById($id);



        return response()->json($data);


    }


    /**
     * Update  un Coutume
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {
        $old_coutume = Coutume::rechercheCoutumeById($id);

        $data = Coutume::isValid(
          $request->libelle,
          $request->prefecture_id,
            $old_coutume

        );


        if ($data['isValid'])
        {
            // UpDate du Coutume
            Coutume::updateCoutume(
                 $request->libelle,
                 $request->prefecture_id,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Coutume scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Coutume::deleteCoutume($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "Le Coutume  n est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
