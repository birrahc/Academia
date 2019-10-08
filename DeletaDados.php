<?php

require_once './controle.php';
require('./app/config.inc.php');

$Aluno = new aluno();
$pgt = new pagamentos();
/*$consumos = new ConsumosMold();
$Avaliacao = new AvaliacaoMold();
$Bioimpedancia = new BioImpedancia();*/
$DeletarDados = new DeleteDados();


if(isset($_POST['tipo'])):
    
    if($_POST['tipo']==1):
        
        if(isset($_POST['pgt'])):
            $pgt->setId_pgt($_POST['pgt']);
            $DeletarDados->DeletaPagameto($pgt);
            if(isset($_POST['aluno'])):
                $Aluno->setId_Aluno($_POST['aluno']);
                
                $DadosPagamentos=[
                            'aluno_pgt'=>$Aluno->getId_Aluno(),
                            'data_pgt'=>'0000-00-00',
                            'valor'=>'0'
                          ];
        
                $CadastrarPagamentos= new InsercaoBanco();
                $CadastrarPagamentos->ExecutInserir(" pagamentos ", $DadosPagamentos);
            endif;
            
            header("Location: Pagamento_Aluno.php?aluno={$Aluno->getId_Aluno()}");
        endif;
    
    
    endif;
    
    if($_POST['tipo']==2):
        
        if(isset($_POST['id_aluno']))
            $Aluno->setId_Aluno($_POST['id_aluno']);
            $DeletarDados->DeletarAluno($Aluno);
            header("Location: alunos.php");
        endif;
    
endif;
    
   

