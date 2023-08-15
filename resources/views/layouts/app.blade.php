<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Sistema de Inscrição Online - SIOL | 10ª Região Militar</title>
    
    <link href="{{asset('css/fonts.googleapis.css')}}" rel="stylesheet">
    <link href="{{asset('lib/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link  href="{{asset('lib/air-datepicker/dist/css/datepicker.min.css')}}" rel="stylesheet">
    <link  href="{{asset('lib/jquery-mobile-datepicker/jquery.mobile.datepicker.css')}}" rel="stylesheet">
    <link  href="{{asset('lib/jquery-mobile-datepicker/jquery.mobile.datepicker.theme.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   <script>
	window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
   </script>
</head>
<body>
    @include('layouts._header')
    <main class="site-main">
        @if(Session::has('mensagem'))
        <div class="alert alert-{{Session::get('mensagem')['class']}}" role="alert">
            <div align="center" class="card-content">
                {{Session::get('mensagem')['msg']}}
            </div>
        </div>
        @endif
        @yield('content')
    </main>
    @include('layouts._footer')
    @include('layouts._scripts')
    </body>
</html>
