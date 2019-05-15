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
				<td>Tipo</td>				
				<td>Tamanhos</td>	
				<td>Quantidade</td>	
				<td>Preço de Venda</td>
				<td align="center">Ação</td>	
			</thead>
			<tbody>
				<?php $cont = 0; ?>
				@foreach($dados as $dado)
				<tr>
					<td scope="row">{{ $cont = $cont+1}}</td>
					<td>{{ $dado->nome}}</td>			
					<td>{{$dado->tipo}}</td>					
					<td>{{ $dado->tamanho }}</td>					
					<td>{{ $dado->quantidade }}</td>			
					<td>{{ $dado->prc_venda }}</td>			

					<td align="center">
						<a href="{{route('estoque/editar',$dado->id)}}" class="btn btn-primary btn-sm">Editar</a> 
						<a href="javascript:(confirm('Deseja delatar o registro?') ? window.location.href='{{route('estoque/deletar',$dado->id)}}' : false) " class="btn btn-danger btn-sm">deletar</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

</div>
@endsection