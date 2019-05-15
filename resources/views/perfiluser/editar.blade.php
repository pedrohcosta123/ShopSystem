@extends('master')
@section('content')


<div class='col-md-12' align= center>
	<h3>Cadastro de Usuário</h3>
</div>
<div class='container-fluid well col-md-12'>
	<div class='col-md-12 col-sm-12'>
		<form method="POST" id="form" action="{{ route('perfiluser/atualizar',$dados[0]->id) }}">
			@csrf
            <input type="hidden" name="_method" value="put">

			<div class="form-group row">
				<label for="perfil" class="col-md-4 col-form-label text-md-right">Perfil</label>				
				<div class="col-md-6">
					<div class="col-md-4">
						<select class="form-control" name="id_perfil" >

								<option value="{{$dados[0]->id_perfil}}" selected >{{$dados[0]->nome}}</option>
							
							@foreach($perfil as $per)

								@if($dados[0]->id_perfil <> $per->id){

									<option value="{{$per->id}}">{{$per->nome}}</option>
								}

								@endif							
							@endforeach
						</select>
					</div>					
				</div>
			</div>

			<div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

				<div class="col-md-6">
					<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $dados[0]->name }}" required autofocus>

					@if ($errors->has('name'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
					@endif
				</div>
			</div>			

			<div class="form-group row">
				<label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

				<div class="col-md-6">
					<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $dados[0]->email }}" required>

					@if ($errors->has('email'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
					@endif
				</div>
			</div>
				<div id="btnsenha"class="col-md-12 offset-md-12">
					<button onclick="esconder()" class="btn btn-danger">
						Redefinir Senha
					</button>
			</div>

			<div class="form-group row" id="senha" hidden>
				<label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>

				<div class="col-md-6">
					<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

					@if ($errors->has('password'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group row mb-0">
				<div align="center" class="col-md-12 offset-md-12">
					<button type="submit" onclick="caracter()" class="btn btn-info">
						Cadastrar
					</button>
				</div>
			</div>
		</form>
	</div>
	
</div>
<script>
	function caracter(){
		var campo = document.getElementById('password');		
		var div = document.getElementById('senha');
		if(div.hidden == false){

			if(campo.value.length < 6){
				alert('A senha precisa conter mais de 5 caracteres');
				$("form").submit(function(event) {
	    			event.preventDefault();
	    		});
			}
			else{
				document.forms["form"].submit();
			}
		} 
		else{
			document.forms["form"].submit();
		}
	}

	function esconder(){		
	var btn = document.getElementById('btnsenha');
		btn.hidden = true;
	var campo = document.getElementById('senha');
	campo.hidden = false;
	} 
</script>
@endsection