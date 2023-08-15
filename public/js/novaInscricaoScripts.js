function validarArea() {
    $('#divSubarea').hide();
    $('#subAreaId').prop('required', null);

    var categoriaID = $('select[name="categoriaId"] option:selected').val();
    var sexo = $('#hdnSexo').val()

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

function validarGuarnicao() {
    $('#divSubarea').hide();
    $('#subAreaId').prop('required', null);

    var guarnicao = $('select[name="guaId"] option:selected').val();
    //var sexo = $('#hdnSexo').val()

    if(guarnicao) {
        $.ajax({
            url: $host+'/cascade/carregarGuarnicao/'+guaId+'/'+sexo,
            type: "GET",
            dataType: "json",
            success:function(data) {
                $('select[name="guaId"]').empty();
                var count = Object.keys(data).length;

                if(count > 1) {
                    var areaSelectedId = $('input:hidden[name=guaId]').val();
                    $('select[name="guaId"]').append('<option value="" disabled selected>Selecione</option>');
                    for(var i = 0; i < count; i++) {
                        if(areaSelectedId == data[i].id) {
                            $('select[name="guaId"]').append('<option value="'+ data[i].id +'" selected>'+ data[i].guarnicao +'</option>');
                        } else {
                            $('select[name="guaId"]').append('<option value="'+ data[i].id +'">'+ data[i].guarnicao +'</option>');
                        }
                    }
                } else {
                    $('select[name="guaId"]').append('<option value="" disabled selected>Selecione</option>');
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                alert("Erro ao carregar as Guarnições. Status: " + textStatus); alert("Error: " + errorThrown);
            }
        });
    }else{
        $('select[name="guaId"]').empty();
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
    $protocol = window.location.protocol;
    $host = $protocol+ '//'+$(location).attr('host');

    $('#divSubarea').hide();
    $('#subAreaId').prop('required', null);

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

    // Guarnicoes
    if($('input:hidden[name=guaId]').val() != '') {
        var guaID = $('input:hidden[name=guaId]').val();
        validarGuarnicao(guaID);
    }

    $('select[name="guaId"]').on('change', function() {
        var guaID = $(this).val();
        validarGuarnicao(guaID);
    });
});
