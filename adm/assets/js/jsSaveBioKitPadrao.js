/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */










//$('#SREQPTOBIO').blur(function () {
//    var SREQPTOBIO = $('#SREQPTOBIO').val();
//    if (SREQPTOBIO !== '') {
//        $.ajax({
//            type: "POST",
//            url: "http://localhost/kitbiocis/adm/controle-biometria/consultarSrBio",
//            data: {
//                serial: SREQPTOBIO
//            },
//            beforeSend: function () {
//
//            },
//            success: function (result) {
//                if (result === '1') {
//                    $('#progressbarkit').css('width', '12%');
//                } else if (result === '2') {
//                    $('.resultprogreskit').html("<h5 class='text-danger'>Verificar o número de serie no posto anterior!</h5>");
//                    $('#SREQPTOBIO').select().focus();
//                    setTimeout(function () {
//                        $('#progressbarkit').css('width', '0%');
//                        $('.resultprogreskit').html('');
//                    }, 2000);
//                }else if(result === '3'){
//                    alert('Este serial já passou por esse processo!');
//                    $('#SREQPTOBIO').val('').focus();
//                }
//            }
//        });
//    }else{
//        $('#progressbarkit').css('width', '0%');
//    }
//});
//
//$('#PTEQPTOBIO').blur(function () {
//    var PTEQPTOBIO = $('#PTEQPTOBIO').val();
//    var SREQPTOBIO = $('#SREQPTOBIO').val();
//    if(SREQPTOBIO !== ''){
//        if (PTEQPTOBIO !== '') {
//        $.ajax({
//            type: "POST",
//            url: "http://localhost/kitbiocis/adm/controle-biometria/consultarPtBio",
//            data: {
//                patrimonio: PTEQPTOBIO,
//                serial: SREQPTOBIO
//            },
//            beforeSend: function () {
//
//            },
//            success: function (result) {
//                if (result === '1') {
//                    $('#progressbarkit').css('width', '24%');
//                } else if (result === '2') {
//                    $('.resultprogreskit').html("<h5 class='text-danger'>Verificar o patrimonio no posto anterior!</h5>");
//                    $('#PTEQPTOBIO').select().focus();
//                    setTimeout(function () {
//                        $('#progressbarkit').css('width', '12%');
//                        $('.resultprogreskit').html('');
//                    }, 2000);
//                }
//            }
//        });
//    }
//    }else{
//        $('#PTEQPTOBIO').val('');
//    }
//});
//
//$('#SREQPTOCAM').blur(function () {
//    var SREQPTOBIO = $('#SREQPTOBIO').val();
//    var SREQPTOCAM = $('#SREQPTOCAM').val();
//    if (SREQPTOCAM !== '') {
//        if(SREQPTOCAM !== SREQPTOBIO){
//            $.ajax({
//            type: "POST",
//            url: "http://localhost/kitbiocis/adm/controle-biometria/consultarSrCam",
//            data: {
//                serial: SREQPTOCAM
//            },
//            beforeSend: function () {
//
//            },
//            success: function (result) {
//                if (result === '1') {
//                    $('#progressbarkit').css('width', '36%');
//                } else if (result === '2') {
//                    $('.resultprogreskit').html("<h5 class='text-danger'>Verificar o número de serie no posto anterior!</h5>");
//                    $('#SREQPTOCAM').select().focus();
//                    setTimeout(function () {
//                        $('#progressbarkit').css('width', '24%');
//                        $('.resultprogreskit').html('');
//                    }, 2000);
//                }
//            }
//        });
//        }else{
//            $('#SREQPTOCAM').select();
//        }
//    }
//});
//
//$('#PTEQPTOCAM').blur(function () {
//    var SREQPTOCAM = $('#SREQPTOCAM').val();
//    var PTEQPTOCAM = $('#PTEQPTOCAM').val();
//    var PTEQPTOBIO = $('#PTEQPTOBIO').val();
//    if (PTEQPTOCAM !== '') {
//        if(PTEQPTOCAM !== PTEQPTOBIO){
//            $.ajax({
//            type: "POST",
//            url: "http://localhost/kitbiocis/adm/controle-biometria/consultarPtCam",
//            data: {
//                patrimonio: PTEQPTOCAM,
//                serial: SREQPTOCAM
//            },
//            beforeSend: function () {
//
//            },
//            success: function (result) {
//                if (result === '1') {
//                    $('#progressbarkit').css('width', '50%');
//                } else if (result === '2') {
//                    $('.resultprogreskit').html("<h5 class='text-danger'>Verificar o patrimônio no posto anterior!</h5>");
//                    $('#PTEQPTOCAM').select().focus();
//                    setTimeout(function () {
//                        $('#progressbarkit').css('width', '36%');
//                        $('.resultprogreskit').html('');
//                    }, 2000);
//                }
//            }
//        });
//        }else{
//            $('#PTEQPTOCAM').select();
//        }
//    }
//});
//
//$('#SRCAIXAKITBIO').blur(function () {
//    var SREQPTOBIO = $('#SREQPTOBIO').val();
//    var SRCAIXAKITBIO = $('#SRCAIXAKITBIO').val();
//
//    if (SRCAIXAKITBIO !== '') {
//        if (SRCAIXAKITBIO === SREQPTOBIO) {
//            $('#progressbarkit').css('width', '62%');
//        } else {
//            $('#SRCAIXAKITBIO').focus().select();
//            $('#progressbarkit').css('width', '50%');
//        }
//    }
//});
//
//$('#PTCAIXAKITBIO').blur(function () {
//    var PTEQPTOBIO = $('#PTEQPTOBIO').val();
//    var PTCAIXAKITBIO = $('#PTCAIXAKITBIO').val();
//
//    if (PTCAIXAKITBIO !== '') {
//        if (PTCAIXAKITBIO === PTEQPTOBIO) {
//            $('#progressbarkit').css('width', '74%');
//        } else {
//            $('#PTCAIXAKITBIO').focus().select();
//            $('#progressbarkit').css('width', '62%');
//        }
//    }
//});
//
//$('#SRCAIXAKITCAM').blur(function () {
//    var SREQPTOCAM = $('#SREQPTOCAM').val();
//    var SRCAIXAKITCAM = $('#SRCAIXAKITCAM').val();
//
//    if (SRCAIXAKITCAM !== '') {
//        if (SRCAIXAKITCAM === SREQPTOCAM) {
//            $('#progressbarkit').css('width', '90%');
//        } else {
//            $('#SRCAIXAKITCAM').focus().select();
//            $('#progressbarkit').css('width', '74%');
//        }
//    }
//});
//
//$('#PTCAIXAKITCAM').blur(function () {
//    var PTEQPTOCAM = $('#PTEQPTOCAM').val();
//    var PTCAIXAKITCAM = $('#PTCAIXAKITCAM').val();
//
//
//    if (PTCAIXAKITCAM !== '') {
//        if (PTCAIXAKITCAM === PTEQPTOCAM) {
//            //Processo final salvar pegar as 4 referencias primeiras.
//            var SREQPTOBIO = $('#SREQPTOBIO').val();
//            var PTEQPTOBIO = $('#PTEQPTOBIO').val();
//            var SREQPTOCAM = $('#SREQPTOCAM').val();
//            var PTEQPTOCAM = $('#PTEQPTOCAM').val();
//            $.ajax({
//                type: "POST",
//                url: "http://localhost/kitbiocis/adm/controle-biometria/salvarProcessoFinal",
//                data: {
//                    patrimonioBio: PTEQPTOBIO,
//                    serialBio: SREQPTOBIO,
//                    patrimonioCam: PTEQPTOCAM,
//                    serialCam: SREQPTOCAM
//                },
//                beforeSend: function () {
//
//                },
//                success: function (result) {
//                    if (result === '1') {
//                        $('#progressbarkit').addClass('bg-success');
//                        $('#progressbarkit').css('width', '100%');
//                        $('#progressbarkit').addClass(' progress-bar-striped progress-bar-animated');
//                        setTimeout(function () {
//                            $('#progressbarkit').css('width', '0%');
//                            $('#INPUTTEXTHELP').addClass('bg-success');
//                            setTimeout(function () {
//                                $('#progressbarkit').removeClass(' progress-bar-striped progress-bar-animated');
//                                $("#SREQPTOBIO").focus();
//                                $("#INPUTTEXTHELP").removeClass('bg-success');
//                                
//                                $('#SREQPTOBIO').val('');
//                                $('#PTEQPTOBIO').val('');
//                                $('#SREQPTOCAM').val('');
//                                $('#PTEQPTOCAM').val('');
//                                
//                                $('#SRCAIXAKITBIO').val('');
//                                $('#PTCAIXAKITBIO').val('');
//                                $('#SRCAIXAKITCAM').val('');
//                                $('#PTCAIXAKITCAM').val('');
//                                
//                            }, 500);
//                        }, 1000);
//                    } else if (result === '2') {
//                        $('.resultprogreskit').html("<h5 class='text-danger'>Não foi possível salvar!</h5>");
//                        $('#PTCAIXAKITCAM').select().focus();
//                        setTimeout(function () {
//                            $('#progressbarkit').css('width', '90%');
//                            $('.resultprogreskit').html('');
//                        }, 2000);
//                    }
//                }
//            });
//
//        } else {
//            $('#PTCAIXAKITCAM').focus().select();
//            $('#progressbarkit').css('width', '90%');
//        }
//    }
//});
//
//$('.modalAjax3').on('click', function () {
//    $.ajax({
//        type: "POST",
//        url: "http://localhost/kitbiocis/adm/controle-biometria/exibirRelacaoKitPadrao",
//        data: {
//        },
//        beforeSend: function () {
//
//        },
//        success: function (resultado) {
//            $('#modalRel').html(resultado);
//        }
//    });
//});
//
//
//
