<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include("../Parts/Pagamento/linksCss.html"); ?>
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
                echo('<script>window.alert("VAMOS FAZER LOGIN?");window.location="Login.php";</script>');
            }else{
                include("../Parts/Pagamento/Pagamento.php");
            }
            
            ?>
        </main>
        <footer>
            
        </footer>
    </body>
</html>

