<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="<?= URL ?>controle-home/index">Início</a>
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
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-3 col-lg-6 text-center">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <a href="<?= URL ?>controle-biocam/index">
                                <img src="<?= URL ?>assets/image/biometria.png" width="100px;" />
                                <img src="<?= URL ?>assets/image/foto2.png" width="100px;" />
                            </a>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-xl-3 col-lg-6 text-center">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <a href="<?= URL ?>controle-biometria/biometria">
                                <img src="<?= URL ?>assets/image/biometria.png" width="100px;" style="cursor:pointer" />
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 text-center">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <a href="<?= URL ?>controle-biometria/camera">
                                <img src="<?= URL ?>assets/image/foto2.png" width="100px;" style="cursor:pointer" />
                            </a>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="col-xl-3 col-lg-6 text-center">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <a href="<?= URL ?>controle-biometria/kitpadrao">
                                <img src="<?= URL ?>assets/image/caixaindividual.png" width="100px;" style="cursor:pointer"/>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 text-center">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <a href="<?= URL ?>controle-biometria/kitcoletiva">
                                <img src="<?= URL ?>assets/image/caixacoletiva.png" width="185px;" style="cursor:pointer"/>
                            </a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>

    </div>

</div>