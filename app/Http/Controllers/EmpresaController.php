<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class EmpresaController extends Controller
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

        return view('empresa/index', ['empresas' => Empresa::all()]);
    }

    public function cadastrar()
    {

        return view('empresa/inserir');
    }

    public function inserir(Request $request)
    {
        $this->validate($request, ['cnpj' => 'cnpj']);

        $empresa = new Empresa;
        $empresa->nome_fantasia = $request->nomefantasia;
        $empresa->razao_social = $request->razaosocial;
        $empresa->email = $request->email;
        $empresa->cnpj = $request->cnpj;
        $empresa->telefone = $request->telefone;
        $empresa->cep_endereco = $request->cep;
        $empresa->logradouro = $request->logradouro;
        $empresa->numero_endereco = $request->numero;
        $empresa->bairro_endereco = $request->bairro;
        $empresa->cidade_endereco = $request->cidade;
        $empresa->usuario_id = 1;
        $empresa->save();
        return view('empresa/index', ['empresas' => Empresa::all()]);
    }

    public function carregar($id)
    { 
        return view('empresa/editar', ['empresa' => Empresa::find($id)]);
    }

    public function alterar(Request $request, $id)
    {   
        $this->validate($request, ['cnpj' => 'cnpj']);

        $empresa = Empresa::find($request->id);
        $empresa->nome_fantasia = $request->nomefantasia;
        $empresa->razao_social = $request->razaosocial;
        $empresa->email = $request->email;
        $empresa->cnpj = $request->cnpj;
        $empresa->telefone = $request->telefone;
        $empresa->cep_endereco = $request->cep;
        $empresa->logradouro = $request->logradouro;
        $empresa->numero_endereco = $request->numero;
        $empresa->bairro_endereco = $request->bairro;
        $empresa->cidade_endereco = $request->cidade;
        $empresa->usuario_id = 1;
        $empresa->save();
        return view('empresa/index', ['empresas' => Empresa::all()]);
    }

    public function remover($id)
    {
        $empresa = Empresa::find($id)->delete();
        return view('empresa/index', ['empresas' => Empresa::all()]);
    }

    public function getCep($cep){
       $token = 'e5d248337dccce94b06c23171f8e6801';

       $url = 'http://www.cepaberto.com/api/v2/ceps.json?cep=' . $cep;
       $ch = \curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Token token="' . $token . '"'));
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       $output = curl_exec($ch);

       return $output;
   }

}
