<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include("../Parts/Home/linksCss.html"); ?>
        <title>Sair</title>
    </head>
    <body>
        <Header>
            <?php
                include("../Parts/Home/main.php");
                if(isset($_SESSION['id'])){
            ?>
        </Header> 
        <main>
            <?php  
            
            include("../Parts/Perfis/Sair_perfil.php");
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
