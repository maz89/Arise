<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Types\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TaskController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::TASKS;
    }


    /**
     * Affiche la  liste des Tasks
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tasks = Task::allTask();

        return view('task.index')->with(
            [
                'tasks' => $tasks,
                 'active' => $this->active

            ]


        );


    }






    /**
     * Ajouter une nouvelle Task   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Task::isValid(
            $request->libelle,
            $request->date_task,



        );

        if ($data['isValid'])
        {
            // Enregistrement du Task

            Task::addTask(
               $request->libelle,
               $request->date_task,
               $request->description,
               $request->accomplie,



            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Task
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Task::rechercheTaskById($id);



        return response()->json($data);


    }


    /**
     * Update  un Task
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {
        $old_task = Task::rechercheTaskById($id);

        $data = Task::isValid(
            $request->libelle,
            $request->date_task,
            $old_task

        );


        if ($data['isValid'])
        {
            // UpDate du Task
            Task::updateTask(
                $request->libelle,
                $request->date_task,
                $request->description,
                $request->accomplie,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Task scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Task::deleteTask($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "Le Task  n est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
