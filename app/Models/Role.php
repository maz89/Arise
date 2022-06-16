<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
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
        'name',

        'status',

    ];


    /**
     * Affiche la liste de toutes  les  Roles
     *
     * @return  array
     */

    public static function allRoleActifs()
    {

        return   $Roles = Role::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }



    /**
     * Ajouter une Role
     *
     * @param  string $name

     * @return  Role
     */

    public static function addRole($name  )
    {


        $Role = new Role();
        $Role->name = $name;

        $Role->created_at = Carbon::now();

        $Role->save();

        return $Role;
    }


    /**
     * Affichage d'un Role
     * @param int $id
     * @return  Role
     */

    public static function rechercheRoleById($id)
    {

        return   $Role = Role::findOrFail($id);
    }


    /**
     * Update d'un Role
     *
     * @param  string $name

     * @param int $id
     * @return  Role
     */

    public static function updateRole($name, $id)
    {


        return   $Role = Role::findOrFail($id)->update([
            'name' => $name,

            'id' => $id,


        ]);
    }


    /**
     * Supprimer un Role
     *

     * @param int $id
     * @return  boolean
     */

    public static function deleteRole($id)
    {

        $Role = Role::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($Role) {
            return 1;
        }
        return 0;
    }


    /**
     * Verifier si le Role existe deja
     *


     * @param string $name
     * @return  boolean
     */

    public static function isUnique($name )
    {

        $Role = Role::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('name', '=', $name)

            ->first();


        if ($Role === null) {
            return 1;
        }
        return 0;
    }




    /**
     * Verifier  si l' ajout est valide '
     *
     * @param string $name


     * @return  array
     */

    public static function isValid($name )
    {

        $data = array();

        $isValid = false;
        $erreurName = '';



        // Verification validite des données


        if (isEmpty($name)) {
            $erreurName = "Le libellé   est obligatoire" ;
        }

        elseif (Role::isUnique($name)) {
            $erreurName  = "Ce Role  existe dejà " ;
        }


        else {

            $erreurName = '';


            $isValid = true;
        }

        return  $data = [

            'isValid' => $isValid,
            'erreurname' => $erreurName,



        ];
    }


}
