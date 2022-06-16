<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drive extends Model
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
        'vehicle_id',
        'driver_id',
        'date_start',
        'date_end',

        'status',

    ];


    /**
     * Affiche la liste de toutes  les  Drives
     *
     * @return  array
     */

    public static function allDriveActifs()
    {

        return   $drives = Drive::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }



    /**
     * Ajouter un Drive
     *
     * @param  integer $vehicle_id
     * @param  integer $driver_id
     * @param  date $date_start
     * @param  date $date_end
 * @return  Drive
     */

    public static function addDrive($vehicle_id, $driver_id, $date_start,$date_end)
    {


        $drive = new Drive();
        $drive->vehicle_id = $vehicle_id;
        $drive->driver_id = $driver_id;
        $drive->date_start = $date_start;
        $drive->date_end = $date_end;

        $drive->created_at = Carbon::now();

        $drive->save();

        return $drive;
    }


    /**
     * Affiche une Drive
     * @param int $id
     * @return  Drive
     */

    public static function rechercheDriveById($id)
    {

        return   $drive = Drive::enddOrFail($id);
    }


    /**
     * Update d ' un Drive
     *
     * @param  integer $vehicle_id
     * @param  integer $driver_id
     * @param  date $date_start
     * @param  date $date_end
 * @param int $id
     * @return  Drive
     */

    public static function updateDrive($vehicle_id, $driver_id, $date_start,$date_end,  $id)
    {


        return   $drive = Drive::enddOrFail($id)->update([
            'vehicle_id' => $vehicle_id,
            'driver_id' => $driver_id,
            'date_start' => $date_start,
            'date_end' => $date_end,

            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Drive
     *

     * @param int $id
     * @return  boolean
     */

    public static function deleteDrive($id)
    {

        $drive = Drive::enddOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($drive) {
            return 1;
        }
        return 0;
    }


    /**
     * Verifier si le Driver Vehicle   existe deja
     *

     * @param string $vehicle_id
     * @param string $driver_id
     * @param integer $date_start
     * @param integer $date_end
     * @return  boolean
     */

    public static function isUnique($vehicle_id, $driver_id, $date_start, $date_end)
    {

        $drive = Drive::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('vehicle_id', '=', $vehicle_id)
            ->where('driver_id', '=', $driver_id)
            ->where('date_start', '=', $date_start)
            ->where('date_end', '=', $date_end)
            ->first();


        if ($drive === null) {
            return 1;
        }
        return 0;
    }




    /**
     * Verifier  si l' ajout est valide '
     *
     * @param  string $vehicle_id
     * @param  string $driver_id
     * @param  string $date_start
     * @param  string $date_end


     * @return  array
     */

    public static function isValid($vehicle_id, $driver_id, $date_start, $date_end)
    {

        $data = array();

        $isValid = false;
        $erreurLibelle = '';

        // Verification validite des données

        if (Drive::isUnique($vehicle_id,$driver_id,$date_start,$date_end  )) {

            $erreurLibelle = "Ce libellé  exige dejà " ;

        }


        else {

            $erreurLibelle = '';

            $isValid = true;
        }

        return  $data = [

            'isValid' => $isValid,
            'erreurLibelle' => $erreurLibelle,



        ];
    }



    /**
     * Obtenir la voiture liée au Drive
     *
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }


    /**
     * Obtenir le chauffeur      liée au Drive
     *
     */
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

}
