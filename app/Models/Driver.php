<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
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
        'first_name',
        'last_name',
        'birth_date',
        'email',
        'telephone',
        'company_id',
        'photo',
        'status',

    ];


    /**
     * Affiche la liste de toutes  les  Drivers
     *
     * @return  array
     */

    public static function allDriverActifs()
    {

        return   $drivers = Driver::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }



    /**
     * Ajouter un Driver
     *
     * @param  string $first_name
     * @param  string $last_name
     * @param  date $birth_date
     * @param  string $email
     * @param  string $telephone
     * @param  integer $company_id
     * @param  string $photo
 * @return  Driver
     */

    public static function addDriver($first_name, $last_name, $birth_date,$email, $telephone, $company_id ,  $photo)
    {


        $driver = new Driver();
        $driver->first_name = $first_name;
        $driver->last_name = $last_name;
        $driver->birth_date = $birth_date;
        $driver->email = $email;
        $driver->telephone = $telephone;
        $driver->company_id = $company_id;

        $driver->photo = $photo;

        $driver->created_at = Carbon::now();

        $driver->save();

        return $driver;
    }


    /**
     * Affiche une Driver
     * @param int $id
     * @return  Driver
     */

    public static function rechercheDriverById($id)
    {

        return   $driver = Driver::findOrFail($id);
    }


    /**
     * Update d ' un Driver
     *
     * @param  string $first_name
     * @param  string $last_name
     * @param  date $birth_date
     * @param  string $email
     * @param  string $telephone
     * @param  integer $company_id
 * @param  string $photo
 * @param int $id
     * @return  Driver
     */

    public static function updateDriver($first_name, $last_name, $birth_date,$email, $telephone, $company_id , $photo,  $id)
    {


        return   $driver = Driver::findOrFail($id)->update([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'birth_date' => $birth_date,
            'email' => $email,
            'telephone' => $telephone,
            'company_id' => $company_id,

            'photo' => $photo,

            'id' => $id,


        ]);
    }


    /**
     * Supprimer un Driver
     *

     * @param int $id
     * @return  boolean
     */

    public static function deleteDriver($id)
    {

        $driver = Driver::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($driver) {
            return 1;
        }
        return 0;
    }


    /**
     * Verifier si le Driver   existe deja
     *

     * @param string $first_name
     * @param string $last_name
     * @param integer $birth_date
     * @return  boolean
     */

    public static function isUnique($first_name, $last_name, $birth_date)
    {

        $driver = Driver::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('first_name', '=', $first_name)
            ->where('last_name', '=', $last_name)
            ->where('birth_date', '=', $birth_date)
            ->first();


        if ($driver === null) {
            return 1;
        }
        return 0;
    }




    /**
     * Verifier  si l' ajout est valide '
     *
     * @param  string $first_name
     * @param  string $last_name
     * @param  string $birth_date
     * @param  string $company_id


     * @return  array
     */

    public static function isValid($first_name, $last_name, $birth_date, $company_id)
    {

        $data = array();

        $isValid = false;
        $erreurFirst_name = '';
        $erreurLast_name = '';
        $erreurBirth_date= '';
        $erreurCompany = '';


        // Verification validite des données


        if (isEmpty($first_name)) {
            $erreurFirst_name = "Le first_name du Driver  est obligatoire" ;
        } elseif ((strlen($first_name) <= 3) || (strlen($first_name) > 250)) {
            $erreurFirst_name = "La longueur du first_name du  Driver est  comprise entre 3 et 250 caractères  ";
        } elseif (isEmpty($last_name)) {
            $erreurLast_name = "Le préfirst_name est obligatoire" ;
        }elseif ((strlen($last_name) <= 3) || (strlen($last_name) > 250)) {
            $erreurFirst_name = "La longueur du préfirst_name du  Driver est  comprise entre 3 et 250 caractères  ";
        }elseif (isEmpty($birth_date)) {
            $erreurBirth_date = "La date de naissance  est obligatoire" ;
        }elseif (isEmpty($company_id)) {
            $erreurCompany = "Le choix de l ' societe   est obligatoire" ;
        }

        elseif (Driver::isUnique($first_name,$last_name,$birth_date )) {
            $erreurFirst_name = "Ce Driver exige dejà " ;
        }



        else {

            $erreurFirst_name = '';
            $erreurLast_name = '';
            $erreurBirth_date = '';
            $erreurCompany = '';

            $isValid = true;
        }

        return  $data = [

            'isValid' => $isValid,
            'erreurFirst_name' => $erreurFirst_name,
            'erreurLast_name' => $erreurLast_name,
            'erreurBirth_date' => $erreurBirth_date,

            'erreurCompany' => $erreurCompany,


        ];
    }



    /**
     * Obtenir la societe     liée au Driver
     *
     */
    public function company ()
    {


        return $this->belongsTo(Company::class, 'company_id');
    }



}
