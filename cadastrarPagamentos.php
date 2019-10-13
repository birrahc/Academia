<?php
    require_once './controle.php';
    require('./app/config.inc.php');
    $aluno = new aluno();
    $alunoDao = new aluno();
    $pgt = new pagamentos();
    $pgtDao = new pagamentos();
    
    $TituloPagina = "Cadastrar Pagamento";
    $Botao = "Cadastrar";
    if(isset($_GET['id_pgt'])):
        $pgt->setId_pgt($_GET['id_pgt']);
        $pgtDao->PgtEspecifico($pgt);
        $TituloPagina = "Editar Pagamento";
        $Botao = "Editar";
    elseif(isset($_GET['aluno'])):
        $aluno->setId_Aluno($_GET['aluno']);
        $alunoDao->dadosAluno($aluno, 3);
    endif;
    
    if(!isset($_GET['id_pgt']) || $pgtDao->getData_pgt()=='0000-00-00'):
        $pgtDao->setData_pgt(date('Y-m-d'));
        $pgtDao->setRef_inicial(date('Y-m-d'));
    endif;
    
?>
<!doctype html>
<html>
    <head>
	<title></title>
        <meta charset="utf-8">
        <script type="text/javascript" src="Script/validaCamposPgt.js"></script>
	<link rel="stylesheet" href="css/stylo_large.css">
    </head>
	
    <body>
	
	<main>
            <section>
		<div id="menu-lateral">
            <nav>
                 <ul>
                    <li><a href="alunos.php">Alunos</a>
                        <ul>
                            <li><a href="alunos.php">Ativos</a></li>
                            <li><a href="AlunosInativos.php">Inativos</a></li>
                        </ul>
                    </li>
                        <li><a href="">Pagamentos</a>
                            <ul>
                                <li><a href="RelatoriPagamentos.php">Relatório</a></li>
                                <li><a href="">Pgt Aluno</a></li>
                                <li><a href="">pgt Evento</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Eventos</a></li>
                        <li><a href="#">Cadastrar..</a>
                            <ul>
                                <li><a href="CadastrarAluno.php">Aluno</a></li>
                                <li><a href="CadastrarEvento.php">Evento</a></li>
                            </ul>
                        </li>
                        <li><a href="logout.php">Sair</a></li>
                </ul>
            </nav>
        </div>
		<div class="conteudo">
                    
                    <div class="camada-1">
                        
                        <h2> <?php echo $TituloPagina ?></h2>

                        <div class="camada-2">
                            <form name="cadastrarPgt" method="POST" action="dadosPagamentos.php" onsubmit="return validaPgt();">
                                <div id="cad-pagametos">
                                    <div id="input-cad-paciente">
                                        <p>
                                            <b>Aluno:</b>
                                            <?php
                                             if(isset($_GET['aluno'])):
                                                echo $alunoDao->getNome();
                                                
                                             elseif(isset($_GET['id_pgt'])):
                                                 echo $pgtDao->getNome();
                                            endif;
                                            ?>
                                        </p>
                                        <input type="hidden" name="aluno_cod" value="<?php echo $pgtDao->getId_Aluno()?>">
                                        <input type="hidden" name="aluno_pgt" value="<?php echo $alunoDao->getId_Aluno()?>">
                                        <input type="hidden" name="id_pgt" value="<?php echo $pgtDao->getId_pgt()?>">
                                        <input type="hidden" name="data_pgt" value="<?php echo $pgtDao->getData_pgt()?>">
                                    </div>
                                    
                                    <h4>Pagamento referente aos meses:</h4>

                                    <div class="cad-data-pgt">
                                        <h5>De: </h5> <p><input type="date" name="ref_incial" value="<?php echo $pgtDao->getRef_inicial()?>"></p>
                                    </div>
                                    
                                    <div class="cad-data-pgt">
                                        <h5>Até: </h5> <p><input type="date" name="ref_final" value="<?php echo $pgtDao->getRef_final()?>"></p>
                                    </div>
                                    
                                    <div style="clear: both; border-style: none; border-radius: none;"></div>

                                    <div class="valores-pgt">
                                        <h5>Valor:</h5> <p><input type="text" name="valor" value="<?php echo number_format($pgtDao->getValor(), 2, ',', '.') ?>"></p>
                                    </div>
                                    <div class="valores-pgt">
                                        <h5>Desconto:</h5> <p> <input type="text" name="desconto" value="<?php echo number_format($pgtDao->getDesconto(), 2, ',', '.') ?>"></p>
                                    </div>
                                   
                                </div>
                                
                                <?php
                                if($Botao=="Editar"):
                                ?>
                                    <div id="botao-cadastro"><button Onclick="return ConfirmEdit();" type="submit"><?php echo $Botao?></button></div>
                                    <script>
                                        function ConfirmEdit(){
                                                var x = confirm("Deseja realmente Editar esse Pagamento ?");
                                                    if (x){
                                                        return true;
                                                    }else{
                                                        return false;
                                                    }
                                            }
                                    </script>
                                <?php
                                else:
                                     echo"<div id='botao-cadastro'><button type='submit'>$Botao</button></div>";
                                endif;
                                ?>
							
                            </form>
							
                            <div id="botao-cancelar"><a href="alunos.php"><button>Cancelar</button></a></div>
                            <?php
                              if($Botao=="Editar"):
                                    $ativacao="";
                                else:
                                    $ativacao="disabled";
                                endif;
                            ?> 
                            <form action="DeletaDados.php" method="POST">
                                <input type="hidden" name="tipo" value="1">
                                <input type="hidden" name="aluno" value="<?php echo $pgtDao->getId_Aluno()?>">
                                <input type="hidden" name="pgt" value="<?php echo $pgtDao->getId_pgt()?>">
                                <div id="botao-excluir"><button Onclick="return ConfirmDelete();" type="submit"<?php echo $ativacao ?>>excluir</button></div>
                            </form>
                            
                            <script>
                            function ConfirmDelete(){
                                    var x = confirm("Deseja realmente deletar esse Pagamento ?");
                                        if (x){
                                            return true;
                                        }else{
                                            return false;
                                        }
                                }
                            </script>
							
			</div>

                    </div>
                </div>
				
            </section>
        </main>
		
	<footer>
		
	</footer>
		
	<header>
            <div id="banner"></div>
	</header>
    </body>
</html>