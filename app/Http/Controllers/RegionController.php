<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Types\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RegionController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::REGION;
    }


    /**
     * Affiche la  liste des Regions
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $regions = Region::allRegionActifs();

        return view('region.index')->with(
            [
                'regions' => $regions,
                 'active' => $this->active

            ]


        );


    }







    /**
     * Ajouter une nouvelle Region   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Region::isValid(
            $request->libelle,
            (int)   $request->continent_id,



        );

        if ($data['isValid'])
        {
            // Enregistrement du Region

            Region::addRegion(
               $request->libelle,
                (int)   $request->continent_id,



            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Region
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Region::rechercheRegionById($id);



        return response()->json($data);


    }


    /**
     * Update  un Region
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {

        $old_region = Region::rechercheRegionById($id);
        $data = Region::isValid(
          $request->libelle,
            (int)   $request->continent_id,
            $old_region




        );


        if ($data['isValid'])
        {
            // UpDate du Region
            Region::updateRegion(
                 $request->libelle,
                (int)    $request->continent_id,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Region scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Region::deleteRegion($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "Le Region  n est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
