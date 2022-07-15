<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function __construct(array $attributes=[])
    {
        parent::__construct($attributes);
        $this->status=TypeStatus::ACTIF;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'date_task',
        'libelle',
        'description',
        'accomplie',
        'status',

    ];

    /**
     * Affichage de la liste des Positions
     *
     * @return  array
     */

    public static function allTask()
    {

        return   $tasks = Task::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }



    /**
     * Ajouter une tâche
     *
     * @param  date $date_task_task
     * @param  string $libelle
     * @param  string $description
     * @param  string $accomplie

     * @return Task
     */

    public static function addTask($date_task, $libelle,$description,$accomplie )
    {
        $task = new Task();
        $task->date_task = $date_task;
        $task->libelle = $libelle;
        $task->description = $description;
        $task->accomplie = $accomplie;

        $task->created_at = Carbon::now();

        $task->save();

        return $task;
    }

    /**
     * Affichage d'une Tâche
     * @param int $id
     * @return  Task
     */

    public static function rechercheTAskById($id)
    {

        return   $task = Task::findOrFail($id);
    }

    /**
     * Update d'une Position
     * @param  date $date_task
     * @param  string $libelle
     * @param  string $description
     * @param  string $accomplie
     * @param int $id
     * @return  Position
     */

    public static function updateTask( $date_task, $libelle, $description, $accomplie, $id)
    {


        return   $task = Task::findOrFail($id)->update([

            'date_task' => $date_task,
            'libelle' => $libelle,
            'description' => $description,
            'accomplie' => $accomplie,

            'id' => $id,


        ]);
    }

    /**
     * Supprimer
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteTask($id)
    {

        $task = Task::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($task) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si la tache existe deja
     *
     * @param  date $date_task
     * @param  string $libelle
     * @param  string $description
     * @param  string $accomplie


     * @return  boolean
     */

    public static function isUnique( $date_task, $libelle)
    {

        $task = Task::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('date_task', '=', $date_task)
            ->where('libelle', '=', $libelle)



            ->first();


        if ($task) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout
     * @param  date $date_task
     * @param  string $libelle
     * @param  Task  $old_task



     * @return  array
     */

    public static function isValid($date_task, $libelle,$old_task = null )
    {

        $data = array();

        $isValid = false;
        $erreurDate = '';

        $erreurLibelle = '';





        // Verification de la validité des données


        if ($date_task ==='') {
            $erreurDate = "Required" ;
        }  elseif ($libelle =='') {
            $erreurLibelle = "Required" ;
        }



        elseif (
            $old_task == null ||
            $old_task->libelle !=$libelle

        ){
            $erreurLibelle = (Task::isUnique($date_task, $libelle))?'This task exists  ':'';

            $isValid = (Task::isUnique($date_task, $libelle))?false:true;
        }



        else {

            $erreurDate = '';
            $erreurLibelle = '';


            $isValid = true;
        }

        return  $data = [

            'isValid' => $isValid,
            'erreurDate' => $erreurDate,
            'erreurLibelle' =>$erreurLibelle,


        ];
    }





}
