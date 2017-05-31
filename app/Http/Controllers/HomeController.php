<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Auth;
use \App\Usuario;

class HomeController extends BaseController {

    //call the main page
    public function index()
    {
        //check the authentication
        if( Auth::check() ) {
            return view('welcome');
        } else {
            return view('logar');
        }
    }

    //call the login page
    public function logar(){
        //check the authentication
        if( Auth::check() ) {
            return redirect('/');
        } else {
            return view('logar');
        }
    }

    //Make authentication of the user
    public function authentication()
    {
        // option to remmember the user
        $remember = false;
        if(Input::get('remember'))
        {
            $remember = true;
        }

        //Get the user requested by email to authenticate
        $usuario = Usuario::where('email', Input::get('email'))->first();

        //Verify the passwords 
        if(password_verify(Input::get('password'), $usuario->senha)){
            //make the user login 
            Auth::login($usuario, $remember);
            //Save in the current session infos about the user logged
            session(['user_info' =>  $usuario]);
            //redirect to the main page
            return redirect('/');
        }else{
            //In errors case show a message about that
            return redirect('entrar')
            ->withErrors(['errors' => 'Senha incorreta!'])
            ->withInput();
        }
    }

    //Logout 
    public function logout()
    {
        //Just make the logout 
        Auth::logout();
        //redirect to the main page
        return redirect('/');
    }
}