<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
 <?php
    if(isset($_GET['cad'])):
        if($_GET['cad'] == 'ok'):
            echo"<script> alert('Login Cadastrado com Sucesso !')</script>";
        endif;
    endif;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/stylo_large.css">
        <title></title>
    </head>
    <body style="margin: 0;">
	<main style="width: 100%;">
        <section>
		<div class="base-central">
                    <h1>Acesso ao Sistema</h1>
					
			<div id="base-login">
                            <form name="formlogin" action="login.php" method="POST" onsubmit="return validaLogin();">
                                <div class="form-login"><h3>Login</h3><input type="text" name="login"/></div>
				<div class="form-login"><h3>Senha</h3><input type="password" name="senha"/></div>
				<div id="botao-logar"><button type="submit">Logar</button></div>
                            </form> 
                            <p> <a href="CadastrarLogin.php"> Cadastrar Login</a> </p>
			</div>
			<div id="img-login">
					<img src="imagens/atlaslogo.jpg">
			</div>
						
		</div>
				
            </section>
	</main>
    </body>
</html>
