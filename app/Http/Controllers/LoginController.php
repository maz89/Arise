<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class LoginController extends Controller
{




    /**
     * Afficher le login
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function login()
    {
        return view('auth.login');


    }


    /**
     * Se deconnecter
     *
     * @return \Illuminate\Contracts\Foundation\Application|
     * \Illuminate\Http\RedirectResponse|
     * \Illuminate\Routing\Redirector
     */
    public function logout()
    {

        if(session()->has('LoginUser'))
        {
             session()->pull('LoginUser');


        }

        return redirect('/login');

    }



}
