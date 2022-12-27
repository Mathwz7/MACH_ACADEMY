<?php
    session_start();
    if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include("../Parts/Perfis/Perfil_funcionario/LinksCssFuncionario.html"); ?>
        <title>Perfil</title>
    </head>
    <body>
        <Header>
            <?php
                include("../Parts/Home/main.php");
            ?>
        </Header> 
        <main>
            <?php  
            
            include("../Parts/Perfis/Perfil_funcionario/Upload_perfil_funcionario.php");
            ?>
        </main>
        <footer>
            
        </footer>
    </body>
</html>
<?php
    }else{
        header('location:../Parts/All/destruir.php');
    }
?>
