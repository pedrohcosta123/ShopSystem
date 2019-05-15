<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\UploadFile;


class EstoqueController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    	return view('estoque.index'); 
    }

    public function adicionar(){

       $cat = DB::table('categoria')       
		->select('categoria.nome')
		->distinct()
		->get();

    	return view('estoque.adicionar',compact('cat')); 

    }   

    public function salvar(Request $dados){
        

        foreach ($dados->primaryImage as $img) {

            $image = $img;
            $newname = rand() . '.'. $image->getClientOriginalExtension();
            $image->move(public_path("images"), $newname);

            $upload = new \App\Uploadfile;
            $upload->codbarras = $dados->codbarras;
            $upload->imgname = $newname;
            $upload->caminho =  public_path('images').'/'.$newname;
            $upload->created_at = Carbon::now();
            $upload->save();
            
        };

		$user = Auth::user()->name; 
        foreach ($dados->tamanho as $tama) {
            $valor[] = $tama;             
        };
        foreach ($valor as $key => $value) {
            $estoque = new \App\Estoque; 
            $estoque->id_cat = $value;
            $estoque->codbarras = $dados->codbarras;
            $estoque->quantidade = $dados->quantidade;
            $estoque->nome = $dados->nome;
            $estoque->prc_custo = $dados->prc_custo;
            $estoque->prc_venda = $dados->prc_venda;
            $estoque->user_cad = $user;
            $estoque->status = 'A';
            $estoque->created_at = Carbon::now();
            $estoque->save();
        };

        
        // return back()->with('success','Upload feito com sucesso!')->with('path',$newname);

        return redirect()->route('estoque/adicionar'); 
    }

	public function consultar(){	

        $dados = DB::table('estoque')
        ->join('categoria', 'categoria.id', '=', 'estoque.id_cat')
        ->select('estoque.nome as nome','estoque.codbarras as codbarras','categoria.nome as tipo', 'categoria.tamanho as tamanho','estoque.quantidade as quantidade', 'estoque.prc_custo as prc_custo', 'estoque.prc_venda as prc_venda', 'estoque.status as status', 'estoque.user_cad as user_cad', 'estoque.created_at as created_at', 'estoque.updated_at as  updated_at','estoque.id as id')
        ->get();

	    return view('estoque.consultar',compact('dados')); 

	}
    public function editar($id){

        $cat = DB::table('categoria')       
                ->select('categoria.nome')
                ->distinct()
                ->get();

    	 $dados = DB::table('estoque')
                    ->join('categoria', 'categoria.id', '=', 'estoque.id_cat')
                    ->select('estoque.id as id', 'estoque.id_cat','estoque.codbarras','estoque.quantidade','estoque.nome', 'estoque.prc_custo','estoque.prc_venda', 'estoque.status', 'estoque.user_cad', 'estoque.created_at', 'estoque.updated_at', 'categoria.nome as NomeCategoria', 'categoria.tamanho as TamanhoCategoria')
                    ->where('estoque.id', '=', $id)
                    ->get();
        // dd($cat);
        $imagem = DB::table('uploadfile')
                    ->where('codbarras', '=', $dados[0]->codbarras)
                    ->get();
        // foreach ($imagem as $img) {
        //     $caminho = $img->imgname;
        // }
        

        // dd($caminho);
    	return view('estoque.editar')
                ->with('imagem', $imagem)
                ->with('cat', $cat)
                ->with('dados', $dados);

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

    	return redirect()->route('estoque/consultar');

    }

    public function deletar($id){

    	$perfil = \App\Perfil::find($id); 
    	$perfil->delete();

    	return redirect()->route('estoque/consultar');

    }

  
}
