<!doctype html>
<?php
require_once './controle.php';
require('./app/config.inc.php');

$turma= new turma();
$turmaDao= new turma();


if(isset($_GET['aluno'])):
    isset($_GET['aluno']);
    $turma->setId_Aluno($_GET['aluno']);
endif;

if(isset($_POST['pesquisar'])):
    isset($_POST['pesquisar']);
    $turma->setNome($_POST['pesquisar']);
endif;
?>

<html>
    <head>
        <title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/stylo_large.css">
    </head>
	
    <body>	
        <?php
            require"barra.php";
        ?>
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
                                <li><a href="cadastrarAluno.php">Aluno</a></li>
                                <li><a href="CadastrarEvento.php">Evento</a></li>
                            </ul>
                        </li>
                        <li><a href="logout.php">Sair</a></li>
                </ul>
            </nav>
        </div>
                
		<div class="conteudo-duplo">
            <div class="camada-1">
                <h2> Dados Pessoais</h2>

                <div class="camada-2">
                <?php 
                    if(isset($_GET['aluno'])):
                ?>
                        <div class="nome-dados">
                            <div><h3 style="background-color:#A9A9A9;">Nome</h3></div>
        				<div><h3 style="background-color:#A9A9A9;">Nascimento</h3></div>
        				<div><h3 style="background-color:#A9A9A9;">idade</h3></div>
        				<div><h3 style="background-color:#A9A9A9;">Telefone</h3></div>
        				<div><h3 style="background-color:#A9A9A9;">Email</h3></div>
        				<!--<div id="status"><h5>Ativo até</h5></div>-->
                        </div>
                            
                        <div class="conteudo-dados">
                            <?php
                                $turmaDao->dadosAlunoTurma($turma, 2);
                            ?>
                        </div>

                            <?php
                    endif;
                            ?>
                        <div style="clear: both;"> </div>   

                        <?php 

                            if($turma->getId_Aluno()):
                        ?>

                        <div id="Status-pgt">
                            <?php
                                $pgt = new pagamentos();
                                $pgt->setId_Aluno($turma->getId_Aluno());

                                $pgtDao= new pagamentos();
                                $pgtDao->listaPgtAluno($pgt, 5);
                            ?>
                        </div>

                        <?php
                            endif;
                        ?>
			</div>
			<?php
                if($turmaDao->getId_Aluno()):
                    echo"<p style=' margin-top: 0px; margin-bottom: 0px; text-align: center;'>"
                        . "<a href='Pagamento_Aluno.php?aluno={$turmaDao->getId_Aluno()}'>Pagamentos</a> | "
                        . "<a href='cadastrarAluno.php?aluno={$turmaDao->getId_Aluno()}&turma={$turmaDao->getId_turma_aluno()}'> Editar</a>"
                        . "</p>";
                endif;
            ?>

            </div>

		</div>
		
        <div class="conteudo-duplo">

            <div class="camada-1">

			<h2> Alunos Inativos</h2>
						
			<form action="#" method="POST">
                            <input type="text" name="pesquisar"/>
                            <button type="submit"> Pesquisar </button>
			</form>
						
    			<div class="camada-2" style="margin-top:0px;">

                    <div id="lista-aluno">
                        <?php
                            $turmaDao->ListaInativa($turma);
                        ?>
    				
                    </div>

    			</div>

            </div>

		</div>
				
		<div id=""></div>

        </section>

	</main>
        <div style="clear:both"></div>	
        <footer>
        </footer>
    </body>
</html>