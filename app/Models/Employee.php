<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
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

        'matricule',
        'first_name',
        'last_name',
        'birth_date',
        'gender',
        'address',
        'password',
        'phone_perso',
        'phone_pro',
        'email_perso',
        'email_pro',
        'num_cnss',
        'num_policy',
        'photo',
        'nationality_id',
        'contract_id',

        'status',

    ];


    /**
     * Affichage de la liste de tous  les  Employés
     *
     * @return  array
     */

    public static function allEmployeeActifs()
    {

        return   $employeees = Employee::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }



    /**
     * Ajouter une Employee
     * @param  string $matricule
     * @param  string $first_name
     * @param  string $last_name
     * @param  date $birth_date
     * @param  integer $gender
     * @param  string $address
     * @param  string $password
     * @param  string $telephone_pro
     * @param  string $telephone_perso
     * @param  string $email_pro
     * @param  string $email_perso
     * @param  string $num_cnss
     * @param  string $num_policy
     * @param  string $photo
     * @param  integer $nationality_id
     * @param  integer $contract_id
 * @return  Employee
     */

    public static function addEmployee($matricule, $first_name, $last_name, $birth_date, $gender, $address,$password,$telephone_pro, $telephone_perso, $email_pro, $email_perso,$num_cnss , $num_policy, $photo,$nationality_id,$contract_id)
    {


        $employee = new Employee();
        $employee->matricule = $matricule;
        $employee->first_name = $first_name;
        $employee->last_name = $last_name;
        $employee->birth_date = $birth_date;
        $employee->gender = $gender;
        $employee->address = $address;
        $employee->password = $password;
        $employee->telephone_pro = $telephone_pro;
        $employee->telephone_perso = $telephone_perso;
        $employee->email_pro = $email_pro;
        $employee->email_perso = $email_perso;
        $employee->num_cnss = $num_cnss;
        $employee->num_policy= $num_policy;
        $employee->photo = $photo;
        $employee->nationality_id = $nationality_id;
        $employee->contract_id = $contract_id;

        $employee->created_at = Carbon::now();

        $employee->save();

        return $employee;
    }


    /**
     * Affiche une Employee
     * @param int $id
     * @return  Employee
     */

    public static function rechercheEmployeeById($id)
    {

        return   $employee = Employee::findOrFail($id);
    }


    /**
     * Update d'un Employee
     *
     * @param  string $matricule
     * @param  string $first_name
     * @param  string $last_name
     * @param  date $birth_date
     * @param  integer $gender
     * @param  string $address
     * @param  string $password
     * @param  string $telephone_pro
     * @param  string $telephone_perso
     * @param  string $email_pro
     * @param  string $email_perso
     * @param  string $num_cnss
     * @param  string $num_policy
     * @param  string $photo
     * @param  integer $nationality_id
     * @param  integer $contract_id
     * @param int $id
     * @return  Employee
     */

    public static function updateEmployee($matricule, $first_name, $last_name, $birth_date, $gender, $address,$password,$telephone_pro, $telephone_perso, $email_pro, $email_perso,$num_cnss , $num_policy, $photo,$nationality_id,$contract_id, $id)
    {


        return   $employee = Employee::findOrFail($id)->update([
            'matricule'=>$matricule,
            'last_name' => $first_name,
            'first_name' => $last_name,
            'birth_date' => $birth_date,
            'gender' => $gender,
            'address' => $address,
            'password' => $password,
            'telephone_pro' => $telephone_pro,
            'telephone_perso' => $telephone_perso,
            'email_pro' => $email_pro,
            'email_perso' => $email_perso,
            'num_cnss' => $num_cnss,
            'num_policy' => $num_policy,
            'photo' => $photo,
            'nationality_id' => $nationality_id,
            'contract_id' => $contract_id,

            'id' => $id,


        ]);
    }


    /**
     * Supprimer un Employee
     *

     * @param int $id
     * @return  boolean
     */

    public static function deleteEmployee($id)
    {

        $employee = Employee::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($employee) {
            return 1;
        }
        return 0;
    }


    /**
     * Verifier si l' Employee   existe deja
     *
    //  * @param string $matricule
     * @param string $first_name
     * @param string $last_name
     * @param date $birth_date
     * @param integer $nationality_id

     * @return  boolean
     */

    public static function isUnique($matricule, $first_name, $last_name, $birth_date, $nationality_id )
    {

        $employee = Employee::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('matricule', '=', $matricule)
            ->where('first_name', '=', $last_name)
            ->where('last_name', '=', $first_name)
            ->where('birth_date', '=', $birth_date)
            ->where('departement_id', '=', $nationality_id)

            ->first();


        if ($employee === null) {
            return 1;
        }
        return 0;
    }


    /**
     * Verifier  si l' ajout est valide '
     * @param string $matricule
     * @param string $first_name
     * @param string $last_name
     * @param date $birth_date
     * @param integer $nationality_id


     * @return  array
     */

    public static function isValid($matricule, $first_name, $last_name, $birth_date , $nationality_id)
    {

        $data = array();

        $isValid = false;
        $erreurMatricule = '';
        $erreurLast_name = '';
        $erreurFirst_name = '';
        $erreurBirth_date = '';
        $erreurNationality_id = '';



        // Verification de la validité des données


        if (isEmpty($matricule)) {
            $erreurMatricule = "Le matricule  est obligatoire" ;
        }  elseif (isEmpty($first_name)) {
            $erreurLast_name = "Le préfirst_name est obligatoire" ;
        }
        elseif (isEmpty($last_name)) {
            $erreurFirst_name = "Le first_name est obligatoire" ;
        }
        elseif (isEmpty($birth_date)) {
            $erreurBirth_date = "La date de naissance est obligatoire" ;
        }

        elseif (Employee::isUnique($matricule, $first_name, $last_name, $birth_date,$nationality_id )) {
            $erreurFirst_name = "Cet employe  existe dejà " ;
        }


        else {

            $erreurMatricule = '';
            $erreurLast_name = '';
            $erreurFirst_name = '';
            $erreurBirth_date = '';
            $erreurNationality_id = '';

            $isValid = true;
        }

        return  $data = [

            'isValid' => $isValid,
            'erreurMatricule' => $erreurMatricule,
            'erreurlast_name'=>$erreurLast_name,
            'erreurfirst_name' => $erreurFirst_name,
            'erreurbirth_date' => $erreurBirth_date,
            'erreurnationality_id' => $erreurNationality_id,



        ];
    }



    /**
     * Obtenir la nationalité de l' employé
     *
     */
    public function nationality ()
    {


        return $this->belongsTo(Nationality::class, 'nationality_id');
    }


    /**
     * Obtenir le contrat lié à l' employé
     *
     */
    public function contract()
    {


        return $this->belongsTo(Contract::class, 'contract_id');
    }



    /**
     * Affiche le first_namebre total d ' employés  par departement
     * @param  int $departement_id


     * @return  int total
     */

    public static function totalEmployeeDepartement ($departement_id){

        $total = Employee::where ('status','!=',TypeStatus::SUPPRIME)

            ->where('departement_id', '=',$departement_id )
            ->orderBy('id','DESC')
            ->count()

        ;

        if($total){
            return $total;
        }
        return 0;

    }

}
