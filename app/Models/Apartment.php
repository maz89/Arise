<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
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
        'nb_rooms',
        'num_apartment',
        'building_id',
        'status',

    ];


    /**
     * Affiche la liste des  Apartments
     *
     * @return  array
     */

    public static function allApartmentActifs()
    {

        return   $apartments = Apartment::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }



    /**
     * Ajouter une Apartment
     *
     * @param  string $num_apartment
     * @param  integer $nb_rooms
     * @param  integer $building_id
 * @return  Apartment
     */

    public static function addApartment($num_apartment, $nb_rooms, $building_id)
    {


        $apartment = new Apartment();
        $apartment->num_apartment = $num_apartment;
        $apartment->nb_rooms = $nb_rooms;
        $apartment->building_id = $building_id;

        $apartment->created_at = Carbon::now();

        $apartment->save();

        return $apartment;
    }


    /**
     * Affiche une Apartment
     * @param int $id
     * @return  Apartment
     */

    public static function rechercheApartmentById($id)
    {

        return   $apartment = Apartment::findOrFail($id);
    }


    /**
     * Update d'un Apartment
     *
     * @param  string $num_apartment
     * @param  string $nb_rooms
     * @param  string $building_id
 * @param int $id
     * @return  Apartment
     */

    public static function updateApartment($num_apartment, $nb_rooms, $building_id,  $id)
    {


        return   $apartment = Apartment::findOrFail($id)->update([
            'num_apartment' => $num_apartment,
            'nb_rooms' => $nb_rooms,
            'building_id' => $building_id,


            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Apartment
     *

     * @param int $id
     * @return  boolean
     */

    public static function deleteApartment($id)
    {

        $apartment = Apartment::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($apartment) {
            return 1;
        }
        return 0;
    }


    /**
     * Verifier si l' appartement   existe deja
     *

     * @param string $num_apartment
     * @param integer $building_id
     * @return  boolean
     */

    public static function isNomUnique($num_apartment, $building_id)
    {

        $apartment = Apartment::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('num_apartment', '=', $num_apartment)
            ->where('building_id', '=', $building_id)
            ->first();


        if ($apartment === null) {
            return 1;
        }
        return 0;
    }




    /**
     * Verifier  si l' ajout est valide '
     *
     * @param  string $num_apartment
     * @param  string $nb_rooms



     * @return  array
     */

    public static function isValid($num_apartment, $nb_rooms)
    {

        $data = array();

        $isValid = false;
        $erreurNumero = '';


        // Verification validite des données


        if (isEmpty($num_apartment)) {
            $erreurNumero = "Le numero de l ' appartement   est obligatoire" ;
        } elseif ((strlen($num_apartment) <= 3) || (strlen($num_apartment) > 250)) {
            $erreurNumero = "La longueur du nom de l' Apartment est  comprise entre 3 et 250 caractères  ";
        }elseif (isEmpty($nb_rooms)) {
        $erreurChambre = "Le nombre de chambre est obligatoire" ;
        } elseif (Apartment::isNomUnique($num_apartment, $nb_rooms)) {
            $erreurNumero = "Cet Apartment  existe dejà " ;
        }

        else {

            $erreurNumero = '';
            $erreurChambre= '';

            $isValid = true;
        }

        return  $data = [

            'isValid' => $isValid,
            'erreurNumero' => $erreurNumero,
            'erreurbuilding' => $erreurChambre,


        ];
    }



    /**
     * Obtenir l ' building     liée à l'appartement
     *
     */
    public function building()
    {


        return $this->belongsTo(Building::class, 'building_id');
    }


}
