/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$("#SREQPTO").blur(function () {
    var sr = $("#SREQPTO").val();
    var tipo = $("#TIPOEQPTO").val();
    var tamSr = $("#SREQPTO").val().length;

    if (sr === "") {

    } else {
        if (($.isNumeric(sr))) {
            if (tamSr == 5) {
                //AQUI INICIA O CODIGO QUE VAI COMPARAR SE EXISTE NO BANCO COM STATUS = 1 e PREENCHER O CAMPO SERIAL NUMBER PATRIMONIO do eqpto.
                //FAZER A OPÇÃO DE EXCLUIR CASO O USUARIO SALVE O NUMERO de SERIE ERRADO OU NUMERO DE PATRIMONIO.
                $.ajax({
                    type: "POST",
                    url: "http://192.168.100.140/kitbiocis/adm/controle-biometria/consultarSrPatInicio",
                    data: {
                        serial: sr,
                        tipo: tipo
                    },
                    beforeSend: function () {

                    },
                    success: function (result) {
                        if (result === 'Nao') {
                            $.ajax({
                                type: "POST",
                                url: "http://192.168.100.140/kitbiocis/adm/controle-biometria/consultarSrInicio",
                                data: {
                                    serial: sr,
                                    tipo: tipo
                                },
                                beforeSend: function () {

                                },
                                success: function (resultado) {
                                    if (resultado === '1') {
                                        alert('Serial ja conferido!');
                                        $("#SREQPTO").focus();
                                        $("#SREQPTO").val("");
                                        $('#progressbar').css('width', '0%');
                                    } else if (resultado === '2') {
                                        $('#progressbar').css('width', '25%');
                                        $("#PTEQPTO").prop('disabled', false);
                                        $("#PTEQPTO").focus();
                                    } else {
                                        alert('Informe o administrador do sistema!');
                                    }
                                }
                            });
                        } else {
                            var result2 = result.split("+");
                            $('#SREQPTO').val(result2[0]);
                            $('#PTEQPTO').val(result2[1]);
                            $('#SRCAIXA').focus();
                            $('#ajudaSRPTbanco').val('2');
                        }
                    }
                });
            } else {
                alert('Tamanho de caracteres do n. serie inválido');
                $('#SREQPTO').focus();
                $('#SREQPTO').val('');
            }
        } else {
            alert('Número de serie inválido');
            $('#SREQPTO').focus();
            $('#SREQPTO').val('');
        }

    }

});

$("#PTEQPTO").blur(function () {
    var sn = $('#SREQPTO').val();
    var pat = $('#PTEQPTO').val();
    var tipo = $('#TIPOEQPTO').val();
    var tamPt = $('#PTEQPTO').val().length;

    if (pat === "") {

    } else {

        if (($.isNumeric(pat))) {
            if (tamPt == 9) {
                setTimeout(function () {
                    var ajudaSRPT = $('#ajudaSRPTbanco').val();
                    if (ajudaSRPT === '1') {

                        if (pat === "") {

                        } else if (pat === sn) {
                            $('#PTEQPTO').select();
                        } else {
                            $.ajax({
                                type: "POST",
                                url: "http://192.168.100.140/kitbiocis/adm/controle-biometria/saveSnPatrimonioEqpto",
                                data: {
                                    serial: sn,
                                    patrimonio: pat,
                                    tipo: tipo
                                },
                                beforeSend: function () {

                                },
                                success: function (resultado) {
                                    if (resultado === '1') {
                                        $('#progressbar').css('width', '50%');
                                        $('#SRCAIXA').focus();
                                        $('#progressbar').addClass('bg-success');
                                        $('#progressbar').removeClass('bg-danger');
                                    } else if (resultado === '3') {
                                        $('#progressbar').css('width', '25%');
                                        $('#PTEQPTO').val('');
                                        $('#PTEQPTO').focus();
                                        alert('PATRIMÔNIO JA ASSOCIADO A UM OUTRO NÚMERO DE SERIE, VERIFIQUE O OCORRIDO!');
                                    }
                                }
                            });
                        }
                    } else {
                        $('#progressbar').css('width', '50%');
                    }
                }, 100);
            } else {
                alert('Tamanho de caracteres do patrimonio inválido');
                $('#PTEQPTO').focus();
                $('#PTEQPTO').val('');
            }
        } else {
            alert('Patrimônio inválido');
            $('#PTEQPTO').focus();
            $('#PTEQPTO').val('');
        }
    }

});

$('#SRCAIXA').blur(function () {
    var sn = $('#SREQPTO').val();
    var snc = $('#SRCAIXA').val();
    var tamSnc = $('#SRCAIXA').val().length;

    if (snc === '') {
        $('#progressbar').removeClass('bg-success');
        $('#progressbar').addClass('bg-danger');
    } else {
        if (($.isNumeric(snc))) {
            if (tamSnc == 5) {
                if (sn === snc) {
                    $('#progressbar').addClass('bg-success');
                    $('#progressbar').removeClass('bg-danger');
                    $('#progressbar').css('width', '75%');
                    $("#PTCAIXA").focus();
                } else {
                    $('#progressbar').removeClass('bg-success');
                    $('#progressbar').addClass('bg-danger');
                    $("#SRCAIXA").focus();
                    $("#SRCAIXA").select();
                }
            }else {
                alert('Tamanho de caracteres do n. serie inválido');
                $('#SRCAIXA').focus();
                $('#SRCAIXA').val('');
            }
        } else {
            alert('Número de serie inválido');
            $('#SRCAIXA').focus();
            $('#SRCAIXA').val('');
        }
    }
});


$("#PTCAIXA").blur(function () {
    var pat = $("#PTEQPTO").val();
    var patCom = $("#PTCAIXA").val();
    var snc = $('#SRCAIXA').val();
    var tamPatCom = $("#PTCAIXA").val().length;

    if (patCom === "") {

    } else {

        if (($.isNumeric(patCom))) {
            if (tamPatCom == 9) {
                if (patCom === pat) {

                    $.ajax({
                        type: "POST",
                        url: "http://192.168.100.140/kitbiocis/adm/controle-biometria/PesquisarSerialPatrimonio",
                        data: {
                            serial: snc,
                            patrimonio: patCom
                        },
                        beforeSend: function () {

                        },
                        success: function (resultado) {
                            if (resultado === '1') {
                                $('#ajudaSRPTbanco').val('1');
                                $('#progressbar').addClass('bg-success');
                                $('#progressbar').removeClass('bg-danger');
                                $('#progressbar').css('width', '100%');
                                $('#progressbar').addClass(' progress-bar-striped progress-bar-animated');
                                setTimeout(function () {
                                    $('#progressbar').css('width', '0%');
                                    $('#progressbar').removeClass(' progress-bar-striped progress-bar-animated');
                                    $('.resultprogres').removeClass('d-none');
                                    $('#SREQPTO').val("");
                                    $('#PTEQPTO').val("");
                                    $("#PTCAIXA").val("");
                                    $("#SRCAIXA").val("");
                                    $("#INPUTTEXTHELP").addClass('bg-success');
                                    setTimeout(function () {
                                        $('.resultprogres').addClass('d-none');
                                        $("#SREQPTO").focus();
                                        $("#INPUTTEXTHELP").removeClass('bg-success');
                                        $('#lastregisterbio').html('>>>> N. Serie: ' + snc + ' Patrimônio: ' + patCom);
                                    }, 1000);
                                }, 2000);
                            } else if (resultado === '2') {
                                alert('Não foi possivel salvar o ultimo processo!');
                            }
                        }
                    });

                } else {
                    $('#progressbar').removeClass('bg-success');
                    $('#progressbar').addClass('bg-danger');
                    $("#PTCAIXA").select();
                }
            }else {
                alert('Tamanho de caracteres do patrimonio inválido');
                $('#PTCAIXA').focus();
                $('#PTCAIXA').val('');
            }
        } else {
            alert('Patrimônio inválido');
            $('#PTCAIXA').focus();
            $('#PTCAIXA').val('');
        }
    }
});


$('.modalAjax').on('click', function () {
    $.ajax({
        type: "POST",
        url: "http://192.168.100.140/kitbiocis/adm/controle-biometria/exibirRelacaoSrPat",
        data: {
        },
        beforeSend: function () {

        },
        success: function (resultado) {
            $('#modalRelBiometria').html(resultado);
        }
    });
});


$('.modalAjax2').on('click', function () {
    $.ajax({
        type: "POST",
        url: "http://192.168.100.140/kitbiocis/adm/controle-biometria/exibirRelacaoSrPatCam",
        data: {
        },
        beforeSend: function () {

        },
        success: function (resultado) {
            $('#modalRelCamera').html(resultado);
        }
    });
});


