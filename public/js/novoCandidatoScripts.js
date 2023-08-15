function validarTipoDocMilitar(){
    // Tipo documento militar
    if($('select[name="tipoDocMilitarId"] option:selected').text() == 'IM - Identidade Militar') {
        $('#divDocMilitar').show();
        $('#idtMil').attr('required', true);
        $('#forcaId').attr('required', true);
    } else {
        $('#idtMil').prop('required', null);
        $('#forcaId').prop('required', null);
        $('#divDocMilitar').hide();
    }
}

function validarArea() {
    $('#divSubarea').hide();
    $('#subAreaId').prop('required', null);

    var categoriaID = $('select[name="categoriaId"] option:selected').val();
    
    if (categoriaID == 3) {
        $('#dtNascimento').datepicker({
            minDate: new Date(1982, 02, 02), //40anos 11meses e 25dias em 01Mar2023 (incorporacao)
            maxDate: new Date(2004, 11, 31), //19 Anos em 31Dez2023
            language:'pt-BR',
            onSelect: function (fd, d, calendar) {
                calendar.show()
            }
        });

        var ano = $("#dtNascimento").val().split('/');
        if(ano[2] < 1983) {
            $("#dtNascimento").val('');
        }
            
    } else {
        $('#dtNascimento').datepicker({
            minDate: new Date(1982, 02, 02), //40anos 11meses e 25dias em 01Mar2023 (incorporacao)
            maxDate: new Date(2004, 11, 31), //19 Anos em 31Dez2023
            language:'pt-BR',
            onSelect: function (fd, d, calendar) {
                calendar.show()
            }
        });
    }

    var sexo = $('input[name=sexo]:checked').val()
    if(categoriaID) {
        $.ajax({
            url: $host+'/cascade/carregarAreas/'+categoriaID+'/'+sexo,
            type: "GET",
            dataType: "json",
            success:function(data) {
                $('select[name="areaId"]').empty();
                var count = Object.keys(data).length;

                if(count > 0) {
                    var areaSelectedId = $('input:hidden[name=areaId]').val();
                    $('select[name="areaId"]').append('<option value="" disabled selected>Selecione</option>');
                    for(var i = 0; i < count; i++) {
                        if(areaSelectedId == data[i].id) { 
                            $('select[name="areaId"]').append('<option value="'+ data[i].id +'" selected>'+ data[i].area +'</option>');
                        } else {
                            $('select[name="areaId"]').append('<option value="'+ data[i].id +'">'+ data[i].area +'</option>');
                        }
                    }
                } else {
                    $('select[name="areaId"]').append('<option value="" disabled selected>Selecione</option>'); 
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                alert("Erro ao carregar áreas. Status: " + textStatus); alert("Error: " + errorThrown); 
            }
        });
    }else{
        $('select[name="areaId"]').empty();
    }
}

function validarSubArea(areaID){
    $('#subAreaId').prop('required', null);
    
    if(areaID) {
        $.ajax({
            url: $host+'/cascade/carregarSubAreas/'+areaID,
            type: "GET",
            dataType: "json",
            success:function(data) {
                $('select[name="subAreaId"]').empty();
                var count = Object.keys(data).length;

                if(count > 0) {
                    $('#subAreaId').attr('required', true);
                    $('#divSubarea').show();
                    
                    $('select[name="subAreaId"]').append('<option value="" disabled selected>Selecione</option>');

                    var subareaSelectedId = $('input:hidden[name=subAreaId]').val();
                    for(var i = 0; i < count; i++) {
                        if(subareaSelectedId == data[i].id) {
                            $('select[name="subAreaId"]').append('<option value="'+ data[i].id +'" selected>'+ data[i].subarea +'</option>');
                        } else {
                            $('select[name="subAreaId"]').append('<option value="'+ data[i].id +'">'+ data[i].subarea +'</option>');
                        }
                    }
                } else {
                    $('#subAreaId').prop('required', null);
                    $('#divSubarea').hide();
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                alert("Erro ao carregar subáreas. Status: " + textStatus); alert("Error: " + errorThrown); 
            }
        });
    }else{
        $('#subAreaId').prop('required', null);
        $('select[name="subAreaId"]').empty();
    }
}

function validarUfDtNascimento(ufNascimentoId){
    if(ufNascimentoId) {
        $.ajax({
            url: $host+'/cascade/carregarCidades/'+ufNascimentoId,
            type: "GET",
            dataType: "json",
            success:function(data) {
                $('select[name="cidadeNascId"]').empty();
                var count = Object.keys(data).length;

                if(count > 0) {
                    var cidadeNascSelectedId = $('input:hidden[name=cidadeNascId]').val();
                    $('select[name="cidadeNascId"]').append('<option value="" disabled selected>Selecione</option>');
                    for(var i = 0; i < count; i++) {
                        if(cidadeNascSelectedId == data[i].id) {
                            $('select[name="cidadeNascId"]').append('<option value="'+ data[i].id +'" selected>'+ data[i].cidade +'</option>');
                        } else {
                            $('select[name="cidadeNascId"]').append('<option value="'+ data[i].id +'">'+ data[i].cidade +'</option>');
                        }
                    }
                } else {
                    $('select[name="cidadeNascId"]').append('<option value="" disabled selected>Selecione</option>');
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                alert("Erro ao carregar cidades. Status: " + textStatus); alert("Error: " + errorThrown); 
            }
        });
    }else{
        $('select[name="cidadeNascId"]').empty();
    }
}

function validarUfEndereco(ufId){
    if(ufId) {
        $.ajax({
            url: $host+'/cascade/carregarCidades/'+ufId,
            type: "GET",
            dataType: "json",
            success:function(data) {
                $('select[name="cidadeEndId"]').empty();
                var count = Object.keys(data).length;

                if(count > 0) {
                    var cidadeEndSelectedId = $('input:hidden[name=cidadeEndId]').val();
                    $('select[name="cidadeEndId"]').append('<option value="" disabled selected>Selecione</option>');
                    for(var i = 0; i < count; i++) {
                        if(cidadeEndSelectedId == data[i].id) {
                            $('select[name="cidadeEndId"]').append('<option value="'+ data[i].id +'" selected>'+ data[i].cidade +'</option>');
                        } else {
                            $('select[name="cidadeEndId"]').append('<option value="'+ data[i].id +'">'+ data[i].cidade +'</option>');
                        }
                    }
                } else {
                    $('select[name="cidadeEndId"]').append('<option value="" disabled selected>Selecione</option>');
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                alert("Erro ao carregar cidades. Status: " + textStatus); alert("Error: " + errorThrown); 
            }
        });
    }else{
        $('select[name="cidadeEndId"]').empty();
    }
}

function validarSvPub(){
    var anoSelecionado = $("#anosSvPub").val();

    if(anoSelecionado == 40) {
        $('select[name="mesesSvPub"]').prop('disabled', true);
        $('select[name="diasSvPub"]').prop('disabled', true);

        $('select[name="mesesSvPub"]').val("0");
        $('select[name="diasSvPub"]').val("0");
    } else {
        $('select[name="mesesSvPub"]').prop('disabled', false);
        $('select[name="diasSvPub"]').prop('disabled', false);
    }
}

function carregarGuarnicao() {
    //$('#divSubarea').hide();
    //$('#guarnicao').prop('required', null);
    var areaId = $('select[name="areaId"] option:selected').val();
    //var guarnicao = $('select[name="guarnicao"] option:selected').val();
    //var sexo = $('#hdnSexo').val()

    if(areaId) {  //SETAR GUARNIÇÃO POR ÁREA!!!!
        $.ajax({
            url: $host+'/cascade/carregarGuarnicao/'+areaId,
            type: "GET",
            dataType: "json",
            success:function(data) {
                $('select[name="guarnicao"]').empty();
                var count = Object.keys(data).length;

                if(count > 0) {
                    //var areaSelectedId = $('input:hidden[name=guaId]').val();
                    $('select[name="guarnicao"]').append('<option value="" disabled selected>Selecione</option>');
                    for(var i = 0; i < count; i++) {
                        $('select[name="guarnicao"]').append('<option value="'+ data[i].id +'">'+ data[i].guarnicao +'</option>'); 
                    }
                } else {
                    $('select[name="guarnicao"]').append('<option value="" disabled selected>Selecione</option>');
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                alert("Erro ao carregar as Guarnições. Status: " + textStatus); alert("Error: " + errorThrown);
            }
        });
    }else{
        $('select[name="guarnicao"]').empty();
    }
}

$(document).ready(function() {
    $("#validaAltura").hide();
    $protocol = window.location.protocol;
    $host = $protocol+'//'+$(location).attr('host');

    $(':input[type="submit"]').prop('disabled', true);

    $("#leuAviso").change(function() {
        if(this.checked) {
            $(':input[type="submit"]').prop('disabled', false);
        } else {
            $(':input[type="submit"]').prop('disabled', true);
        }
    });

    $("#erroValidacao").hide();
    $("#erroValidacaoEmail").hide();
    $('#divSubarea').hide();
    $('#idtMil').prop('required', null);
    $('#forcaId').prop('required', null);
    $('#subAreaId').prop('required', null);

    validarTipoDocMilitar();
    $('#tipoDocMilitarId').on('change', function() {
        validarTipoDocMilitar();
    });

    // Áreas
    if($('select[name="categoriaId"] option:selected').val() != '') {
        validarArea();
    }

    $('select[name="categoriaId"]').on('change', function() {
        validarArea();
    });

    // Subáreas
    if($('input:hidden[name=areaId]').val() != '') {
        var areaID = $('input:hidden[name=areaId]').val();
        validarSubArea(areaID);
    }

    $('select[name="areaId"]').on('change', function() {
        // var areaID = $(this).val(); 
        // validarSubArea(areaID);
        carregarGuarnicao();
    });

    // Cidades nascimento
    if($('select[name="ufNascimentoId"] option:selected').val() != '') {
        var ufNascimentoId = $('select[name="ufNascimentoId"] option:selected').val();
        validarUfDtNascimento(ufNascimentoId);
    }

    $('select[name="ufNascimentoId"]').on('change', function() {
        var ufNascimentoId = $(this).val();
        validarUfDtNascimento(ufNascimentoId);
    });

    // Cidades endereço
    if($('select[name="ufEndId"] option:selected').val() != '') {
        var ufId = $('select[name="ufEndId"] option:selected').val();
        validarUfEndereco(ufId);
    }

    $('select[name="ufEndId"]').on('change', function() {
        var ufId = $(this).val();
        validarUfEndereco(ufId);
    });

    $('select[name="anosSvPub"]').on('change', function(){
        validarSvPub();
    });

    if($('select[name="anosSvPub"] option:selected').val() != '') {
        validarSvPub();
    }

    $("#cpf").focusout(function(){
        var cpf = $(this).val();
        var cpf = cpf.replace(".", "").replace(".","").replace("-", "");

        if(cpf) {
            $.ajax({
                url: $host+'/validar/cpf/'+cpf,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    if(data.error) {
                        $("#erro").text(data.error_msg);
                        $( "#divCPF" ).addClass( "has-error" );
                        $('#leuAviso').prop('disabled', true);
                        $(':input[type="submit"]').prop('disabled', true);
                        $("#erroValidacao").show();
                    } else {
                        $( "#divCPF" ).removeClass( "has-error" );
                        $("#erroValidacao").hide();

                        if ($("#validaAltura").is(":hidden") && $("#erroValidacaoEmail").is(":hidden")) {
                            $('#leuAviso').prop('disabled', false);
                            $('#leuAviso').val().change();
                        }
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown){
                    alert("Erro ao validar CPF. Status: " + textStatus); alert("Error: " + errorThrown); 
                }
            });
        }
    });

    $("#email").focusout(function(){
        var email = $(this).val();

        if(email) {
            $.ajax({
                url: $host+'/validar/email/'+email,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    if(data.error) {
                        $("#erroEmail").text(data.error_msg);
                        $( "#divEmail" ).addClass( "has-error" );
                        $('#leuAviso').prop('disabled', true);
                        $(':input[type="submit"]').prop('disabled', true);
                        $("#erroValidacaoEmail").show();
                    } else {
                        $( "#divEmail" ).removeClass( "has-error" );

                        if ($("#validaAltura").is(":hidden") && $("#erroValidacao").is(":hidden")) {
                            $("#erroValidacaoEmail").hide();
                            $('#leuAviso').prop('disabled', false);
                            $('#leuAviso').val().change();
                        }

                        $("#erroValidacaoEmail").hide();
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown){
                    alert("Erro ao validar E-mail. Status: " + textStatus); alert("Error: " + errorThrown); 
                }
            });
        }
    });

    $("#altura").focusout(function(){
        var altura = $(this).val();
        var sexo = $('input[name=sexo]:checked').val();
        
        if(sexo == 'F') {
            if (altura < 1.55) {
                $("#divAltura").addClass("has-error");
                $(':input[type="submit"]').prop('disabled', true);
                $('#leuAviso').prop('disabled', true);
                $(':input[type="submit"]').prop('disabled', true);
                $("#validaAltura").show();
            } else {
                $("#divAltura").removeClass("has-error");
                $("#validaAltura").hide();


                if ($("#erroValidacao").is(":hidden") && $("#erroValidacaoEmail").is(":hidden")){
                    $('#leuAviso').prop('disabled', false);
                    $('#leuAviso').val().change();
                }

                $("#validaAltura").hide();
            }
        } else if (sexo == 'M') {
            if (altura < 1.60) {
                $("#divAltura").addClass("has-error");
                $(':input[type="submit"]').prop('disabled', true);
                $('#leuAviso').prop('disabled', true);
                $(':input[type="submit"]').prop('disabled', true);
                $("#validaAltura").show();
            } else {
                $("#divAltura").removeClass("has-error");
                $("#validaAltura").hide();


                if ($("#erroValidacao").is(":hidden") && $("#erroValidacaoEmail").is(":hidden")){
                    $('#leuAviso').prop('disabled', false);
                    $('#leuAviso').val().change();
                }
                
                $("#validaAltura").hide();
            }
        }
    });

    $('input[type=radio][name=sexo]').change(function() {
        var categoria = $('select[name="categoriaId"] option:selected').val();
        var sexo = $('input[name=sexo]:checked').val();
       
        if(categoria != '') {
            var area = $('select[name=areaId]').val();

            if((categoria == 2 && area == null) || (categoria == 2 && area == 52 && sexo == 'M')) {
                $('#categoriaId').val(categoria).change();
            } else if (categoria == 2 && area != 52){
                $('#categoriaId').val(categoria).change();
                $('input:hidden[name=areaId]').val(area);
            }
        }

        var leuAviso = $("#leuAviso").val();
        var altura = $("#altura").val();
        if(altura != '') {
            if(sexo == 'F') {
                if (altura < 1.55) {
                    $("#divAltura").addClass("has-error");
                    $(':input[type="submit"]').prop('disabled', true);
                    $('#leuAviso').prop('disabled', true);
                    $("#validaAltura").show();
                } else {
                    $("#divAltura").removeClass("has-error");

                    if ($("#erroValidacao").is(":hidden")){ 
                        $('#leuAviso').prop('disabled', false);
                        $('#leuAviso').val().change();
                    }

                    $("#validaAltura").hide();
                }
            } else if (sexo == 'M') {
                if (altura < 1.60) {
                    $("#divAltura").addClass("has-error");
                    $(':input[type="submit"]').prop('disabled', true);
                    $('#leuAviso').prop('disabled', true);
                    $("#validaAltura").show();
                } else {
                    $("#divAltura").removeClass("has-error");

                    if ($("#erroValidacao").is(":hidden")){
                        $('#leuAviso').prop('disabled', false);
                        $('#leuAviso').val().change();
                    }

                    $("#validaAltura").hide();
                }
            }
        }
    });

    $('#dtNascimento').datepicker({
        minDate: new Date(1983, 06, 14), //40anos 11meses e 25dias em 01Mar2023 (incorporacao)
        maxDate: new Date(2005, 02, 06), //19 Anos em 31Dez2023
        language:'pt-BR',
        onSelect: function (fd, d, calendar) {
            calendar.show()
        }
    });
    /*
    var dtNascimento = $("#dtNascimentoSelecionado").val();

    if (dtNascimento != ''){
        var arr = dtNascimento.split('/');

        var startDate = new Date(arr[2], arr[1]-1, arr[0]);
        var dp = $('#dtNascimento').datepicker({startDate: startDate}).data('datepicker');
        
        dp.selectDate(startDate);
    }

    $("#dtNascimento").keypress(function(event) {event.preventDefault();});

    $('#formNovoCandidato').submit(function(){
        $("#formNovoCandidato :disabled").removeAttr('disabled');
        $('#dtNascimento').removeAttr('readonly');
    });
    */
});
