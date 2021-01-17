<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require('./app/config.inc.php');
        $aluno = new aluno();
        $aluno->setId_Aluno(16);
        $pgt = new pagamentos();
        
        $pgt->statusPgt($aluno);
        $cor="";
        if($pgt->getSituacao_pgt()):
            if($pgt->getRef_final() < date('Y-m-d')):
                echo"Maior";
             $cor="<td style='background-color:red';>Maior</td>";
             else:
                 
                  $cor="<td style='background-color:red';>Menor</td>";
            endif;
           
            
            //echo $cor;
        else:
            echo"Falso";
        endif;
       echo"<table>"
        . "<tr>"
               . "{$cor}<td>ddddd</td>"
               
        . "</tr>"
        . "</table>";
        ?>
    </body>
</html>
