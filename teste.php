<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require('./app/config.inc.php');
        $pgt = new pagamentos();
        $pgt->setId_Aluno(20);
     
        
        $pgtDao= new pagamentos();
        $pgtDao->listaPgtAluno($pgt,0);
        
        
        
       
        ?>
    </body>
</html>
