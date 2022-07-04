<?php

namespace App\Http\Controllers;

use App\Models\Nature;
use App\Types\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NatureController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::NATURE;
    }


    /**
     * Affiche la  liste des Natures
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $natures = Nature::allNatureActifs();

        return view('nature.index')->with(
            [
                'natures' => $natures,
                 'active' => $this->active

            ]


        );


    }






    /**
     * Ajouter une nouvelle Nature   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Nature::isValid(
            $request->libelle,



        );

        if ($data['isValid'])
        {
            // Enregistrement du Nature

            Nature::addNature(
               $request->libelle,



            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Nature
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Nature::rechercheNatureById($id);



        return response()->json($data);


    }


    /**
     * Update  un Nature
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {
        $old_nature = Nature::rechercheNatureById($id);

        $data = Nature::isValid(
          $request->libelle,
            $old_nature

        );


        if ($data['isValid'])
        {
            // UpDate du Nature
            Nature::updateNature(
                 $request->libelle,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Nature scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Nature::deleteNature($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "Le Nature  n est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
