<?php

namespace App\Http\Controllers;

use App\Models\ContractType;
use App\Types\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContractTypeController extends Controller
{


   private      $active;

    public function __construct()
    {

        $this->active = Menu::CONTRACT_TYPE;
    }


    /**
     * Affiche la  liste des ContractTypes
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $contracttypes = ContractType::allContractTypeActifs();

        return view('contracttype.index')->with(
            [
                'contracttypes' => $contracttypes,
                 'active' => $this->active

            ]


        );


    }






    /**
     * Ajouter une nouvelle ContractType   .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request)
    {
        $data = ContractType::isValid(
            $request->libelle,



        );

        if ($data['isValid'])
        {
            // Enregistrement du ContractType

            ContractType::addContractType(
               $request->libelle,



            ) ;

        }

        return response()->json(['data' => $data]);

    }


    /**
     * Afficher  un ContractType
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
     * Update  un ContractType
     *
     * @param  int  $int
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request,  $id)
    {
        $old_ContractType = ContractType::rechercheContractTypeById($id);

        $data = ContractType::isValid(
          $request->libelle,
            $old_ContractType

        );


        if ($data['isValid'])
        {
            // UpDate du ContractType
            ContractType::updateContractType(
                 $request->libelle,


                $id );


        }

        return response()->json(['data' => $data]);

    }



    /**
     * Supprimer   une  ContractType scolaire .
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
            $message = "Suppression effectuée avec succès ";
        } else {
            $success = true;
            $message = "Le ContractType  n est pas trouvé ";
        }


        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }


}
