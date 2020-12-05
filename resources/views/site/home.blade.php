@extends('layouts.site')


@section('pre-assets')


@stop
@section('banner')
<div id="banner">
			<div class="item">
				<div class="contentPreview" style="">
					<div class="titulo" style="font-size: 3em;color: #fff; font-weight: 700">Soluções em serviços de <br>engenharia e manutenção</div>
					<div class="text" style="font-size: 1.5em; color: #fff;font-weight: 700">para mercado eólico 
</div>
					<div class="botao">

						<!-- <a href="#" class="">
							botão
						</a> -->
					</div>
				</div>
				<div class="img">
					<img class="cellphone" src="{{asset('/min/img/banner-interno.jpg')}}" alt="serviços engenharia e manutenção eólica" >
					<img class="desktop" src="{{asset('/min/img/banner.png')}}" alt="serviços engenharia e manutenção eólica" >
				</div>



			</div>
		</div>
@stop
@section('content')
<section id="soluces" class="p-top-xlg">
			<div class="controle">
				<div class="solucoes-home">
					<h4 class="text-right">MATHEUS CONSTANTINO GOMES <br>
						<small class="text-right">0001 | 0000000-0</small>
					</h4>

					<ul>
						<li><a href="produtos.html">
							<div class="icon">
							<img src="{{asset('min/img/extrato-bancario.png')}}" alt="">
							</div>
							<div class="title">EXTRATO</div>
						</a></li>
						<li><a href="">
							<div class="icon">
								<img src="{{asset('min/img/bank-transfer.png')}}" alt="">
							</div>
							<div class="title">ENTRADA <br> SAIDA</div>
						</a></li>
					</ul>
				</div>
			</div>
		</section>
			<div class="clearfix"></div>

@endsection
@section('pos-script')  

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-countto/1.2.0/jquery.countTo.min.js" integrity="sha256-ABaSwG2hLCOs+8EKSe3XsIukUcbV1nraP4uzVL+cuS4=" crossorigin="anonymous"></script>
<script>

</script>
@endsection