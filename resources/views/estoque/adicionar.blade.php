@extends('master')
@section('content')


<div class='col-md-12' align= center>
	<h3>Cadastro de Estoque</h3>
</div>
<div class='container-fluid well col-md-12'>
	<div class='col-md-12 col-sm-12'>
		<form method="POST" enctype="multipart/form-data" action="{{ route('estoque/salvar') }}">
			@csrf
			
			<div class="form-group row">
				<label for="codigo" class="col-md-4 col-form-label text-md-right">Código de Barras</label>

				<div class="col-md-6">
					<input type="text" class="form-control" name="codbarras">
				</div>	
			</div>		

			<div class="form-group row">
				<label for="img" class="col-md-4 col-form-label text-md-right">Imagem</label>

				<div class="col-md-6">
					<input type='file' id="primaryImage" name="primaryImage[]" multiple>
				</div>	
			</div>	

			<div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">Tipo</label>
				<div class="col-md-2">
					<select class="form-control" id="select" name="cat" onchange="buscar()">
						<option></option>
						@foreach($cat as $ca)
						<option value="{{$ca->nome}}">{{$ca->nome}}</option>
						@endforeach
					</select>
				</div>
			</div>	
			<div class="form-group row">
				<label for="nome" class="col-md-4 col-form-label text-md-right">Tamanhos</label>

				<div class="col-md-6" id="check">
					
				</div>	
			</div>	
			<div class="form-group row">
				<label for="nome" class="col-md-4 col-form-label text-md-right">Nome do Produto</label>

				<div class="col-md-6">
					<input type="text" class="form-control" name="nome">
				</div>	
			</div>	
			<div class="form-group row">
				<label for="codigo" class="col-md-4 col-form-label text-md-right">Quantidade</label>

				<div class="col-md-2">
					<input type="number" class="form-control" name="quantidade">
				</div>	
			</div>

			<div class="form-group row">
				<label for="codigo" class="col-md-4 col-form-label text-md-right">Preço de Custo</label>

				<div class="col-md-2">
					<input type="text" class="form-control" name="prc_custo">
				</div>	
			</div>	
			<div class="form-group row">
				<label for="codigo" class="col-md-4 col-form-label text-md-right">Preço de Venda</label>

				<div class="col-md-2">
					<input type="text" class="form-control" name="prc_venda">
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
<script>
	
function buscar(){

	var cat = $("#select").val();
	$.ajax({

        type: "GET",
        url: '/estoque/ajax/' + cat,
        success: function (data) {
        	var valor = data;
			var i = 0;
			$('.check').remove();
			
			var remover = $('#check').html(""); 
			
			// console.log(remover);

        	$(valor[i]).each(function() {

        		var quantidade = valor;
				i++;
				var cont=0;
				$(quantidade).each(function() {
					// console.log(quantidade[cont]["tamanho"]);

					var div = $("<input type='checkbox' value='"+quantidade[cont]["id"]+"' name='tamanho[]' class='check'/>"+quantidade[cont]["tamanho"]+"<br>", {
					name: quantidade[cont]["tamanho"],
					value: quantidade[cont]["tamanho"],
					});

					$("#check").append(div);

					cont++;


				});
			});
        }
    });
}


</script>
@endsection
