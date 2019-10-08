<?php
require_once './controle.php';
require ('./app/config.inc.php');

$Aluno = new aluno();
$Cadastrar = new cadastro();
$Atualizar = new UpdateDados();

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

if(isset($_POST['situacao'])):
    $Situacao = $_POST['situacao'];
else:
    $Situacao = 1;
endif;
if(isset($_POST['turma'])):
    $turma = $_POST['turma'];
endif;
    if($Aluno->getId_Aluno()>=1):
        $Atualizar->AtualizarAluno($Aluno);
        $Dados=[
                'situacao_aluno'=>$Situacao
                ];
        $atualizar = new Update();
        $atualizar->ExUpdate("`aluno_turma`", $Dados, "WHERE id_al_tur =:id", 'id=' . $turma);
        header("Location: alunos.php?aluno={$Aluno->getId_Aluno()}");
        
    elseif($Aluno->getId_Aluno()<1):
        if(!empty($Aluno->getNome())||!$Aluno->getNome()==null):
            $Cadastrar->CadastrarAluno($Aluno);
        
            $Dados=['aluno'=>$Cadastrar->getUltimoRegistro(),
                     'turma'=>1,
                     'situacao_aluno'=>1
                    ];
           $cadastrarTurma = new InsercaoBanco();
           $cadastrarTurma->ExecutInserir("aluno_turma", $Dados);
          
           $DadosPagamentos=['aluno_pgt'=>$Cadastrar->getUltimoRegistro(),
                            'data_pgt'=>'0000-00-00',
                            'valor'=>'0'
                          ];
        
            $CadastrarPagamentos= new InsercaoBanco();
            $CadastrarPagamentos->ExecutInserir(" pagamentos ", $DadosPagamentos);

           header("Location: alunos.php?aluno={$Cadastrar->getUltimoRegistro()}");
        endif;
    endif;

