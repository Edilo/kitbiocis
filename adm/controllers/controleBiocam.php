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

    public function camera() {
        $CarregarView = new ConfigView("biometria/camera");
        $CarregarView->renderizar();
    }
    
    public function kitpadrao(){
        $CarregarView = new ConfigView("biometria/kitpadrao");
        $CarregarView->renderizar();
    }
    
    public function kitcoletiva(){
        $CarregarView = new ConfigView("biometria/kitcoletiva");
        $CarregarView->renderizar();
    }

        public function consultarSrInicio(){
        $serial = filter_input(INPUT_POST, 'serial', FILTER_DEFAULT);
        $tipo = filter_input(INPUT_POST, 'tipo', FILTER_DEFAULT);
        
        $consultarSr = new ModelsBiometria();
        $consultarSr->consultarSrInicio($serial,$tipo);
    }
    

    public function saveSnPatrimonioEqpto(){
        $serial = filter_input(INPUT_POST, 'serial', FILTER_DEFAULT);
        $patrimonio = filter_input(INPUT_POST, 'patrimonio', FILTER_DEFAULT);
        $tipo = filter_input(INPUT_POST, 'tipo', FILTER_DEFAULT);
        date_default_timezone_set('America/Manaus');
        $date = date('Y-m-d H:i:s');
        $iduser = $_SESSION['ID'];
        $Dados = [
            'SERIAL_NUMBER' => $serial,
            'PATRIMONIO' => $patrimonio,
            'FK_ID_USUARIO' => $iduser,
            'DATA_HORA' => $date,
            'TIPO_EQPTO' => $tipo,
            'STATUS' => '1'
        ];
        
        $biometria = new ModelsBiometria();
        $biometria->saveSnPatrimonioEqpto($Dados);
        
    }
    
    public function PesquisarSerialPatrimonio(){
        $serial = filter_input(INPUT_POST, 'serial', FILTER_DEFAULT);
        $patrimonio = filter_input(INPUT_POST, 'patrimonio', FILTER_DEFAULT);
        
        $consultarbiometria = new ModelsBiometria();
        $consultarbiometria->PesquisarSerialPatrimonio($serial,$patrimonio);
        
    }
    
    public function exibirRelacaoSrPat(){
        $consultar = new ModelsBiometria();
        $consultar->exibirRelacaoSrPat();
    }
    
    public function exibirRelacaoSrPatCam(){
        $consultar = new ModelsBiometria();
        $consultar->exibirRelacaoSrPatCam();
    }
    
    public function consultarSrPatInicio(){
        $serial = filter_input(INPUT_POST, 'serial', FILTER_DEFAULT);
        $tipo = filter_input(INPUT_POST, 'tipo', FILTER_DEFAULT);
        $consultarSrPatInicio = new ModelsBiometria();
        $consultarSrPatInicio->consultarSrPatInicio($serial,$tipo);
    }
    
    public function excRelacao(){
        $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
        $excRelacao = new ModelsBiometria();
        $excRelacao->excRelacao($id);
    }



    public function consultarSrCamInicio(){
        $serial = filter_input(INPUT_POST, 'serial', FILTER_DEFAULT);
        $consultarSrCamInicio = new ModelsBiometria();
        $consultarSrCamInicio->consultarSrCamInicio($serial);

    }

    public function consultarPtCamInicio(){
        $patrimonio = filter_input(INPUT_POST, 'patrimonio', FILTER_DEFAULT);
        $consultarPatCamInicio = new ModelsBiometria();
        $consultarPatCamInicio->consultarPatCamInicio($patrimonio);

    }
    
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    //////////FUNCTIONS DA CAIXA KIT
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    
    public function consultarSrBio(){
        $serial = filter_input(INPUT_POST, 'serial', FILTER_DEFAULT);
        $consultarserial = new ModelsBiometria();
        $consultarserial->consultarSrBio($serial);
    }
    
    public function consultarPtBio(){
        $serial = filter_input(INPUT_POST, 'serial', FILTER_DEFAULT);
        $patrimonio = filter_input(INPUT_POST, 'patrimonio', FILTER_DEFAULT);
        $consultarpatrimonio = new ModelsBiometria();
        $consultarpatrimonio->consultarPtBio($serial,$patrimonio);
    }
    
    public function consultarSrCam(){
        $serial = filter_input(INPUT_POST, 'serial', FILTER_DEFAULT);
        $consultarserialCam = new ModelsBiometria();
        $consultarserialCam->consultarSrCam($serial);
    }
    
    public function consultarPtCam(){
        $serial = filter_input(INPUT_POST, 'serial', FILTER_DEFAULT);
        $patrimonio = filter_input(INPUT_POST, 'patrimonio', FILTER_DEFAULT);
        $consultarpatrimonioCam = new ModelsBiometria();
        $consultarpatrimonioCam->consultarPtCam($serial,$patrimonio);
    }
    
    public function salvarProcessoFinal(){
        $serialBio = filter_input(INPUT_POST, 'serialBio', FILTER_DEFAULT);
        $patrimonioBio = filter_input(INPUT_POST, 'patrimonioBio', FILTER_DEFAULT);
        
        $serialCam = filter_input(INPUT_POST, 'serialCam', FILTER_DEFAULT);
        $patrimonioCam = filter_input(INPUT_POST, 'patrimonioCam', FILTER_DEFAULT);
        
        
        $salvarProcessoFinal = new ModelsBiometria();
        $salvarProcessoFinal->salvarProcessoFinal($serialBio,$patrimonioBio,$serialCam,$patrimonioCam);
    }
    
    public function exibirRelacaoKitPadrao(){
        $exibir = new ModelsBiometria();
        $exibir->exibirRelacaoKitPadrao();
    }
    
    public function excRelacaoKitPadrao(){
        $id = filter_input(INPUT_POST, 'id', FILTER_DEFAULT);
        $excRelacaoKit = new ModelsBiometria();
        $excRelacaoKit->excRelacaoKitPadrao($id);
    }
    
}