@extends('layouts.interno')
@section('title')

@section('pre-assets')


@stop

@section('content')
<div class="controle_800">
	<div class="row">
		<div class="col-sm-6">
			<h3>{{$acc->user->name}}</h3>
			<p>{{$acc->acc_number}} | {{$acc->acc_agency}}</p>
		</div>
		<div class="col-sm-6 text-right">
			
			<h3>Saldo atual: <span>R$ {{$lastValue->new_value}}</span></h3>
		</div>

	</div>
	<div class="row text-right">
		<div class="col-sm-12">
			<a class="btn btn-success" data-toggle="collapse" href="#novaEntrada" role="button" aria-expanded="false" aria-controls="novaEntrada"><i class="fa fa-plus" aria-hidden="true"></i>
 Nova entrada</a>
			<button class="btn btn-success" type="button" data-toggle="collapse" data-target="#novaSaida" aria-expanded="false" aria-controls="novaSaida"><i class="fa fa-minus" aria-hidden="true"></i>
 Nova Saida</button>
			<div class="row">
				<div class="col">
					<div class="collapse multi-collapse" id="novaEntrada">
						<div class="card card-body">
							<div class="row">
					<div class="col">
						<h4>Nova entrada</h4>
						<form id="formEntrada" name="formEntrada">
							@csrf
							<input type="hidden" value="E" name="operation">
							<input type="hidden" name="user_id" value="{{$acc->user_id}}">
							<input type="hidden" name="acc_id" value="{{$acc->id}}">
							<input type="hidden" name="ac_value" value="{{$acc->balance}}">
							<div class="form-group col-sm-8">
								<label for="exampleInputPassword1">Data da operação</label>
								<input type="data"  required class="form-control" id="data" name="date">
							</div>
							<div class="form-group col-sm-4">
								<label for="exampleInputPassword1">Valor da operaçãao</label>
								<input type="valor"  required class="form-control" id="valorEntrada" name="value">
							</div>
							<div class="form-group col-sm-12">
								<label for="exampleInputPassword1">Descrição</label>
								<input type="descricao"  required class="form-control" id="descricao" name="desc">
							</div>

							<div class="row">
								<div class="col-sm-4 pull-right">
									<button type="submit" class="btn btn-success btn-block" style="background-color: #AEC700; border: 1px solid #AEC700;">Enviar</button>
								</div>
								<div class="col-sm-8">
									<h4>Novo saldo: <span id="novoSaldo"></span></h4>
								</div>
							</div>

						</form>
					</div>
				</div>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="collapse multi-collapse" id="novaSaida">
						<div class="card card-body">
							<div class="row">
					<div class="col">
						<h4>Nova Saida</h4>
						<form id="formSaida" name="formSaida">
							@csrf
							<input type="hidden" value="S" name="operation">
							<input type="hidden" name="user_id" value="{{$acc->user_id}}">
							<input type="hidden" name="acc_id" value="{{$acc->id}}">
							<input type="hidden" name="ac_value" value="{{$acc->balance}}">
							<div class="form-group col-sm-8">
								<label for="exampleInputPassword1">Data da operação</label>
								<input type="data"  required class="form-control" id="data" name="date">
							</div>
							<div class="form-group col-sm-4">
								<label for="exampleInputPassword1">Valor da operaçãao</label>
								<input type="valor"  required class="form-control" id="valorSaida" name="value">
							</div>
							<div class="form-group col-sm-12">
								<label for="exampleInputPassword1">Descrição</label>
								<input type="descricao"  required class="form-control" id="descricao" name="desc">
							</div>

							<div class="row">
								<div class="col-sm-4 pull-right">
									<button type="submit" class="btn btn-success btn-block" style="background-color: #AEC700; border: 1px solid #AEC700;">Enviar</button>
								</div>
								<div class="col-sm-8">
									<h4>Novo saldo: <span id="novoSaldoSaida"></span></h4>
								</div>
							</div>

						</form>
					</div>
				</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="timeline">
		<ul>
			@foreach($transfers as $transfer)
			<li>
				<h3>{{$transfer->date}}</h3>
				<p>
					@if($transfer->operation == 'E')
					<span class="text-success"><i class="fa fa-plus" aria-hidden="true"></i></span>
					@else
					<span class="text-danger"><i class="fa fa-minus" aria-hidden="true"></i></span>
					@endif
				 R$ {{$transfer->value}}<br>
					{{$transfer->desc}}<br>
				</p>
			</li>
			@endforeach				
		</ul>
	</div>
</div>




@endsection
@section('pos-script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	$('#valorEntrada').keyup(function () {

		valorAtual = {{$lastValue->new_value}};

  // Se não for número muda para nada 
  if(!$.isNumeric($(this).val())){
  	$(this).val('');   
  }

  
  // Se for diferente de nada ele muda o link para o obtido
  // Se for igual ao nada o link não será modificado
  if($(this).val() != ''){
  	valor = $(this).val();
  }

  
  // Insere o link como TEXT, altere isto!
  // Apenas para visualização!
  $('#novoSaldo').text(parseInt(valor) + parseInt(valorAtual));
  
});

		$('#valorSaida').keyup(function () {

		valorAtual = {{$lastValue->new_value}};

  // Se não for número muda para nada 
  if(!$.isNumeric($(this).val())){
  	$(this).val('');   
  }

  
  // Se for diferente de nada ele muda o link para o obtido
  // Se for igual ao nada o link não será modificado
  if($(this).val() != ''){
  	valor = $(this).val();
  }

  
  // Insere o link como TEXT, altere isto!
  // Apenas para visualização!
  $('#novoSaldoSaida').text(parseInt(valorAtual) - parseInt(valor));
  
});

	$("#formEntrada").submit(function(e) {
		//$("#btEnviar").attr('disabled',true)
		e.preventDefault();
		$(".loading-dot").fadeIn('fast');
				var url = "{{route('enviaEntrada')}}"; 
				$.ajax({
					type: "POST",
					url: url,
				data: $("#formEntrada").serialize(), 
				success: function(data)
				{
					if(data.error == 0){
						$(".loading-dot").fadeOut('fast');

						swal("Sucesso!","Entrada cadastrada com sucesso.", "success");
						//$("#formCadastro")[0].reset();
						$("#btEnviar").attr('disabled',false);
						setTimeout(function () {
   							window.location.href = data.url; 
						}, 2000); 			

					}
				}
			});
				e.preventDefault(); // avoid to execute the actual submit of the form.
			});

	$("#formSaida").submit(function(e) {
		//$("#btEnviar").attr('disabled',true)
		e.preventDefault();
		$(".loading-dot").fadeIn('fast');
				var url = "{{route('enviaSaida')}}"; 
				$.ajax({
					type: "POST",
					url: url,
				data: $("#formSaida").serialize(), 
				success: function(data)
				{
					if(data.error == 0){
						$(".loading-dot").fadeOut('fast');

						swal("Sucesso!","Saida cadastrada com sucesso.", "success");
						//$("#formCadastro")[0].reset();
						$("#btEnviar").attr('disabled',false);
						setTimeout(function () {
   							window.location.href = data.url; 
						}, 2000); 			

					}
				}
			});
				e.preventDefault(); // avoid to execute the actual submit of the form.
			});
</script>
@endsection