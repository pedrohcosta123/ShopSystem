@extends('master')

@section('content')


<div class='col-md-12' align= center>
	<h3>Categorias</h3>
</div>
<div class='container-fluid well col-md-12'>
		<table class="table table-bordered">
			<thead>
				<td></td>
				<td>Nome</td>				
				<td>Tamanho</td>				
				<td>Criado Por</td>	
				<td>DT Criação</td>		
				<td>DT Edição</td>		
				<td align="center">Ação</td>	
			</thead>
			<tbody>
				<?php $cont = 0; ?>
				@foreach($dados as $dado)
				<tr>
					<td scope="row">{{ $cont = $cont+1}}</td>
					<td>{{ $dado->nome}}</td>					
					<td>{{ $dado->tamanho }}</td>
					<td>{{$dado->usercreate}}</td>					
					<td>{{ $dado->created_at }}</td>				
					<td>{{ $dado->updated_at }}</td>
					<td align="center">
						<a href="{{route('categoria/editar',$dado->id)}}" class="btn btn-primary btn-sm">Editar</a>
						<a href="javascript:(confirm('Deseja delatar o registro?') ? window.location.href='{{route('categoria/deletar',$dado->id)}}' : false) " class="btn btn-danger btn-sm">deletar</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

</div>
@endsection