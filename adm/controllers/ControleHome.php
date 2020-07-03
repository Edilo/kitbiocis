<?php

class ControleHome {

    private $Dados;
    private $Dados1;
    private $Dados2;
    private $Dados3;
    private $Dados4;
    private $Dados5;
    private $Dados6;
    private $Dados7;
    private $UserId;

    public function index() {
        $CarregarView = new ConfigView("home/home");
        $CarregarView->renderizar();
    }
}
