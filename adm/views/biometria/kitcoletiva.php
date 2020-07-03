
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
    <div class="header bg-gradient-primary pb-4 pt-5 pt-md-8 header_principal">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8 text-center">
                    <div class="card card-stats">
                        <div class="card-body">
                            <img src="<?= URL ?>assets/image/caixacoletiva.png" style="width:80px;"/>
                            <h3 class="label">Caixa coletiva</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase text-muted mb-0">1ª Cadastro de informações caixa coletiva.</h5><br>
                            <label>Grupo</label>
                            <input type="text" class="form-control" id="SREQPTOBIO">
                            <label>Agência/Encomenda</label>
                            <input type="text" class="form-control" id="PTEQPTOBIO">
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-4">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase text-muted mb-0">2ª Quantidade de Kits na caixa coletiva.</h5><br>
                            <label>Quantidades</label>
                            <input type="number" min="0" max="20" class="form-control" id="SREQPTOCAM">
                            <label>&nbsp;</label><br>
                            <button class="btn btn-info">Confirmar</button>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-4 text-center">
                    <div class="card card-stats mb-4 mb-xl-0 pt-5 pb-4">
                        <div class="card-body">
                            <button class="btn btn-warning btn-lg pt-5 pb-5 pr-5 pl-5" data-toggle="modal" data-target="#staticBackdrop">Próximo Passo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>


<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<script src="<?= URL ?>assets/jquery/jquery-3.2.1.min.js"></script>
<script src="<?= URL ?>assets/js/jsSaveBioKitPadrao.js"></script>
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('#SREQPTOBIO').focus();
        }, 1000);
    });
</script>
