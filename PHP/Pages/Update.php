<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include("../Parts/Home/linksCss.html"); ?>
        <title>Update</title>
	</head>
    <body>
        <Header>
            <?php
                include("../Parts/Home/main.php");
                include('../Parts/All/conexao.php');
                $_GET['cur_codigo'];
                if($_SESSION['tipo_user'] == 'funcionario'){

                

			?>
				<section>
            <?php
                
                $sql = 'update curso set cur_aprovado = 1,cur_traducao =1  where cur_codigo ='.$_GET['cur_codigo'].';';
                $exe = mysqli_query($conexao,$sql);
                if($exe){
                    echo('<script>window.alert("APROVADO COM SUCESSO");window.location="Home.php";</script>');
                }
            }
            elseif($_SESSION['tipo_user'] == 'interprete'){
                $sql='update curso set fk_Interprete_int_codigo ='.$_SESSION['id'].' where cur_codigo ='.$_GET['cur_codigo'].';';
                $exe = mysqli_query($conexao,$sql);
                if($exe){
                    echo('<script>window.alert("Notificação Recebida! Aguarde.");window.location="Home.php";</script>'); 
                }
               
            }else{
                echo('<script>window.alert("PERMISSÃO NEGADA!");window.location="Home.php";</script>');
            }
            ?>
        </section>	
        </Header> 
        <main>
        </main>
        <footer>
        </footer>
    </body>
</html>