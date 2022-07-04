<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
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
        'usual_name',
        'emergency_contact',
        'birth_date',
        'birth_date_correct',
        'date_debut',
        'date_fin',
        'gender',
        'type',
        'is_contrat',
        'address',
        'phone_perso',
        'phone_pro',
        'email_perso',

        'email_pro',
        'num_cnss',
        'num_policy',
        'civile',
        'photo',
        'contract_id',
        'categorie_id',
        'former_employer_id',

        'continent_id',
        'region_id',
        'countrie_id',
        'prefecture_id',
        'coutume_id',
        'band_id',
        'niveau_id',
        'contract_type_id',
        'departement_id',
        'position_id',



        'status',

    ];


    /**
     * Affichage de la liste de tous  les  Employés
     *
     * @return  array
     */

    public static function allEmployeeActifs()
    {

        return   $employes = Employe::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }



    /**
     * Ajouter une Employee
     * @param  string $matricule
     * @param  string $first_name
     * @param  string $last_name
     * @param  string $usual_name
     * @param  string $emergency_contact
     * @param  date $birth_date
     * @param  date $birth_date_correct
     * @param  date $date_debut
     * @param  date $date_fin
     * @param  integer $gender
     * @param  integer $type
     * @param  integer $is_contrat
     * @param  string $address
     * @param  string $password
     * @param  string $phone_perso
     * @param  string $phone_pro
     * @param  integer $email_perso
     * @param  integer $email_pro
     * @param  integer $num_cnss
     * @param  integer $num_policy
     * @param  integer $civile
     * @param  integer $photo
     * @param  integer $contract_id
     * @param  integer $categorie_id
     * @param  integer $former_employer_id
     * @param  integer $continent_id
     * @param  integer $region_id
     * @param  integer $countrie_id
     * @param  integer $prefecture_id
     * @param  integer $coutume_id
     * @param  integer $band_id
 * @return  Employe
     */

    public static function addEmployee($matricule, $first_name, $last_name,
                                       $usual_name, $emergency_contact, $birth_date,$birth_date_correct,
                                       $date_debut, $date_fin,
                                       $gender, $type,$is_contrat ,
                                       $address, $password,$phone_perso,
                                       $phone_pro,  $email_perso,$email_pro,$num_cnss,$num_policy,
                                       $civile, $photo,$contract_id,$categorie_id,$former_employer_id,
                                       $continent_id,  $region_id,$countrie_id,$prefecture_id,$coutume_id,$band_id)
    {


        $employee = new Employe();
        $employee->matricule = $matricule;
        $employee->first_name = $first_name;
        $employee->last_name = $last_name;
        $employee->usual_name = $usual_name;
        $employee->emergency_contact = $emergency_contact;
        $employee->birth_date = $birth_date;
        $employee->birth_date_correct = $birth_date_correct;
        $employee->date_debut = $date_debut;
        $employee->date_fin = $date_fin;
        $employee->gender = $gender;
        $employee->type = $type;
        $employee->is_contrat = $is_contrat;
        $employee->address = $address;
        $employee->password = $password;
        $employee->phone_perso= $phone_perso;
        $employee->phone_pro = $phone_pro;
        $employee->email_perso = $email_perso;
        $employee->email_pro = $email_pro;
        $employee->num_cnss = $num_cnss;
        $employee->num_policy = $num_policy;
        $employee->civile = $civile;
        $employee->photo = $photo;
        $employee->contract_id = $contract_id;
        $employee->categorie_id = $categorie_id;
        $employee->former_employer_id = $former_employer_id;
        $employee->continent_id = $continent_id;
        $employee->region_id = $region_id;
        $employee->countrie_id = $countrie_id;
        $employee->prefecture_id = $prefecture_id;
        $employee->coutume_id = $coutume_id;
        $employee->band_id = $band_id;


        $employee->created_at = Carbon::now();

        $employee->save();

        return $employee;
    }


    /**
     * Affiche une Employee
     * @param int $id
     * @return  Employe
     */

    public static function rechercheEmployeeById($id)
    {

        return   $employee = Employe::findOrFail($id);
    }


    /**
     * Update d'un Employee
     *
     * @param  string $matricule
     * @param  string $first_name
     * @param  string $last_name
     * @param  string $usual_name
     * @param  string $emergency_contact
     * @param  date $birth_date
     * @param  date $birth_date_correct
     * @param  date $date_debut
     * @param  date $date_fin
     * @param  integer $gender
     * @param  integer $type
     * @param  integer $is_contrat
     * @param  string $address
     * @param  string $password
     * @param  string $phone_perso
     * @param  string $phone_pro
     * @param  integer $email_perso
     * @param  integer $email_pro
     * @param  integer $num_cnss
     * @param  integer $num_policy
     * @param  integer $civile
     * @param  integer $photo
     * @param  integer $contract_id
     * @param  integer $categorie_id
     * @param  integer $former_employer_id
     * @param  integer $continent_id
     * @param  integer $region_id
     * @param  integer $countrie_id
     * @param  integer $prefecture_id
     * @param  integer $coutume_id
     * @param  integer $band_id
     * @param int $id
     * @return  Employe
     */

    public static function updateEmployee(
        $matricule, $first_name, $last_name,
        $usual_name, $emergency_contact, $birth_date,$birth_date_correct,
        $date_debut, $date_fin,
        $gender, $type,$is_contrat ,
        $address, $password,$phone_perso,
        $phone_pro,  $email_perso,$email_pro,$num_cnss,$num_policy,
        $civile, $photo,$contract_id,$categorie_id,$former_employer_id,
        $continent_id,  $region_id,$countrie_id,$prefecture_id,$coutume_id,$band_id, $id)
    {


        return   $employee = Employe::findOrFail($id)->update([
            'matricule'=>$matricule,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'usual_name' => $usual_name,
            'emergency_contact' => $emergency_contact,
            'birth_date' => $birth_date,
            'birth_date_correct' => $birth_date_correct,
            'date_debut' => $date_debut,
            'date_fin' => $date_fin,
            'gender' => $gender,
            'type' => $type,
            'is_contrat' => $is_contrat,
            'address' => $address,
            'password' => $password,
            'phone_perso' => $phone_perso,
            'phone_pro' => $phone_pro,
            'email_perso' => $email_perso,
            'email_pro' => $email_pro,
            'num_cnss' => $num_cnss,
            'num_policy' => $num_policy,
            'civile' => $civile,
            'photo' => $photo,
            'contract_id' => $contract_id,
            'categorie_id' => $categorie_id,
            'former_employer_id' => $former_employer_id,
            'continent_id' => $continent_id,
            'region_id' => $region_id,
            'countrie_id' => $countrie_id,
            'prefecture_id' => $prefecture_id,
            'coutume_id' => $coutume_id,
            'band_id' => $band_id,

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

        $employe = Employe::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($employe) {
            return 1;
        }
        return 0;
    }


    /**
     * Verifier si l' Employee   existe deja
     *
     * @param string $matricule


     * @return  boolean
     */

    public static function isUnique($matricule )
    {

        $employee = Employe::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('matricule', '=', $matricule)


            ->first();


        if ($employee) {
            return 1;
        }
        return 0;
    }


    /**
     * Verifier  si l' ajout est valide '
     * @param string $matricule
     * @param string $first_name
     * @param string $last_name
     * @param date $birth_date_correct
     * @param integer $departement_id
     * @param integer $gender
     * @param integer $type
     * @param Employe $old_employe


     * @return  array
     */

    public static function isValid($matricule, $first_name, $last_name, $birth_date_correct , $departement_id, $gender, $type, $old_employe=null)
    {

        $data = array();

        $isValid = false;
        $erreurMatricule = '';
        $erreurLast_name = '';
        $erreurFirst_name = '';
        $erreurBirth_date = '';
        $erreurdepartement_id = '';
        $erreurtype = '';
        $erreurgender = '';



        // Verification de la validité des données


        if ($matricule === '') {
            $erreurMatricule = "Le matricule  est obligatoire" ;
        }  elseif ($first_name ==='') {
            $erreurFirst_name = "Le fisrt name  est obligatoire" ;
        }
        elseif ($last_name ==='') {
            $erreurLast_name = "Le lastname  est obligatoire" ;
        }
        elseif ($birth_date_correct === '') {
            $erreurBirth_date = "La date de naissance est obligatoire" ;
        }

        elseif ($departement_id === 0) {
            $erreurdepartement_id = "La nationaite  est obligatoire" ;
        }

        elseif ($type === 0) {
            $erreurtype = "Le type d 'employé   est obligatoire" ;
        }

        elseif ($gender === 0) {
            $erreurgender = "Le type d 'employé   est obligatoire" ;
        }

        elseif (
            $old_employe == null ||
            $old_employe->matricule !=$matricule

        ){
            $erreurMatricule = (Employe::isUnique($matricule))?'Ce employé avec ce matricule  existe déja ':'';

            $isValid = (Employe::isUnique($matricule))?false:true;
        }



        else {

            $erreurMatricule = '';
            $erreurLast_name = '';
            $erreurFirst_name = '';
            $erreurBirth_date = '';
            $erreurdepartement_id = '';
            $erreurtype = '';
            $erreurgender = '';

            $isValid = true;
        }

        return  $data = [

            'isValid' => $isValid,
            'erreurMatricule' => $erreurMatricule,
            'erreurlast_name'=>$erreurLast_name,
            'erreurfirst_name' => $erreurFirst_name,
            'erreurbirth_date' => $erreurBirth_date,
            'erreurdepartement_id' => $erreurdepartement_id,
            'erreurtype' => $erreurtype,
            'erreurgender' => $erreurgender,



        ];
    }



    /**
     * Obtenir la nationalité de l' employé
     *
     */
    public function countrie ()
    {


        return $this->belongsTo(Countrie::class, 'countrie_id');
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
     * Obtenir la categorie  liée à l' employé
     *
     */
    public function categorie()
    {


        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    /**
     * Obtenir la former employeur   liée à l' employé
     *
     */
    public function formeremployer()
    {


        return $this->belongsTo(FormerEmployer::class, 'former_employer_id');
    }

    /**
     * Obtenir  le continent    liée à l' employé
     *
     */
    public function continent()
    {


        return $this->belongsTo(Continent::class, 'continent_id');
    }

    /**
     * Obtenir  la region    liée à l' employé
     *
     */
    public function region()
    {


        return $this->belongsTo(Region::class, 'region_id');
    }



    /**
     * Obtenir  la prefecture    liée à l' employé
     *
     */
    public function prefecture()
    {


        return $this->belongsTo(Prefecture::class, 'prefecture_id');
    }

    /**
     * Obtenir  la coutume     liée à l' employé
     *
     */
    public function coutume()
    {


        return $this->belongsTo(Coutume::class, 'coutume_id');
    }


    /**
     * Obtenir  la band      liée à l' employé
     *
     */
    public function band()
    {


        return $this->belongsTo(Band::class, 'band_id');
    }

    /**
     * Obtenir  le departement       liée à l' employé
     *
     */
    public function departement()
    {


        return $this->belongsTo(Departement::class, 'departement_id');
    }




    /**
     * Affiche le nombre total d ' employes
     * @param  int $classe_id


     * @return  int total
     */

    public static function totalEmploye (){

        $total = Employe::where ('status','!=',TypeStatus::SUPPRIME)


            ->orderBy('id','DESC')
            ->count()


        ;


        if($total){
            return $total;
        }
        return 0;

    }


    /**
     * Affiche le nombre total d ' employes par nationalite
     * @param  int $countrie_id


     * @return  int total
     */

    public static function totalEmployeByCountry ($countrie_id){

        $total = Employe::where ('status','!=',TypeStatus::SUPPRIME)

            ->where ('countrie_id ', '=',$countrie_id )

            ->count($countrie_id)


        ;


        if($total){
            return $total;
        }
        return 0;

    }



    /**
     * Affiche le nombre total d' employes   par continent
     * @param  int $continent_id


     * @return  int total
     */

    public static function totalEmployeeByContinent ($continent_id){

        $total = Employe::where ('status','!=',TypeStatus::SUPPRIME)

            ->where('continent_id', '=',$continent_id )
            ->orderBy('id','DESC')
            ->count()


        ;


        if($total){
            return $total;
        }
        return 0;

    }



    /**
     * Affiche le nombre total d' employes   par region
     * @param  int $region_id


     * @return  int total
     */

    public static function totalEmployeeByRegion ($region_id){

        $total = Employe::where ('status','!=',TypeStatus::SUPPRIME)

            ->where('region_id', '=',$region_id )
            ->orderBy('id','DESC')
            ->count()


        ;


        if($total){
            return $total;
        }
        return 0;

    }


    /**
     * Affiche le nombre total d' employes   par countrie
     * @param  int $countrie_id


     * @return  int total
     */

    public static function totalEmployeeByCountrie ($countrie_id){

        $total = Employe::where ('status','!=',TypeStatus::SUPPRIME)

            ->where('countrie_id', '=',$countrie_id )
            ->orderBy('id','DESC')
            ->count()


        ;


        if($total){
            return $total;
        }
        return 0;

    }


    /**
     * Affiche le nombre total d' employes    par niveau
     * @param  int $niveau_id


     * @return  int total
     */

    public static function totalEmployeeByNiveau ($niveau_id){

        $total = Employe::where ('status','!=',TypeStatus::SUPPRIME)

            ->where('niveau_id', '=',$niveau_id )
            ->orderBy('id','DESC')
            ->count()


        ;


        if($total){
            return $total;
        }
        return 0;

    }


    /**
     * Affiche le nombre total d' employes    par contract type
     * @param  int $contract_type_id


     * @return  int total
     */

    public static function totalEmployeeByContractType ($contract_type_id){

        $total = Employe::where ('status','!=',TypeStatus::SUPPRIME)

            ->where('contract_type_id', '=',$contract_type_id )
            ->orderBy('id','DESC')
            ->count()

        ;


        if($total){
            return $total;
        }
        return 0;

    }

    /**
     * Affiche le nombre total d' employes    par prefecture
     * @param  int $prefecture_id


     * @return  int total
     */

    public static function totalEmployeeByPrefecture ($prefecture_id){

        $total = Employe::where ('status','!=',TypeStatus::SUPPRIME)

            ->where('prefecture_id', '=',$prefecture_id )
            ->orderBy('id','DESC')
            ->count()

        ;


        if($total){
            return $total;
        }
        return 0;

    }


    /**
     * Affiche le nombre total d' employes    par coutume
     * @param  int $coutume_id


     * @return  int total
     */

    public static function totalEmployeeByCoutume ($coutume_id){

        $total = Employe::where ('status','!=',TypeStatus::SUPPRIME)

            ->where('coutume_id', '=',$coutume_id )
            ->orderBy('id','DESC')
            ->count()

        ;


        if($total){
            return $total;
        }
        return 0;

    }



    /**
     * Affiche le nombre total d' employes    par  position
     * @param  int $position_id


     * @return  int total
     */

    public static function totalEmployeeByPosition ($position_id){

        $total = Employe::where ('status','!=',TypeStatus::SUPPRIME)

            ->where('position_id', '=',$position_id )
            ->orderBy('id','DESC')
            ->count()

        ;


        if($total){
            return $total;
        }
        return 0;

    }


}
