<?php

require('./app/config.inc.php');

$Login = new login;
$LoginDao = new cadastro();
$destino='';
$cad='';
if(isset($_POST['autorizacao'])):
    
    if($_POST['autorizacao'] =='@tl@s'):
       //echo "auto Ok"; 
        if(isset($_POST['login'])):
          if(!empty($_POST['login'])):
               $Login->setNome($_POST['login']);

                if(isset($_POST['senha'])):
                    if(!empty($_POST['senha'])):
                        $Login->setSenha($_POST['senha']);

                        if(isset($_POST['repsenha'])):
                            $Login->setRepeteSenha($_POST['repsenha']);
                            if($Login->getSenha() == $Login->getRepeteSenha()):
                                $LoginDao->CadastrarLogin($Login);
                                if($LoginDao->getVerificacao()):
                                    echo"Cadastrado com Sucesso!";
                                    $destino = 'index.php';
                                    $cad="ok";
                                    echo "Vericação {$LoginDao->getVerificacao()}";
                                else:
                                    $destino = 'CadastrarLogin.php';
                                    $cad="usuex";
                                endif;
                            else:
                                $mensagem="O campo senha esta diferente do campo Repete Senha!";
                                $destino = 'CadastrarLogin.php';
                                $cad="dif";
                            endif;
                        elseif(!empty($_POST['repsenha']) || $_POST['repsenha']=='' ):
                            $mensagem="O campo Repete Senha está nulo ou vazio!";
                            $destino = 'CadastrarLogin.php';
                            $cad="reppassnull";
                        endif;

                    else:
                         $mensagem="O campo senha esta Vazio ou nulo!'";
                         $destino = 'CadastrarLogin.php';
                         $cad="passnull";
                   endif;
                endif;
            else:
                $cad="lognull";
                $destino = 'CadastrarLogin.php';
                $mensagem="O campo Usuario esta Vazio ou nulo!";
         endif;
         
         else:
            $destino = 'CadastrarLogin.php';
            $cad="lognull";
        endif;
        
        else:
            $destino = 'CadastrarLogin.php';
            $mensagem="Autorização nula ou não valida";
            $cad="auto";
    endif;

endif;
header("Location: {$destino}?cad={$cad}");