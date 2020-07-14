<?php
session_start();
define('URL', 'http://localhost/kitbiocis/adm/');

define('CONTROLER', 'controle-login');
define('METODO', 'login');

//define('HOST', '162.241.203.7');
//define('USER', 'cisami87_bio');
//define('PASS', 'cis@2019!');
//define('DBNAME', 'cisami87_biometria');


function __autoload($Class) {
    $dirName = array(
        'controllers',
        'models',
        'models/helper',
        'assets/fpdf',
        'views',
        'config'
    );
    foreach ($dirName as $diretorios) {
        if (file_exists("{$diretorios}/{$Class}.php")):
            require("{$diretorios}/{$Class}.php");
        endif;
    }

}
