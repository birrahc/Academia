<!doctype html>
<?php
    require_once './controle.php';
    require('./app/config.inc.php');
        $pgt = new pagamentos();
        if(isset($_POST['data_inicial']) && isset($_POST['data_final'])):
            $pgt->setData_pgt_inicial($_POST['data_inicial']);
            $pgt->setData_pgt_final($_POST['data_final']);
        endif;
        
       
        $pgtDao= new pagamentos();
       
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
                            <li><a href="">Ativos</a></li>
                            <li><a href="AlunosInativos.php">Inativos</a></li>
                        </ul>
                    </li>
                        <li><a href="RelatoriPagamentos.php">Pagamentos</a>
                            <ul>
                                <li><a href="">Relatório</a></li>
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
		<div class="conteudo-maior">
                    
                    <div class="camada-1-cont-m">
                        
                        <h2> Relatorios</h2>
                        
                        <div class="camada-2-cont-m">
                            <form action="#" method="POST">
                            <div class="conuteudo_relatorio altura-ajustada input-data select">
                                <h3>Data Inicial
                                    <select name="data_inicial" style="width:150px; height: 22px; font-size: 18px; border: none;">
                                    <?php
                                    if($pgt->getData_pgt()):
                                        echo"<option value = '{$pgt->getData_pgt_inicial()}'>".date("d/m/Y", strtotime($pgt->getData_pgt_inicial()))."</option>";
                                     //$pgt->DataRelatorio();
                                    //else:
                                       
                                    endif;
                                    $pgt->DataRelatorio(); 
                                    ?>
                                </select>
                                </h3>
                            </div>
                            <div class="conuteudo_relatorio altura-ajustada">
                                <h3>Data Final
                                    <select name="data_final" style="width:150px; height: 22px; font-size: 18px; border: none;">
                                    <?php
                                    if($pgt->getData_pgt_final()):
                                        echo"<option value = '{$pgt->getData_pgt_final()}'>".date("d/m/Y", strtotime($pgt->getData_pgt_final()))."</option>";
                                    else:
                                        $pgt->DataRelatorio();
                                    endif;
                                     $pgt->DataRelatorio();
                                    ?>
                                </select>
                                </h3>
                            </div>
                                <div class="conuteudo_relatorio altura-ajustada">
                                    <h3><button type="submit"> Gerar Relatório</button></h3>
                                </div>
                            </form>
			</div>

                        <div class="camada-2-cont-m">
                            <div class="conuteudo_relatorio"><h2>Alunos</h2></div>
                            <div class="conuteudo_relatorio"><h2>Valores</h2></div>
                            <div class="conuteudo_relatorio"><h2>Desconto</div>
			</div>
                        
                        <div class="camada-3-cont-m">
                        <?php
                        if($pgt->getData_pgt_inicial()<= $pgt->getData_pgt_final()):
                           $pgtDao->Relatorio($pgt);
                        else:
                            echo"<script> alert('A Data inicial não pode ser maior que a data Final')</script>";
                        endif;
                        ?>
			</div>
                        
                        <div class="camada-2-cont-m">
                            <div class="conuteudo_relatorio"><h3>Total Liquido</h3></div>
                            <div class="conuteudo_relatorio"><h3>Total valor</h3></div>
                            <div class="conuteudo_relatorio"><h3>Total Desconto</h3></div>
                           	
			</div>
                        
                        <div class="camada-2-cont-m altura-ajustada">
                            <div class="conuteudo_relatorio altura-ajustada">
                            <?php
                            echo "<p> R$ ". number_format($pgtDao->getValor_total(), 2,',','.')."</p>";
                            ?>
                            </div>
                            <div class="conuteudo_relatorio altura-ajustada">
                            <?php
                                echo "<p>R$ ". number_format($pgtDao->getSomaValores(), 2,',','.')."</p>";
                            ?>
                            </div>
                            <div class="conuteudo_relatorio altura-ajustada">
                            <?php
                                echo "<p> R$ ". number_format($pgtDao->getTotalDesconto(), 2,',','.')."</p>";
                            ?>
                            </div>
                           	
			</div>
                       
                    </div>
                </div>
				
            </section>
        </main>
		
	<footer>
		
	</footer>
	
    </body>
</html>