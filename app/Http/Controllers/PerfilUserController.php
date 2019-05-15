<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;

class PerfilUserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(){

		return view('perfiluser/index'); 
	}

	public function adicionar(){
		$perfil = \App\Perfil::all();

		return view('perfiluser/adicionar', compact('perfil')); 

	}

	public function salvar(Request $dados){

		$user = Auth::user()->name;

		DB::table('users')->insert([
			'name' => $dados->name,
			'email' => $dados->email,
			'password' => bcrypt($dados->password),
			'created_at' =>Carbon::now() 
        ]); // insert do usuario

		$usuario = DB::table('users')->where(
			'email', '=',$dados->email
        )->first(); // busca usuário pelo email

		$dd = new \App\PerfilUser;

		$dd->id_perfil = $dados->id_perfil; 
		$dd->id_user = $usuario->id; 
		$dd->usercreate = $user;
		$dd->status = 'A'; 
		$dd->created_at = Carbon::now();
		$dd->save();

		return redirect()->route('perfiluser/adicionar'); 
	}

	public function consultar(){		

		$dados = DB::table('users')
		->join('perfiluser', 'users.id', '=', 'perfiluser.id_user')
		->join('perfil', 'perfiluser.id_perfil', '=', 'perfil.id')
		->select('users.id','users.name', 'perfil.nome', 'perfil.usercreate', 'perfil.status', 'perfil.created_at', 'perfil.updated_at')
		->get();
		return view('perfiluser/consultar',compact('dados'));

	}

	public function editar($id){

		$perfil = \App\Perfil::all();

		$dados = DB::table('users')
		->join('perfiluser', 'users.id', '=', 'perfiluser.id_user')
		->join('perfil', 'perfiluser.id_perfil', '=', 'perfil.id')
		->select('users.id','users.email','users.name', 'perfil.id as id_perfil','perfil.nome', 'perfil.status')
		->where('users.id','=', $id)
		->get();
		// dd($dados);
		return view('perfiluser/editar', compact('perfil','dados'));


	}
	public function atualizar(Request $dados, $id){
		$user = \App\User::find($id);

		$peruser = DB::table('perfiluser')
		->where('id_user',$id)->value('id');
		$perfil = \App\PerfilUser::find($peruser);

		$user->name = $dados->name; 
		$user->email = $dados->email;

		if($dados->password <> ''){
			$user->password = $dados->password;
		}

		$user->save(); // insert na tabela user

		$perfil->id_perfil = $dados->id_perfil; 	
		$perfil->save(); // insert na tabela perfiluser

		return redirect()->route('perfiluser/consultar');
	}
	public function deletar($id){
		$peruser = DB::table('perfiluser')
		->where('id_user',$id)
		->value('id');

		$perfiluser = \App\PerfilUser::find($peruser);
		$perfiluser->delete();

		$user = \App\User::find($id);
		$user->delete();

		return redirect()->route('perfiluser/consultar');
	}
}
