<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Types\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EmployeController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::EMPLOYEE;
    }


    /**
     * Affiche la  liste des Employes
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $employes = Employe::allEmployeeActifs();

        return view('employe.index')->with(
            [
                'employes' => $employes,
                 'active' => $this->active

            ]


        );


    }






    /**
     * Ajouter une nouvelle Employe   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {


        $data = Employe::isValid(
            $request->matricule,
            $request->first_name,
            $request->last_name,
            $request->birth_date_correct,
            $request->departement_id,
            $request->gender,
            $request->type,

        );

        if ($data['isValid'])
        {
            // Enregistrement du Employe

            Employe::addEmployee(
               $request->matricule,
               $request->first_name,
               $request->first_name,
               $request->usual_name,
               $request->emergency_contact,
               $request->birth_date,
               $request->birth_date_correct,
               $request->date_debut,
               $request->date_fin,
               $request->gender,
               $request->type,
               $request->is_contrat,
               $request->address,
               $request->password,
               $request->phone_perso,
               $request->phone_pro,
               $request->email_perso,
               $request->email_pro,
               $request->num_cnss,
               $request->num_policy,
               $request->civile,
               $request->photo,
               $request->contract_id,
               $request->categorie_id,
               $request->former_employer_id,
               $request->continent_id,
               $request->region_id,
               $request->countrie_id,
               $request->prefecture_id,
               $request->coutume_id,
               $request->band_id,



            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Employe
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Employe::rechercheEmployeeById($id);



        return response()->json($data);


    }


    /**
     * Update  un Employe
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {
        $old_employe = Employe::rechercheEmployeeById($id);

        $data = Employe::isValid(
            $request->matricule,
            $request->first_name,
            $request->last_name,
            $request->birth_date_correct,
            $request->countrie_id,
            $request->gender,
            $request->type,
            $old_employe

        );


        if ($data['isValid'])
        {
            // UpDate du Employe
            Employe::updateEmployee(
                $request->matricule,
                $request->first_name,
                $request->first_name,
                $request->usual_name,
                $request->emergency_contact,
                $request->birth_date,
                $request->birth_date_correct,
                $request->date_debut,
                $request->date_fin,
                $request->gender,
                $request->type,
                $request->is_contrat,
                $request->address,
                $request->password,
                $request->phone_perso,
                $request->phone_pro,
                $request->email_perso,
                $request->email_pro,
                $request->num_cnss,
                $request->num_policy,
                $request->civile,
                $request->photo,
                $request->contract_id,
                $request->categorie_id,
                $request->former_employer_id,
                $request->continent_id,
                $request->region_id,
                $request->countrie_id,
                $request->prefecture_id,
                $request->coutume_id,
                $request->band_id,
                $id

            );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Employe scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Employe::deleteEmployee($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "L' Employe  n' est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
