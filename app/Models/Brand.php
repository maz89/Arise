<?php

namespace App\Models;

use App\Types\TypeStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
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
        'brand',

        'status',

    ];


    /**
     * Affiche la liste de toutes  les  brands
     *
     * @return  array
     */

    public static function allBrandActifs()
    {

        return   $brands = Brand::where('status', '!=', TypeStatus::SUPPRIME)
            ->orderBy('id', 'DESC')
            ->get();
    }



    /**
     * Ajouter une Brand
     *
     * @param  string $brand
 * @return  Brand
     */

    public static function addBrand($brand )
    {


        $brand = new Brand();
        $brand->brand = $brand;


        $brand->created_at = Carbon::now();

        $brand->save();

        return $brand;
    }


    /**
     * Affiche une Brand
     * @param int $id
     * @return  Brand
     */

    public static function rechercheBrandById($id)
    {

        return   $brand = Brand::findOrFail($id);
    }


    /**
     * Update d ' une Brand
     *
     * @param  string $brand
 * @param int $id
     * @return  Brand
     */

    public static function updateBrand( $brand, $id)
    {


        return   $brand = Brand::findOrFail($id)->update([
            'brand' => $brand,

            'id' => $id,


        ]);
    }


    /**
     * Supprimer une Brand
     *

     * @param int $id
     * @return  boolean
     */

    public static function deleteBrand($id)
    {

        $brand = Brand::findOrFail($id)->update([
            'status' => TypeStatus::SUPPRIME

        ]);

        if ($brand) {
            return 1;
        }
        return 0;
    }


    /**
     * Verifier si l' Brand   existe deja
     *

     * @param string $brand

     * @return  boolean
     */

    public static function isUnique($brand )
    {

        $brand = Brand::where('status', '!=', TypeStatus::SUPPRIME)
            ->where('brand', '=', $brand)

            ->first();


        if ($brand === null) {
            return 1;
        }
        return 0;
    }




    /**
     * Verifier  si l' ajout est valide '
     *
     * @param string $brand

     * @return  array
     */

    public static function isValid($brand )
    {

        $data = array();

        $isValid = false;
        $erreurBrand='';



        // Verification validite des données


        if (isEmpty($brand)) {
            $erreurBrand = "La brand est obligatoire" ;
        }

        elseif (Brand::isUnique( $brand)) {
            $erreurBrand = "Cette brand existe dejà " ;
        }


        else {

            $erreurBrand = '';


            $isValid = true;
        }

        return  $data = [

            'isValid' => $isValid,
            'erreurBrand' => $erreurBrand,



        ];
    }
}
