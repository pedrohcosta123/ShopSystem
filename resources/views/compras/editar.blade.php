@extends('master')

@section('content')


<div class='col-md-12' align= center>
	<h3>Editar Usuário</h3>
</div>
<div class='container-fluid well col-md-12'>
	<div class='col-md-12 col-sm-12'>
		<form method="POST" action="{{ route('usuario/atualizar',$user->id) }}"">
			@csrf
            <input type="hidden" name="_method" value="put">
			<div class="form-group row">
				<label for="localidade" class="col-md-4 col-form-label text-md-right">Localidades</label>				
				<div class="col-md-6">
					
					
					@foreach ($userloc as $key => $value)
						<div class="col-md-2">
							<input type="checkbox" class="form-check-input" name="id_localidade[]" value="{{$userloc[$key]->idlocalidade}}" checked>
							<label>{{$userloc[$key]->sigla}}</label>
						</div>
					@endforeach
					@foreach ($loc as $key => $value)
						<div class="col-md-2">
							<input type="checkbox" class="form-check-input" name="id_localidade[]" value="{{$loc[$key]->id}}">
							<label>{{$loc[$key]->sigla}}</label>
						</div>
						
					@endforeach 

				</div>
			</div>

			<div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>

				<div class="col-md-6">
					<input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required >	
				</div>
			</div>			

			<div class="form-group row">
				<label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

				<div class="col-md-6">
					<input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>
				</div>
			</div>

			<div class="form-group row">
				<label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>

				<div class="col-md-6">
					<input id="password" type="password" class="form-control" name="password" value="{{$user->password}}"required>

				</div>
			</div>

			<div class="form-group row">
				<label for="password-confirm" class="col-md-4 col-form-label text-md-right">Repita a senha</label>

				<div class="col-md-6">
					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{$user->password}}" required>
				</div>
			</div>

			<div class="form-group row mb-0">
				<div align="center" class="col-md-12 offset-md-12">
					<button type="submit" class="btn btn-info">
						Alterar
					</button>
				</div>
			</div>
		</form>
	</div>
	
</div>
@endsection