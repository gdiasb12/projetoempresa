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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    { 

        return view('usuario/index', ['usuarios' => Usuario::all()]);
    }

    public function cadastrar()
    {

        return view('usuario/inserir');
    }

    public function inserir(Request $request)
    {
        $usuario = new Usuario;
        $usuario->nome = $request->nome;
        $usuario->senha =  Hash::make($request->senha);
        $usuario->email = $request->email;
        $usuario->tipo = $request->nivel;
        $usuario->save();
        return view('usuario/index', ['usuarios' => Usuario::all()]);
    }

    public function carregar($id)
    {
        return view('usuario/editar', ['usuario' => Usuario::find($id)]);
    }

    public function alterar(Request $request, $id)
    {   
        $usuario = Usuario::find($request->id);
        $usuario->nome = $request->nome;
        if(isset($request->senha)){
            $usuario->senha = Hash::make($request->senha);
        }
        $usuario->email = $request->email;
        $usuario->tipo = $request->nivel;
        $usuario->save();
        return view('usuario/index', ['usuarios' => Usuario::all()]);
    }

    public function remover($id)
    {
        $usuario = Usuario::find($id)->delete();
        return view('usuario/index', ['usuarios' => Usuario::all()]);
    }



}
