<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use App\Types\Gender;
use App\Types\Menu;
use App\Types\TypeEmploye;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private      $active;

    public function __construct()
    {

        $this->active = Menu::DASHBOARD;
    }


    /**
     * Afficher le tableau de bord
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hommes = Employe::totalEmployeeByGender(Gender::MASCULIN);
        $filles = Employe::totalEmployeeByGender(Gender::FEMININ);
        $national = Employe::totalEmployeeByGender(TypeEmploye::NATIONAL);
        $expatriate = Employe::totalEmployeeByType(TypeEmploye::EXPATRIE);

        return view('dashboard')->with(

            [

                'active' => $this->active,
                'hommes' => $hommes,
                'filles' => $filles,
                'national' => $national,
                'expatriate' => $expatriate,
            ]

        );
    }



}
