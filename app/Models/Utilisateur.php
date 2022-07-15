<?php

namespace App\Models;

use App\Types\Role;
use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Utilisateur extends Model
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


        'nom',
        'login',
        'mot_passe',
        'role',

        'status',

    ];

    /**
     * Affichage de la liste de tous  les Utilisateurs
     *
     * @return  array
     */

    public static function allUtilisateurActifs()
    {

        return   $utilisateurs = Utilisateur::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter un Utilisateur
     *

     * @param  string $nom
     * @param  string $login
     * @param  string $mot_passe
     * @param  integer $role

     * @return Utilisateur
     */

    public static function addUtilisateur($nom, $login,$mot_passe, $role )
    {
        $utilisateur = new Utilisateur();


        $utilisateur->nom = $nom;
        $utilisateur->login = $login;
        $utilisateur->mot_passe = $mot_passe ;
        $utilisateur->role = $role;

        $utilisateur->created_at = Carbon::now();

        $utilisateur->save();

        return $utilisateur;
    }

    /**
     * Affichage d'une Utilisateur
     * @param int $id
     * @return  Utilisateur
     */

    public static function rechercheUtilisateurById($id)
    {

        return   $utilisateur = Utilisateur::findOrFail($id);
    }

    /**
     * Update d'une Utilisateur
     * @param  string $nom
     * @param  string $login
     * @param  string $mot_passe
     * @param  integer $role
     * @param int $id
     * @return  Utilisateur
     */

    public static function updateUtilisateur($nom, $login,$mot_passe, $role, $id)
    {


        return   $utilisateur = Utilisateur::findOrFail($id)->update([



            'nom' => $nom,
            'login' => $login,
            'mot_passe' => $mot_passe ,
            'role' => $role,

            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Utilisateur
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteUtilisateur($id)
    {

        $utilisateur = Utilisateur::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($utilisateur) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si l'Utilisateur   existe deja
     *


     * @param  string $login

     * @return  boolean
     */

    public static function isUnique($login)
    {

        $utilisateur = Utilisateur::where('status', '!=', TypeStatus::SUPPRIME)


            ->where('login', '=', $login)

            ->first();


        if ($utilisateur) {
            return 1;
        }
        return 0;
    }



    /**
     * Verifier si l'Utilisateur   existe deja
     *


     * @param  string $login
     * @param  string $mot_passe

     * @return  boolean
     */

    public static function isExiste($login, $mot_passe)
    {

        $utilisateur = Utilisateur::where('status', '!=', TypeStatus::SUPPRIME)


            ->where('login', '=', $login)


            ->first();


        if ($utilisateur) {

        /*    if(Hash::check($mot_passe,$utilisateur->mot_passe )){

                return 1;
            }else{*/

                return 1;
            }

//        }
        return 0;
    }


    /**
     * Verification de la validité de l'ajout

     * @param  string $nom
     * @param  string $login
     * @param  string $mot_passe
     * @param  integer $role
     * @param  Utilisateur $old_utilisateur

     * @return  array
     */

    public static function isValid($nom, $login,$mot_passe, $role,$old_utilisateur = null)
    {

        $data = array();

        $isValid = false;

        $erreurNom = '';
        $erreurLogin = '';
        $erreurMotpasse = '';
        $erreurRole = '';



        // Verification de la validité des données


        if ($nom ==='') {
            $erreurNom = "Requiered" ;
        }elseif ($login ==='') {
            $erreurLogin = "Requiered" ;
        }elseif ($mot_passe ==='') {
            $erreurMotpasse = "Requiered" ;
        }

        elseif ($role === 0) {
            $erreurRole = "Requiered" ;
        }


        elseif (
            $old_utilisateur == null ||

            $old_utilisateur->login !=$login


        ){
            $erreurLogin = (Utilisateur::isUnique($login))?'This user  exist ':'';

            $isValid = (Utilisateur::isUnique($login))?false:true;
        }



        else {

            $erreurNom = '';
            $erreurLogin = '';
            $erreurMotpasse = '';
            $erreurRole = '';


            $isValid = true;
        }

        return  $data = [


            'isValid' => $isValid,


            'erreurNom' => $erreurNom,
            'erreurLogin' => $erreurLogin,
            'erreurMotpasse' => $erreurMotpasse,
            'erreurRole' => $erreurRole,


        ];
    }






    /**
     * Verification de l' authenttification '


     * @param  string $login
     * @param  string $mot_passe



     * @return  array
     */

    public static function isAuthenticate( $login,$mot_passe)
    {

        $data = array();

        $isValid = false;


        $erreurLogin = '';
        $erreurMotpasse = '';





        // Verification de la validité des données


      if ($login ==='') {
            $erreurLogin = "Requiered" ;
        }elseif ($mot_passe ==='') {
            $erreurMotpasse = "Requiered" ;
        }

        elseif (!Utilisateur::isUnique($login)) {
            $erreurLogin = "This login not exist " ;
        }
      elseif(!Utilisateur::isExiste($login, $mot_passe))

      {
          $erreurMotpasse = "Password  incorrect";

      }



        else {


            $erreurLogin = '';
            $erreurMotpasse = '';



            $isValid = true;
        }

        return  $data = [


            'isValid' => $isValid,

            'erreurLogin' => $erreurLogin,
            'erreurMotpasse' => $erreurMotpasse,






        ];
    }

    /**
     * Afficher  un Utilisateur
     *
     * @param  int $id
     * @return string $resultat
     */
    public static function getRole($id)
    {

        $resultat = '';

        $user = Utilisateur::rechercheUtilisateurById($id);

        if($user->role == Role::ADMINISTRATEUR){
            $resultat =' Administrator';

        }elseif ($user->role == Role::MANAGER_RH){

            $resultat ='Manager HR';
        }elseif ($user->role == Role::ASSISTANT_RH){
            $resultat ='Assistant HR';

        }else{
            return $resultat;

        }

        return $resultat;

    }

}
