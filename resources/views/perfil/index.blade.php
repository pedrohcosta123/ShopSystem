@extends('master')

@section('content')


<div class='col-md-12' align= center>
	<h3>Perfil</h3>
</div>
<div class='container-fluid well col-md-12'>
	<div class='col-md-12 col-sm-12'>
			<div class="col-md-6 col-sm-6" align="right">
				<a href="{{route('perfil/adicionar')}}" class="btn btn-info">Cadastrar</a>
			</div>

			<div class="col-md-6 col-sm-6"align="left">
				<a href="{{route('perfil/consultar')}}" class="btn btn-warning">Consultar</a>
			</div>
	</div>
	
</div>
@endsection