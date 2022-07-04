<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Types\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BusinessController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::BUSINESS;
    }


    /**
     * Affiche la  liste des Businesss
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $businesses = Business::allBusinessActifs();

        return view('business.index')->with(
            [
                'businesses' => $businesses,
                 'active' => $this->active

            ]


        );


    }






    /**
     * Ajouter une nouvelle Business   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {

        $data = Business::isValid(
            $request->code,
            $request->title



        );

        if ($data['isValid'])
        {
            // Enregistrement du Business

            Business::addBusiness(
                $request->code,
                $request->title



            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Business
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Business::rechercheBusinessById($id);



        return response()->json($data);


    }


    /**
     * Update  un Business
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {
        $old_business = Business::rechercheBusinessById($id);

        $data = Business::isValid(
            $request->code,
            $request->title
            ,
            $old_business

        );


        if ($data['isValid'])
        {
            // UpDate du Business
            Business::updateBusiness(
                $request->code,
                $request->title,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Business scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Business::deleteBusiness($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "L' Business  n' est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
