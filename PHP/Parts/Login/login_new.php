<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Form</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../../Css/Login/StyleLogin_new.css'>
    
</head>
<body>
    <section class="login-main">
    <section class = "login-esquerda">
        <h1>Bem vindo de volta!</h1>
        <img class="imagem-login-esquerda" src="../../Images/Login/flying-bird-animate.svg" alt="bird">
    </section>
    <section class="login-direita">
        <section class="card-login">
           
        <form class="form-login" name= "login" action="#" method="POST">
            <section class="textfield"> 
                <label for="email-usuario">Email do usuário</label>
                <input type="email" name="email" placeholder="Usuário" required>
            </section>
            <section class="textfield"> 
                <label for="senha">Senha</label>
                <input type="password" name="senha" placeholder="Senha" required>
                <a href="Cards.php">Cadastre-se</a>
            </section>
            <input class="btn-login" type="submit"  name="logar" value="Logar">
            
        </form>
        </section>
    </section>
</section>
<section>
    <?php
    
     if(isset($_POST['logar'])){

         $email = trim($_POST['email']);
         $senha = base64_encode($_POST['senha']);

         if(empty($email && $senha)){

         }else{

             $sqllogin_crc = 'select * from Criador_de_Conteudo where crc_email="'.$email.'" and crc_senha="'.$senha.'";';
             $sqlquery_crc = mysqli_query($conexao, $sqllogin_crc);
             $linhas_crc = mysqli_num_rows($sqlquery_crc);

                 if($linhas_crc != 0){

                    $sqlid1 = 'select * from Criador_de_Conteudo where crc_email="'.$email.'";';
                    $sqlid_query1 = mysqli_query($conexao, $sqlid1);
                    $id_con1 = mysqli_fetch_array($sqlid_query1);

                        $_SESSION['email'] = $email;
                        $_SESSION['id'] = $id_con1['crc_codigo'];

                    echo('<script>window.location="Home.php";</script>');
                    }

            
            if ($linhas_crc==0) {

                     $sqllogin_fun = 'select * from funcionario where fun_email="'.$email.'" and fun_senha="'.$senha.'";';
                     $sqlquery_fun = mysqli_query($conexao, $sqllogin_fun);
                     $linhas_fun = mysqli_num_rows($sqlquery_fun);

                        if($linhas_fun != 0){

                            $sqlid2 = 'select * from funcionario where fun_email="'.$email.'";';
                            $sqlid_query2 = mysqli_query($conexao, $sqlid2);
                            $id_con2 = mysqli_fetch_array($sqlid_query2);
                                
                                $_SESSION['email'] = $email;
                                $_SESSION['id'] = $id_con2['fun_codigo'];

                                echo('<script>window.location="Home.php";</script>');
                        }


            if ($linhas_fun==0) {

                     $sqllogin_cli = 'select * from cliente where cli_email="'.$email.'" and cli_senha="'.$senha.'";';
                     $sqlquery_cli = mysqli_query($conexao, $sqllogin_cli);
                     $linhas_cli = mysqli_num_rows($sqlquery_cli);

                        if($linhas_cli != 0){

                            $sqlid3 = 'select * from cliente where cli_email="'.$email.'";';
                            $sqlid_query3 = mysqli_query($conexao, $sqlid3);
                            $id_con3 = mysqli_fetch_array($sqlid_query3);
                                
                                $_SESSION['email'] = $email;
                                $_SESSION['id'] = $id_con3['cli_codigo'];

                                echo('<script>window.location="Home.php";</script>');
                        }

            if($linhas_cli==0){

                        $sqllogin_int = 'select * from interprete where int_email="'.$email.'" and int_senha="'.$senha.'";';
                        $sqlquery_int = mysqli_query($conexao, $sqllogin_int);
                        $linhas_int = mysqli_num_rows($sqlquery_int);

                        if($linhas_int != 0){

                            $sqlid4 = 'select * from interprete where int_email="'.$email.'";';
                            $sqlid_query4 = mysqli_query($conexao, $sqlid4);
                            $id_con4 = mysqli_fetch_array($sqlid_query4);
                                
                                $_SESSION['email'] = $email;
                                $_SESSION['id'] = $id_con4['int_codigo'];

                                echo('<script>window.location="Home.php";</script>');
                        }else{
                            echo('<script>window.alert("Este usuário ou senha não existem!");</script>');
                        }
                     }
                 }
             }
         }
     }
 
 ?>
</section>
</body>
</html>