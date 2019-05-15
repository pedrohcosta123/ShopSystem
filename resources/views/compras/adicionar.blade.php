@extends('master')

@section('content')


<div class='col-md-12' align= center>
	<h3>Cadastro de Localidade</h3>
</div>
<div class='container-fluid well col-md-12'>
	<div class='col-md-12 col-sm-12'>
		<form action="{{route('localidade/salvar')}}" method="post">
			@csrf

			<div style="text-align: center;" class='col-md-3 col-sm-3' >
				<label>Empresa</label>
				<select class="form-control" name="id_empresa">
					@foreach ($empresas as $empresa)
					<option value="{{$empresa->id}}">{{$empresa->nome}}</option>
					@endforeach
				</select>
			</div>
			<div style="text-align: center;" class='col-md-3 col-sm-3' >
				<label>Sigla</label>
				<input class="form-control" type="text" name="sigla">
			</div>
			<div style="text-align: center;" class='col-md-3 col-sm-3'> 
				<label align="center">Nome</label>
				<input class="form-control" type="text" name="nome">
			</div>
			<div style="text-align: center;" class='col-md-3 col-sm-3'> 
				<label>Cidade</label>
				<input class="form-control" type="text" name="cidade">
			</div>
			<div style="text-align: center;" class='col-md-3 col-sm-3'> 
				<label>Estado</label>
				<input class="form-control" type="text" name="estado">
			</div>
			<div style="text-align: center;" class='col-md-3 col-sm-3'> 
				<label>Valor de Restrição</label>
				<input class="form-control" type="text" name="val">
			</div>
			<div style="text-align: center;" class='col-md-3 col-sm-3'> 
				<label>Mensagem personalisada</label>
				<input class="form-control" type="text" name="msg">
			</div>
			<div style="text-align: center;margin-top: 3%" class='col-md-12 col-sm-12'> 
				<input type="submit" class="btn btn-success" value="Salvar" name="Salvar">
			</div>

		</form>
	</div>
	
</div>
@endsection