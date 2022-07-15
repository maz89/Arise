<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Types\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContractController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::CONTRACT;
    }


    /**
     * Affiche la  liste des Contracts
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $contracts = Contract::allContractActifs();

        return view('contract.index')->with(
            [
                'contracts' => $contracts,
                 'active' => $this->active

            ]


        );


    }






    /**
     * Ajouter une nouvelle Contract   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {



        $data = Contract::isValid(
            $request->date_start,
            $request->date_end,
            (int)    $request->contract_type_id,
            (int)    $request->employe_id



        );

        if ($data['isValid'])
        {
            // Enregistrement du Contract

            Contract::addContract(
                $request->date_start,
                $request->date_end,

                (int)    $request->contract_type_id,
                (int)    $request->employe_id,



            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un Contract
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit ($id)
    {

        $data = Contract::rechercheContractById($id);



        return response()->json($data);


    }


    /**
     * Update  un Contract
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {
        $old_contract = Contract::rechercheContractById($id);

        $data = Contract::isValid(
            $request->date_start,
            $request->date_end,
            (int)    $request->contract_type_id,
            (int)    $request->employe_id,
            $old_contract

        );


        if ($data['isValid'])
        {
            // UpDate du Contract
            Contract::updateContract(
                $request->date_start,
                $request->date_end,

                (int)    $request->contract_type_id,
                (int)    $request->employe_id,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  Contract scolaire .
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request,$id)
    {
        $delete = Contract::deleteContract($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "Le Contract  n' est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
