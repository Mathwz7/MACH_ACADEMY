<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Cadastro</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../../../Css/Cadastros/StyleCadastro_Clientes.css'>
    
</head>
<body>
    <section class="login-main">
    <section class = "login-esquerda">
        <h1>Faça parte da nossa família!</h1>
        <img class="imagem-login-esquerda" src="../../Images/Cadastros/Study-animate.svg" alt="Study">
    </section>
    <section class="login-direita">
        <section class="card-login">
           
        <form enctype="multipart/form-data" class="form-login" name= "login" action="#" method="POST">
            <section class="textfield"> 
                <label for="nome_cliente">Nome</label>
                <input type="text" name="nome" placeholder="Nome" required>
            </section>
            <section class="textfield"> 
                <label for="email_usuario">Email</label>
                <input type="email" name="email" placeholder="Usuário" transformrequired>
            </section>
            <section class="textfield"> 
                <label for="senha">Senha</label>
                <input type="password" name="senha" placeholder="Senha" required>
            </section>
            <section class="textfield"> 
                <label for="data_nasc_usuario">Data de nascimento</label>
                <input type="date" name="data_nasc" placeholder="Data de nascimento" max="9999-12-31" required>
            </section>
            
            <section class="textfield"> 
                <label for="imagem">Foto de perfil (PNG)</label>
                <input  type="file" name="imagem" required>
            </section>
            <input class="btn-login" type="submit"  name="cadastrar" value="Cadastrar">
            
        </form>
        </section>
    </section>
</section>
<section>
<?php
        if(isset($_POST['cadastrar'])){
            $foto = $_FILES['imagem'];
            $nome = $_POST['nome'];
            $data = $_POST['data_nasc'];
            $email = trim($_POST['email']);
            $senha = base64_encode($_POST['senha']);

            strtolower($email);

            $sql_verificar_cli = 'select * from cliente where cli_email="'.$email.'";';
            $query_verificar_cli = mysqli_query($conexao, $sql_verificar_cli);
                $linhas1 = mysqli_num_rows($query_verificar_cli);

                if($linhas1 == 0){
                    $sql_verificar_int = 'select * from interprete where int_email="'.$email.'";';
                    $query_verificar_int = mysqli_query($conexao, $sql_verificar_int);
                        $linhas2 = mysqli_num_rows($query_verificar_int);

                        if($linhas2 == 0){
                            $sql_verificar_crc = 'select * from criador_de_conteudo where crc_email="'.$email.'";';
                            $query_verificar_crc = mysqli_query($conexao, $sql_verificar_crc);
                                $linhas3 = mysqli_num_rows($query_verificar_crc);

                                    if($linhas3 == 0){
                                        $sql_verificar_fun = 'select * from funcionario where fun_email="'.$email.'";';
                                        $query_verificar_fun = mysqli_query($conexao, $sql_verificar_fun);
                                            $linhas4 = mysqli_num_rows($query_verificar_fun);

                                                if($linhas4 == 0){
                                                    if(!empty($foto['name'])){
                                                        $extensao = explode('.',$foto["name"]);
                                                        $extensao = strtolower($extensao[1]);
                                                        if($extensao!='png'){
                                                            echo('<script>window.alert("Não é uma imagem");window.location="CadastroCliente.php";</script>');
                                                        }else{
                                                            $nome_foto = md5(uniqid(time())).'.'.$extensao[0].$extensao[1].$extensao[2];
                                                            $caminho_foto = "fotos/perfis/".$nome_foto;
                                                            move_uploaded_file($foto['tmp_name'], $caminho_foto);
                                                            $aprovado = 0;
                                                            $sql_cadastrar_cliente = 'INSERT into cliente(cli_nome,cli_data_de_nascimento,cli_email,cli_senha,cli_imagem) values("'.$nome.'","'.$data.'","'.$email.'","'.$senha.'","'.$nome_foto.'");';
                                                            $resul = mysqli_query($conexao,$sql_cadastrar_cliente);

                                                            if($resul){
                                                                echo('<script>window.alert("Usuário cadastrado com sucesso");window.location="Login.php";</script>');
                                                            }
                                                        }
                                                    }     
                                                }                                               
                                        
                                    }
                        }
                }else{
                    echo('<script>window.alert("Este E-mail já está em uso.");</script>');
                }
        }
    ?>
</section>
</body>
</html>
