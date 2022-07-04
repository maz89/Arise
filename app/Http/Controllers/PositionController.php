<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Types\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PositionController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::POSITION;
    }


    /**
     * Affiche la  liste des Positions
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $positions = Position::allPositionActifs();

        return view('position.index')->with(
            [
                'positions' => $positions,
                 'active' => $this->active

            ]


        );


    }






    /**
     * Ajouter une nouvelle Position   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {


        $data = Position::isValid(
            $request->job_title,
            $request->job_french,



        );

        if ($data['isValid'])
        {
            // Enregistrement du Position

            Position::addPosition(
                $request->job_title,
                $request->job_french,



            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Position
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Position::recherchePositionById($id);



        return response()->json($data);


    }


    /**
     * Update  un Position
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {
        $old_position = Position::recherchePositionById($id);

        $data = Position::isValid(
            $request->job_title,

            $old_position

        );


        if ($data['isValid'])
        {
            // UpDate du Position
            Position::updatePosition(
                $request->job_title,
                $request->job_french,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Position scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Position::deletePosition($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "Le Position  n' est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
