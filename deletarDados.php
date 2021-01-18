<?php
require('./app/config.inc.php');

$pagamentos = new pagamentos();
$deletaDados = new DeleteDados();

if(isset($_POST['deleta'])):
    if($_POST['deleta']==1):
        
    endif;
    
    if($_POST['deleta']==2):
        if(isset($_POST['deletaPgt'])&& isset($_POST['aluno'])):
            $pagamentos->setId_pgt($_POST['deletaPgt']);
            $pagamentos->setId_Aluno($_POST['aluno']);
            $deletaDados->DeletaPagameto($pagamentos);
            header("Location: Pagamento_Aluno.php?aluno={$pagamentos->getId_Aluno()}");
        endif;
    endif;
    
endif;