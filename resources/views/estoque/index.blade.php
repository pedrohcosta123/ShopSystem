@extends('master')

@section('content')


<div class='col-md-12' align= center>
	<h3>Estoque</h3>
</div>
<div class='container-fluid well col-md-12'>
	<div class='col-md-12 col-sm-12'>
			<div class="col-md-6 col-sm-6" align="right">
				<a href="{{route('estoque/adicionar')}}" class="btn btn-info">Cadastrar</a>
			</div>

			<div class="col-md-6 col-sm-6"align="left">
				<a href="{{route('estoque/consultar')}}" class="btn btn-warning">Consultar</a>
			</div>
	</div>
	
</div>
@endsection