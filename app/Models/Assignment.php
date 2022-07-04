<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Assignment extends Model
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
        'date_start',
        'date_end',
        'position_id',
        'employe_id',
        'department_id',
        'is_manager',
        'is_encours',
        'business_id',
        'status',
    ];

    /**
     * Affichage de la liste de toutes  les Affectations
     *
     * @return  array
     */

    public static function allAssignmentActifs()
    {

        return   $assignments = Assignment::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter une affectation
     *
     * @param  string $date_start
     * @param  string $date_end
     * @param  integer $position_id
     * @param  integer $employee_id
     * @param  integer $department_id
     * @param  integer $is_manager

     * @param  integer $business_id
     * @return Assignment
     */

    public static function addAssignment($date_start, $date_end, $employee_id,
                                         $position_id, $department_id, $is_manager,  $business_id)
    {

        DB::transaction(function() use (
            $date_start,
            $date_end,
            $position_id,
            $employee_id,
            $department_id,
            $is_manager,
            $business_id

        ) {


        // Add assignment
        $assignment = new Assignment();
        $assignment->date_start = $date_start;
        $assignment->date_end = $date_end;
        $assignment->position_id = $position_id;
        $assignment->employee_id = $employee_id;
        $assignment->department_id = $department_id;
        $assignment->is_manager = $is_manager;
        $assignment->is_encours = 1;
        $assignment->business_id = $business_id;

        $assignment->created_at = Carbon::now();

        $assignment->save();

        // Mise a jour de employe

            Employe::findOrFail($employee_id)->update([

                'position_id' =>$position_id,

            ]);

            return $assignment;



        });
    }

    /**
     * Affichage d'une affectation
     * @param int $id
     * @return  Assignment
     */

    public static function rechercheAssignmentById($id)
    {

        return   $assignment = Assignment::findOrFail($id);;
    }

    /**
     * Update d'une affectation
     * @param  string $date_start
     * @param  string $date_end
     * @param  integer $position_id
     * @param  integer $employee_id
     * @param  integer $department_id
     * @param  integer $is_manager
     * @param  integer $is_encours
     * @param  integer $business_id
     * @param int $id
     * @return  Assignment
     */

    public static function updateAssignment( $date_start, $date_end, $employee_id,
                                             $position_id, $department_id, $is_manager,  $business_id, $id)
    {

        DB::transaction(function() use (
            $date_start,
            $date_end,
            $position_id,
            $employee_id,
            $department_id,
            $is_manager,
            $business_id,
            $id

        ) {

          // update assignment

          $assignment = Assignment::findOrFail($id)->update([

            'date_start' => $date_start,
            'date_end' => $date_end,
            'position_id' => $position_id,
            'employee_id' => $employee_id,
            'department_id' => $department_id,
            'is_manager' => $is_manager,

            'business_id' => $business_id,

            'id' => $id,


        ]);


          // update employe

            Employe::findOrFail($employee_id)->update([

                'position_id' =>$position_id,

            ]);

            return $assignment;



        });


    }


    /**
     * Supprimer une Assignment
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteAffectation($id)
    {

        $assignment = Assignment::enddOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($assignment) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si l'affectation   existe deja
     *
     *@param  date $date_start
     * @param  date $date_end
     * @param  integer $employe_id
     * @param  integer $position_id

     * @return  boolean
     */

    public static function isUnique($date_start, $date_end, $employe_id, $position_id)
    {

        $assignment = Assignment::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('date_start', '=', $date_start)
            ->where('date_end', '=', $date_end)
            ->where('employe_id', '=', $employe_id)
            ->where('position_id', '=', $position_id)

            ->first();


        if ($assignment) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout
     *  @param  date $date_start
     * @param  date $date_end
     * @param  integer $employe_id
     * @param  integer $position_id
     * @param  Assignment $old_assignment


     * @return  array
     */

    public static function isValid($date_start, $date_end, $employe_id, $position_id, $old_assignment = null)
    {

        $data = array();

        $isValid = false;
        $erreurDate_start = '';
        $erreurDate_end = '';
        $erreurEmployee_id = '';
        $erreurposition_id = '';



        // Verification de la validité des données


        if ($date_start === '') {
            $erreurDate_start = "La date de début est obligatoire" ;
        }  elseif ($date_end === '') {
            $erreurDate_end = "La date de end est obligatoire" ;
        }elseif ($employe_id === 0) {
            $erreurEmployee_id = "L'identité de l'employé est obligatoire" ;
        }
        elseif ($position_id === 0) {
            $erreurposition_id = "Le position est obligatoire" ;
        }
        elseif (
            $old_assignment == null ||
            $old_assignment->date_start !=$date_start ||
            $old_assignment->date_end !=$date_end ||
            $old_assignment->employe_id !=$employe_id ||
            $old_assignment->position_id !=$position_id

        ){
            $erreurEmployee_id = (Assignment::isUnique($date_start, $date_end, $employe_id, $position_id))?'Cet assignment   existe déja ':'';

            $isValid = (Assignment::isUnique($date_start, $date_end, $employe_id, $position_id))?false:true;
        }


        else {

            $erreurDate_start = '';
            $erreurDate_end = '';
            $erreurEmployee_id = '';
            $erreurposition_id = '';

            $isValid = true;
        }

        return  $data = [


            'isValid' => $isValid,
            'erreurDate_start' => $erreurDate_start,
            'erreurDate_end' => $erreurDate_end,
            'erreurEmployee_id' => $erreurEmployee_id,
            'erreurposition_id' => $erreurposition_id,

        ];
    }

    /**
     * Obtenir le position de l'affectation
     *
     */
    public function position()
    {


        return $this->belongsTo(Position::class, 'position_id');
    }

    /**
     * Obtenir l'employé affecté
     *
     */
    public function employee()
    {


        return $this->belongsTo(Employe::class, 'employee_id');
    }


    /**
     * Obtenir le departement  affecté
     *
     */
    public function department()
    {


        return $this->belongsTo(Departement::class, 'department_id');
    }



    /**
     * Obtenir le business   affecté
     *
     */
    public function business()
    {


        return $this->belongsTo(Business::class, 'business_id');
    }
}
