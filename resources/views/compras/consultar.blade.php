@extends('master')

@section('content')


<div class='col-md-12' align= center>
	<h3>Usuários</h3>
</div>
<div class='container-fluid well col-md-12'>
		<table class="table table-bordered">
			<thead>
				<td>ID</td>
				<td>Nome</td>				
				<td>ID Loc</td>				
				<td>Status Loc</td>				
				<td>Sigla</td>	
				<td>Localidade</td>		
				<td>ID Empresa</td>		
				<td>Nome Empresa</td>	
				<td align="center">Ação</td>	
			</thead>
			<tbody>
				@foreach($dados as $dado)
				<tr>
					<td scope="row">{{ $dado->id}}</td>
					<td>{{ $dado->nome }}</td>					
					<td>{{ $dado->id_userloc }}</td>
					<td>{{$dado->statusloc}}</td>					
					<td>{{ $dado->sigla }}</td>				
					<td>{{ $dado->localidade }}</td>				
					<td>{{ $dado->id_emp }}</td>
					<td>{{ $dado->nome_emp }}</td>
					<td align="center">
						<a href="{{route('usuario/editar',$dado->id)}}" class="btn btn-primary btn-sm">Editar</a>
						<a href="javascript:(confirm('Deseja delatar o registro?') ? window.location.href='{{route('usuario/deletar',$dado->id)}}' : false) " class="btn btn-danger btn-sm">deletar</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

</div>
@endsection