<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use App\Types\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NiveauController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::NIVEAUX;
    }


    /**
     * Affiche la  liste des Niveaus
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $niveaus = Niveau::allNiveauActifs();

        return view('niveau.index')->with(
            [
                'niveaus' => $niveaus,
                 'active' => $this->active

            ]


        );


    }






    /**
     * Ajouter une nouvelle Niveau   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Niveau::isValid(
            $request->libelle



        );

        if ($data['isValid'])
        {
            // Enregistrement du Niveau

            Niveau::addNiveau(
               $request->libelle,



            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Niveau
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Niveau::rechercheNiveauById($id);



        return response()->json($data);


    }


    /**
     * Update  un Niveau
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {
        $old_niveau = Niveau::rechercheNiveauById($id);

        $data = Niveau::isValid(
          $request->libelle,
            $old_niveau

        );


        if ($data['isValid'])
        {
            // UpDate du Niveau
            Niveau::updateNiveau(
                 $request->libelle,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Niveau scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Niveau::deleteNiveau($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "Le Niveau  n est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
