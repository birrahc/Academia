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
                        <li><a href="#">Pagamentos</a>
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
                        
                <h2> Cadastro de Evento</h2>

                <div class="camada-2">

                    <form method="POST" action="#">

    				<div class="indice-form">
                        <div class="div-h"><h3 style="background-color:#808080;">Titulo</h3></div>
                        <div class="div-h"><h3 style="background-color:#808080;">Data</h3></div>
                        <div class="div-h"><h3 style="background-color:#808080;">Hora</h3></div>
                        <div class="div-h"><h3 style="background-color:#808080;">descriçao</h3></div>
    				</div>	
							
				    <div class="form-cadastro">
                        <div> <input type="text" name="nome"></div>
                        <div> <input type="date" name="nascimento"></div>
                        <div> <input type="time" name="telefone"></div>
                        <div> <textarea> Descrição</textarea></div>
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