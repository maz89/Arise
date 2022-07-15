<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilRole extends Model
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
        'profil_id',
        'role_id',

        'status',

    ];


    /**
     * Affiche la liste de toutes  les  ProfilRoles
     *
     * @return  array
     */

    public static function allProfilRoleActifs()
    {

        return   $profil_roles = ProfilRole::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }



    /**
     * Ajouter un ProfilRole
     *
     * @param  string $profil_id

     * @param  integer $role_id

     * @return  ProfilRole
     */

    public static function addProfilRole($profil_id,$role_id  )
    {


        $profil_role = new ProfilRole();
        $profil_role->profil_id = $profil_id;
        $profil_role->role_id = $role_id;


        $profil_role->created_at = Carbon::now();

        $profil_role->save();

        return $profil_role;
    }


    /**
     * Affichage d'un ProfilRole
     * @param int $id
     * @return  ProfilRole
     */

    public static function rechercheProfilRoleById($id)
    {

        return   $profil_role = ProfilRole::findOrFail($id);
    }


    /**
     * Update d'un Profil Role
     *
     * @param  string $profil_id

     * @param  integer $role_id


     * @param int $id
     * @return  ProfilRole
     */

    public static function updateProfilRole($profil_id,$role_id,  $id)
    {


        return   $profil_role = ProfilRole::findOrFail($id)->update([
            'profil_id' => $profil_id,
            'role_id' => $role_id,


            'id' => $id,


        ]);
    }


    /**
     * Supprimer un Profil Role
     *

     * @param int $id
     * @return  boolean
     */

    public static function deleteProfilRole($id)
    {

        $profil_role = ProfilRole::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($profil_role) {
            return 1;
        }
        return 0;
    }


    /**
     * Verifier si le Profil Role existe deja
     *


     * @param string $profil_id
     * @return  boolean
     */

    public static function isUnique($profil_id )
    {

        $profil_role = ProfilRole::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('profil_id', '=', $profil_id)

            ->first();


        if ($profil_role === null) {
            return 1;
        }
        return 0;
    }




    /**
     * Verifier  si l' ajout est valide '
     *
     * @param string $profil_id


     * @return  array
     */

    public static function isValid($profil_id )
    {

        $data = array();

        $isValid = false;
        $erreurprofil_id = '';



        // Verification validite des données


        if ($profil_id==='') {
            $erreurprofil_id = "Le profil    est obligatoire" ;
        }

        elseif (ProfilRole::isUnique($profil_id)) {
            $erreurprofil_id  = "Ce ProfilRole  existe dejà " ;
        }


        else {

            $erreurprofil_id = '';


            $isValid = true;
        }

        return  $data = [

            'isValid' => $isValid,
            'erreurprofil_id' => $erreurprofil_id,



        ];
    }



    /**
     * Obtenir le profil  lié au ProfilRole
     */
    public function profil ()
    {


        return $this->belongsTo(Profil::class, 'profil_id');
    }

    /**
     * Obtenir le role  lié au ProfilRole
     */
    public function role ()
    {


        return $this->belongsTo(Role::class, 'role_id');
    }



}
