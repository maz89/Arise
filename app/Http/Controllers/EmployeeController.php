<?php

namespace App\Http\Controllers;

use App\Models\BusinessUnit;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EmployeeController extends Controller
{



    /**
     * Affiche la  liste des Businesss
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $employees = Employee::allEmployeeActifs();

        return view('employee.index')->with('employees',$employees);


    }

    public function add()
    {



        return view('employee.add');


    }


    /**
     * Ajouter une nouvelle Business   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Employee::isValid(
            $request->matricule,
            $request->first_name,
            $request->last_name,
            $request->birth_date,
            $request->nationality_id

        );



        if ($data['isValid'])
        {
            // Enregistrement du Business

            Employee::addEmployee(

                $request->matricule,
                $request->first_name,
                $request->last_name,
                $request->birth_date,
                $request->gender,
                $request->address,
                $request->password,
                $request->phone_perso,
                $request->phone_pro,
                $request->email_perso,
                $request->email_pro,
                $request->num_cnss,
                $request->num_policy,
                $request->photo,
                $request->nationality_id,
                $request->contract_id

            );


        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Business
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Employee::rechercheEmployeeById($id);

        return response()->json($data);


    }


    /**
     * Update  un Business
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {


        $data = Employee::isValid(

            $request->matricule,
            $request->first_name,
            $request->last_name,
            $request->birth_date,
            $request->nationality_id

        );

        if ($data['isValid'])
        {
            // UpDate du Business
            Employee::updateEmployee(

                $request->matricule,
                $request->first_name,
                $request->last_name,
                $request->birth_date,
                $request->gender,
                $request->address,
                $request->password,
                $request->phone_perso,
                $request->phone_pro,
                $request->email_perso,
                $request->email_pro,
                $request->num_cnss,
                $request->num_policy,
                $request->photo,
                $request->nationality_id,
                $request->contract_id,
                $request->id

            );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Business scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Employee::deleteEmployee($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "successful deletion";
        } else {
            $success = true;
            $message = "Employee not found";
        }

        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
