<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function __construct(array $attributes=[])
    {
        parent::__construct($attributes);
        $this->status=TypeStatus::ACTIF;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'manager',
        'email',
        'telephone',
        'address',
    ];

    /**
     * Affichage de la liste de toutes  les Companys
     *
     * @return  array
     */

    public static function allCompanyActifs()
    {

        return   $companies = Company::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter une Company
     *
     * @param  string $name
     * @param  string $manager
     * @param  string $email
     * @param  string $telephone
     * @param  string $address
     * @return Company
     */

    public static function addCompany($name, $manager, $email,$telephone,$address)
    {
        $company = new Company();
        $company->name = $name;
        $company->manager = $manager;
        $company->email = $email;
        $company->telephone = $telephone;
        $company->address = $address;

        $company->created_at = Carbon::now();

        $company->save();

        return $company;
    }

    /**
     * Affichage d'une Company
     * @param int $id
     * @return  Company
     */

    public static function rechercheCompanyById($id)
    {

        return   $company = Company::findOrFail($id);
    }

    /**
     * Update d'une Company
     * @param  string $name
     * @param  string $manager
     * @param  string $email
     * @param  string $telephone
     * @param  string $address
     * @param int $id
     * @return  Company
     */

    public static function updateCompany( $libelle, $name, $manager, $email, $telephone, $address, $id)
    {


        return   $company = Company::findOrFail($id)->update([

            'name' => $name,
            'manager' => $manager,
            'email' => $email,
            'telephone' => $telephone,
            'address' => $address,

            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Company
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteCompany($id)
    {

        $company = Company::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($company) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si la Company existe deja
     *

     * @param  string $name
     * @param  string $manager
     * @param  string $email
     * @param  string $telephone
     * @param  string $address

     * @return  boolean
     */

    public static function isUnique($name, $manager, $email, $telephone, $address )
    {

        $company = Company::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('name', '=', $name)
            ->where('manager', '=', $manager)
            ->where('email', '=', $email)
            ->where('telephone', '=', $telephone)
            ->where('address', '=', $address)

            ->first();


        if ($company === null) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout
     * @param  string $name
     * @param  string $manager
     * @param  string $email
     * @param  string $telephone
     * @param  string $address


     * @return  array
     */

    public static function isValid($name, $manager, $email , $telephone, $address)
    {

        $data = array();

        $isValid = false;
        $erreurName = '';
        $erreurManager = '';
        $erreurEmail = '';
        $erreurTelephone = '';
        $erreurAddress='';



        // Verification de la validité des données


        if (isEmpty($name)) {
            $erreurName = "La dénomination est obligatoire" ;
        }  elseif (isEmpty($manager)) {
            $erreurManager = "Le nom du manager est obligatoire" ;
        }elseif (isEmpty($email)) {
            $erreurEmail = "L'email de l'Company est obligatoire" ;
        }
        elseif (isEmpty($telephone)) {
            $erreurTelephone = "Le téléphone est obligatoire" ;
        }
        elseif (isEmpty($address)) {
            $erreurAddress = "L'address est obligatoire" ;
        }

        elseif (Company::isUnique($name, $manager, $email,$telephone, $address )) {
            $erreurName = "Cette Company  existe dejà " ;
        }


        else {

            $erreurName = '';
            $erreurManager = '';
            $erreurEmail = '';
            $erreurTelephone = '';
            $erreurAddress ='';

            $isValid = true;
        }

        return  $data = [

            'isValid' => $isValid,
            'erreurname' => $erreurName,
            'erreurmanager' => $erreurManager,
            'erreurEmail' => $erreurEmail,
            'erreurTelephone' => $erreurTelephone,
            'erreuraddress'=>$erreurAddress,

        ];
    }

}
