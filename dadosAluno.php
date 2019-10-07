<?php
require ('./app/config.inc.php');

$Aluno = new aluno();
$Cadastrar = new cadastro();

if(isset($_POST['nome'])):
    $Aluno->setNome($_POST['nome']);
endif;

if(isset($_POST['nascimento'])):
    $Aluno->setNascimento($_POST['nascimento']);
endif;

if(isset($_POST['telefone'])):
    $Aluno->setTelefone($_POST['telefone']);
endif;

if(isset($_POST['email'])):
    $Aluno->setEmail($_POST['email']);
endif;

if(isset($_POST['id_aluno'])):
    $Aluno->setId_Aluno($_POST['id_aluno']);
endif;
    if($Aluno->getId_Aluno()>=1):
        /*$AtualizarPac->AtualizarPaciente($paciente);
        header("Location: PacienteDados.php?idpac={$paciente->getId_Pessoa()}");*/
        
    elseif($Aluno->getId_Aluno()<1):
        if(!empty($Aluno->getNome())||!$Aluno->getNome()==null):
            $Cadastrar->CadastrarAluno($Aluno);
            $Dados=['aluno'=>$Cadastrar->getUltimoRegistro(),
                     'turma'=>1,
                     'situacao_aluno'=>1
                    ];
           $cadastrarTurma = new InsercaoBanco();
           $cadastrarTurma->ExecutInserir("aluno_turma", $Dados);
           var_dump($cadastrarTurma);
           header("Location: alunos.php?aluno={$Cadastrar->getUltimoRegistro()}");
        endif;
    endif;

