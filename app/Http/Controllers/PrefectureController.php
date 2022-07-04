<?php

namespace App\Http\Controllers;

use App\Models\Prefecture;
use App\Types\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PrefectureController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::PREFECTURE;
    }


    /**
     * Affiche la  liste des Prefectures
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $prefectures = Prefecture::allPrefectureActifs();

        return view('prefecture.index')->with(
            [
                'prefectures' => $prefectures,
                 'active' => $this->active

            ]


        );


    }






    /**
     * Ajouter une nouvelle Prefecture   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {

        $data = Prefecture::isValid(
            $request->libelle,
            $request->countrie_id,



        );

        if ($data['isValid'])
        {
            // Enregistrement du Prefecture

            Prefecture::addPrefecture(
                $request->libelle,
                $request->countrie_id,



            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Prefecture
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Prefecture::recherchePrefectureById($id);



        return response()->json($data);


    }


    /**
     * Update  un Prefecture
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {
        $old_prefecture = Prefecture::recherchePrefectureById($id);

        $data = Prefecture::isValid(
            $request->libelle,
            $request->countrie_id,
            $old_prefecture

        );


        if ($data['isValid'])
        {
            // UpDate du Prefecture
            Prefecture::updatePrefecture(
                $request->libelle,
                $request->countrie_id,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Prefecture scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Prefecture::deletePrefecture($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "Le Prefecture  n' est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
