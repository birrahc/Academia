<?php
    require('./app/config.inc.php');
    $pgt = new pagamentos();
    $pgtDao = new pagamentos();
    if(isset($_GET['aluno'])):
        $pgt->setId_Aluno($_GET['aluno']);
        $pgtDao->listaPgtAluno($pgt, 0);
    else:
        header("Location: alunos.php");
    endif;
   
?>
<!doctype html>
<html>
    <head>
	<title></title>
        <meta charset="utf-8">
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
                                    <li><a href="">Inativos</a></li>
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
                            <li><a href="#">Sair</a></li>
                        </ul>
                    </nav>
                </div>
                
                <div class="conteudo-maior">
                    
                    <div class="camada-1-cont-m">
                        
                        <h2 style="background-color: #A9A9A9;"> Pagamentos</h2>
                        <div id="pgt-paciente">
                            <p>
                                <b>
                                <?php
                                    echo $pgtDao->getNome();
                                ?>
                                </b>
                            </p>
                        </div>
                        
                    <div class="cont-pgt-aluno">
                        <?php
                            $pgtDao->listaPgtAluno($pgt,2);
                        ?>
                    </div>
                        <p id="link-cad"><a href="cadastrarPagamentos.php?aluno=<?php echo $pgtDao->getId_Aluno()?>">Cadastrar pagamento</a></p>     
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