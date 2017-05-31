<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Hash;

class UsuarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Verify the authentication 
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    { 

        if(session('user_info')->tipo == 'admin'){
            return view('usuario/index', 
                ['usuarios' => Usuario::all()]);
        }else{
            return redirect('/');
        }
    }

    public function cadastrar()
    {

        return view('usuario/inserir');
    }

    public function inserir(Request $request)
    {
        //Validation of email and tipo from user 
        $this->validate($request, 
            [
            'email' => 'required|unique:usuario',
            'tipo' => 'required'
            ]);

        //Insert a new user into the system
        $usuario = new Usuario;
        $usuario->nome = $request->nome;
        $usuario->senha =  Hash::make($request->senha);
        $usuario->email = $request->email;
        $usuario->tipo = $request->tipo;
        $usuario->save();
        return redirect('/usuario');
    }

    public function carregar($id)
    {
        //Show user data to update
        return view('usuario/editar', 
            ['usuario' => Usuario::find($id)]);
    }

    public function alterar(Request $request, $id)
    {   
        //Update user data
        $usuario = Usuario::find($request->id);
        $usuario->nome = $request->nome;
        if(isset($request->senha)){
            $usuario->senha = Hash::make($request->senha);
        }
        $usuario->email = $request->email;
        $usuario->tipo = $request->tipo;
        $usuario->save();
        return redirect('/usuario');
    }

    public function remover($id)
    {
        //Remove user from the system
        $usuario = Usuario::find($id)->delete();
        return redirect('/usuario');
    }



}
