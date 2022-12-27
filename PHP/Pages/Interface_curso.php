<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include("../Parts/Interface/linksCss.html"); ?>
        <title>Home</title>
    </head>
    <body>
        <Header>
            <?php
                include("../Parts/Home/main.php");
            ?>
        </Header> 
        <main>
            <?php
            if(empty($_SESSION['id'])){
                include("../Parts/Interface/interface_logout.php");
            }else{
                $idcurso = $_GET['cur_codigo'];
                
                $sql = 'select * from venda where fk_Cliente_cli_codigo = "'.$_SESSION['id'].'" and fk_Curso_cur_codigo ="'.$idcurso.'";';
                $resul = mysqli_query($conexao,$sql);
                $teste = mysqli_num_rows($resul);
                if($teste != 0){
                    include("../Parts/Interface/interface_logged.php");
                }else{
                include("../Parts/Interface/interface_logout.php");
                }
            }
            ?>
        </main>
        <footer>
            <?php
                include("../Parts/Home/linksJs.html");
            
               
            
            ?>
        </footer>
    </body>
</html>