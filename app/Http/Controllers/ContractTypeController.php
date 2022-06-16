<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\ContractType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContractTypeController extends Controller
{



    /**
     * Affiche la  liste des Familys
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $contract_types = ContractType::allContractTypeActifs();

        return view('contract type.index')->with('contract_types',$contract_types);


    }


    /**
     * Affiche le formulaire d'ajout
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {



        return view('contract type.add');


    }


    /**
     * Ajouter une nouvelle Family   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = ContractType::isValid(
            $request->name



        );

        if ($data['isValid'])
        {
            // Enregistrement du Family

            ContractType::addContractType(

                $request->name

            );

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Family
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = ContractType::rechercheContractTypeById($id);

        return response()->json($data);


    }


    /**
     * Update  un Family
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {


        $data = ContractType::isValid(
            $request->name


        );

        if ($data['isValid'])
        {
            // UpDate du Family
            ContractType::updateContractType(
                $request->name,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Family scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = ContractType::deleteContractType($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "contract deleted";
        } else {
            $success = false;
            $message = "This contract does not exist";
        }

        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
