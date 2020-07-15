/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    $('#PTEQPTO').prop('disabled',true);
    $('#SRCAIXA').prop('disabled',true);
    $('#PTCAIXA').prop('disabled',true);
    $('#PTEQPTOCAM').prop('disabled',true);
    $('#SRCAIXACAM').prop('disabled',true);
    $('#PTCAIXACAM').prop('disabled',true);
});


//BIOMETRIA
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
                    url: "http://192.168.100.140/kitbiocis/adm/controle-biocam/consultarSrPatInicio",
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
                                url: "http://192.168.100.140/kitbiocis/adm/controle-biocam/consultarSrInicio",
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
                                        $('#progressbar').css('width', '12.5%');
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
                                url: "http://192.168.100.140/kitbiocis/adm/controle-biocam/saveSnPatrimonioEqpto",
                                data: {
                                    serial: sn,
                                    patrimonio: pat,
                                    tipo: tipo
                                },
                                beforeSend: function () {

                                },
                                success: function (resultado) {
                                    if (resultado === '1') {
                                        $('#progressbar').css('width', '25%');
                                        $('#SRCAIXA').focus();
                                        $('#progressbar').addClass('bg-success');
                                        $('#progressbar').removeClass('bg-danger');
                                    } else if (resultado === '3') {
                                        $('#progressbar').css('width', '12.5%');
                                        $('#PTEQPTO').val('');
                                        $('#PTEQPTO').focus();
                                        alert('PATRIMÔNIO JA ASSOCIADO A UM OUTRO NÚMERO DE SERIE, VERIFIQUE O OCORRIDO!');
                                    }
                                }
                            });
                        }
                    } else {
                        $('#progressbar').css('width', '25%');
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
                    $('#progressbar').css('width', '37.5%');
                    $("#PTCAIXA").focus();
                } else {
                    $('#progressbar').removeClass('bg-success');
                    $('#progressbar').addClass('bg-danger');
                    $("#SRCAIXA").focus();
                    $("#SRCAIXA").select();
                }
            } else {
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
                        url: "http://192.168.100.140/kitbiocis/adm/controle-biocam/PesquisarSerialPatrimonio",
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
                                $('#progressbar').css('width', '50%');

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
            } else {
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

//CAMERA

$("#SREQPTOCAM").blur(function () {
    var sr = $("#SREQPTOCAM").val();
    var tamSr = $("#SREQPTOCAM").val().length;

    if (sr === "") {

    } else {
        if (tamSr == 11) {
            //AQUI INICIA O CODIGO QUE VAI COMPARAR SE EXISTE NO BANCO COM STATUS = 1 e PREENCHER O CAMPO SERIAL NUMBER PATRIMONIO do eqpto.
            //FAZER A OPÇÃO DE EXCLUIR CASO O USUARIO SALVE O NUMERO de SERIE ERRADO OU NUMERO DE PATRIMONIO.
            $.ajax({
                type: "POST",
                url: "http://192.168.100.140/kitbiocis/adm/controle-biocam/consultarSrCamInicio",
                data: {
                    serial: sr
                },
                beforeSend: function () {

                },
                success: function (result) {
                    if (result === '1') {
                        alert('Número de série ja cadastrada! verifique!');
                        $("#SREQPTOCAM").val('');
                        $("#SREQPTOCAM").focus();
                        $('#progressbar').css('width', '50%');
                    }
                    else if (result === '2') {
                        $('#progressbar').css('width', '62.5%');
                        $("#PTEQPTOCAM").prop('disabled', false);
                        $("#PTEQPTOCAM").focus();
                    }
                }
            });
        } else {
            alert('Tamanho de caracteres do n. serie inválido');
            $('#SREQPTOCAM').focus();
            $('#SREQPTOCAM').val('');
        }
    }

});

$("#PTEQPTOCAM").blur(function () {
    var pat = $('#PTEQPTOCAM').val();
    var tamPt = $('#PTEQPTOCAM').val().length;
    if (pat === "") {

    } else {
        if ($('#SREQPTOCAM').val() === '') {

        } else {
            if (tamPt === 9) {
                if (($.isNumeric(pat))) {
                    $.ajax({
                        type: "POST",
                        url: "http://192.168.100.140/kitbiocis/adm/controle-biocam/consultarPtCamInicio",
                        data: {
                            patrimonio: pat
                        },
                        beforeSend: function () {

                        },
                        success: function (result) {
                            if (result === '1') {
                                alert('Patrimonio ja cadastrado! verifique!');
                                $("#PTEQPTOCAM").val('');
                                $('#PTEQPTOCAM').focus();
                                $('#progressbar').css('width', '62.5%');
                            }
                            else if (result === '2') {
                                $('#progressbar').css('width', '75%');
                                $('#SRCAIXACAM').focus();
                                $('#progressbar').addClass('bg-success');
                                $('#progressbar').removeClass('bg-danger');
                                $("#PTEQPTOCAM").prop('disabled', false);
                            }
                        }
                    });
                } else {
                    alert('Patrimônio inválido');
                    $('#PTEQPTOCAM').focus();
                    $('#PTEQPTOCAM').val('');
                }
            } else {
                alert('Tamanho de caracteres do patrimonio inválido');
                $('#PTEQPTOCAM').focus();
                $('#PTEQPTOCAM').val('');
            }
        }
    }

});

$('#SRCAIXACAM').blur(function () {
    var sn = $('#SREQPTOCAM').val();
    var snc = $('#SRCAIXACAM').val();
    var tamSnc = $('#SRCAIXACAM').val().length;

    if (snc === '') {
        $('#progressbar').removeClass('bg-success');
        $('#progressbar').addClass('bg-danger');
    } else {
        if (tamSnc == 11) {
            if (sn === snc) {
                $('#progressbar').addClass('bg-success');
                $('#progressbar').removeClass('bg-danger');
                $('#progressbar').css('width', '87.5%');
                $("#PTCAIXACAM").focus();
            } else {
                $('#progressbar').removeClass('bg-success');
                $('#progressbar').addClass('bg-danger');
                $("#SRCAIXACAM").focus();
                $("#SRCAIXACAM").select();
            }
        } else {
            alert('Tamanho de caracteres do n. serie inválido');
            $('#SRCAIXACAM').focus();
            $('#SRCAIXACAM').val('');
        }
    }
});

$("#PTCAIXACAM").blur(function () {
    var pat = $("#PTEQPTOCAM").val();
    var patCom = $("#PTCAIXACAM").val();
    var snc = $('#SRCAIXACAM').val();
    var tamPatCom = $("#PTCAIXACAM").val().length;
    var tipo = $('#TIPOEQPTOCAM').val();
    var srbio = $("#SRCAIXA").val();
    var ptbio = $("#PTCAIXA").val();


    if (patCom === "") {

    } else {
        if (($.isNumeric(patCom))) {
            if (tamPatCom === 9) {
                if (patCom === pat) {
                    $.ajax({
                        type: "POST",
                        url: "http://192.168.100.140/kitbiocis/adm/controle-biocam/saveSnPatrimonioEqptoCam",
                        data: {
                            serial: snc,
                            patrimonio: patCom,
                            tipo: tipo
                        },
                        beforeSend: function () {

                        },
                        success: function (resultado) {
                            if (resultado === '1') {
                                $('#ajudaSRPTbancoCam').val('1');
                                $('#progressbar').addClass('bg-success');
                                $('#progressbar').removeClass('bg-danger');
                                $('#progressbar').css('width', '100%');
                                $('#progressbar').addClass(' progress-bar-striped progress-bar-animated');
                                setTimeout(function () {
                                    $('#progressbar').css('width', '0%');
                                    $('#progressbar').removeClass(' progress-bar-striped progress-bar-animated');
                                    $('.resultprogres').removeClass('d-none');
                                    $('#SREQPTOCAM').val("");
                                    $('#PTEQPTOCAM').val("");
                                    $("#PTCAIXACAM").val("");
                                    $("#SRCAIXACAM").val("");
                                    $('#SREQPTO').val("");
                                    $('#PTEQPTO').val("");
                                    $("#PTCAIXA").val("");
                                    $("#SRCAIXA").val("");
                                    $("#INPUTTEXTHELP").addClass('bg-success');
                                    setTimeout(function () {
                                        $('.resultprogres').addClass('d-none');
                                        $("#SREQPTO").focus();
                                        $("#INPUTTEXTHELP").removeClass('bg-success');
                                        $('#lastregisterbio').html('<br/> >>>>BIO N. Serie: ' + srbio + ' Patrimônio: ' + ptbio + ' <br/>  >>>>CAM N. Serie: ' + snc + ' Patrimônio: ' + patCom);
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
                    $("#PTCAIXACAM").select();
                }
            } else {
                alert('Tamanho de caracteres do patrimonio inválido');
                $('#PTCAIXACAM').focus();
                $('#PTCAIXACAM').val('');
            }
        } else {
            alert('Patrimônio inválido');
            $('#PTCAIXACAM').focus();
            $('#PTCAIXACAM').val('');
        }
    }
});










$('.modalAjax').on('click', function () {
    $.ajax({
        type: "POST",
        url: "http://192.168.100.140/kitbiocis/adm/controle-biocam/exibirRelacaoSrPat",
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
        url: "http://192.168.100.140/kitbiocis/adm/controle-biocam/exibirRelacaoSrPatCam",
        data: {
        },
        beforeSend: function () {

        },
        success: function (resultado) {
            $('#modalRelCamera').html(resultado);
        }
    });
});


