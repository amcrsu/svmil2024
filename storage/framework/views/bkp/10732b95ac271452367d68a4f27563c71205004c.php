<header class="site-header">
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p>Comando da 10ª Região Militar</p>
                </div>
                <div class="col-sm-6">
                    <ul class="list-inline pull-right">
                        <li><i class="fa fa-phone"></i> (85) 3255-1600 Ramal 1718 | 1663</li>
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
            <?php if(!Auth::guest()): ?>
            <a href="<?php echo e(route('candidato.dashboard')); ?>" class="navbar-brand">
                <img width="65" src="<?php echo e(asset('img/10rm.png')); ?>" alt="Post">
            </a>
            <?php else: ?>
            <a href="<?php echo e(route('index')); ?>" class="navbar-brand">
                <img src="<?php echo e(asset('img/10rm.png')); ?>" alt="Post" width="60">
            </a>
            <?php endif; ?>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-navbar-collapse">
                <ul class="nav navbar-nav main-navbar-nav">
                    <li><a href="http://www.defesa.gov.br/" target="_blank" title="Ministério da Defesa">MINISTÉRIO DA DEFESA</a></li>
                    <li><a href="http://www.eb.mil.br/" target="_blank" title="Exército Brasileiro">EXÉRCITO BRASILEIRO</a></li>
                    <li><a href="http://www.cmne.eb.mil.br/" target="_blank" title="Comando Militar do Nordeste">COMANDO MILITAR DO NORDESTE</a></li>
                </ul>                           
            </div><!-- /.navbar-collapse -->                
            <!-- END MAIN NAVIGATION -->
        </div>
    </nav>    
    <?php if(!Auth::guest()): ?>
    <nav class="navbar navbar-default">
        <div class="container" align="right">
            <p><?php echo e(Auth::user()->nome); ?></p>
            <p>
                <a href="<?php echo e(route('candidato.meusDados')); ?>"><i class="fa fa-user" aria-hidden="true"></i> Meus Dados</a> |
                <a href="<?php echo e(route('candidato.dashboard')); ?>"><i class="fa fa-address-card" aria-hidden="true"></i> Minhas Inscrições</a> |
                <a href="<?php echo e(route('logout')); ?>"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out" aria-hidden="true"></i> Sair
                </a>

                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo e(csrf_field()); ?>

                </form>
            </p>
        </div>
    </nav>
    <?php endif; ?>
</header>
