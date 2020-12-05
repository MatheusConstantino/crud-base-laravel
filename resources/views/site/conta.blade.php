@extends('layouts.interno')
@section('title')

@section('pre-assets')


@stop

@section('content')
	<div class="controle">
		<h2>Nova Conta</h2>
				<div class="row">
					<div class="col-sm-12">
						<h3 style="text-align: center;">Quer ter o controle das suas finanças??</h3>
						<p style="text-align: center;">Cadastre-se abaixo para começar:</p>
					</div>
				</div>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<form id="formConta" name="formConta">
						@csrf
						<input type="hidden" name="user_id" value="{{$user_id}}">
				<div class="form-group col-sm-12">
				  <label for="">Banco</label>
				  <input type="banco" class="form-control" required name="bank">
				</div>
				<div class="form-group col-sm-8">
				  <label for="exampleInputPassword1">Conta</label>
				  <input type="conta"  required class="form-control" id="conta" name="acc_number">
				</div>
				<div class="form-group col-sm-4">
					
					<label for="exampleInputPassword1">Agencia</label>
					<input type="agencia"  required class="form-control" id="agencia" name="acc_agency">
				  </div>
				  <div class="form-group col-sm-8">
					<label for="exampleInputPassword1">Saldo em conta</label>
					<input type="saldo"  required class="form-control" id="saldo" name="balance">
				  </div>
				  <div class="form-group col-sm-4">
					<label for="exampleInputPassword1">Data abertura</label>
					<input type="data"  required class="form-control" id="data" name="date">
				  </div>
				 
				<div class="col-sm-4 pull-right">
				  <button type="submit" class="btn btn-success btn-block" id="btEnviar" style="background-color: #AEC700; border: 1px solid #AEC700;">Enviar</button>
				 </div>
				</form>
				</div>
			</div>
			
				<div class="clearfix"></div>
				
			<div class="clearfix"></div>
		</div>


@endsection
@section('pos-script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
	$("#formConta").submit(function(e) {
		//$("#btEnviar").attr('disabled',true)
		e.preventDefault();
		$(".loading-dot").fadeIn('fast');
				var url = "{{route('enviaConta')}}"; 
				$.ajax({
					type: "POST",
					url: url,
				data: $("#formConta").serialize(), 
				success: function(data)
				{
					if(data.error == 0){
						$(".loading-dot").fadeOut('fast');

						swal("Sucesso!","Cadastro feito com sucesso, vamos te redirecionar para o próximo passo.", "success");
						//$("#formCadastro")[0].reset();
						$("#btEnviar").attr('disabled',false);
						setTimeout(function () {
   							window.location.href = data.url; 
						}, 5000); 			

					}else{
						$(".loading-dot").fadeOut('fast');
						swal("Ops!","Esta conta ja consta em nosso sistema para esse usuário, vamos te redirecionar.", "info");
						//$("#formCadastro")[0].reset();
						$("#btEnviar").attr('disabled',false);
						setTimeout(function () {
   							window.location.href = data.url; 
						}, 5000); 	
					}
				}
			});
				e.preventDefault(); // avoid to execute the actual submit of the form.
			});
		</script>
		@endsection