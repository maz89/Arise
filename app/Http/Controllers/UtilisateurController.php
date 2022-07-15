<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Types\Menu;
use App\Types\Role;
use App\Types\TypeStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UtilisateurController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::UTILISATEUR;
    }


    /**
     * Affiche la  liste des Utilisateurs
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $utilisateurs = Utilisateur::allUtilisateurActifs();

        return view('utilisateur.index')->with(
            [
                'utilisateurs' => $utilisateurs,
                 'active' => $this->active

            ]


        );


    }






    /**
     * Ajouter une nouvelle Utilisateur   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {


        $data = Utilisateur::isValid(
            $request->nom,
            $request->login,
            $request->mot_passe,
            $request->role,



        );

        if ($data['isValid'])
        {
            // Enregistrement du Utilisateur

            Utilisateur::addUtilisateur(
                $request->nom,
                $request->login,
                $request->mot_passe,
                $request->role


            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Utilisateur
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Utilisateur::rechercheUtilisateurById($id);



        return response()->json($data);


    }


    /**
     * Update  un Utilisateur
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {
        $old_Utilisateur = Utilisateur::rechercheUtilisateurById($id);

        $data = Utilisateur::isValid(
            $request->nom,
            $request->login,
            $request->mot_passe,
            $request->role,
            $old_Utilisateur

        );


        if ($data['isValid'])
        {
            // UpDate du Utilisateur
            Utilisateur::updateUtilisateur(
                $request->nom,
                $request->login,
                $request->mot_passe,
                $request->role,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Utilisateur scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Utilisateur::deleteUtilisateur($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "Le  Utilisateur  n' est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }




    /**
     * Authentifier   un Utilisateur
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\JsonResponse

     */
    public function authenticate( Request $request)
    {


        $data = Utilisateur::isAuthenticate(

            $request->login,
            $request->mot_passe,


        );


        if ($data['isValid'])
        {
            // Saisie données en session

            $utilisateur = Utilisateur::where('status', '!=', TypeStatus::SUPPRIME)


                ->where('login', '=', $request->login)


                ->first();

            $request->session()->put('LoginUser',$utilisateur->id );


        }

        return response()->json(['data' => $data]);

    }






}
