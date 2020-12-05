@extends('layouts.interno')
@section('title')

@section('pre-assets')


@stop

@section('content')
<div class="controle">
	<h2>Novo Usuário</h2>
	<div class="row">
		<div class="col-sm-12">
			<h3 style="text-align: center;">Quer ter o controle das suas finanças??</h3>
			<p style="text-align: center;">Cadastre-se abaixo para começar:</p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<form action="" id="formCadastro" name="formCadastro">
				@csrf
				<div class="form-group col-sm-12">
					<label for="">Nome</label>
					<input type="nome" class="form-control" required name="name">
				</div>
				<div class="form-group col-sm-8">
					<label for="exampleInputPassword1">Email</label>
					<input type="email"  required class="form-control" id="email" name="email">
				</div>
				<div class="form-group col-sm-4">
					
					<label for="exampleInputPassword1">CPF</label>
					<input type="cpf"  required class="form-control" id="cpf" name="cpf">
				</div>
				<div class="form-group col-sm-12">
					<label for="exampleInputPassword1">Telefone</label>
					<input type="tel"  required class="form-control" id="telefone" name="phone">
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
	$("#formCadastro").submit(function(e) {
		//$("#btEnviar").attr('disabled',true)
		e.preventDefault();
		$(".loading-dot").fadeIn('fast');
				var url = "{{route('enviaContato')}}"; 
				$.ajax({
					type: "POST",
					url: url,
				data: $("#formCadastro").serialize(), 
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
						swal("Ops!","Este CPF ja consta nos cadastros, vamos te redirecionar.", "info");
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