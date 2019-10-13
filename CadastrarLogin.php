<!DOCTYPE html>
<?php
    if(isset($_GET['cad'])):
        if($_GET['cad'] == 'ok'):
            echo"<script> alert('Login Cadastrado com Sucesso !')</script>";
        elseif($_GET['cad'] == 'dif'):
            echo"<script> alert('O campo senha esta diferente do campo Repete Senha!')</script>";
        elseif($_GET['cad'] == 'usuex'):
            echo"<script> alert('Login ja existente!')</script>";
        endif;
    endif;
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="Script/validaCamposCadLogin.js"></script>
        <link rel="stylesheet" href="css/stylo_large.css">
        <title></title>
    </head>
    <body>
        <div id="geral">
            <h1>Cadastro De Usuário</h1>
            <div class="central">
                <div class="central-input">
                    <form name="formcadlogin" action="dadosLogin.php" method="POST" onsubmit="return validacadlogin();">
                    <input type="text" name="login" placeholder="Usuário">
                    <input type="password" name="senha" placeholder="Senha">
                    <input type="password" name="repsenha" placeholder="Repita a Senha">
                    <input type="password" name="autorizacao" placeholder="Autorização">
                    <button type="submit">Cadastrar</button>
                    </form>
                </div>
            </div>
            <div id="rodape"> 
                 <p>2019 &copy;copyright - Academia Software - Todos os Direitos Reservados</p>
            </div>
        </div>
        <?php
        
        ?>
    </body>
</html>
