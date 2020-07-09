<?php


class ControleBiocam {

    private $Dados;
    private $Dados1;
    private $Dados2;
    private $Dados3;
    private $DadrId;

    public function index() {
        $CarregarView = new ConfigView("biometria/biocam");
        $CarregarView->renderizar();
    }
}