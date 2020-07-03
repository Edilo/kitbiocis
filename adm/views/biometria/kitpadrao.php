
<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="<?= URL ?>controle-home/index">Home </a>


            <!-- User -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="<?= URL ?>assets/image/cis-logopp.jpg">
                            </span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Bem vindo!</h6>
                        </div>
                        <a href="<?= URL ?>controle-login/logout" class="dropdown-item">
                            <i class="ni ni-lock-circle-open">
                                Logout
                            </i>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-4 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="row mb-2">
                
                <div class="col-sm-3 text-center">
                    <div class="card card-stats">
                        <div class="card-body">
                            <img src="<?= URL ?>assets/image/biometria.png" style="width:50px;"/>
                            <h3 class="label">Biometria</h3>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-3 text-center">
                    <div class="card card-stats">
                        <div class="card-body">
                            <img src="<?= URL ?>assets/image/FOTO2.png" style="width:50px;"/>
                            <h3 class="label">Camera</h3>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-6 text-center">
                    <div class="card card-stats">
                        <div class="card-body">
                            <img src="<?= URL ?>assets/image/caixaindividual.png" style="width:50px;"/>
                            <h3 class="label"><span style="cursor:pointer" class="modalAjax3" data-toggle="modal" data-target="#modalRelCaixaKit" >Caixa KIT</span></h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase text-muted mb-0">1ª Leitura PAT/SN Biometria.</h5><br>
                            <label>Serial number</label>
                            <input type="text" class="form-control" id="SREQPTOBIO">
                            <label>Patrimônio</label>
                            <input type="text" class="form-control" id="PTEQPTOBIO">
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-3">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase text-muted mb-0">2ª Leitura PAT/SN Camera.</h5><br>
                            <label>Serial number</label>
                            <input type="text" class="form-control" id="SREQPTOCAM">
                            <label>Patrimônio</label>
                            <input type="text" class="form-control" id="PTEQPTOCAM">
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase text-muted mb-0">3ª Leitura PAT/SN Caixa Kit Biometria.</h5><br>
                            <label>Serial number</label>
                            <input type="text" class="form-control" id="SRCAIXAKITBIO">
                            <label>Patrimônio</label>
                            <input type="text" class="form-control" id="PTCAIXAKITBIO">
                            <input type="hidden" id="ajudaSRPTbanco" value="1">
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-3">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase text-muted mb-0">4ª Leitura PAT/SN Caixa Kit Camera.</h5><br>
                            <label>Serial number</label>
                            <input type="text" class="form-control" id="SRCAIXAKITCAM">
                            <label>Patrimônio</label>
                            <input type="text" class="form-control" id="PTCAIXAKITCAM">
                            <input type="hidden" id="ajudaSRPTbanco" value="1">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-stats mt-3 bg">
                        <div class="card-body text-center">
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" id="progressbarkit" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="resultprogreskit">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 mt-4">
                    <div class="card card-stats">
                        <input type="text" class="form-control" id="INPUTTEXTHELP">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalRelCaixaKit" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Relação de associação KIT - BIO/CAM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalRel">

            </div>
        </div>
    </div>
</div>



<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<script src="<?= URL ?>assets/jquery/jquery-3.2.1.min.js"></script>
<script src="<?= URL ?>assets/js/jsSaveBioKit.js"></script>
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('#SREQPTOBIO').focus();
        }, 1000);
    });
</script>
