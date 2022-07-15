<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
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

        'job_title',
        'job_french',
        'status',

    ];

    /**
     * Affichage de la liste des Positions
     *
     * @return  array
     */

    public static function allPositionActifs()
    {

        return   $positions = Position::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter une Position
     *
     * @param  string $job_title
     * @param  string $job_french

 * @return Position
     */

    public static function addPosition($job_title, $job_french)
    {
        $position = new Position();
        $position->job_title = $job_title;
        $position->job_french = $job_french;

        $position->created_at = Carbon::now();

        $position->save();

        return $position;
    }

    /**
     * Affichage d'une Position
     * @param int $id
     * @return  Position
     */

    public static function recherchePositionById($id)
    {

        return   $position = Position::findOrFail($id);
    }

    /**
     * Update d'une Position
     * @param  string $job_title
     * @param  string $job_french
 * @param int $id
     * @return  Position
     */

    public static function updatePosition( $job_title, $job_french, $id)
    {


        return   $position = Position::findOrFail($id)->update([

            'job_title' => $job_title,
            'job_french' => $job_french,


            'id' => $id,


        ]);
    }


    /**
     * Supprimer un Position
     *
     * @param int $id
     * @return  boolean
     */

    public static function deletePosition($id)
    {

        $position = Position::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($position) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si le Position existe deja
     *

     * @param  string $job_title



     * @return  boolean
     */

    public static function isUnique($job_title)
    {

        $position = Position::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('job_title', '=', $job_title)

            ->first();


        if ($position) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout
     * @param  string $job_title

     * @param  Position $old_position

     * @return  array
     */

    public static function isValid($job_title,$old_position = null )
    {

        $data = array();

        $isValid = false;
        $erreurJobTitle = '';






        // Verification de la validité des données


        if ($job_title ==='') {
            $erreurJobTitle = "Le titre  est obligatoire" ;
        }

        elseif (
            $old_position == null ||
            $old_position->job_title !=$job_title

        ){
            $erreurJobTitle = (Position::isUnique($job_title))?'Cette position  existe déja ':'';

            $isValid = (Position::isUnique($job_title))?false:true;
        }

        else {

            $erreurJobTitle = '';



            $isValid = true;
        }

        return  $data = [

            'isValid' => $isValid,
            'erreurJobTitle' => $erreurJobTitle,



        ];
    }



    /**
     * Affiche le nombre total de positions
     * @param  int $classe_id


     * @return  int total
     */

    public static function totalPosition (){

        $total = Position::where ('status','!=',TypeStatus::SUPPRIME)


            ->orderBy('id','DESC')
            ->count()


        ;


        if($total){
            return $total;
        }
        return 0;

    }

}
