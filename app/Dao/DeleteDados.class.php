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
    
}

