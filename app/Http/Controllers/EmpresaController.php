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
        //Verify the authentication 
    	$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar(){ 
    	$usuario = session('user_info');
    	if($usuario->tipo == 'admin'){
    		$listaEmpresas = Empresa::all();
    	}else{
    		$listaEmpresas = Empresa::where('usuario_id', $usuario->id)->get();
    	}
    	return view('empresa/index', 
    		['empresas' => $listaEmpresas]);
    }

    public function cadastrar(){

    	return view('empresa/inserir');
    }

    public function inserir(Request $request){
    	try{
            //Validation of email, tipo, razao social and nome fantasia from 'empresa' 
    		$this->validate($request, 
    			[
    			'cnpj' => 'cnpj|unique:empresa',
    			'email' => 'required|unique:empresa',
    			'razao_social' => 'required|unique:empresa',
    			'nome_fantasia' => 'required|unique:empresa',
    			]);

            //Insert a new 'Empresa' into the system
    		$empresa = new Empresa;
    		$empresa->nome_fantasia = $request->nome_fantasia;
    		$empresa->razao_social = $request->razao_social;
    		$empresa->email = $request->email;
    		$empresa->cnpj =  $request->cnpj;
    		$empresa->telefone = $request->telefone;
    		$empresa->cep_endereco = $request->cep;
    		$empresa->logradouro = $request->logradouro;
    		$empresa->numero_endereco = $request->numero;
    		$empresa->bairro_endereco = $request->bairro;
    		$empresa->cidade_endereco = $request->cidade;
    		$empresa->usuario_id = session('user_info')->id;
    		$empresa->save();
    		return redirect('/empresa');
    	}catch (Illuminate\Database\QueryException $e){
            return redirect('/empresa');
    	}
    }

    public function carregar($id){ 
    	return view('empresa/editar', 
    		['empresa' => Empresa::find($id)]);
    }

    public function alterar(Request $request, $id){   
    	try{
            //Validate the cnpj
    		$this->validate($request, 
    			[
    			'cnpj' => 'cnpj',
    			]);
    		
            //Update infos from Empresa
    		$empresa = Empresa::find($request->id);
    		$empresa->nome_fantasia = $request->nome_fantasia;
    		$empresa->razao_social = $request->razao_social;
    		$empresa->email = $request->email;
    		$empresa->cnpj =  $request->cnpj;
    		$empresa->telefone = $request->telefone;
    		$empresa->cep_endereco = $request->cep;
    		$empresa->logradouro = $request->logradouro;
    		$empresa->numero_endereco = $request->numero;
    		$empresa->bairro_endereco = $request->bairro;
    		$empresa->cidade_endereco = $request->cidade;
    		$empresa->usuario_id = session('user_info')->id;
    		$empresa->save();
    		return redirect('/empresa');
    	}catch (Illuminate\Database\QueryException $e){
    		return redirect('/empresa');
    	}
    }

    public function remover($id){
        //Remove 'Empresa' from the system
    	$empresa = Empresa::find($id)->delete();
    	return redirect('/empresa');
    }

    //This function get infos about adress in a API from web called by 'CEP ABERTO'
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

    public function verificarCnpj($cnpj){
    	$cnpj = preg_replace( '/[^0-9]/', '', $cnpj);
    	$retorno = Empresa::where('cnpj', $cnpj)->exists();
    	return json_encode($retorno);
    }
}
