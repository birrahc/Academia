<?php
require_once './controle.php';
require ('./app/config.inc.php');

$pgt = new pagamentos();
$Cadastrar = new cadastro();
$AtualizarPgt = new UpdateDados();

if(isset($_POST['aluno_pgt'])):
    $pgt->setId_Aluno($_POST['aluno_pgt']);
endif;

if(isset($_POST['data_pgt'])):
    $pgt->setData_pgt($_POST['data_pgt']);
endif;

if(isset($_POST['ref_incial'])):
    $pgt->setRef_inicial($_POST['ref_incial']);
endif;

if(isset($_POST['ref_final'])):
    $pgt->setRef_final($_POST['ref_final']);
endif;

if(isset($_POST['valor'])):
    $pgt->setValor($_POST['valor']);
endif;

if(isset($_POST['desconto'])):
    $pgt->setDesconto($_POST['desconto']);
endif;

if(isset($_POST['id_pgt'])):
    $pgt->setId_pgt($_POST['id_pgt']);
endif;

if(isset($_POST['aluno_cod'])):
    $AlunoCod = $_POST['aluno_cod'];
endif;
    if($pgt->getId_pgt()>=1):
        $AtualizarPgt->AtualizarPagamentos($pgt);
        header("Location: Pagamento_aluno.php?aluno={$AlunoCod}");
        
    elseif($pgt->getId_pgt()<1):
        $Cadastrar->CadastrarPagamentos($pgt);
        var_dump($Cadastrar);
        header("Location: alunos.php?aluno={$pgt->getId_Aluno()}");
    endif;

