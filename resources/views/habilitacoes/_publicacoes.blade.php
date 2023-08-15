 <div class="alert alert-info" role="alert">
        <h4>Leia atentamente as informações abaixo!</h4>
        <ul>
            <li>Serão aceitos apenas 3 de cada tipo de publicação.</b> </li>
        </ul>
</div>
<div class="form-group{{ $errors->has('tipoPublicacaoId') ? ' has-error' : '' }}">
    <label for="tipoPublicacaoId" class="col-sm-2 control-label">Tipo da Publicação:</label>
    <div class="col-sm-4">
        <select name="tipoPublicacaoId" id="tipoPublicacaoId" class="form-control" required>
            <option value="" disabled selected>Selecione</option>
            @foreach($listaTiposPublicacao as $tipoTitulo)
            @if(old('tipoPublicacaoId') == $tipoTitulo->id)
            <option value="{{$tipoTitulo->id}}" selected>{{$tipoTitulo->tipoTitulo}}</option>
            @else
            <option value="{{$tipoTitulo->id}}">{{$tipoTitulo->tipoTitulo}}</option>
            @endif
            @endforeach
        </select>
        @if ($errors->has('tipoPublicacaoId'))
            <span class="help-block">
                <strong>{{ $errors->first('tipoPublicacaoId') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('tituloPublicacao') ? ' has-error' : '' }}">
    <label for="tituloPublicacao" class="col-sm-2 control-label">Título Publicado:<span class="required">*</span></label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="tituloPublicacao" name="tituloPublicacao" value="{{old('tituloPublicacao')}}" placeholder="Título Publicado" maxlength="100" required>
        @if ($errors->has('tituloPublicacao'))
            <span class="help-block">
            <strong>{{ $errors->first('tituloPublicacao') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('veiculoPublicacao') ? ' has-error' : '' }}">
    <label for="veiculoPublicacao" class="col-sm-2 control-label">Veículo da Publicação:<span class="required">*</span></label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="veiculoPublicacao" name="veiculoPublicacao" value="{{old('veiculoPublicacao')}}" placeholder="Veículo de Publicação" maxlength="100" required>
        @if ($errors->has('veiculoPublicacao'))
            <span class="help-block">
                <strong>{{ $errors->first('veiculoPublicacao') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('dtPublicacao') ? ' has-error' : '' }}">
    <label for="dtPublicacao" class="col-sm-2 control-label">Data da Publicação:<span class="required">*</span></label>
    <div class="col-sm-2">
        <input type="text" class="form-control readonly"  id="dtPublicacao" name="dtPublicacao" data-mask="00/00/0000" placeholder="00/00/0000" required>
    </div>
    @if ($errors->has('dtPublicacao'))
        <span class="help-block">
        <strong>{{ $errors->first('dtPublicacao') }}</strong>
        </span>
    @endif
</div>
<button class="btn btn-success pull-right" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Incluir Publicação</button>
@if(isset($listaPublicacoes) and $listaPublicacoes->count())
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box primary">
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Título</th>
                                    <th>Veículo</th>
                                    <th>Data Publicação</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($listaPublicacoes as $publicacao)
                            <tr>
                                <td>{{$publicacao->tipoTitulo->tipoTitulo}}</td>
                                <td>{{$publicacao->titulo}}</td>
                                <td>{{$publicacao->veiculo}}</td>
                                <td>{{date('d/m/Y', strtotime($publicacao->dtPublicacao))}}</td>
                                <td>
                                    <a href="{{route('candidato.excluirPublicacao', ['id'=>Crypt::encrypt($publicacao->id), 'idInscricao'=>Crypt::encrypt($publicacao->inscricaoId)])}}" tooltip="Excluir"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>   
            <!-- END SAMPLE TABLE PORTLET-->
         </div>
    </div>
@endif 