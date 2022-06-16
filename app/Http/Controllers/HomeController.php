<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    /**
     * Affiche le tableau de bord
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       return view('dashboard');


    }

}
