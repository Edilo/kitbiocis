<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModelsBiometria {

    private $Dados;
    private $Resultado;
    private $Resultado2;

    function getResultado() {
        return $this->Resultado;
    }

    public function consultarSrInicio($sr, $tipo) {

        $sql = "SELECT * FROM biometria WHERE ( SERIAL_NUMBER = '{$sr}' AND TIPO_EQPTO = '{$tipo}') AND STATUS_EXC <> '1'";
        $read = new ModelsRead();
        $read->FullRead($sql);

        if ($read->getResult()):
            echo '1';
        else:
            echo '2';
        endif;
    }

    public function saveSnPatrimonioEqpto($Dados) {
        if ($this->consultarPatrimonio($Dados['PATRIMONIO'])):
            if ($this->Resultado == 1):
                echo '3';
            elseif ($this->Resultado == 2):
                $create = new ModelsCreate();
                $create->ExeCreate('biometria', $Dados);

                if ($create->getResult()):
                    echo '1';
                else:
                    echo '2';
                endif;
            endif;
        endif;
    }

    ///////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////


    function consultarPatrimonio($pat) {
        $sql = "SELECT * FROM biometria WHERE PATRIMONIO = {$pat} AND STATUS_EXC <> '1'";
        $read = new ModelsRead();
        $read->FullRead($sql);
        if ($read->getResult()):
            $this->Resultado = '1';
        else:
            $this->Resultado = '2';
        endif;
        return $this->Resultado;
    }

    ///////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////









    public function PesquisarSerialPatrimonio($serial, $patrimonio) {
        $sql = "SELECT * FROM biometria WHERE( SERIAL_NUMBER = '{$serial}' AND PATRIMONIO = '{$patrimonio}') AND STATUS = '1'";
        $read = new ModelsRead();
        $read->FullRead($sql);
        date_default_timezone_set('America/Manaus');
        $date = date('Y-m-d H:i:s');
        if ($read->getResult()):
            foreach ($read->getResult() as $id)
                ;
            $Dados = [
                'STATUS' => 2,
                'DATA_HORA' => $date
            ];
            $update = new ModelsUpdate();
            $update->ExeUpdate('biometria', $Dados, 'WHERE ID = :id', 'id=' . $id['ID']);
            if ($update->getResult()):
                echo '1';
            else:
                echo '2';
            endif;
        endif;
    }

    public function exibirRelacaoSrPat() {
        $sql = "SELECT bio.ID as idbio, usu.nome as NOME,SERIAL_NUMBER,PATRIMONIO,DATA_HORA,bio.STATUS  FROM biometria bio INNER JOIN usuario usu on usu.ID = bio.FK_ID_USUARIO WHERE TIPO_EQPTO IN (1,2) AND STATUS_EXC = '0' ORDER BY bio.ID DESC LIMIT 0,20";
        $read = new ModelsRead();
        $read->FullRead($sql);

        if ($read->getResult()):
            ?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">SN</th>
                        <th scope="col">Patrimonio</th>
                        <th scope="col">Usuário</th>
                        <th scope="col">Status</th>
                        <th scope="col">Data</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>    
                    <?php
                    foreach ($read->getResult() as $listar):
                        if ($listar['STATUS'] === '2'):
                            $Status = "Green";
                        else:
                            $Status = "Red";
                        endif;
                        ?>
                        <tr id="rowline<?= $listar['idbio'] ?>">
                            <th scope="row"><?= $listar['idbio'] ?></th>
                            <td><?= $listar['SERIAL_NUMBER'] ?></td>
                            <td><?= $listar['PATRIMONIO'] ?></td>
                            <td><?= $listar['NOME'] ?></td>
                            <td style="text-align: center">
                                <span style="background-color: <?= $Status; ?>;padding-left: 10px; border-radius: 3px;">&nbsp;</span>
                            </td>
                            <td><?= $listar['DATA_HORA'] ?></td>
                            <td>
                                <span id="excRelacao<?= $listar['idbio'] ?>" style="cursor:pointer;">
                                    Excluir
                                </span>
                            </td>
                        </tr>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                    <script>
                        $('#excRelacao<?= $listar['idbio'] ?>').click(function () {
                            var id = "<?= $listar['idbio'] ?>";
                            var r = confirm("Deseja excluir realmente a associação?");
                            if (r == true) {
                                $.ajax({
                                    type: "POST",
                                    url: "http://192.168.100.140/kitbiocis/adm/controle-biometria/excRelacao",
                                    data: {
                                        id: id
                                    },
                                    beforeSend: function () {

                                    },
                                    success: function (resultado) {
                                        if (resultado === '1') {
                                            $('#rowline<?= $listar['idbio'] ?>').fadeOut(600);
                                        } else {
                                            alert('Não foi possível excluir');
                                        }
                                    }
                                });
                            }
                        });
                    </script>
                    <?php
                endforeach;
                ?>
            </tbody>
            </table>    
            <?php
        endif;
    }

    public function consultarSrPatInicio($sr, $tipo) {
        $sql = "SELECT * FROM biometria WHERE (SERIAL_NUMBER = '{$sr}' AND STATUS <> 2 )  AND STATUS_EXC IN (1)";
        $read = new ModelsRead();
        $read->FullRead($sql);

        if ($read->getResult()):
            foreach ($read->getResult() as $result):
                echo $result['SERIAL_NUMBER'] . '+' . $result['PATRIMONIO'];
            endforeach;
        else:
            echo 'Nao';
        endif;
    }

    public function excRelacao($id) {
        date_default_timezone_set('America/Manaus');
        $date = date('Y-m-d H:i:s');
        $Dados = [
            'DATA_EXC' => $date,
            'FK_ID_USUARIO_EXC' => $_SESSION['ID'],
            'STATUS_EXC' => 1
        ];
        $update = New ModelsUpdate();
        $update->ExeUpdate('biometria', $Dados, 'WHERE ID = :id', 'id=' . $id);
        if ($update->getResult()):
            echo '1';
        else:
            echo '2';
        endif;
    }

    public function exibirRelacaoSrPatCam() {
        $sql = "SELECT bio.ID as idbio, usu.nome as NOME,SERIAL_NUMBER,PATRIMONIO,DATA_HORA,bio.STATUS  FROM biometria bio INNER JOIN usuario usu on usu.ID = bio.FK_ID_USUARIO WHERE TIPO_EQPTO = '2' AND STATUS_EXC = '0' ORDER BY bio.ID DESC LIMIT 0,20";
        $read = new ModelsRead();
        $read->FullRead($sql);

        if ($read->getResult()):
            ?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">SN</th>
                        <th scope="col">Patrimonio</th>
                        <th scope="col">Usuário</th>
                        <th scope="col">Status</th>
                        <th scope="col">Data</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>    
                    <?php
                    foreach ($read->getResult() as $listar):
                        if ($listar['STATUS'] === '2'):
                            $Status = "Green";
                        else:
                            $Status = "Red";
                        endif;
                        ?>
                        <tr id="rowline<?= $listar['idbio'] ?>">
                            <th scope="row"><?= $listar['idbio'] ?></th>
                            <td><?= $listar['SERIAL_NUMBER'] ?></td>
                            <td><?= $listar['PATRIMONIO'] ?></td>
                            <td><?= $listar['NOME'] ?></td>
                            <td style="text-align: center">
                                <span style="background-color: <?= $Status; ?>;padding-left: 10px; border-radius: 3px;">&nbsp;</span>
                            </td>
                            <td><?= $listar['DATA_HORA'] ?></td>
                            <td>
                                <span id="excRelacao<?= $listar['idbio'] ?>" style="cursor:pointer;">
                                    Excluir
                                </span>
                            </td>
                        </tr>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                    <script>
                        $('#excRelacao<?= $listar['idbio'] ?>').click(function () {
                            var id = "<?= $listar['idbio'] ?>";
                            var r = confirm("Deseja excluir realmente a associação?");
                            if (r == true) {
                                $.ajax({
                                    type: "POST",
                                    url: "http://192.168.100.140/kitbiocis/adm/controle-biometria/excRelacao",
                                    data: {
                                        id: id
                                    },
                                    beforeSend: function () {

                                    },
                                    success: function (resultado) {
                                        if (resultado === '1') {
                                            $('#rowline<?= $listar['idbio'] ?>').fadeOut(600);
                                        } else {
                                            alert('Não foi possível excluir');
                                        }
                                    }
                                });
                            }
                        });
                    </script>
                    <?php
                endforeach;
                ?>
            </tbody>
            </table>    
            <?php
        endif;
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    //////////FUNCTIONS DA CAIXA KIT
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    
    
    
    ////////////////////////////////////////////
    ////////////////////////////////////////////
    ////////////////////////////////////////////
    ////////////////////////////////////////////
    ////////////////////////////////////////////
    ////////////////////////////////////////////

    public function consultarSrBio($sr) {
        $sql = "SELECT * FROM biometria WHERE SERIAL_NUMBER = {$sr} AND (STATUS = '2' AND STATUS_EXC = '0')";
        $consultar = new ModelsRead();
        $consultar->FullRead($sql);

        if ($consultar->getResult()):
            foreach($consultar->getResult() as $result);
            if($this->consultarSrBioProcessado($result['ID'])):
                if($this->Resultado === 'True'):
                    echo '3';
                else:
                    echo '1';
                endif;
            endif;
        else:
            echo '2';
        endif;
    }
    
    public function consultarSrBioProcessado($sr){
        $sql = "SELECT * FROM kit_padrao WHERE FK_ID_BIO = {$sr} AND (STATUS = '1' AND STATUS_EXC <> '1')";
        $read = new ModelsRead();
        $read->FullRead($sql);
        if($read->getResult()):
            $this->Resultado = 'True';
        else:
            $this->Resultado = 'False';
        endif;
        return $this->Resultado;
    }

    ////////////////////////////////////////////
    ////////////////////////////////////////////
    ////////////////////////////////////////////
    ////////////////////////////////////////////
    ////////////////////////////////////////////
    ////////////////////////////////////////////

    public function consultarPtBio($sr, $pt) {
        $sql = "SELECT * FROM biometria WHERE SERIAL_NUMBER = {$sr} AND PATRIMONIO = {$pt} AND (STATUS = '2' AND STATUS_EXC = '0')";
        $consultar = new ModelsRead();
        $consultar->FullRead($sql);

        if ($consultar->getResult()):
            echo '1';
        else:
            echo '2';
        endif;
    }

    public function consultarSrCam($sr) {
        $sql = "SELECT * FROM biometria WHERE SERIAL_NUMBER = {$sr} AND (STATUS = '2' AND STATUS_EXC = '0')";
        $consultar = new ModelsRead();
        $consultar->FullRead($sql);

        if ($consultar->getResult()):
            echo '1';
        else:
            echo '2';
        endif;
    }

    public function consultarPtCam($sr, $pt) {
        $sql = "SELECT * FROM biometria WHERE SERIAL_NUMBER = {$sr} AND PATRIMONIO = {$pt} AND (STATUS = '2' AND STATUS_EXC = '0')";
        $consultar = new ModelsRead();
        $consultar->FullRead($sql);

        if ($consultar->getResult()):
            echo '1';
        else:
            echo '2';
        endif;
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    public function salvarProcessoFinal($srBio, $ptBio, $srCam, $ptCam) {
        date_default_timezone_set('America/Manaus');
        $date = date('Y-m-d H:i:s');
        if ($this->pesquisarIdBio($srBio, $ptBio)) {
            if($this->Resultado <> 'Nao'):
                if ($this->pesquisarIdCam($srCam, $ptCam)):
                    if($this->Resultado2 <> 'Nao'):
                        $Dados = [
                            'FK_ID_BIO' => $this->Resultado,  
                            'FK_ID_CAM' => $this->Resultado2,
                            'FK_ID_USUARIO' => $_SESSION['ID'],
                            'HORA_DATA' => $date,
                            'STATUS' => '1'
                        ];
                        $create = new ModelsCreate();
                        $create->ExeCreate('kit_padrao', $Dados);
                        if($create->getResult()):
                            echo '1';
                        else:
                            echo '2';
                        endif;
                    endif;
                endif;
            endif;
        }
    }

    public function pesquisarIdBio($sr, $pt) {
        $sql = "SELECT * FROM biometria WHERE (SERIAL_NUMBER = {$sr} AND PATRIMONIO = $pt) AND STATUS_EXC <> '1'";
        $consultar = new ModelsRead();
        $consultar->FullRead($sql);
        if ($consultar->getResult()):
            foreach ($consultar->getResult() as $result)
                ;
            $this->Resultado = $result['ID'];
        else:
            $this->Resultado = 'Nao';
        endif;
        return $this->Resultado;
    }
    
    public function pesquisarIdCam($sr, $pt) {
        $sql = "SELECT * FROM biometria WHERE (SERIAL_NUMBER = {$sr} AND PATRIMONIO = $pt) AND STATUS_EXC <> '1'";
        $consultar = new ModelsRead();
        $consultar->FullRead($sql);
        if ($consultar->getResult()):
            foreach ($consultar->getResult() as $result)
                ;
            $this->Resultado2 = $result['ID'];
        else:
            $this->Resultado2 = 'Nao';
        endif;
        return $this->Resultado2;
    }
    
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    
    public function exibirRelacaoKitPadrao(){
        $sql = "SELECT ID_KIT as idkit,FK_ID_BIO,FK_ID_CAM,usu.NOME as usuario,HORA_DATA,usu.STATUS as STATUSKIT  "
                . " FROM kit_padrao kit INNER JOIN usuario usu on usu.ID = kit.FK_ID_USUARIO "
                . " WHERE (kit.STATUS = '1' AND kit.STATUS_EXC <> '1') ORDER BY ID_KIT DESC limit 0,10";
        $read = new ModelsRead();
        $read->FullRead($sql);

        if ($read->getResult()):
            ?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Usuário</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col">Data</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
            <tbody>    
                <?php
                foreach ($read->getResult() as $listar):
                        $sql2 = "SELECT * FROM biometria WHERE ID IN('{$listar['FK_ID_BIO']}','{$listar['FK_ID_CAM']}')";
                        $read2 = new ModelsRead();
                        $read2->FullRead($sql2);
                        
                        if ($listar['STATUSKIT'] === '1'):
                            $Status = "Green";
                        else:
                            $Status = "Red";
                        endif;
                        ?>
                        <tr class="rowlinekit<?= $listar['idkit'] ?>">
                            <th scope="row"><?= $listar['idkit'] ?></th>
                            <th scope="row"><?= $listar['usuario'] ?></th>
                            <td style="text-align: center">
                                <span style="background-color: <?= $Status; ?>;padding-left: 10px; border-radius: 3px;">&nbsp;</span>
                            </td>
                            <td><?= $listar['HORA_DATA'] ?></td>
                            <td>
                                <span id="excRelacaoKit<?= $listar['idkit'] ?>" style="cursor:pointer;">
                                    Excluir
                                </span>
                            </td>
                        </tr>
                        <tr class="bg-info rowlinekit<?= $listar['idkit'] ?>">
                            <th scope="row">Equipamento</th>
                            <th scope="row">Serial</th>
                            <th scope="row">Patrimônio</th>
                            <th scope="row">Data/Hora</th>
                            <th scope="row"></th>
                        </tr>
                        <?php
                        foreach($read2->getResult() as $result2):
                            if($result2['TIPO_EQPTO'] === '1'):
                            $img = "<img src='".URL."assets/image/biometria.png' style='width:20px;'/>";
                                else:
                            $img = "<img src='".URL."assets/image/foto2.png' style='width:20px;'/>";    
                            endif;
                        ?>
                        <tr class="bg-light rowlinekit<?= $listar['idkit'] ?>">
                            <th><?=$img;?></th>
                            <th scope="row"><?=$result2['SERIAL_NUMBER'];?></th>
                            <th scope="row"><?=$result2['PATRIMONIO'];?></th>
                            <th scope="row"><?=$result2['DATA_HORA'];?></th>
                            <th scope="row"></th>
                        </tr>
                        <?php
                        endforeach;
                        ?>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                    <script>
                        $('#excRelacaoKit<?= $listar['idkit'] ?>').click(function () {
                            var id = "<?= $listar['idkit'] ?>";
                            var r = confirm("Deseja excluir realmente a associação desse KIT?");
                            if (r == true) {
                                $.ajax({
                                    type: "POST",
                                    url: "http://192.168.100.140/kitbiocis/adm/controle-biometria/excRelacaoKitPadrao",
                                    data: {
                                        id: id
                                    },
                                    beforeSend: function () {

                                    },
                                    success: function (resultado) {
                                        if (resultado === '1') {
                                            $('.rowlinekit<?= $listar['idkit'] ?>').fadeOut(600);
                                        } else {
                                            alert('Não foi possível excluir');
                                        }
                                    }
                                });
                            }
                        });
                    </script>
                    <?php
                endforeach;
                ?>
            </tbody>
            </table>    
            <?php
        endif;
    }
    
    public function excRelacaoKitPadrao($id){
        date_default_timezone_set('America/Manaus');
        $date = date('Y-m-d H:i:s');
        $Dados = [
            'DATA_EXC' => $date,
            'FK_ID_USUARIO_EXC' => $_SESSION['ID'],
            'STATUS_EXC' => 1
        ];
        $update = New ModelsUpdate();
        $update->ExeUpdate('kit_padrao', $Dados, 'WHERE ID_kit = :id', 'id=' . $id);
        if ($update->getResult()):
            echo '1';
        else:
            echo '2';
        endif;
    }
    
}
