<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Business;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContractController extends Controller
{



    /**
     * Affiche la  liste des Familys
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $contracts = Contract::allcontractActifs();

        return view('contract.index')->with('contracts',$contracts);


    }


    /**
     * Affiche le formulaire d'ajout
     *
     * @return \Illuminate\Http\Response
     */

    public function add()
    {



        return view('contract.add');


    }



    /**
     * Ajouter une nouvelle Family   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = Contract::isValid(
            $request->date_start,
            $request->date_end,
            $request->probation,
            $request->contract_type_id

        );

        if ($data['isValid'])
        {
            // Enregistrement du Family

            Contract::addcontract(
                $request->date_start,
                $request->date_end,
                $request->probation,
                $request->contract_type_id

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

        $data = Contract::recherchecontractById($id);

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


        $data = Contract::isValid(
            $request->date_start,
            $request->date_end,
            $request->probation,
            $request->contract_type_id


        );

        if ($data['isValid'])
        {
            // UpDate du Family
            Contract::updatecontract(
                $request->date_start,
                $request->date_end,
                $request->probation,
                $request->contract_type_id,
                $id
            );


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
        $delete = Contract::recherchecontractById($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Successful deletion";
        } else {
            $success = true;
            $message = "This business does not exist";
        }

        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }






}
