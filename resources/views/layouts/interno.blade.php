	<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=10">

  <title>CRUD BASICO</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<link rel="stylesheet" href="{{asset('min/css/styles.css')}}">
    <meta name="theme-color" content="#221205">
      <meta name="msapplication-TileColor" content="#221205">
      @yield('pre-assets')
        <style> 
    .maps:hover{
          color: #009abf;
          font-weight: 400;
          text-decoration: none;
    }
    #galeria{
      text-align: center;
    }
    #galeria li{
      display: inline-block;
      width: 23%;
      margin: 15px 9px;
      cursor: pointer;
    }
    #galeria li:hover{
      box-shadow: 0 0 19px 4px #5bc0de45;
    }
  </style>
</head>
<body>
  <div id="banner">
      <div class="item banner-produtos">
        <div class="img-interno banner-produtos" style="background: url('../min/img/banner-interno.jpg')">
          <div class="controle">
            <h2 style="color: #fff;">Crud Básico</h2>
          </div>
        </div>



      </div>
    </div>
  
     <div id="conteudo">
  			 @yield('content')
      <div class="clearfix"></div>
    </div>
    </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  <script src="{{asset('min/js/abswind.js')}}"></script>


  @yield('pos-script')
</body>
</html>
