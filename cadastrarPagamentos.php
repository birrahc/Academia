<?php
    require('./app/config.inc.php');
    $aluno = new aluno();
    $alunoDao = new aluno();
    $pgt = new pagamentos();
    $pgtDao = new pagamentos();
    if(isset($_GET['aluno'])):
        $aluno->setId_Aluno($_GET['aluno']);
        $alunoDao->dadosAluno($aluno, 3);
    endif;
    if(isset($_GET['pgt'])):
       else:
        $pgtDao->setData_pgt(date('Y-m-d'));
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
		<div class="conteudo">
                    
                    <div class="camada-1">
                        
                        <h2> Cadastro de Pagamentos</h2>

                        <div class="camada-2">
                            <form method="POST" action="dadosPagamentos.php">
                                <div id="cad-pagametos">
                                    <div id="input-cad-paciente">
                                        <p>
                                            <b>Aluno:</b>
                                            <?php
                                             if(isset($_GET['aluno'])):
                                                echo $alunoDao->getNome();
                                            endif;
                                            ?>
                                        </p>
                                        <input type="hidden" name="aluno_pgt" value="<?php echo $alunoDao->getId_Aluno()?>">
                                        <input type="hidden" name="id_pgt" value="<?php echo $pgtDao->getId_pgt()?>">
                                        <input type="hidden" name="data_pgt" value="<?php echo $pgtDao->getData_pgt()?>">
                                    </div>
                                    
                                    <h4>Pagamento referente aos meses:</h4>

                                    <div class="cad-data-pgt">
                                         <h5>De: </h5> <p><input type="date" name="ref_incial" value="<?php echo $pgtDao->getData_pgt()?>"></p>
                                    </div>
                                    
                                    <div class="cad-data-pgt">
                                         <h5>Até: </h5> <p><input type="date" name="ref_final"></p>
                                    </div>
                                    
                                    <div style="clear: both; border-style: none; border-radius: none;"></div>

                                    <div class="valores-pgt">
                                        <h5>Valor:</h5> <p><input type="text" name="valor" value="<?php echo number_format($pgtDao->getValor(), 2, ',', '.') ?>"></p>
                                    </div>
                                    <div class="valores-pgt">
                                         <h5>Desconto:</h5> <p> <input type="text" name="desconto"></p>
                                    </div>
                                   
                                </div>		
                                <div id="botao-cadastro"><button type="submit">Cadastrar</button></div>
							
                            </form>
							
                            <div id="botao-cancelar"><button>Cancelar</button></div>
							
                            <form>
				<div id="botao-excluir"><button>excluir</button></div>
                            </form>		
							
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