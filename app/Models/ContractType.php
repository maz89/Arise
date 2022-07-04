<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractType extends Model
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
     * Affiche la liste de tous  les  Types de Contrats
     *
     * @return  array
     */

    public static function allContractTypeActifs()
    {

        return   $contract_types = ContractType::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }



    /**
     * Ajouter un Type de Contract
     *
     * @param  string $name
 * @return  ContractType
     */

    public static function addContractType($name  )
    {


        $contract_type = new ContractType();
        $contract_type->name = $name;

        $contract_type->created_at = Carbon::now();

        $contract_type->save();

        return $contract_type;
    }


    /**
     * Affichage d'un ContractType
     * @param int $id
     * @return  ContractType
     */

    public static function rechercheContractTypeById($id)
    {

        return   $contract_type = ContractType::findOrFail($id);
    }


    /**
     * Update d'un ContractType
     *
     * @param  string $name
 * @param int $id
     * @return  ContractType
     */

    public static function updateContractType($name, $id)
    {


        return   $contract_type = ContractType::findOrFail($id)->update([
            'name' => $name,

            'id' => $id,


        ]);
    }


    /**
     * Supprimer un Type de Contract
     *

     * @param int $id
     * @return  boolean
     */

    public static function deleteContractType($id)
    {

        $contract_type = ContractType::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($contract_type) {
            return 1;
        }
        return 0;
    }


    /**
     * Verifier si le ContractType existe deja
     *


     * @param string $name
     * @return  boolean
     */

    public static function isUnique($name )
    {

        $contract_type = ContractType::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('name', '=', $name)

            ->first();

        if ($contract_type) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier  si l' ajout est valide '
     *
     * @param string $name
     * @param ContractType $old_contrattype


     * @return  array
     */

    public static function isValid($name,  $old_contrattype = null)
    {

        $data = array();

        $isValid = false;
        $erreurName = '';



        // Verification validite des données


        if ($name=='') {
            $erreurName = "Le name   est obligatoire" ;
        }

        elseif (
            $old_contrattype == null ||
            $old_contrattype->name != $name

        ){
            $erreurName = (ContractType::isUnique($name))?'Ce name existe déja ':'';

            $isValid = (ContractType::isUnique($name))?false:true;
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
