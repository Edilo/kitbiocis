<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelsEstoque
 *
 * @author EdiloSousa
 */
class ModelsUsuario {

    public function saveuser($nome,$login,$senha,$nivel) {
    	date_default_timezone_set('America/Manaus');
        $date = date('Y-m-d H:i:s');

    	$Dados = [
    		'user_nome' => $nome,
    		'user_login' => $login,
    		'user_password' => md5($senha),
    		'user_nivel' => $nivel,
    		'user_data' => $date
    	];


    	$create = new ModelsCreate();
    	$create->ExeCreate('tblusuario',$Dados);
    	if($create->getResult()):
    		echo '1';
    	else:
    		echo '2';
    	endif;
    }
}