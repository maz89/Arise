<?php

namespace App\Http\Controllers;

use App\Types\Menu;
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
        return view('dashboard')->with(

            [

                'active' => $this->active
            ]

        );
    }



}
