<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'date_start',
        'date_end',
        'probation',
        'contract_type_id',

    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->status = TypeStatus::ACTIF;
    }

    /**
     * Affichage de la liste des contracts
     *
     * @return  array
     */

    public static function allcontractActifs()
    {

        return $contracts = Contract::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }

    /**
     * Ajouter un Contract
     *
     * @param date $date_start
     * @param date $date_end
     * @param string $probation
     * @param integer $contract_type_id
     * @return Contract
     */

    public static function addcontract($date_start, $date_end, $probation , $contract_type_id)
    {
        $contract = new Contract();
        $contract->date_start = $date_start;
        $contract->date_end = $date_end;
        $contract->probation = $probation;
        $contract->contract_type_id = $contract_type_id;

        $contract->created_at = Carbon::now();

        $contract->save();

        return $contract;
    }

    /**
     * Affichage d'une Contract
     * @param int $id
     * @return  Contract
     */

    public static function recherchecontractById($id)
    {

        return $contract = Contract::enddOrFail($id);
    }

    /**
     * Update d'un Contract
     * @param string $date_start
     * @param string $date_end
     * @param string $probation
     * @param string $contract_type_id
     * @param int $id
     * @return  Contract
     */

    public static function updatecontract($date_start, $date_end, $probation, $contract_type_id, $id)
    {


        return $contract = Contract::enddOrFail($id)->update([

            'date_start' => $date_start,
            'date_end' => $date_end,
            'probation' => $probation,
            'contract_type_id' => $contract_type_id,

            'id' => $id,


        ]);
    }


    /**
     * Supprimer un Contract
     *
     * @param int $id
     * @return  boolean
     */

    public static function deletecontract($id)
    {

        $contract = Contract::enddOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($contract) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout
     * @param string $date_start
     * @param string $date_end
     * @param string $probation
     * @param string $contract_type_id
     * @return  array
     */

    public static function isValid($date_start, $date_end, $probation, $contract_type_id)
    {

        $data = array();

        $isValid = false;
        $erreurDate_start = '';
        $erreurDate_end = '';
        //  $erreurprobation = '';
        $erreurcontract_type_id = '';


        // Verification de la validité des données


        if (isEmpty($date_start)) {
            $erreurDate_start = "La date de début est obligatoire";
        }elseif (isEmpty($contract_type_id)) {
            $erreurcontract_type_id = "Le type de contract est obligatoire";
        } elseif (Contract::isUnique($date_start,$date_end, $probation, $contract_type_id)) {
            $erreurcontract_type_id = "Ce Contract  existe dejà ";
        } else {

            $erreurDate_start = '';
            $erreurDate_end = '';
            $erreurprobation = '';
            $erreurcontract_type_id = '';

            $isValid = true;
        }

        return $data = [

            'isValid' => $isValid,
            'erreurDate_start' => $erreurDate_start,
            'erreurDate_end' => $erreurDate_end,
            'erreurprobation' => $erreurprobation,
            'erreurcontract_type_id' => $erreurcontract_type_id,

        ];
    }

    /**
     * Verifier si le contract existe deja
     *
     * @param string $date_start
     * @param string $date_end
     * @param string $probation
     * @param string $contract_type_id
     * @return  boolean
     */

    public static function isUnique($date_start, $date_end, $probation, $contract_type_id)
    {

        $contract = Contract::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('date_start', '=', $date_start)
            ->where('date_end', '=', $date_end)
            ->where('probation', '=', $probation)
            ->where('contract_type_id', '=', $contract_type_id)
            ->first();


        if ($contract === null) {
            return 1;
        }
        return 0;
    }

    /**
     * Obtenir le type de contract lié au contract
     *
     */
    public function contract_type()
    {


        return $this->belongsTo(Typecontract::class, 'contract_type_id');
    }


}
