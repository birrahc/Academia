<?php
    require('./app/config.inc.php');
    $aluno = new aluno();
    $alunoDao = new aluno();
    $Pagina="Cadastro de Aluno";
    if(isset($_GET['aluno'])):
        $aluno->setId_Aluno($_GET['aluno']);
        $alunoDao->dadosAluno($aluno, 3);
        
        $Pagina="Editar Aluno";
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
                        
                <h2> <?php echo $Pagina ?></h2>

                <div class="camada-2">

                    <form method="POST" action="dadosAluno.php">

				    <div class="indice-form">
                        <div class="div-h"><h3 style="background-color:#808080;">Nome</h3></div>
                        <div class="div-h"><h3 style="background-color:#808080; ">Nascimento</h3></div>
                        <div class="div-h"><h3 style="background-color:#808080;">Telefone</h3></div>
                        <div class="div-h"><h3 style="background-color:#808080;">E-Mail</h3></div>
				    </div>	
    							
    				<div class="form-cadastro">
                        <input type="hidden" name="id_aluno" value="<?php echo $alunoDao->getId_Aluno()?>">
                        <div> <input type="text" name="nome" value="<?php echo $alunoDao->getNome()?>"></div>
                        <div> <input type="date" name="nascimento" value="<?php echo $alunoDao->getNascimento()?>"></div>
                        <div> <input type="text" name="telefone" value="<?php echo $alunoDao->getTelefone()?>"></div>
                        <div> <input type="text" name="email" value="<?php echo $alunoDao->getEmail()?>"></div>
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