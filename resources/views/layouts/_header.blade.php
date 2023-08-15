<header class="site-header">
    <div class="top">
        <div class="container">
        <div class="row">
                <div class="col-sm-8">
                    @if (!Auth::guest())
            <a href="{{route('candidato.dashboard')}}" class="navbar-brand">
                <img width="40" src="{{asset('img/10rm.png')}}" alt="Post">
            </a>
            @else
            <a href="{{route('index')}}" class="navbar-brand">
                <img src="{{asset('img/10rm.png')}}" alt="Post" width="40">
            </a>
            @endif
                    <h4 class="text-logo">Comando da 10ª Região Militar <br> <small style="color:#FFF;">Região Martim Soares Moreno</small></h4>
                </div>
                
                <div class="col-sm-4">
                
                    <ul class="list-inline pull-right">
                    <i class="fa fa-phone fa-3x"></i>
                    <li class="y-auto">  (85) 3403-7491<br/>(85) 3255-1600 Ramal 1718 | 1663 </li>
                    </ul>                        
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-default">
        <div class="container">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <i class="fa fa-bars"></i>
            </button>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-navbar-collapse">
                <ul class="nav navbar-nav main-navbar-nav">
                    <li><a href="https://www.defesa.gov.br" target="_blank" title="Ministério da Defesa">MINISTÉRIO DA DEFESA</a></li>
                    <li><a href="http://www.eb.mil.br" target="_blank" title="Exército Brasileiro">EXÉRCITO BRASILEIRO</a></li>
                    <li><a href="http://www.cmne.eb.mil.br" target="_blank" title="Comando Militar do Nordeste">COMANDO MILITAR DO NORDESTE</a></li>
                    <li><a href="http://www.10rm.eb.mil.br" target="_blank" title="Comando da 10ª Regão Militar">COMANDO DA 10ª REGIÃO MILITAR</a></li>
                </ul>                           
                
            </div><!-- /.navbar-collapse -->                
            <!-- END MAIN NAVIGATION -->
        </div>
    </nav>    
    @if (!Auth::guest())
    <nav class="navbar navbar-default">
        <div class="container" align="right">
            <p>{{ Auth::user()->nome }}</p>
            <p>
                <a href="{{route('candidato.meusDados')}}"><i class="fa fa-user" aria-hidden="true"></i> Meus Dados</a> |
                <a href="{{route('candidato.dashboard')}}"><i class="fa fa-address-card" aria-hidden="true"></i> Minhas Inscrições</a> |
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out" aria-hidden="true"></i> Sair
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </p>
        </div>
    </nav>
    @endif
</header>
