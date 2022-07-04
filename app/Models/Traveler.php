<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traveler extends Model
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


        'firstname',
        'lastname',
        'countrie_id',
        'business_id',
        'nature_id',
        'tripPurpose',

        'status',

    ];

    /**
     * Affichage de la liste de toutes  les Travelers
     *
     * @return  array
     */

    public static function allTravelerActifs()
    {

        return   $travelers = Traveler::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }


    /**
     * Ajouter une Traveler
     *

     * @param  string $firstname
     * @param  string $lastname
     * @param  string $countrie_id
     * @param  string $business_id
     * @param  string $nature_id
     * @param  string $trip_purpose

     * @return Traveler
     */

    public static function addTraveler($firstname, $lastname,$countrie_id, $business_id,  $nature_id, $trip_purpose )
    {
        $traveler = new Traveler();


        $traveler->firstname = $firstname;
        $traveler->lastname = $lastname;
        $traveler->countrie_id = $countrie_id;
        $traveler->business_id = $business_id;
        $traveler->nature_id = $nature_id;
        $traveler->trip_purpose = $trip_purpose;

        $traveler->created_at = Carbon::now();

        $traveler->save();

        return $traveler;
    }

    /**
     * Affichage d'une Traveler
     * @param int $id
     * @return  Traveler
     */

    public static function rechercheTravelerById($id)
    {

        return   $traveler = Traveler::findOrFail($id);
    }

    /**
     * Update d'une Traveler
     * @param  string $libelle

     * @param int $id
     * @return  Traveler
     */

    public static function updateTraveler($firstname, $lastname,$countrie_id, $business_id,  $nature_id, $trip_purpose, $id)
    {


        return   $traveler = Traveler::findOrFail($id)->update([



            'firstname' => $firstname,
            'lastname' => $lastname,
            'countrie_id' => $countrie_id,
            'business_id' => $business_id,
            'nature_id' => $nature_id,
            'trip_purpose' => $trip_purpose,


            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Traveler
     *
     * @param int $id
     * @return  boolean
     */

    public static function deleteTraveler($id)
    {

        $traveler = Traveler::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($traveler) {
            return 1;
        }
        return 0;
    }

    /**
     * Verifier si l'Traveler   existe deja
     *


     * @param  string $firstname
     * @param  string $lastname
     * @param  integer $countrie_id
     * @param  integer $nature_id

     * @return  boolean
     */

    public static function isUnique($firstname, $lastname, $countrie_id, $nature_id)
    {

        $traveler = Traveler::where('status', '!=', TypeStatus::SUPPRIME)


            ->where('firstname', '=', $firstname)
            ->where('lastname', '=', $lastname)
            ->where('countrie_id', '=', $countrie_id)
            ->where('nature_id', '=', $nature_id)

            ->first();


        if ($traveler) {
            return 1;
        }
        return 0;
    }

    /**
     * Verification de la validité de l'ajout


     * @param  string $firstname
     * @param  string $lastname
     * @param  integer $countrie_id
     * @param  integer $nature_id
     * @param  Traveler $old_traveler

     * @return  array
     */

    public static function isValid($firstname,$lastname,$countrie_id,$nature_id, $old_Traveler=null)
    {

        $data = array();

        $isValid = false;

        $erreurFirstname = '';
        $erreurLastname = '';
        $erreurCountrie = '';
        $erreurNature = '';



        // Verification de la validité des données


        if ($firstname ==='') {
            $erreurFirstname = "Le first name  est obligatoire" ;
        }elseif ($lastname ===''){
            $erreurLastname = "Le first name  est obligatoire" ;
        }

        elseif ($countrie_id === 0){
            $erreurCountrie = "Le countrie   est obligatoire" ;
        }


        elseif ($nature_id === 0){
            $erreurNature = "Le choix de la nature    est obligatoire" ;
        }


        elseif (
            $old_Traveler == null ||
            $old_Traveler->firstname !=$firstname ||
            $old_Traveler->lastname !=$lastname ||
            $old_Traveler->countrie_id !=$countrie_id ||
            $old_Traveler->nature_id !=$countrie_id

        ){
            $erreurFirstname = (Traveler::isUnique($firstname, $lastname, $countrie_id, $nature_id))?'This traveller exist  ':'';

            $isValid = (Traveler::isUnique($firstname, $lastname, $countrie_id, $nature_id))?false:true;
        }


        else {



            $erreurFirstname = '';
            $erreurLastname = '';
            $erreurCountrie = '';
            $erreurNature = '';


            $isValid = true;
        }

        return  $data = [


            'isValid' => $isValid,


            'erreurFirstname' => $erreurFirstname,
            'erreurLastname' => $erreurLastname,
            'erreurCountrie' => $erreurCountrie,
            'erreurNature' => $erreurNature,


        ];
    }

    /**
     * Obtenir l employe  lié au contract
     *
     */
    public function countrie()
    {


        return $this->belongsTo(Countrie::class, 'countrie_id');
    }



    /**
     * Obtenir l employe  lié au contract
     *
     */
    public function business()
    {


        return $this->belongsTo(Business::class, 'business_id');
    }

    /**
     * Obtenir l employe  lié au contract
     *
     */
    public function nature()
    {


        return $this->belongsTo(Nature::class, 'nature_id');
    }




}
