<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
        <i class="fa fa-universal-access" aria-hidden="true"></i> Dados Gerais
        </h3>
    </div>
    <div class="panel-body">
        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
            <label for="nome" class="col-sm-2 control-label">Nome Completo:<span class="required">*</span></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="nome" name="nome" value="{{old('nome')}}" required maxlength="100">
            </div>
            @if ($errors->has('nome'))
                <span class="help-block">
                    <strong>{{ $errors->first('nome') }}</strong>
                </span>
            @endif
        </div>
        <div id="divEmail" class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-sm-2 control-label">E-mail:<span class="required">*</span></label>
            <div class="col-sm-6">
                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" required maxlength="100">
                <span class="help-block" id="erroValidacaoEmail">
                    <strong><label id="erroEmail"></label></strong>
                </span>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('nomePai') ? ' has-error' : '' }}">
            <label for="nomePai" class="col-sm-2 control-label">Nome do Pai:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="nomePai" name="nomePai" value="{{old('nomePai')}}" maxlength="100">
            </div>
            @if ($errors->has('nomePai'))
                <span class="help-block">
                    <strong>{{ $errors->first('nomePai') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('nomeMae') ? ' has-error' : '' }}">
            <label for="nomeMae" class="col-sm-2 control-label">Nome da Mãe:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="nomeMae" name="nomeMae" value="{{old('nomeMae')}}" maxlength="100">
            </div>
            @if ($errors->has('nomeMae'))
                <span class="help-block">
                    <strong>{{ $errors->first('nomeMae') }}</strong>
                </span>
            @endif
        </div>
         <div class="form-group{{ $errors->has('numDependentes') ? ' has-error' : '' }}">
            <label for="numDependentes" class="col-sm-2 control-label">Nº de Dependentes:<span class="required">*</span></label>
            <div class="col-sm-2">
                <input type="number" min="0" data-mask="00" required class="form-control" id="numDependentes" name="numDependentes" value="{{old('numDependentes')}}" maxlength="100">
            </div>
            @if ($errors->has('numDependentes'))
                <span class="help-block">
                    <strong>{{ $errors->first('numDependentes') }}</strong>
                </span>
            @endif
        </div> 
        <div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">
            <label for="sexo" class="col-sm-2 control-label">Sexo:<span class="required">*</span></label>
            <div class="col-sm-2">
                <div class="radio">
                    <label>
                        @if(old('sexo') == 'M')
                        <input checked type="radio" name="sexo" value="M" required /> Masculino
                        @else
                        <input type="radio" name="sexo" value="M" required /> Masculino
                        @endif
                    </label>
                </div>
               - <div class="radio">
                    <label>
                        @if(old('sexo') == 'F')
                        <input checked type="radio" name="sexo" value="F" required /> Feminino
                        @else
                        <input type="radio" name="sexo" value="F" required /> Feminino
                        @endif
                    </label>
                </div> 
            </div>
            @if ($errors->has('sexo'))
                <span class="help-block">
                    <strong>{{ $errors->first('sexo') }}</strong>
                </span>
            @endif
        </div>
        <div id="divAltura" class="form-group{{ $errors->has('altura') ? ' has-error' : '' }}">
            <label for="altura" class="col-sm-2 control-label">Altura:<span class="required">*</span></label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="altura" name="altura" value="{{old('altura')}}" data-mask="0.00" required>
            </div>
            @if ($errors->has('altura'))
                <span class="help-block">
                    <strong>{{ $errors->first('altura') }}</strong>
                </span>
            @endif
            <span class="help-block" id="validaAltura">
                <strong>Altura inválida</strong>
            </span>
        </div>
        <div class="form-group{{ $errors->has('rg') ? ' has-error' : '' }}">
            <label for="rg" class="col-sm-2 control-label">RG:<span class="required">*</span></label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="rg" name="rg" value="{{old('rg')}}" required maxlength="20">
            </div>
            @if ($errors->has('rg'))
                <span class="help-block">
                    <strong>{{ $errors->first('rg') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('orgaoExpedidor') || $errors->has('ufOrgaoExpedId') ? ' has-error' : '' }}">
            <label for="orgaoExpedidor" class="col-sm-2 control-label">Órgão Expedidor:<span class="required">*</span></label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="orgaoExpedidor" name="orgaoExpedidor" value="{{old('orgaoExpedidor')}}" required maxlength="15">
            </div>
            @if ($errors->has('orgaoExpedidor'))
                <span class="help-block">
                    <strong>{{ $errors->first('orgaoExpedidor') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('estadoCivilId') ? ' has-error' : '' }}">
            <label for="estadoCivilId" class="col-sm-2 control-label">Estado Civil:<span class="required">*</span></label>
            <div class="col-sm-2">
                <select name="estadoCivilId" id="estadoCivilId" required class="form-control">
                    <option value="" disabled selected>Selecione</option>
                    @foreach($estadosCivisList as $estadoCivil)
                        @if(old('estadoCivilId') == $estadoCivil->id)
                        <option value="{{$estadoCivil->id}}" selected>{{$estadoCivil->estadoCivil}}</option>
                        @else
                        <option value="{{$estadoCivil->id}}">{{$estadoCivil->estadoCivil}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            @if ($errors->has('estadoCivilId'))
                <span class="help-block">
                    <strong>{{ $errors->first('estadoCivilId') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('dtNascimento') ? ' has-error' : '' }}">
            <label for="dtNascimento" class="col-sm-2 control-label">Data de Nascimento:<span class="required">*</span></label>
            <div class="col-sm-2">
                <input type="hidden" id="dtNascimentoSelecionado" value="{{old('dtNascimento')}}">
                <input type="text" class="form-control readonly" id="dtNascimento" name="dtNascimento" value="{{old('dtNascimento')}}" data-mask="00/00/0000" required data-language='pt-BR' >
            </div>
            @if ($errors->has('dtNascimento'))
                <span class="help-block">
                    <strong>{{ $errors->first('dtNascimento') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('ufNascimentoId') || $errors->has('cidadeNascId') ? ' has-error' : '' }}">
            <label for="ufNascimentoId" class="col-sm-2 control-label">UF Nascimento/Cidade Nascimento:<span class="required">*</span></label>
            <div class="col-sm-2">
                <select name="ufNascimentoId" id="ufNascimentoId" required class="form-control">
                    <option value="" disabled selected>Selecione</option>
                    @foreach($ufList as $uf)
                        @if(old('ufNascimentoId') == $uf->id)
                        <option value="{{$uf->id}}" selected>{{ (isset($uf->sigla)) ? $uf->sigla . ' - ' . $uf->estado : $uf->estado}}</option>
                        @else
                        <option value="{{$uf->id}}">{{ (isset($uf->sigla)) ? $uf->sigla . ' - ' . $uf->estado : $uf->estado}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            @if ($errors->has('ufNascimentoId'))
                <span class="help-block">
                    <strong>{{ $errors->first('ufNascimentoId') }}</strong>
                </span>
            @endif
            <div class="col-sm-4">
                <input type="hidden" name="cidadeNascId" id="cidadeNascId" value="{{old('cidadeNascId')}}">
                <select name="cidadeNascId" id="cidadeNascId" required class="form-control">
                    <option value="" disabled selected>Selecione</option>
                </select>
            </div>
            @if ($errors->has('cidadeNascId'))
                <span class="help-block">
                    <strong>{{ $errors->first('cidadeNascId') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('anosSvPub') || $errors->has('mesesSvPub') || $errors->has('diasSvPub') ? ' has-error' : '' }}">
            <label for="svPub" class="col-sm-2 control-label">Tempo de Serviço Anterior nas Forças Armadas:<span class="required">*</span></label></label>
            <div class="col-sm-2">
                <select name="anosSvPub" id="anosSvPub" class="form-control">
                    @for($i = 0; $i < 5; $i++)
                        @if (old('anosSvPub') == $i)
                            <option value="{{$i}}" selected>{{$i}}</option>
                        @else
                            <option value="{{$i}}">{{$i}}</option>
                        @endif
                    @endfor
                </select>
            </div>
            <div class="col-sm-2">
                <select name="mesesSvPub" id="mesesSvPub" class="form-control">
                    <option value="0" disabled selected>Meses</option>
                    @for($i = 0; $i < 13; $i++)
                        @if (old('mesesSvPub') == $i)
                            <option value="{{$i}}" selected>{{$i}}</option>
                        @else
                            <option value="{{$i}}">{{$i}}</option>
                        @endif
                    @endfor
                </select>
            </div>
            <div class="col-sm-2">
                <select name="diasSvPub" id="diasSvPub" class="form-control">
                    <option value="0" disabled selected>Dias</option>
                    @for($i = 0; $i < 32; $i++)
                        @if (old('diasSvPub') == $i)
                            <option value="{{$i}}" selected>{{$i}}</option>
                        @else
                            <option value="{{$i}}">{{$i}}</option>
                        @endif
                    @endfor
                </select>
            </div>
        </div>
        <div class="form-group{{ $errors->has('situacaoId') ? ' has-error' : '' }}">
            <label for="situacaoId" class="col-sm-2 control-label">Situação:<span class="required">*</span></label>
            <div class="col-sm-4">
                <select name="situacaoId" id="situacaoId" required class="form-control">
                    <option value="" disabled selected>Selecione</option>
                    @foreach($situacaoList as $situacao)
                        @if(old('situacaoId') == $situacao->id)
                        <option value="{{$situacao->id}}" selected>{{$situacao->situacao}}</option>
                        @else
                        <option value="{{$situacao->id}}">{{$situacao->situacao}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            @if ($errors->has('situacaoId'))
                <span class="help-block">
                    <strong>{{ $errors->first('situacaoId') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('tipoDocMilitarId') ? ' has-error' : '' }}">
            <label for="tipoDocMilitarId" class="col-sm-2 control-label">Possui Documento Militar ?:<span class="required">*</span></label>
            <div class="col-sm-6">
                <select name="tipoDocMilitarId" id="tipoDocMilitarId" required class="form-control">
                    <option value="" disabled selected>Selecione</option>
                    @foreach($tiposDocMilList as $tipoDoc)
                        @if(old('tipoDocMilitarId') == $tipoDoc->id)
                        <option value="{{$tipoDoc->id}}" selected>{{ (isset($tipoDoc->sigla)) ? $tipoDoc->sigla . ' - ' . $tipoDoc->tipoDocumento : $tipoDoc->tipoDocumento}}</option>
                        @else
                        <option value="{{$tipoDoc->id}}">{{ (isset($tipoDoc->sigla)) ? $tipoDoc->sigla . ' - ' . $tipoDoc->tipoDocumento : $tipoDoc->tipoDocumento}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            @if ($errors->has('tipoDocMilitarId'))
                <span class="help-block">
                    <strong>{{ $errors->first('tipoDocMilitarId') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('idtMil') || $errors->has('forcaId') ? ' has-error' : '' }}" id="divDocMilitar">
            <label for="idtMil" class="col-sm-2 control-label">Nº Identidade Militar/Força:<span class="required">*</span></label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="idtMil" name="idtMil" value="{{old('idtMil')}}" data-mask="000000000-0" required>
                @if ($errors->has('idtMil'))
                    <span class="help-block">
                        <strong>{{ $errors->first('idtMil') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-sm-3">
                <select name="forcaId" id="forcaId" required class="form-control">
                    <option value="" disabled selected>Selecione</option>
                    @foreach($forcaList as $forca)
                        @if(old('forcaId') == $forca->id)
                        <option value="{{$forca->id}}" selected>{{ (isset($forca->sigla)) ? $forca->sigla . ' - ' . $forca->forca : $forca->forca}}</option>
                        @else
                        <option value="{{$forca->id}}">{{ (isset($forca->sigla)) ? $forca->sigla . ' - ' . $forca->forca : $forca->forca}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            @if ($errors->has('forcaId'))
                <span class="help-block">
                    <strong>{{ $errors->first('forcaId') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>
@section('javaScript')

@parent

<script>

    // minDate: Incorp Março - nascimento 14/03/1983 
    //maxDate: 19 anos 06/03/2005

    function minMaxDateNiver(dia, mes, ano) {
        return ( new Date(1983, 07, 14) > new Date(ano, mes, dia) ) || ( new Date(2005, 03, 06) < new Date(ano, mes, dia) );
    }

    $('#dtNascimento').change(function(d) {
        var dataPessoa = $(this).val();
        var dataArray = dataPessoa.split('/');
 
        if ( dataArray.length !== 3 ) {
            $('#dtNascimento').val('');
            $('#dtNascimento').focus();
        } else {
            if ( minMaxDateNiver(dataArray[0], dataArray[1], dataArray[2]) )
            {
                $('#dtNascimento').val('');
                alert('Data de Nascimento fora dos limites aceitos.');
                $('#dtNascimento').focus();
            }
        }
    });
</script>

@endsection