<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankInfo extends Model
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
        'bank_code',
        'agency_code',
        'num_account',
        'rib',
        'employee_id',
        'status',

    ];


    /**
     * Affiche la liste de toutes  les  InformationBancaires
     *
     * @return  array
     */

    public static function allBankInfoActifs()
    {

        return   $banks = BankInfo::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }



    /**
     * Ajouter une Information Bancaire
     *
     * @param  string $bank_code
     * @param  string $agency_code
     * @param  string $num_account
     * @param  string $rib
     * @param  integer $employee_id
 * @return  BankInfo
     */

    public static function addBankInfo($bank_code, $agency_code, $num_account, $rib, $employee_id)
    {


        $bank = new BankInfo();
        $bank->bank_code = $bank_code;
        $bank->agency_code = $agency_code;
        $bank->num_account = $num_account;
        $bank->rib = $rib;
        $bank->employee_id = $employee_id;

        $bank->created_at = Carbon::now();

        $bank->save();

        return $bank;
    }


    /**
     * Affiche une InformationBancaire
     * @param int $id
     * @return  BankInfo
     */

    public static function rechercheBankInfoById($id)
    {

        return   $bank = BankInfo::findOrFail($id);
    }


    /**
     * Update d ' une Information Bancaire
     *
     * @param  string $bank_code
     * @param  string $agency_code
     * @param  string $num_account
     * @param  string $rib
     * @param  integer $employee_id
 * @param int $id
     * @return  BankInfo
     */

    public static function updateBankInfo($bank_code, $agency_code, $num_account, $rib, $employee_id,  $id)
    {


        return   $bank = BankInfo::findOrFail($id)->update([
            'bank_code' => $bank_code,
            'agency_code' => $agency_code,
            'num_account' => $num_account,
            'rib' => $rib,
            'employee_id' => $employee_id,



            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Information Bancaire
     *

     * @param int $id
     * @return  boolean
     */

    public static function deleteBankInfo($id)
    {

        $bank = BankInfo::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($bank) {
            return 1;
        }
        return 0;
    }


    /**
     * Verifier si le Rib   existe deja
     *

     * @param string $bank_code
     * @param string $rib
     * @return  boolean
     */

    public static function isRibUnique($bank_code, $rib)
    {

        $bank = BankInfo::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('bank_code', '=', $bank_code)
            ->where('rib', '=', $rib)
            ->first();


        if ($bank === null) {
            return 1;
        }
        return 0;
    }



    /**
     * Verifier si le numéro   existe deja
     *

     * @param string $bank_code
     * @param string $num_account
     *
     * @return  boolean
     */

    public static function isNumeroUnique($bank_code, $num_account)
    {

        $bank = Infbank::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('bank_code', '=', $bank_code)
            ->where('num_account', '=', $num_account)
            ->first();


        if ($bank === null) {
            return 1;
        }
        return 0;
    }



    /**
     * Verifier  si l' ajout est valide '
     *
     * @param  string $bank_code
     * @param  string $rib
     * @param  string $num_account
     * @param  string $employee_id


     * @return  array
     */

    public static function isValid($bank_code, $rib, $num_account, $employee_id)
    {

        $data = array();

        $isValid = false;
        $erreurBanque = '';
        $erreurRib = '';
        $erreurNumero = '';
        $erreurEmploye = '';

        // Verification validite des données


        if (isEmpty($bank_code)) {
            $erreurBanque = "Le code  est obligatoire" ;
        }  elseif (isEmpty($rib)) {
            $erreurRib = "La clé RIB   est obligatoire" ;
        }
        elseif (isEmpty($num_account)) {
            $erreurNumero = "Le numéro de compte   est obligatoire" ;
        }
        elseif (isEmpty($employee_id)) {
            $erreurEmploye = "Le choix de l ' employe  est obligatoire" ;
        }

        elseif (BankInfo::isNumeroUnique($bank_code, $num_account) ){
            $erreurEmploye = "Ce numéro de compte  existe dejà " ;
        }

        elseif (BankInfo::isRibUnique($bank_code,$rib )) {
            $erreurEmploye = "Ce code RIB  existe dejà " ;
        }



        else {

            $erreurBanque = '';
            $erreurRib = '';
            $erreurNumero = '';
            $erreurEmploye = '';
            $isValid = true;
        }

        return  $data = [

            'isValid' => $isValid,
            'erreurBanque' => $erreurBanque,
            'erreurRib' => $erreurRib,
            'erreurNumero' => $erreurNumero,
            'erreurEmploye' => $erreurEmploye,

        ];
    }




    /**
     * Obtenir l ' employe     liée à l' élève
     *
     */
    public function employee()
    {


        return $this->belongsTo(Employe::class, 'employee_id');
    }
}
