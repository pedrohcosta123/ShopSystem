@extends('master')
@section('content')


<div class='col-md-12' align= center>
	<h3>Cadastro de Usuário</h3>
</div>
<div class='container-fluid well col-md-12'>
	<div class='col-md-12 col-sm-12'>
		<form method="POST" id="form" action="{{ route('categoria/atualizar',$dados->id) }}">
			@csrf
            <input type="hidden" name="_method" value="put">

			<div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

				<div class="col-md-2">
					<input type="text" class="form-control" name="nome" value="{{$dados->nome}}">
				</div>
			</div>		

			<div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">Tamanho</label>

				<div class="col-md-2">
					<input type="text" class="form-control" name="tamanho" value="{{$dados->tamanho}}">
				</div>
			</div>		

			
			<div class="form-group row mb-0">
				<div align="center" class="col-md-12 offset-md-12">
					<button type="submit" class="btn btn-success">
						Alterar
					</button>
				</div>
			</div>
		</form>
	</div>
	
</div>

@endsection