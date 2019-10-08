<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DeleteDados
 *
 * @author Birra
 */
class DeleteDados {
  
    
    //=================================================================================================
    //----------------- DELETAR LOGIN ---------------------------
    //=================================================================================================
    public function DeletaLogin($IdLogin){
        
        $DeletaLogin = new Delete();
        $DeletaLogin->ExeDelete('login', "WHERE id_login = :id", 'id='.$IdLogin);
        
        if($DeletaLogin->getResult()):
            echo"{$DeletaLogin->getRunCount()} registro(s) deletados com sucesso: <hr>";
        endif;
    }
    
    //=================================================================================================
    //----------------- DELETAR PACIENTE ---------------------
    //=================================================================================================
    public function DeletarAluno(aluno $aluno){
        $DeletarPagamentos = new Delete();
        $DeletarAlunoTurma =new Delete();
        $DeletarEventoAluno = new Delete();
        $DeletaPaciente = new Delete();
        
        
        $DeletarPagamentos->ExeDelete('pagamentos', "WHERE aluno_pgt = :id", 'id='.$aluno->getId_Aluno());
        $DeletarAlunoTurma->ExeDelete('aluno_turma', "WHERE aluno = :id", 'id='.$aluno->getId_Aluno());
        $DeletarEventoAluno->ExeDelete('evento_aluno', "WHERE evento_aluno = :id", 'id='.$aluno->getId_Aluno());
        $DeletaPaciente->ExeDelete('aluno', "WHERE id_aluno = :id", 'id='.$aluno->getId_Aluno());
        
        
        if($DeletaPaciente->getResult()):
            echo"{$DeletaPaciente->getRunCount()} registro(s) deletados com sucesso: <hr>";
        endif;
    }
    
    //=================================================================================================
    //------------------ DELETA PAGAMENTO -----------------------
    //=================================================================================================
    public function DeletaPagameto(pagamentos $pgt){
        
        $DeletarPgt = new Delete();
        $DeletarPgt->ExeDelete('pagamentos', "WHERE id_pgt = :id", 'id='.$pgt->getId_pgt());
        
        if($DeletarPgt->getResult()):
            echo"{$DeletarPgt->getRunCount()} registro(s) deletados com sucesso: <hr>";
        endif;
        
    }
    
    //=================================================================================================
    //----------------- DELETA CONSUMOS -------------------
    //=================================================================================================
    public function DeletaConsumos(ConsumosMold $consumos){
        
        $DeletaConsumos = new Delete();
        $DeletaConsumos->ExeDelete('consumos', "WHERE id_consumo = :id", 'id='.$consumos->getId_Consumos());
        
        if($DeletaConsumos->getResult()):
            echo"{$DeletaConsumos->getRunCount()} registro(s) deletados com sucesso: <hr>";
        endif;
    }
    
    //==================================================================================================
    //---------------------- DELETA AVALIAÇÃO ----------------------
    //==================================================================================================
     public function DeletaAvaliacao(AvaliacaoMold $aval){
         
        $DeletaPagamento=new Delete();
        $DeletaPagamento->ExeDelete("pagamentos", "WHERE referencia = :id", 'id='.$aval->getId_Avaliacao());
         
        $DeletaAvaliacao = new Delete();
        $DeletaAvaliacao->ExeDelete('avaliacao_antropometrica', "WHERE id_avalicao = :id", 'id='.$aval->getId_Avaliacao());
        
       
        if($DeletaAvaliacao->getResult()):
            echo"{$DeletaAvaliacao->getRunCount()} registro(s) deletados com sucesso: <hr>";
        endif;
    }
    
    //==================================================================================================
    //---------------------- DELETA Bioimpedancia ----------------------
    //==================================================================================================
     public function DeletaBioimpedancia(BioImpedancia $bio){
        
        $DeletaBio = new Delete();
        $DeletaBio->ExeDelete('bioimp', "WHERE id_bio = :id", 'id='.$bio->getId_bio());
        
       
        if($DeletaBio->getResult()):
            echo"{$DeletaBio->getRunCount()} registro(s) deletados com sucesso: <hr>";
        endif;
    }
    
   
}

