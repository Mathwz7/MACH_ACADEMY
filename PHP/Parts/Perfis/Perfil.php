<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../../Css/Perfis/Perfil_aluno_style/Perfil_aluno.css'>
    <script src="https://kit.fontawesome.com/e2a21d01bc.js" crossorigin="anonymous"></script>
</head>

<body>
    <section>
        <?php
           if(isset($_SESSION['id'])){
            $sqlname_crc = 'select * from Criador_de_Conteudo where crc_email="'.$_SESSION['email'].'";';
            $sqlquery_crc = mysqli_query($conexao, $sqlname_crc);
            $linhas_crc = mysqli_num_rows($sqlquery_crc);

                if($linhas_crc != 0){

                $sqlid1 = 'select * from Criador_de_Conteudo where crc_email="'.$_SESSION['email'].'";';
                $sqlid_query1 = mysqli_query($conexao, $sqlid1);
                $id_con1 = mysqli_fetch_array($sqlid_query1);
                $_SESSION['nome'] = $id_con1['crc_nome'];

                }

    
                if ($linhas_crc==0) {

                $sqllogin_fun = 'select * from funcionario where fun_email="'.$_SESSION['email'].'";';
                $sqlquery_fun = mysqli_query($conexao, $sqllogin_fun);
                $linhas_fun = mysqli_num_rows($sqlquery_fun);

                if($linhas_fun != 0){

                    $sqlid2 = 'select * from funcionario where fun_email="'.$_SESSION['email'].'";';
                    $sqlid_query2 = mysqli_query($conexao, $sqlid2);
                    $id_con2 = mysqli_fetch_array($sqlid_query2);
                $_SESSION['nome'] = $id_con2['fun_nome'];	

                }


            if ($linhas_fun==0) {

             $sqllogin_cli = 'select * from cliente where cli_email="'.$_SESSION['email'].'";';
             $sqlquery_cli = mysqli_query($conexao, $sqllogin_cli);
             $linhas_cli = mysqli_num_rows($sqlquery_cli);

                if($linhas_cli != 0){

                    $sqlid3 = 'select * from cliente where cli_email="'.$_SESSION['email'].'";';
                    $sqlid_query3 = mysqli_query($conexao, $sqlid3);
                    $id_con3 = mysqli_fetch_array($sqlid_query3);
                    $_SESSION['nome'] = $id_con3['cli_nome'];

                }

    if($linhas_cli==0){

                $sqllogin_int = 'select * from interprete where int_email="'.$_SESSION['email'].'";';
                $sqlquery_int = mysqli_query($conexao, $sqllogin_int);
                $linhas_int = mysqli_num_rows($sqlquery_int);

                if($linhas_int != 0){

                    $sqlid4 = 'select * from interprete where int_email="'.$_SESSION['email'].'";';
                    $sqlid_query4 = mysqli_query($conexao, $sqlid4);
                    $id_con4 = mysqli_fetch_array($sqlid_query4);
                    $_SESSION['nome'] = $id_con4['int_nome'];
    }}}}}
        /*$sql = "select * from criador_de_conteudo where crc_codigo = '".$_SESSION['foto']."';";
        $resul = mysqli_query($conexao,$sql);
        $aluno = mysqli_fetch_array($resul);*/
        ?>
    </section>
    <section class="card-perfil-aluno">
        <section class="card-nav-bar-perfil-aluno">
        <a href="#"><img class="imagem-perfil-aluno" src="fotos/perfis/<?php echo $_SESSION['foto'];?>"></a>
            <section class="nav-bar-perfil-aluno">
                
                <h1><?php echo $_SESSION['nome'];?></h1>

                <ul class="ul-nav-bar-perfil-aluno">
                    <li class="li-nav-bar-perfil-aluno">
                        <a href="Perfil.php">
                            <p> <i class="fa-solid fa-pen-to-square"></i> &nbsp&nbspEditar perfil</p>
                        </a>
                    </li>

                    <li class="li-nav-bar-perfil-aluno">
                        <a href="Cursos.php">
                            <p><i class="fa-solid fa-book-open-reader"></i> &nbsp&nbspMeus Cursos</p>
                        </a>
                    </li>
                    <li class="li-nav-bar-perfil-aluno">
                        <a href="Sair_perfil.php">
                            <p><i class="fa-solid fa-right-from-bracket"></i> &nbsp&nbspSair</p>
                        </a>
                    </li>
                    <li class="li-nav-bar-perfil-aluno">
                        <a href="Excluir_perfil.php">
                            <p> <i class="fa-solid fa-trash-can"></i> &nbsp&nbspExcluir conta</p>
                        </a>
                    </li>

                </ul>
            </section>
        </section>
        <section class="card-exibicao-perfil-aluno">
            <section class="card-login">
                <h1 class="h1-card-login">Perfil</h1>
                <hr class="hr-card-login">
                <form class="form-login" name="form_perfil" action="#" method="POST">
                    <label class="lbl-h1-title-form-perfil" for="nome_cliente">
                        <h1>Dados pessoais</h1>
                    </label>
                    <section class="textfield">

                        <label for="nome-cliente">Nome</label>
                        <input type="text" name="nome" value="<?php echo $_SESSION['nome']?>" required>
                    </section>
                   
                   
                    <label class="lbl-h1-title-form-perfil" for="dados_conta_usuario">
                        <h1>Dados da conta</h1>
                    </label>
                    <section class="textfield">
                        <label for="email_usuario">Email:</label>
                        <input type="text" name="email" placeholder="<?php echo $_SESSION['email'];?>" disabled transformrequired>
                    </section>
                    <!--  <section class="textfield"> 
                        <label for="senha_atual">Digite sua senha atual:</label>
                        <input type="password" name="senha_atual" placeholder="Senha" required>
                   </section> -->
                    <section class="textfield">
                        <label for="senha_atual">Digite sua nova senha:</label>
                        <input type="password" name="senha_nova" placeholder="Nova senha" required>
                    </section>
                    <section class="textfield">
                        <label for="senha_confirmacao">Confirme sua nova senha:</label>
                        <input type="password" name="senha_confirmacao" placeholder="Senha" required>
                    </section>
                    <input class="btn-login" type="submit" name="salvar" value="Salvar">

                </form>
                <main>
                    <?php
                        if(isset($_POST['salvar'])){

                            if($_SESSION['tipo_user'] == "cliente"){                              
                                $nome = $_POST['nome'];
                                $senha = base64_encode($_POST['senha_nova']);
                                $confsenha = base64_encode($_POST['senha_confirmacao']);

                                if($senha == $confsenha){

                                    $sql_alterar1 = 'UPDATE cliente SET cli_nome="'.$nome.'", cli_senha="'.$senha.'" where cli_email="'.$_SESSION['email'].'";';
                                    mysqli_query($conexao, $sql_alterar1);
                                    echo('<script>window.alert("Atualizado com sucesso");window.location="Perfil_aluno.php";</script>');

                                }else{
                                    echo('<script>window.alert("As senhas não coincidem!!!");window.location="Perfil_aluno.php";</script>');
                                }

                            }else if($_SESSION['tipo_user'] == "professor"){   

                                $nome = $_POST['nome'];
                                $senha = base64_encode($_POST['senha_nova']);
                                $confsenha = base64_encode($_POST['senha_confirmacao']);

                                if($senha == $confsenha){

                                    $sql_alterar2 = 'UPDATE criador_de_conteudo SET crc_nome="'.$nome.'", crc_senha="'.$senha.'" where crc_email="'.$_SESSION['email'].'";';
                                    mysqli_query($conexao, $sql_alterar2);
                                    echo('<script>window.alert("Atualizado com sucesso");window.location="Perfil_aluno.php";</script>');

                                }else{
                                    echo('<script>window.alert("As senhas não coincidem!!!");window.location="Perfil_aluno.php";</script>');
                                }
                            }else if($_SESSION['tipo_user'] == "interprete"){

                                $nome = $_POST['nome'];
                                $senha = base64_encode($_POST['senha_nova']);
                                $confsenha = base64_encode($_POST['senha_confirmacao']);

                                if($senha == $confsenha){

                                    $sql_alterar3 = 'UPDATE interprete SET int_nome="'.$nome.'", int_senha="'.$senha.'" where int_email="'.$_SESSION['email'].'";';
                                    mysqli_query($conexao, $sql_alterar3);
                                    echo('<script>window.alert("Atualizado com sucesso");window.location="Perfil_aluno.php";</script>');
                                }else{
                                    echo('<script>window.alert("As senhas não coincidem!!!");window.location="Perfil_aluno.php";</script>');
                                }
                            }        
                        }
                    ?>
                </main>
            </section>
        </section>

</body>

</html>