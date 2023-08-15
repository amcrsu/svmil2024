@extends('layouts.app')
@section('content')
<section class="services">
<div class=" head-title-cover">
<div class=" head-title">
    <h2 class="section-title">Cabo Especialista Temporário - CET</h2>
    <h4 class="section-title">- 2024 -</h4>
    <p class="desc">- Nível Fundamental -</p>
    <div class="arrow">
                <span></span>
                <span></span>
                <span></span>
    </div>
</div>
</div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="media">
                    <div class="media-left media-top">
                        <i class="fa fa-cogs icon"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">INFORMAÇÕES</h4>
                        <p>Processo visando à seleção de candidatos voluntários para a prestação do Serviço Militar Especialista Temporário como Cabo Especialista Temporário, na área da 10ª Região Militar, para o ano de 2024.</p>
                        
                        <p class="alert alert-success" role="alert">O Sistema de inscrição para Cabo Especialista Temporário estará disponível a partir das <strong>09:00h do dia 14 de agosto de 2023 até às 12:00h do dia 01 de setembro de 2023, conforme o Aviso de Seleção nº 006 - SSMR/10, de 27 de julho de 2023.</strong>
                        </p>
                        
                        <p>Para mais informações referentes ao processo seletivo, acesse o Aviso de Seleção clicando no link abaixo:</p>
                        
                        <p class="alert alert-info" role="alert">
                            <a href="{{asset('docs/AVISO_DE_CONVOCACAO_CET_Nr_006_27-07-23.pdf')}}" target="_blank" title="Aviso de Seleção nº 006 - SSMR/10">
                            {{-- <a href="https://www.10rm.eb.mil.br/images/artigos/servicos/ssmr/selecao-cet/2022-2/AVISO_CONVOCACAO_Nr_008_CET_2023.pdf" target="_blank" title="Aviso de Seleção para Cabo Especialista Temporário - CET"> --}}
                                <i style="float:left; margin-right:7px;display:block;" class="fa fa-file-pdf-o fa-3x" aria-hidden="true"></i>Aviso de Convocação nº 6 - SSMR / 10RM, de 27 de julho de 2023.
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-6 col-xs-12">
                <div class="media">
                    <div class="media-left media-top">
                        <i class="fa fa-user-md icon"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">ACESSO AO CANDIDATO</h4>
                        <p>Ainda não fez sua inscrição ? Clique no botão abaixo para fazê-la.</p>
                      <!--  <p class="alert alert-danger" role="alert" style="text-align:center;">INSCRIÇÕES ENCERRADAS!!!</p>   -->
                        <!-- BOTAO FAZER INSCRIÇAO -->
                        <a href="{{route('candidato.novo')}}" class="btn btn-primary">Fazer Minha Inscrição</a>
                    </div>
                        <hr />
                    
                        <div class="media-left media-top">
                            <i class="fa fa-sign-in icon"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">ACESSO A ÁREA DO CANDIDATO</h4>

                            <p>Caso tenha iniciado sua inscrição, mas não concluiu todo o processo, informe seu <b>CPF e SENHA</b> abaixo para acessar a <strong>Área do Candidato</strong> e dar continuidade à sua inscrição ou realizar a <strong> impressão da Ficha de Inscrição</strong>.</p>

                            <!-- OCULTAR E EXIBIR A DIV COM A CLASS HIDE/TRUE -->
                            <div class="true" class="alert alert-danger" role="alert">
                            <p>Caso tenha finalizado sua inscrição, informe seus dados abaixo e acesse a <strong>Área do Candidato</strong> para gerar o <b>BOLETO de pagamento da GRU</b> e/ou realizar a <strong> impressão da Ficha de Inscrição</strong>.</p>
                            </div>
                        
                        <form  method="POST" role="form" action="{{ route('login') }}">
			    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            {{csrf_field()}}
                            <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                                <label class="sr-only" for="cpf">CPF</label>
                                <div class="input-group col-sm-4">
                                    <div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" data-mask="000.000.000-00" required  value="{{ old('cpf') }}">
                                </div>
                                @if ($errors->has('cpf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('senha') ? ' has-error' : '' }}">
                                <label class="sr-only" for="senha">Senha</label>
                                <div class="input-group col-sm-4">
                                    <div class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></div>
                                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                                </div>
                                @if ($errors->has('senha'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('senha') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-default"><i class="fa fa-sign-in" aria-hidden="true"></i> Acessar Área do Candidato</button>
                        </form>
                    </div>
                </div>
            </div>                  
        </div>
    </div>
</section>
@endsection
