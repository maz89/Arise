<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'employee_id',
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
     * @param  string $employe_id
     * @param  string $position_id
     * @return Assignment
     */

    public static function addAssignment($date_start, $date_end, $employe_id,$position_id)
    {
        $assignment = new Assignment();
        $assignment->date_start = $date_start;
        $assignment->date_end = $date_end;
        $assignment->employe_id = $employe_id;
        $assignment->position_id = $position_id;

        $assignment->created_at = Carbon::now();

        $assignment->save();

        return $assignment;
    }

    /**
     * Affichage d'une affectation
     * @param int $id
     * @return  Assignment
     */

    public static function rechercheAssignmentById($id)
    {

        return   $assignment = Assignment::enddOrFail($id);
    }

    /**
     * Update d'une affectation
     * @param  date $date_start
     * @param  date $date_end
     * @param  integer $employe_id
     * @param  integer $position_id
     * @param int $id
     * @return  Assignment
     */

    public static function updateAssignment( $date_start, $date_end, $employe_id, $position_id, $id)
    {


        return   $assignment = Assignment::enddOrFail($id)->update([

            'date_start' => $date_start,
            'date_end' => $date_end,
            'employe_id' => $employe_id,
            'position_id' => $position_id,

            'id' => $id,


        ]);
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


     * @return  array
     */

    public static function isValid($date_start, $date_end, $employe_id, $position_id)
    {

        $data = array();

        $isValid = false;
        $erreurDate_start = '';
        $erreurDate_end = '';
        $erreurEmployee_id = '';
        $erreurposition_id = '';



        // Verification de la validité des données


        if (isEmpty($date_start)) {
            $erreurDate_start = "La date de début est obligatoire" ;
        }  elseif (isEmpty($date_end)) {
            $erreurDate_end = "La date de end est obligatoire" ;
        }elseif (isEmpty($employe_id)) {
            $erreurEmployee_id = "L'identité de l'employé est obligatoire" ;
        }
        elseif (isEmpty($position_id)) {
            $erreurposition_id = "Le position est obligatoire" ;
        }
        elseif (Assignment::isUnique($date_start, $date_end, $employe_id, $position_id)) {
            $erreurNom = "Cette affectation est déja éffectuée " ;
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


        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
