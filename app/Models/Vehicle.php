<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->status = TypeStatus::ACTIF;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'color',
        'plate',
        'photo',
        'vehicle_type',
        'brand_id',
        'modele_id',

        'status',

    ];


    /**
     * Affiche la liste de toutes  les  Vehicles
     *
     * @return  array
     */

    public static function allVehicleActifs()
    {

        return   $vehicles = Vehicle::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }



    /**
     * Ajouter une Vehicle
     *
     * @param  string $color
     * @param  string $plate
     * @param  string $photo
     * @param  integer $vehicle_type
 * @param  integer $brand_id
     * @param  integer $modele_id
 * @return  Vehicle
     */

    public static function addVehicle($color, $plate , $photo, $vehicle_type, $brand_id, $modele_id )
    {


        $vehicle = new Vehicle();
        $vehicle->color = $color;
        $vehicle->plate = $plate;
        $vehicle->photo = $photo;
        $vehicle->vehicle_type = $vehicle_type;

        $vehicle->brand_id = $brand_id;
        $vehicle->modele_id = $modele_id;

        $vehicle->created_at = Carbon::now();

        $vehicle->save();

        return $vehicle;
    }


    /**
     * Affiche une Vehicle
     * @param int $id
     * @return  Vehicle
     */

    public static function rechercheVehicleById($id)
    {

        return   $vehicle = Vehicle::findOrFail($id);
    }


    /**
     * Update d ' une Vehicle
     *
     * @param  string $color
     * @param  string $plate
     * @param  string $photo
     * @param  integer $vehicle_type
     * @param  integer $brand_id
     * @param  integer $modele_id

     * @param int $id
     * @return  Vehicle
     */

    public static function updateVehicle($color, $plate , $photo, $vehicle_type, $brand_id, $modele_id , $id)
    {


        return   $vehicle = Vehicle::findOrFail($id)->update([
            'color' => $color,
            'plate' => $plate,
            'photo' => $photo,
            'vehicle_type' => $vehicle_type,
            'brand_id' => $brand_id,
            'modele_id' => $modele_id,


            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Vehicle
     *

     * @param int $id
     * @return  boolean
     */

    public static function deleteVehicle($id)
    {

        $vehicle = Vehicle::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($vehicle) {
            return 1;
        }
        return 0;
    }


    /**
     * Verifier si la Vehicle   existe deja
     *

     * @param integer $modele_id
     * @param string $plate

     * @return  boolean
     */

    public static function isUnique($modele_id, $plate )
    {

        $vehicle = Vehicle::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('modele_id', '=', $modele_id)
            ->where('plate', '=', $plate)

            ->first();


        if ($vehicle === null) {
            return 1;
        }
        return 0;
    }




    /**
     * Verifier  si l' ajout est valide '
     *
     * @param string $libelle
     * @param integer $pays_id

     * @return  array
     */

    public static function isValid($modele_id, $plate)
    {

        $data = array();

        $isValid = false;
        $erreurModele = '';
        $erreurPlate = '';



        // Verification validite des données


        if (isEmpty($modele_id)) {
            $erreurModele = "Le modele est obligatoire" ;
        }

        elseif (isEmpty($plate)){

            $erreurPlate = "La plate est obligatoire" ;
        }

        elseif (Vehicle::isUnique($modele_id, $plate)) {
            $erreurMarque = "Cette Vehicle    existe dejà " ;
        }


        else {

            $erreurModele = '';
            $erreurPlate = '';
            $isValid = true;
        }

        return  $data = [

            'isValid' => $isValid,

            'erreurModele' => $erreurModele,
            'erreurplate' => $erreurPlate,

        ];
    }


}
