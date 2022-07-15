<?php

namespace App\Models;

use App\Types\StatutContrat;
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
        'status_contract',
        'contract_type_id',
        'employe_id',

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
     * @param integer $contract_type_id
     * @param integer $employe_id
     * @return Contract
     */

    public static function addcontract($date_start, $date_end,
                                         $contract_type_id,$employe_id)
    {
        $contract = new Contract();
        $contract->date_start = $date_start;
        $contract->date_end = $date_end;
        $contract->status_contract = StatutContrat::EN_COURS;
        $contract->contract_type_id = $contract_type_id;
        $contract->employe_id = $employe_id;

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

        return $contract = Contract::findOrFail($id);
    }

    /**
     * Update d'un Contract
     * @param date $date_start
     * @param date $date_end

     * @param integer $contract_type_id
     * @param integer $employe_id
     * @param int $id
     * @return  Contract
     */

    public static function updatecontract($date_start, $date_end,
                                           $contract_type_id,$employe_id,
                                          $id)
    {


        return $contract = Contract::findOrFail($id)->update([

            'date_start' => $date_start,
            'date_end' => $date_end,

            'contract_type_id' => $contract_type_id,
            'employe_id' => $employe_id,

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

        $contract = Contract::findOrFail($id)->update([
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

     * @param integer $contract_type_id
     * @param integer $employe_id
     * @param Contract $old_contract
     * @return  array
     */

    public static function isValid($date_start, $date_end,  $contract_type_id,$employe_id,$old_contract = null )
    {

        $data = array();

        $isValid = false;
        $erreurDate_start = '';
        $erreurDate_end = '';
        $erreurEmploye = '';

        $erreurcontract_type_id = '';


        // Verification de la validité des données


        if ($date_start ==='') {
            $erreurDate_start = "La date de début est obligatoire";
        }elseif ($contract_type_id === 0) {
            $erreurcontract_type_id = "Le type de contract est obligatoire";
        }
    elseif ($date_end === '') {
        $erreurDate_end = "La date de  fin  est obligatoire";
}
        elseif ($employe_id === 0) {
            $erreurEmploye = "Le choix de l ' employé   est obligatoire";
        }




        elseif (
            $old_contract == null ||
            $old_contract->date_start !=$date_start ||
            $old_contract->date_end !=$date_end ||
            $old_contract->contract_type_id !=$contract_type_id

        ){
            $erreurEmploye = (Contract::isUnique($date_start, $date_end, $contract_type_id, $employe_id))?'Ce contract  existe déja ':'';

            $isValid = (Contract::isUnique($date_start, $date_end, $contract_type_id,$employe_id))?false:true;
        } else {

            $erreurDate_start = '';
            $erreurDate_end = '';
            $erreurcontract_type_id = '';
            $erreurEmploye = '';


            $isValid = true;
        }

        return $data = [

            'isValid' => $isValid,
            'erreurDate_start' => $erreurDate_start,
            'erreurDate_end' => $erreurDate_end,
            'erreurcontract_type_id' => $erreurcontract_type_id,
            'erreurEmploye' => $erreurEmploye,

        ];
    }

    /**
     * Verifier si le contract existe deja
     *
     * @param string $date_start
     * @param string $date_end

     * @param integer $contract_type_id
     * @param integer $employe_id
     * @return  boolean
     */

    public static function isUnique($date_start, $date_end, $contract_type_id, $employe_id)
    {

        $contract = Contract::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('date_start', '=', $date_start)
            ->where('date_end', '=', $date_end)
            ->where('contract_type_id', '=', $contract_type_id)
            ->where('employe_id', '=', $employe_id)
            ->first();


        if ($contract) {
            return 1;
        }
        return 0;
    }

    /**
     * Obtenir le type de contract lié au contract
     *
     */
    public function contracttype()
    {
        return $this->belongsTo(ContractType::class, 'contract_type_id');
    }


    /**
     * Obtenir l employe  lié au contract
     *
     */
    public function employe()
    {
        return $this->belongsTo(Employe::class, 'employe_id');
    }



    /**
     * Retourne le nombre de jour avant la fin des contrats
     * @param  int $id


     * @return  int $days
     */

    public static function getNbJourBetween($id){

        $contract = Contract::recherchecontractById($id);

        $diff_in_days = 0;

        $date_du_jour = \Carbon\Carbon::today()->format('d/m/Y');

        $date_end = \Carbon\Carbon::parse($contract->date_end)->translatedFormat('d/m/Y');

        $to = \Carbon\Carbon::createFromFormat('d/m/Y', $date_du_jour);

        $from = \Carbon\Carbon::createFromFormat('d/m/Y', $date_end);

            $diff_in_days = $to->diffInDays($from,false);

        return $diff_in_days;

    }


    /**
     * Retourne la liste des  contrats qui finissent bientot



     * @return  array $contracts
     */

    public static function getListeEndingContracts(){

        $array_contracts = array();

        $contracts = Contract::allcontractActifs();

        foreach ($contracts as $contract ){

            $nbjours = Contract::getNbJourBetween($contract->id);

            if(($nbjours < 7) and $nbjours > 0){

                $array_contracts[] = $contract;

            }

        }

        return  $array_contracts;

    }




    /**
     * Retourne le nom  d 'un employe à partir du contrat
     * @param  int $id
     * @return  int $days
     */

    public static function getNameEmploye  ($id){

        $contract = Contract::recherchecontractById($id);
        $nom  =  Employe::getNameEmploye($contract->employe_id);
        return $nom;
    }




    /**
     * Interompre un contrat  d'un Contract

     * @param string $motif_interruption
     * @param integer $status_contract

     * @param int $id
     * @return  Contract
     */

    public static function interrompreContract($motif_interruption, $status_contract,
                                          $id)
    {
        return $contract = Contract::findOrFail($id)->update([

            'status_contract' => StatutContrat::INTERROMPU,
            'date_interruption' => Carbon::today(),
            'motif_interruption' => $motif_interruption,
            'id' => $id,
        ]);
    }



    /**
     * Affiche le nombre total dE CONTRATS
     * @param  int $classe_id


     * @return  int total
     */

    public static function totalContracts (){

        $total = Contract::where ('status','!=',TypeStatus::SUPPRIME)
            ->orderBy('id','DESC')
            ->count()
        ;

        if($total){
            return $total;
        }
        return 0;

    }

}
