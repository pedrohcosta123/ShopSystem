@extends('master')

@section('content')


<div class='col-md-12' align= center>
	<h3>Perfis</h3>
</div>
<div class='container-fluid well col-md-12'>
		<table class="table table-bordered">
			<thead>
				<td>ID</td>
				<td>Perfil</td>				
				<td>Status</td>				
				<td>Criado Por</td>				
				<td>Data de Criação</td>				
				<td>Data de Atualização</td>	
				<td align="center">Ação</td>	
			</thead>
			<tbody>
				@foreach($perfil as $per)
				<tr>
					<td scope="row">{{ $per->id}}</td>
					<td>{{ $per->nome }}</td>					
					<td>{{ $per->status }}</td>
					<td>{{$per->usercreate}}</td>	
					<td>{{ date('d/m/Y m:s',strtotime($per->created_at)) }}</td>			
					<td>{{ date('d/m/Y m:s',strtotime($per->updated_at)) }}</td>
					<td align="center">
						<a href="{{route('perfil/editar',$per->id)}}" class="btn btn-primary btn-sm">Editar</a>
						<a href="javascript:(confirm('Deseja delatar o registro?') ? window.location.href='{{route('perfil/deletar',$per->id)}}' : false) " class="btn btn-danger btn-sm">deletar</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

</div>
@endsection