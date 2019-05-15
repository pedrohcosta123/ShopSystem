@extends('master')
@section('content')


<div class='col-md-12' align= center>
	<h3>Cadastro de Usuário</h3>
</div>
<div class='container-fluid well col-md-12'>
	<div class='col-md-12 col-sm-12'>
		<form method="POST" action="{{ route('perfiluser/salvar') }}">
			@csrf
			<div class="form-group row">
				<label for="perfil" class="col-md-4 col-form-label text-md-right">Perfil</label>				
				<div class="col-md-6">
					<div class="col-md-4">
						<select class="form-control" name="id_perfil" >
							@foreach($perfil as $per)
							<option value="{{$per->id}}">{{$per->nome}}</option>							
							@endforeach
						</select>
					</div>					
				</div>
			</div>

			<div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

				<div class="col-md-6">
					<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

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
					<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

					@if ($errors->has('email'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group row">
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
					<button type="submit" class="btn btn-info">
						Cadastrar
					</button>
				</div>
			</div>
		</form>
	</div>
	
</div>
@endsection