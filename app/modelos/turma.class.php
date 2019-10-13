<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of turma
 *
 * @author Birra
 */
class turma extends aluno{
    private $Id_turma;
    private $id_turma_aluno;
    private $Situacao;
    private $Turma_nome;
    private $Mensalidade;
    private $pagina;
    
    function getId_turma() {
        return $this->Id_turma;
    }

    function getTurma_nome() {
        return $this->Turma_nome;
    }
    
    function getId_turma_aluno() {
        return $this->id_turma_aluno;
    }

    
    function getMensalidade() {
        return $this->Mensalidade;
    }
    
    function getPagina() {
        return $this->pagina;
    }

        
    function setId_turma_aluno($id_turma_aluno) {
        $this->id_turma_aluno = $id_turma_aluno;
    }

    function setSituacao($Situacao) {
        $this->Situacao = $Situacao;
    }

        
    function setId_turma($Id_turma) {
        $this->Id_turma = $Id_turma;
    }

    function setTurma_nome($Turma_nome) {
        $this->Turma_nome = $Turma_nome;
    }

    function setMensalidade($Mensalidade) {
        $this->Mensalidade = $Mensalidade;
    }
    
    
    public function ListaInativa(turma $inativo) {
        
        $this->pagina = "AlunosInativos.php";
        $Termos2 = "inner join aluno a on alt.aluno= a.id_aluno
                    inner join turma t on alt.turma = t.id_turma
                    inner join status_turma st on alt.situacao_aluno=st.id_st
                    where situacao='Inativo' and nome like '{$inativo->getNome()}%' "
                    . "ORDER BY nome ";
                         
        $coluna2=[ 'id_al_tur'=>'id_al_tur',
                        'id_turma'=>'id_turma',
                        'id_aluno'=>'id_aluno',
                        'nome'=>'nome',
                        'turma_nome'=>'turma_nome',
                        'nascimento'=>'nascimento',
                        'telefone'=>'telefone',
                        'email'=>'email',
                        'valor'=>'valor',
                        'situacao'=>'situacao'];
         $ColumTable2=[];

        $this->ExRead('aluno_turma alt', $coluna2, $Termos2, $ColumTable2, 1);
    }
    public function listaAlunoTurma(turma $id){
         $this->pagina = "alunos.php";
        $this->dadosAlunoTurma($id,1);
    }
    
     public function dadosAlunoTurma(turma $Aluno, $Tipo) {
        $this->Tipo=$Tipo;
        
        if($this->Tipo==1):
            $Termos2 = " inner join aluno a on alt.aluno= a.id_aluno
                         inner join turma t on alt.turma = t.id_turma
                         inner join status_turma st on alt.situacao_aluno=st.id_st
                         where situacao='Ativo' and nome like '{$Aluno->getNome()}%' "
                        . "ORDER BY nome ";
            
             $coluna2=[ 'id_al_tur'=>'id_al_tur',
                        'id_turma'=>'id_turma',
                        'id_aluno'=>'id_aluno',
                        'nome'=>'nome',
                        'turma_nome'=>'turma_nome',
                        'nascimento'=>'nascimento',
                        'telefone'=>'telefone',
                        'email'=>'email',
                        'valor'=>'valor',
                        'situacao'=>'situacao'];
             
        elseif($this->Tipo == 2 || $this->Tipo == 3):
            $Termos2 = " inner join aluno a on alt.aluno= a.id_aluno
                         inner join turma t on alt.turma = t.id_turma
                         inner join status_turma st on alt.situacao_aluno=st.id_st
                         where id_aluno ={$Aluno->getId_Aluno()}";
                
                $coluna2=[  'id_al_tur'=>'id_al_tur',
                            'id_turma'=>'id_turma',
                            'id_aluno'=>'id_aluno',
                            'nome'=>'nome',
                            'turma_nome'=>'turma_nome',
                            'nascimento'=>'nascimento',
                            'telefone'=>'telefone',
                            'email'=>'email',
                            'valor'=>'valor',
                            'situacao'=>'situacao'];
        endif;
        
       
       
       $ColumTable2=[];

        $this->ExRead('aluno_turma alt', $coluna2, $Termos2, $ColumTable2, $this->Tipo);
    }

    public function Syntax() {
        
        if($this->Tipo==1):
            $alunopgt = new aluno();
            $pagt = new pagamentos();
            echo"<table>"
              . "<tr>";
               while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                   $this->setId_Aluno($col['id_aluno']);
                   $alunopgt->setId_Aluno($col['id_aluno']);
                   $this->setNome($col['nome']);
                   $pagt->statusPgt($alunopgt);
                   $cor="";
                   if($pagt->getSituacao_pgt()):
                       if($pagt->getAluno_pgt() == $this->getId_Aluno()):
                        if($pagt->getRef_final() < date('Y-m-d')):
                            $cor="red";
                        elseif($pagt->getRef_final() >= date('Y-m-d')):
                            $cor="green";
                        endif;
                        else:
                          $cor="orange";  
                       endif;
                    else:
                        $cor="orange";
                   endif;
                   echo"<td style='background-color:{$cor}; border-radius:20px 0 0 20px;'></td><td><a href='{$this->getPagina()}?aluno={$this->getId_Aluno()}'>{$this->getNome()}</a></td>"
              . "</tr>";
               endwhile;
            echo"</table>";
        
            elseif($this->Tipo==2):
                while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                    $this->id_turma_aluno = $col['id_al_tur'];
                    $this->Id_turma = $col ['id_turma'];
                    $this->Turma_nome = $col['turma_nome'];
                    $this->setId_Aluno($col['id_aluno']);
                    $this->setNome($col['nome']);
                    $this->setNascimento($col['nascimento']);
                    $this->setIdade($col['nascimento']);
                    $this->setTelefone($col['telefone']);
                    $this->setEmail($col['email']);
                    $this->Mensalidade = $col['valor'];
                    $this->Situacao = $col['situacao'];
                endwhile;
                
                echo "<div>"
                      . "<p>{$this->getNome()}</p>"
                    . "</div>"
                              
                    . "<div>"
                      . "<p>".date('d/m/Y',  strtotime($this->getNascimento()))."</p>"
                    . "</div>"
                              
                    . "<div>"
                      . "<p>{$this->getIdade()} anos</p>"
                    . "</div>"
                              
                    . "<div>"
                      . "<p>{$this->getTelefone()}</p>"
                    . "</div>"
                              
                    . "<div>"
                      . "<p> {$this->getEmail()}</p>"; 
                  echo"</div>";
            elseif($this->Tipo==3):
                while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                    $this->id_turma_aluno = $col['id_al_tur'];
                    $this->Id_turma = $col ['id_turma'];
                    $this->Turma_nome = $col['turma_nome'];
                    $this->setId_Aluno($col['id_aluno']);
                    $this->setNome($col['nome']);
                    $this->setNascimento($col['nascimento']);
                    $this->setIdade($col['nascimento']);
                    $this->setTelefone($col['telefone']);
                    $this->setEmail($col['email']);
                    $this->Mensalidade = $col['valor'];
                    $this->Situacao = $col['situacao'];
                endwhile;
            endif;
     
    
    }
}
