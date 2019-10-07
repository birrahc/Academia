<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBSA', 'academia_lr');


function __autoload($Class){
    
    $cDir= ['Dao','modelos','ConInsAtuDelSel'];
    $iDir= null;
    
    foreach ($cDir as $dirName):
        if(!$iDir && file_exists(__DIR__. "\\{$dirName}\\{$Class}.class.php") && !is_dir($dirName)):
            include_once (__DIR__ . "\\{$dirName}\\{$Class}.class.php");
            $iDir = true;
        endif;
        
    endforeach;
    
    if(!$iDir):
        echo"<script>";
        echo 'alert('.trigger_error("Não foi possivel incluir {$Class}.class.php", E_USER_ERROR).')';
        echo"</script>";
        die;
        trigger_error("Não foi possivel incluir {$Class}.class.php", E_USER_ERROR);
    endif;
}

//Error :: Exibe erros lançados :: Front
function Error($ErrMsg,$ErrNo,$ErrDie=null) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? INFOR :($ErrNo == E_USER_WARNING ? ALERT :($ErrNo == E_USER_ERROR ? ERROR :$ErrNo)));
    echo"<p class=\"trigger {$CssClass}\">{$ErrMsg}<span class=\"ajax_close\"> </span> </p>";
    
    if($ErrDie):
        die;
    endif;
}

//PHPErro :: personaliza o gatilho do PHP
function PHPError($ErrNo,$ErrMsg,$ErrFile,$ErrLine) {
    
    $CssClass = ($ErrNo == E_USER_NOTICE ? INFOR :($ErrNo == E_USER_WARNING ? ALERT :($ErrNo == E_USER_ERROR ? ERROR:$ErrNo)));
    echo"<p class=\"trigger {$CssClass}\">";
    echo"<b>Erro na linha: #{$ErrLine} ::</b> {$ErrMsg}<br>";
    echo"<small>{$ErrFile} </small>";
    echo"<span class=\"ajax_close\"> </span> </p>";
    if($ErrNo == E_USER_ERROR):
        die;
    endif;
}
set_error_handler('PHPError');


