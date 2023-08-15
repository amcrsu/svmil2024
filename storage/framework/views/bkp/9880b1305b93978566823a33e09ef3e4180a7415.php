<style>
table {
    font-family: Arial;
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
            <h1>FICHA DE INSCRIÇÃO<br /><?php echo e($inscricao->categoria->sigla); ?> 2019</h1>
        </td>
    </tr>
</table>
<table>
    <tr>
        <td width="80%">
            <strong>Área de Atuação:</strong> <?php echo e($inscricao->categoria->sigla); ?> - <?php echo e($inscricao->area->area); ?>

            <?php if(isset($inscricao->subarea)): ?>
                - <?php echo e($inscricao->subarea->subarea); ?>

            <?php endif; ?>
        </td>
        <td rowspan="4" width="20%" align="right">
            <table border="1" cellpadding="0" cellspacing="0" id="foto">
                <tr>
                    <td align="center" height="180px">Foto 3x4 <br />(de frente, sem chapéu ou similar)</td>
                </tr>
            </table>
        </td>
    <tr>
    <tr>
        <td>
            <strong>Número de Inscrição:</strong> <?php echo e($inscricao->codInscricao); ?>

        </td>
    </tr>
    <tr>
        <td>
            <strong>Data/Hora Inscrição:</strong> <?php echo e($inscricao->created_at->format('d/m/Y H:i:s')); ?>

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
            <strong>Nome: </strong><?php echo e($inscricao->user->nome); ?>

        </td>
    </tr>
    <tr>
        <td>
            <strong>CPF: </strong><?php echo e($inscricao->user->cpf); ?>

        </td>
        <td>
            <strong>RG: </strong><?php echo e($inscricao->user->rg); ?>

        </td>
        <td>
            <strong>Órgão Expedidor: </strong><?php echo e($inscricao->user->orgaoExpedidor); ?>

        </td>
    </tr>
    <tr>
        <td>
            <strong>Gênero: </strong>
            <?php if($inscricao->user->sexo == 'F'): ?>
                Feminino
            <?php else: ?>
                Masculino
            <?php endif; ?>
        </td>
        <td colspan="2">
            <strong>Altura: </strong><?php echo e($inscricao->user->altura); ?> (metros)
        </td>
    </tr>
    <tr>
        <td>
            <strong>Data Nascimento: </strong><?php echo e($inscricao->user->dtNascimento); ?>

        </td>
        <td colspan="2">
            <strong>Cidade/UF Nascimento: </strong><?php echo e($inscricao->user->cidadeNascimento->cidade); ?>/<?php echo e($inscricao->user->cidadeNascimento->estado->sigla); ?>

        </td>
    </tr>
    <tr>
        <td>
            <strong>Nº Dependentes: </strong><?php echo e($inscricao->user->numDependentes == '' ? '0': $inscricao->user->numDependentes); ?>

        </td>
        <td colspan="2">
            <strong>Estado Civil: </strong><?php echo e($inscricao->user->estadoCivil->estadoCivil); ?>

        </td>
    </tr>
    <tr>
        <td>
            <strong>Nome do Pai: </strong><?php echo e($inscricao->user->nomePai); ?>

        </td>
        <td colspan="2">
            <strong>Nome da Mãe: </strong><?php echo e($inscricao->user->nomeMae); ?>

        </td>
    </tr>
    <tr>
        <td colspan="3">
            <strong>E-mail: </strong><?php echo e($inscricao->user->email); ?>

        </td>
    </tr>
    <tr>
        <td>
            <strong>Endereço: </strong> <?php echo e($inscricao->user->endereco); ?>, nº <?php echo e($inscricao->user->numero); ?>

        </td>
        <td colspan="2">
            <strong>Cidade/UF: </strong><?php echo e($inscricao->user->cidadeEndereco->cidade); ?>/<?php echo e($inscricao->user->cidadeEndereco->estado->sigla); ?>

        </td>
    </tr>
    <tr>
        <td>
            <strong>Bairro: </strong><?php echo e($inscricao->user->bairro); ?>

        </td>
        <td>
            <strong>CEP: </strong><?php echo e($inscricao->user->cep); ?>

        </td>
        <td>
            <strong>Complemento: </strong><?php echo e($inscricao->user->complemento); ?>

        </td>
    </tr>
    <tr>
        <td>
            <strong>Tel. Fixo: </strong><?php echo e($inscricao->user->telFixo); ?>

        </td>
        <td colspan="2">
            <strong>Tel. Celular: </strong><?php echo e($inscricao->user->telCelular); ?>

        </td>
    </tr>
    <tr>
        <td colspan="3">
            <strong>Tempo Total de Serviço Público: </strong><?php echo e($inscricao->user->anosSvPub); ?> anos, <?php echo e($inscricao->user->mesesSvPub); ?> meses, <?php echo e($inscricao->user->diasSvPub); ?> dias
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <strong>Documento Militar: </strong><?php echo e($inscricao->user->tipoDocMilitar->tipoDocumento); ?>

        </td>
    </tr>
    <?php if($inscricao->user->tipoDocMilitar->id == 2): ?>
    <tr>
        <td>
            <strong>Nº Documento Militar: </strong><?php echo e($inscricao->user->idtMil); ?>

        </td>
        <td colspan="2">
            <strong>Força Expedidora: </strong> <?php echo e($inscricao->user->forcaExpedidora->sigla); ?> - <?php echo e($inscricao->user->forcaExpedidora->forca); ?>

        </td>
    </tr>
    <?php endif; ?>
</table>
<!-- HABILITAÇÃO -->
<table>
    <tr>
        <td align="center" colspan="4">
            <strong><hr />HABILITAÇÃO</td>
        </td>
    </tr>
    <tr>
        <th>Tipo Especialização:</th>
        <th>Nome Curso:</th>
        <th>Instituição:</th>
        <th>Data Formação:</th>
    </tr>
    <?php $__currentLoopData = $listaHabilitacoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $habilitacao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($habilitacao->tipoTitulo->tipoTitulo); ?></td>
        <td><?php echo e($habilitacao->nomeCurso); ?></td>
        <td><?php echo e($habilitacao->instituicao); ?></td>
        <td><?php echo e($habilitacao->dtFormacao); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

<!-- TÍTULOS/GRAUS/DIPLOMAS -->
<table>
    <tr>
        <td align="center" colspan="4">
            <strong><hr />TÍTULOS / GRAUS / DIPLOMAS</td>
        </td>
    </tr>
    <?php if($listaTitulos->count()): ?>
        <tr>
            <th>Título</th>
            <th>Curso</th>
            <th>Instituição</th>
            <th>Data Conclusão</th>
        </tr>
        <?php $__currentLoopData = $listaTitulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $titulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($titulo->tipoTitulo->tipoTitulo); ?></td>
            <td><?php echo e($titulo->curso); ?></td>
            <td><?php echo e($titulo->instituicao); ?></td>
            <td><?php echo e($titulo->dtConclusao); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <tr>
            <td colspan="5" align="center"><h5>Nenhum Título/Grau/Diploma cadastrado</h5</td>
        </tr>
    <?php endif; ?>
</table>

<!-- CURSOS -->
<table>
    <tr>
        <td align="center" colspan="4">
            <strong><hr />CURSOS COMPLEMENTARES</td>
        </td>
    </tr>
    <?php if($listaCursos->count()): ?>
        <tr>
            <th>Título:</th>
            <th>Curso:</th>
            <th>Instituição:</th>
            <th>Data Conclusão:</th>
        </tr>
        <?php $__currentLoopData = $listaCursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($curso->tipoTitulo->tipoTitulo); ?></td>
            <td><?php echo e($curso->curso); ?></td>
            <td><?php echo e($curso->instituicao); ?></td>
            <td><?php echo e($curso->dtConclusao); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <tr>
            <td colspan="5" align="center"><h5>Nenhum Curso Complementar cadastrado</h5></td>
        </tr>
    <?php endif; ?>
</table>

<?php if($inscricao->categoria->id != 3): ?> 
<!-- CERTIFICAÇÕES -->
<table>
    <tr>
        <td align="center" colspan="3">
            <strong><hr />CERTIFICAÇÕES</td>
        </td>
    </tr>
    <?php if($listaCertificacoes->count()): ?>
    <tr>
        <th>Tipo:</th>
        <th>Nome:</th>
        <th>Data:</th>
    </tr>
    <?php $__currentLoopData = $listaCertificacoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificacao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($certificacao->tipoTitulo->tipoTitulo); ?></td>
        <td><?php echo e($certificacao->nome); ?></td>
        <td><?php echo e($certificacao->dtCertificacao); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
    <tr>
        <td colspan="4" align="center"><h5>Nenhuma Certificação cadastrada</h5></td>
    </tr>
    <?php endif; ?>
</table>

<!-- PUBLICAÇÕES -->
<table>
    <tr>
        <td align="center" colspan="4">
            <strong><hr />PUBLICAÇÕES</td>
        </td>
    </tr>
    <?php if($listaPublicacoes->count()): ?>
        <tr>
            <th>Tipo:</th>
            <th>Título:</th>
            <th>Veículo:</th>
            <th>Data Publicação:</th>
        </tr>
        <?php $__currentLoopData = $listaPublicacoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publicacao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($publicacao->tipoTitulo->tipoTitulo); ?></td>
            <td><?php echo e($publicacao->titulo); ?></td>
            <td><?php echo e($publicacao->veiculo); ?></td>
            <td><?php echo e($publicacao->dtPublicacao); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <tr>
            <td colspan="5" align="center"><h5>Nenhuma Publicação cadastrada</h5></td>
        </tr>
    <?php endif; ?>
</table>
<?php endif; ?>

<!-- EXERCÍCIO DE ATIVIDADE PROFISSIONAL -->
<table>
    <tr>
        <td align="center" colspan="5">
            <strong><hr />EXERCÍCIO DE ATIVIDADE PROFISSIONAL</td>
        </td>
    </tr>
    <?php if($listaExperiencia->count()): ?>
        <tr>
            <td align="center" colspan="6" id="totalExperiencia">(Contabilizando <?php echo e($totalAnos); ?> ano(s) e <?php echo e($totalMeses); ?> mês(es), <?php echo e($totalDias); ?> dia(s))<br /><br /></td>
        </tr>
        <tr>
            <th>Tipo:</th>
            <th>Local:</th>
            <th>Período:</th>
            <th>Cargo/Funçãoo:</th>
            <th>Atividades:</th>
        </tr>
        <?php $index = 0; ?>
        <?php $__currentLoopData = $listaExperiencia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $experiencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($experiencia->tipoTitulo->tipoTitulo); ?></td>
            <td><?php echo e($experiencia->nomeLocal); ?></td>
            <td><?php echo e($experiencia->dtInicio->format('d/m/Y')); ?> até <?php echo e($experiencia->dtFim->format('d/m/Y')); ?></td>
            <td><?php echo e($experiencia->cargo); ?></td>
            <td><?php echo e($experiencia->atividades); ?></td>
        </tr>
        <?php $index++; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <tr>
            <td align="center" colspan="6"><h5>Nenhum Exercício de Atividade Profissional cadastrado</h5></td>
        </tr>
    <?php endif; ?>
</table>
<br><br><br><br><br><br>

<!-- ASSINATURA -->
<hr width="350px" />
<center><?php echo e($inscricao->user->nome); ?></center>