<?php

namespace App\Models;

use App\Types\TypeStatus;
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
        'name',
        'departement_id',
        'business_id',

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
     * @param  string $name
     * @param  string $departement_id
     * @param  string $business_id
 * @return Position
     */

    public static function addPosition($name, $departement_id, $business_id)
    {
        $position = new Position();
        $position->name = $name;
        $position->departement_id = $departement_id;
        $position->business_id = $business_id;


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
     * @param  string $name
     * @param  string $departement_id
     * @param  string $business_id
 * @param int $id
     * @return  Position
     */

    public static function updatePosition( $name,$departement_id, $business_id, $id)
    {


        return   $position = Position::findOrFail($id)->update([

            'name' => $name,
            'departement_id' => $departement_id,
            'business_id' => $business_id,

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

     * @param  string $name
     * @param  string $departement_id
     * @param  string $business_id
     * @param  string $telephone
     * @param  string $adresse

     * @return  boolean
     */

    public static function isUnique($name, $departement_id, $business_id)
    {

        $position = Position::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('name', '=', $name)
            ->where('departement_id', '=', $departement_id)
            ->where('business_id', '=', $business_id)

            ->first();


        if ($position === null) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout
     * @param  string $name
     * @param  string $departement_id
     * @param  string $business_id

     * @return  array
     */

    public static function isValid($name, $departement_id, $business_id)
    {

        $data = array();

        $isValid = false;
        $erreurName = '';
        $erreurDepartement = '';
        $erreurBusiness = '';




        // Verification de la validité des données


        if (isEmpty($name)) {
            $erreurName = "Le libellé est obligatoire" ;
        }  elseif (isEmpty($departement_id)) {
            $erreurDepartement = "Le nom du departement est obligatoire" ;
        }elseif (isEmpty($business_id)) {
            $erreurBusiness = "Le business du Position est obligatoire" ;
        }

        elseif (Position::isUnique($name, $departement_id, $business_id)) {
            $erreurName = "Cette Position  existe dejà " ;
        }


        else {

            $erreurName = '';
            $erreurDepartement = '';
            $erreurBusiness = '';

            $isValid = true;
        }

        return  $data = [

            'isValid' => $isValid,
            'erreurname' => $erreurName,
            'erreurdepartement_id' => $erreurDepartement,
            'erreurbusiness_id' => $erreurBusiness,

        ];
    }

    /**
     * Obtenir le departement  lié au Position
     */
    public function departement()
    {


        return $this->belongsTo(Departement::class, 'departement_id');
    }

    /**
     * Obtenir le business lié au Position
     */
    public function business ()
    {


        return $this->belongsTo(Business::class, 'business_id');
    }



}
