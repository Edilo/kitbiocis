<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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