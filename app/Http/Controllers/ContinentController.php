<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use App\Types\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContinentController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::CONTINENT;
    }


    /**
     * Affiche la  liste des Continents
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $continents = Continent::allContinentActifs();

        return view('continent.index')->with(
            [
                'continents' => $continents,
                 'active' => $this->active

            ]


        );


    }






    /**
     * Ajouter une nouvelle Continent   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Continent::isValid(
            $request->libelle,



        );

        if ($data['isValid'])
        {
            // Enregistrement du Continent

            Continent::addContinent(
               $request->libelle,



            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Continent
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Continent::rechercheContinentById($id);



        return response()->json($data);


    }


    /**
     * Update  un Continent
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {
        $old_continent = Continent::rechercheContinentById($id);

        $data = Continent::isValid(
          $request->libelle,
            $old_continent

        );


        if ($data['isValid'])
        {
            // UpDate du Continent
            Continent::updateContinent(
                 $request->libelle,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Continent scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Continent::deleteContinent($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "Le Continent  n est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
