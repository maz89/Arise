<?php

namespace App\Http\Controllers;

use App\Models\Countrie;
use App\Types\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CountrieController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::COUNTRIES;
    }


    /**
     * Affiche la  liste des Countries
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $countries = Countrie::allCountrieActifs();

        return view('countrie.index')->with(
            [
                'countries' => $countries,
                 'active' => $this->active

            ]


        );


    }







    /**
     * Ajouter une nouvelle Countrie   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Countrie::isValid(
            $request->libelle,
            (int)   $request->region_id,



        );

        if ($data['isValid'])
        {
            // Enregistrement du Countrie

            Countrie::addCountrie(
               $request->libelle,
               $request->nationality,
                (int)   $request->region_id,



            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Countrie
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Countrie::rechercheCountrieById($id);



        return response()->json($data);


    }


    /**
     * Update  un Countrie
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {

        $old_countrie = Countrie::rechercheCountrieById($id);
        $data = Countrie::isValid(
          $request->libelle,
            (int)   $request->region_id,
            $old_countrie

        );


        if ($data['isValid'])
        {
            // UpDate du Countrie
            Countrie::updateCountrie(
                 $request->libelle,
                 $request->nationality,
                (int)    $request->region_id,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Countrie scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Countrie::deleteCountrie($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "Le Countrie  n est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
