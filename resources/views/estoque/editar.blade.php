@extends('master')
@section('content')


<div class='col-md-12' align= center>
	<h3>Cadastro de Usuário</h3>
</div>
<div class='container-fluid well col-md-12'>
	<div class='col-md-12 col-sm-12'>
		<form method="POST" id="form" action="{{ route('estoque/atualizar',$dados[0]->id) }}">
			@csrf
            <input type="hidden" name="_method" value="put">

			<div hidden class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">id</label>

				<div class="col-md-2">
					<input type="text" class="form-control"  name="id" id="chave" value="{{$dados[0]->id}}">
				</div>
			</div>		

			<div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">Código de Barras</label>

				<div class="col-md-2">
					<input type="text" class="form-control" name="codbarras" value="{{$dados[0]->codbarras}}">
				</div>
			</div>	

			<div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">Tipo</label>
				<div class="col-md-2">
					<select class="form-control" id="select" name="cat" disabled  >
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
				<label for="name" class="col-md-4 col-form-label text-md-right">Nome do Produto</label>

				<div class="col-md-2">
					<input type="text" class="form-control select" name="nome" value="{{$dados[0]->nome}}">
				</div>
			</div>	

			<div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">Quantidade</label>

				<div class="col-md-2">
					<input type="text" class="form-control" name="number" value="{{$dados[0]->quantidade}}">
				</div>
			</div>		

			<div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">Preço de Custo</label>

				<div class="col-md-2">
					<input type="text" class="form-control" name="number" value="{{$dados[0]->prc_custo}}">
				</div>
			</div>		

			<div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">Preço de Venda</label>

				<div class="col-md-2">
					<input type="text" class="form-control" name="number" value="{{$dados[0]->prc_venda}}">
				</div>
			</div>	

			<div class="form-group row">
				<label for="name" class="col-md-4 col-form-label text-md-right">Fotos</label>		

					@foreach($imagem as $img)
						
						<div class="col-md-2">
							<img src="{{$img->imgname)}}">
						</div>
					
					@endforeach
			
			</div>	
			<div class="form-group row mb-0">
				<div align="center" class="col-md-12 offset-md-12">
					<button type="submit" class="btn btn-success">
						Alterar
					</button>
				</div>
			</div>
		</form>
	</div>
	
</div>
<script>

/*function buscar(){

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
}*/

	window.addEventListener("load",function(){
		var cate = $("#chave").val();
		$.ajax({

	        type: "GET",
	        url: '/estoque/ajax/consult/' + cate,
	        success: function (data) {
	        	var valor = data;

				console.log(valor);

				var div = $("<input type='checkbox' checked value='"+valor[0]["id"]+"' name='tamanho' class='check' disabled  />"+valor[0]["tamanho"]+"<br>", {
				name: valor["tamanho"],
				value: valor["tamanho"],
				});

				$("#check").append(div);

	        }
	    });
	    
	},false);


</script>



@endsection