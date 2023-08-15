$(document).ready(function() {
    $('#dtFormacaoHabilitacao').datepicker({
        language: 'pt-BR',
        position: 'right top',
        maxDate: new Date()
    });

    $('#dtConclusaoDiploma').datepicker({
        language: 'pt-BR',
        position: 'right top',
        maxDate: new Date()
    });

    $('#dtConclusaoConvocacao').datepicker({
        language: 'pt-BR',
        position: 'right top',
        maxDate: new Date()
    });

    $('#dtCertificacao').datepicker({
        language: 'pt-BR',
        position: 'right top',
        maxDate: new Date()
    });

    $('#dtPublicacao').datepicker({
        language: 'pt-BR',
        position: 'right top',
        maxDate: new Date()
    });

    $('#dtInicial').datepicker({
        language: 'pt-BR', 
        multipleDatesSeparator: ' - ',
        range: true,
        maxDate: new Date()
    });
});