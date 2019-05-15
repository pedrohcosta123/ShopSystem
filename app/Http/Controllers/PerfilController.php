<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use carbon\Carbon;

class PerfilController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    	return view('perfil.index'); 
    }

    public function adicionar(){

    	return view('perfil.adicionar'); 

    }   

    public function salvar(Request $dados){

		$user = Auth::user()->name; 
    	$per = new \App\Perfil; 
    	$per->nome = $dados->nome;
    	$per->status = $dados->status;
    	$per->usercreate = $user;
    	$per->created_at = Carbon::now();
    	$per->save();

       return redirect()->route('perfil/adicionar'); 
    }

	public function consultar(){		
		$perfil = \App\Perfil::paginate();
	    return view('perfil.consultar',compact('perfil')); 

	}
    public function editar($id){

    	$perfil = \App\Perfil::find($id); 

    	return view('perfil.editar', compact('perfil')); 

    }

    public function atualizar(Request $dados){

    	$user = Auth::user()->name;

    	$perfil = \App\Perfil::find($dados->id);

    	$perfil->id = $dados->id;
    	$perfil->nome = $dados->nome;
    	$perfil->status = $dados->status;
    	$perfil->usercreate = $user;
    	$perfil->updated_at = Carbon::now();
    	$perfil->save();

    	return redirect()->route('perfil/consultar');

    }

    public function deletar($id){

    	$perfil = \App\Perfil::find($id); 
    	$perfil->delete();

    	return redirect()->route('perfil/consultar');


    }
}	

