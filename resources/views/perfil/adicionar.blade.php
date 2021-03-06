@extends('master')

@section('content')


<div class='col-md-12' align= center>
	<h3>Cadastro de Perfil</h3>
</div>
<div class='container-fluid well col-md-12'>
	<div class='col-md-12 col-sm-12'>
		<form action="{{route('perfil/salvar')}}" method="post">
			@csrf

			<div style="text-align: center;" class='col-md-3 col-sm-3' >
				<label>Nome</label>
				<input class="form-control" placeholder="Nome do Perfil" type="text" name="nome">
			</div>
			<div style="text-align: center;" class='col-md-3 col-sm-3'> 
				<label align="center">Status</label>
				<select class="form-control" name="status">
					<option value='A'>Ativo</option>
					<option value='I'>Inativo</option>
				</select>
			</div>
			<div style="text-align: center;margin-top: 3%" class='col-md-12 col-sm-12'> 
				<input type="submit" class="btn btn-success" value="Salvar" name="Salvar">
			</div>

		</form>
	</div>
	
</div>
@endsection