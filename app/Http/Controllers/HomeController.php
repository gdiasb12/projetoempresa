<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Auth;

class HomeController extends BaseController {

    public function index()
    {
        return view('welcome');
    }

    public function logar()
    {
        return view('logar');
    }

    public function authentication()
    {
        // option to remmember the user
        $remember = false;
        if(Input::get('remember'))
        {
            $remember = true;
        }
        
        // authentication
        if (Auth::attempt(array(
            'email' => Input::get('email'), 
            'password' => Input::get('senha')
            ), $remember))
        {
            return \Redirect::to('usuario');
        }
        else
        {
            return \Redirect::to('entrar')
                ->with('flash_error', 1)
                ->withInput();
        }
    }
    
    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}