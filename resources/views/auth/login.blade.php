@extends('layouts.login')

@section('content')

<style>

.login-page{
  background: #7ec12038 url('{{asset('/min/img/pattern.svg')}}') !important;
  background-size: cover;
  background-position: center !important;
  background-repeat: repeat;
}

</style>
@yield('pre-assets')
 
<div class="login-box">
  <div class="login-logo">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body text-center">
      <img src="{{asset('/min/img/logo-rodape.png')}}" alt="" style="width: 200px !important; padding: 20px;">
      <!-- <p class="login-box-msg">Acessar</p> -->

    <form action="{{ url('login') }}" method="post">
    {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-success btn-block">Entrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

   
      <!-- /.social-auth-links -->

     
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
@endsection
@section('pos-script')
 @if($errors->any())
  @foreach($errors->all() as $error)
<script>
	
	 $(document).Toasts('create', {
        class: 'bg-danger', 
        title: 'Erro',
        subtitle: '',
        body: '{{$error}}'
      })
	
</script>
  @endforeach
     @endif

     @endsection
