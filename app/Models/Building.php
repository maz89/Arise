<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
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
        'address',
        'name',
        'photo',
        'name_manager',
        'email_manager',
        'telephone_manager',

        'status',

    ];


    /**
     * Affiche la liste de toutes  les  Buildings
     *
     * @return  array
     */

    public static function allBuildingActifs()
    {

        return   $buildings = Building::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }



    /**
     * Ajouter une Building
     *
     * @param  string $address
     * @param  string $name
     * @param  string $photo
     * @param  string $name_manager
     * @param  string $telephone_manager
 * @return  Building
     */

    public static function addBuilding($address, $name, $photo,$name_manager, $telephone_manager  )
    {


        $building = new Building();
        $building->address = $address;
        $building->name = $name;
        $building->photo = $photo;
        $building->name_manager = $name_manager;
        $building->telephone_manager = $telephone_manager;


        $building->created_at = Carbon::now();

        $building->save();

        return $building;
    }


    /**
     * Affiche une Building
     * @param int $id
     * @return  Building
     */

    public static function rechercheBuildingById($id)
    {

        return   $building = Building::findOrFail($id);
    }


    /**
     * Update d ' une Building
     *
     * @param  string $address
     * @param  string $name
     * @param  string $photo
     * @param  string $name_manager
     * @param  string $telephone_manager
 * @param int $id
     * @return  Building
     */

    public static function updateBuilding($address, $name, $photo,$name_manager, $telephone_manager ,  $id)
    {


        return   $building = Building::findOrFail($id)->update([
            'address' => $address,
            'name' => $name,
            'photo' => $photo,

            'name_manager' => $name_manager,
            'telephone_manager' => $telephone_manager,


            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Building
     *

     * @param int $id
     * @return  boolean
     */

    public static function deleteBuilding($id)
    {

        $building = Building::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($building) {
            return 1;
        }
        return 0;
    }


    /**
     * Verifier si l' Building   existe deja
     *

     * @param  string $address
     * @param  string $name

     * @return  boolean
     */

    public static function isUnique($address, $name )
    {

        $building = Building::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('address', '=', $address)
            ->where('name', '=', $name)


            ->first();


        if ($building === null) {
            return 1;
        }
        return 0;
    }




    /**
     * Verifier  si l' ajout est valide '
     *
     * @param  string $address
     * @param  string $name


     * @return  array
     */

    public static function isValid($address, $name )
    {

        $data = array();

        $isValid = false;
        $erreurAddress = '';
        $erreurName = '';



        // Verification validite des données


        if (isEmpty($address)) {
            $erreurAddress = "L' address  est obligatoire" ;
        }  elseif (isEmpty($name)) {
            $erreurName = "Le name  est obligatoire" ;
        }

        elseif (Building::isUnique($address, $name )) {
            $erreurAddress = "Cet Building    existe dejà " ;
        }


        else {

            $erreurAddress = '';
            $erreurName = '';
            $isValid = true;
        }

        return  $data = [

            'isValid' => $isValid,
            'erreuraddress' => $erreurAddress,

            'erreurname' => $erreurName,


        ];
    }



}
