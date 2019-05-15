@extends('master')

@section('content')


<div class='col-md-12' align= center>
	<h3>Compras</h3>
</div>
<div class='container-fluid well col-md-12'>
	<div class='col-md-12 col-sm-12'>
			<div class="col-md-6 col-sm-6" align="right">

				<button class="btn btn-info" align="right" onclick="window.location.href='usuario/adicionar'">Cadastrar</button>
			</div>

			<div class="col-md-6 col-sm-6"align="left">
				<button class="btn btn-warning" onclick="window.location.href='usuario/consultar'">Consultar</button>
			</div>
	</div>
	
</div>
@endsection