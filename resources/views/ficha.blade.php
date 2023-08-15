<style>
body, table {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 11pt;
    width: 730px;
    padding: 2px;
    margin: 2px;
}
#cabecalho {
    width:730px;
} 
img {
    width: 110px;
}
h1{
    font-size: 26pt;
}
#foto {
    width: 100%;
}
th {
    font-size: 10pt;
    text-align: left;
}
#totalExperiencia {
    font-size: 9pt;
}
</style>

<!-- Cabeçalho -->
<table id="cabecalho" border="1">
    <tr>
        <td align="center">
            <h1>FICHA DE INSCRIÇÃO<br />{{$inscricao->categoria->sigla}} - 2024</h1>
        </td>
    </tr>
</table>
<table>
    <tr>
        <td width="80%">
        <strong>Nível:</strong> {{$inscricao->categoria->categoria}} - {{$inscricao->categoria->sigla}}
            <br/>
            <br/>
            <strong>Área:</strong> {{$inscricao->area->area}}
            @if(isset($inscricao->subarea))
                - {{$inscricao->subarea->subarea}}
            @endif
            <br/>
            <br/>
            <strong>Comissão de Seleção Especial (CSE):</strong> {{$cidade ? $cidade->guarnicao : ''}}
          <!--  <strong>Guarni&ccedil;&atilde;o:</strong> {{$inscricao->guarnicao}} -->
            <br/>
            <br/>
            <strong>Número de Inscrição:</strong> {{$inscricao->codInscricao}}
            <br/>
            <br/>
            <strong>Data/Hora Inscrição:</strong> {{$inscricao->created_at->format('d/m/Y H:i:s')}}
        </td>
        <td rowspan="1" width="20%" align="right">
            <table border="1" cellpadding="0" cellspacing="0" id="foto">
                <tr>
                    <td align="center" height="180px">Foto 3x4 <br />(de frente, sem chapéu ou similar)</td>
                </tr>
            </table>
        </td>
</tr>
    
</table>

<!-- DADOS PESSOAIS -->
<table>
    <tr>
        <td align="center" colspan="3">
            <strong><hr />DADOS PESSOAIS</td>
        </td>
    </tr>
    <tr>    
        <td colspan="3">
            <strong>Nome: </strong>{{$inscricao->user->nome}}
        </td>
    </tr>
    <tr>
        <td>
            <strong>CPF: </strong>{{$inscricao->user->cpf}}
        </td>
        <td>
            <strong>RG: </strong>{{$inscricao->user->rg}}
        </td>
        <td>
            <strong>Órgão Expedidor: </strong>{{$inscricao->user->orgaoExpedidor}}
        </td>
    </tr>
    <tr>
        <td>
            <strong>Gênero: </strong>
            @if($inscricao->user->sexo == 'F')
                Feminino
            @else
                Masculino
            @endif
        </td>
        <td colspan="2">
            <strong>Altura: </strong>{{$inscricao->user->altura}} (metros)
        </td>
    </tr>
    <tr>
        <td>
            <strong>Data Nascimento: </strong>{{$inscricao->user->dtNascimento}}
        </td>
        <td colspan="2">
            <strong>Cidade/UF Nascimento: </strong>{{$inscricao->user->cidadeNascimento->cidade}}/{{$inscricao->user->cidadeNascimento->estado->sigla}}
        </td>
    </tr>
    <tr>
        <td>
            <strong>Nº Dependentes: </strong>{{ $inscricao->user->numDependentes == '' ? '0': $inscricao->user->numDependentes}}
        </td>
        <td colspan="2">
            <strong>Estado Civil: </strong>{{$inscricao->user->estadoCivil->estadoCivil}}
        </td>
    </tr>
    <tr>
        <td>
            <strong>Nome do Pai: </strong>{{$inscricao->user->nomePai}}
        </td>
        <td colspan="2">
            <strong>Nome da Mãe: </strong>{{$inscricao->user->nomeMae}}
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <strong>E-mail: </strong>{{$inscricao->user->email}}
        </td>
    </tr>
    <tr>
        <td>
            <strong>Endereço: </strong> {{$inscricao->user->endereco}}, nº {{$inscricao->user->numero}}
        </td>
        <td colspan="2">
            <strong>Cidade/UF: </strong>{{$inscricao->user->cidadeEndereco->cidade}}/{{$inscricao->user->cidadeEndereco->estado->sigla}}
        </td>
    </tr>
    <tr>
        <td>
            <strong>Bairro: </strong>{{$inscricao->user->bairro}}
        </td>
        <td>
            <strong>CEP: </strong>{{$inscricao->user->cep}}
        </td>
        <td>
            <strong>Complemento: </strong>{{$inscricao->user->complemento}}
        </td>
    </tr>
    <tr>
        <td>
            <strong>Tel. Fixo: </strong>{{$inscricao->user->telFixo}}
        </td>
        <td colspan="2">
            <strong>Tel. Celular: </strong>{{$inscricao->user->telCelular}}
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <strong>Tempo de Serviço Militar nas Forças Armadas: </strong>{{$inscricao->user->anosSvPub}} anos, {{$inscricao->user->mesesSvPub}} meses, {{$inscricao->user->diasSvPub}} dias
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <strong>Documento Militar: </strong>{{$inscricao->user->tipoDocMilitar->tipoDocumento}}
        </td>
    </tr>
    @if($inscricao->user->tipoDocMilitar->id == 2)
    <tr>
        <td>
            <strong>Nº Documento Militar: </strong>{{$inscricao->user->idtMil}}
        </td>
        <td colspan="2">
            <strong>Força Expedidora: </strong> {{$inscricao->user->forcaExpedidora->sigla}} - {{$inscricao->user->forcaExpedidora->forca}}
        </td>
    </tr>
    @endif
</table>
<!-- HABILITAÇÃO -->
<table>
    <tr>
        <td align="center" colspan="4">
            <strong><hr />HABILITAÇÃO MÍNIMA</td>
        </td>
    </tr>
    @if($listaHabilitacoes->count())
    <tr>
        <th>Tipo:</th>
        <th>Curso:</th>
        <th>Instituição:</th>
        <th>Data Formação:</th>
    </tr>
    @foreach($listaHabilitacoes as $habilitacao)
    <tr>
        <td>{{$habilitacao->tipoTitulo->tipoTitulo}}</td>
        <td>{{$habilitacao->nomeCurso}}</td>
        <td>{{$habilitacao->instituicao}}</td>
        <td>{{$habilitacao->dtFormacao}}</td>
    </tr>
    @endforeach
    @else
        <tr>
            <td colspan="5" align="center"><h5>Nenhuma Habilitação Mínima cadastrada</h5</td>
        </tr>
    @endif
</table>

<!-- TÍTULOS/GRAUS/DIPLOMAS -->
<table>
    <tr>
        <td align="center" colspan="4">
            <strong><hr />CERTIFICADO / TÍTULO / DIPLOMA / HABILITAÇÃO</td>
        </td>
    </tr>
    @if($listaTitulos->count())
        <tr>
            <th>Título</th>
            <th>Curso</th>
            <th>Instituição</th>
            <th>Data Conclusão</th>
        </tr>
        @foreach($listaTitulos as $titulo)
        <tr>
            <td>{{$titulo->tipoTitulo->tipoTitulo}}</td>
            <td>{{$titulo->curso}}</td>
            <td>{{$titulo->instituicao}}</td>
            <td>{{$titulo->dtConclusao}}</td>
        </tr>
        @endforeach
    @else
        <tr>
            <td colspan="5" align="center"><h5>Nenhum Certificado / Título / Diploma / Habilitação cadastrado</h5</td>
        </tr>
    @endif
</table>

<!-- CURSOS -->
<table>
    <tr>
        <td align="center" colspan="4">
            <strong><hr />CURSOS / OUTRAS HABILITAÇÕES</td>
        </td>
    </tr>
    @if($listaCursos->count())
        <tr>
            <th>Título:</th>
            <th>Curso:</th>
            <th>Instituição:</th>
            <th>Data Conclusão:</th>
        </tr>
        @foreach($listaCursos as $curso)
        <tr>
            <td>{{$curso->tipoTitulo->tipoTitulo}}</td>
            <td>{{$curso->curso}}</td>
            <td>{{$curso->instituicao}}</td>
            <td>{{$curso->dtConclusao}}</td>
        </tr>
        @endforeach
    @else
        <tr>
            <td colspan="5" align="center"><h5>Nenhum Curso Complementar cadastrado</h5></td>
        </tr>
    @endif
</table>

@if($inscricao->categoria->id != 3) 
<!-- CERTIFICAÇÕES -->
<table>
    <tr>
        <td align="center" colspan="3">
            <strong><hr />CERTIFICAÇÕES</td>
        </td>
    </tr>
    @if($listaCertificacoes->count())
    <tr>
        <th>Tipo:</th>
        <th>Nome:</th>
        <th>Data:</th>
    </tr>
    @foreach($listaCertificacoes as $certificacao)
    <tr>
        <td>{{$certificacao->tipoTitulo->tipoTitulo}}</td>
        <td>{{$certificacao->nome}}</td>
        <td>{{$certificacao->dtCertificacao}}</td>
    </tr>
    @endforeach
    @else
    <tr>
        <td colspan="4" align="center"><h5>Nenhuma Certificação cadastrada</h5></td>
    </tr>
    @endif
</table>
 @endif
<!-- PUBLICAÇÕES -->
@if($inscricao->categoria->id == 3) 
<table>
    <tr>
        <td align="center" colspan="4">
            <strong><hr />PUBLICAÇÕES</td>
        </td>
    </tr>
    @if($listaPublicacoes->count())
        <tr>
            <th>Tipo:</th>
            <th>Título:</th>
            <th>Veículo:</th>
            <th>Data Publicação:</th>
        </tr>
        @foreach($listaPublicacoes as $publicacao)
        <tr>
            <td>{{$publicacao->tipoTitulo->tipoTitulo}}</td>
            <td>{{$publicacao->titulo}}</td>
            <td>{{$publicacao->veiculo}}</td>
            <td>{{$publicacao->dtPublicacao}}</td>
        </tr>
        @endforeach
    @else
        <tr>
            <td colspan="5" align="center"><h5>Nenhuma Publicação cadastrada</h5></td>
        </tr>
    @endif
</table>
@endif

<!-- EXERCÍCIO DE ATIVIDADE PROFISSIONAL -->
<table>
    <tr>
        <td align="center" colspan="5">
            <strong><hr />EXERCÍCIO DE ATIVIDADE PROFISSIONAL</td>
        </td>
    </tr>
    @if($listaExperiencia->count())
        <tr>
            <td align="center" colspan="6" id="totalExperiencia">(Contabilizando {{$totalAnos}} ano(s), {{$totalMeses}} mês(es) e {{$totalDias}} dia(s))<br /><br /></td>
        </tr>
        <tr>
            <th>Tipo:</th>
            <th>Local:</th>
            <th>Período:</th>
            <th>Cargo/Funçãoo:</th>
            <th>Atividades:</th>
        </tr>
        <?php $index = 0; ?>
        @foreach($listaExperiencia as $experiencia)
        <tr>
            <td>{{$experiencia->tipoTitulo->tipoTitulo}}</td>
            <td>{{$experiencia->nomeLocal}}</td>
            <td>{{$experiencia->dtInicio->format('d/m/Y')}} até {{$experiencia->dtFim->format('d/m/Y')}}</td>
            <td>{{$experiencia->cargo}}</td>
            <td>{{$experiencia->atividades}}</td>
        </tr>
        <?php $index++; ?>
        @endforeach
    @else
        <tr>
            <td align="center" colspan="6"><h5>Nenhum Exercício de Atividade Profissional cadastrado</h5></td>
        </tr>
    @endif
</table>
<br><br><br><br><br><br>

<!-- ASSINATURA -->
<hr width="350px" />
<center>{{$inscricao->user->nome}}</center>