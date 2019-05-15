<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use carbon\Carbon;

class CategoriaController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(){

		return view('categorias/index'); 
	}

	public function adicionar(){

		return view('categorias/adicionar'); 

	}

	public function salvar(Request $dados){

		$cat = new \App\Categoria; 
		$cat->nome = $dados->nome; 
		$cat->tamanho = $dados->tamanho; 
		$cat->usercreate = Auth::user()->name;
		$cat->created_at = Carbon::now();
		$cat->save();

		return redirect()->route('categoria/adicionar'); 
	}

	public function consultar(){		

		$dados = \App\Categoria::all();
		return view('categorias/consultar',compact('dados'));

	}

	public function editar($id){

		$dados = \App\Categoria::find($id);
		// dd($dados);

		return view('categorias/editar', compact('dados'));


	}
	public function atualizar(Request $dados, $id){
		
		$cat = \App\Categoria::find($id);
		$cat->nome = $dados->nome; 
		$cat->tamanho = $dados->tamanho;
		$cat->usercreate = Auth::user()->name;
		$cat->updated_at = Carbon::now();
		$cat->save();

		return redirect()->route('categoria/consultar');
	}
	public function deletar($id){
		$cat = \App\Categoria::find($id);
		$cat->delete();

		return redirect()->route('categoria/consultar');
	}


}
