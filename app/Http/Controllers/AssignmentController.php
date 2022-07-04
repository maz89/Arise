<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Types\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AssignmentController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::ASSIGNMENT;
    }


    /**
     * Affiche la  liste des Assignments
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $assignments = Assignment::allAssignmentActifs();

        return view('assignment.index')->with(
            [
                'assignments' => $assignments,
                 'active' => $this->active

            ]


        );


    }






    /**
     * Ajouter une nouvelle Assignment   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {


        $data = Assignment::isValid(
            $request->date_start,
            $request->date_end,
            (int)     $request->employe_id,
            (int)   $request->position_id,



        );

        if ($data['isValid'])
        {
            // Enregistrement du Assignment

            Assignment::addAssignment(
                $request->date_start,
                $request->date_end,
                (int)    $request->employe_id,
                (int)   $request->position_id,
                (int)   $request->department_id,
                (int)   $request->is_manager,

                (int)   $request->business_id,




            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Assignment
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Assignment::rechercheAssignmentById($id);



        return response()->json($data);


    }


    /**
     * Update  un Assignment
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {
        $old_Assignment = Assignment::rechercheAssignmentById($id);

        $data = Assignment::isValid(
            $request->date_start,
            $request->date_end,
            (int)     $request->employe_id,
            (int)   $request->position_id,
            $old_Assignment

        );


        if ($data['isValid'])
        {
            // UpDate du Assignment
            Assignment::updateAssignment(
                $request->date_start,
                $request->date_end,
                (int)    $request->employe_id,
                (int)   $request->position_id,
                (int)   $request->department_id,
                (int)   $request->is_manager,
                (int)   $request->business_id,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Assignment scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Assignment::deleteAffectation($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "L'  Assignment  n' est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
