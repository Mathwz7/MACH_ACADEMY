
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Cadastro</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='../../../Css/Cadastros/StyleCadastro_Criador.css'>
        
    </head>
    <body>
        <section class="login-main">
        <section class = "login-esquerda">
            <h1>Junte-se a nossa equipe!</h1>
            <img class="imagem-login-esquerda" src="../../../Images/Cadastros/Creator-animate.svg" alt="Creator">
        </section>
        <section class="login-direita">
            <section class="card-login">
            
            <form class="form-login" name= "login" action="#" method="POST">
                <section class="textfield"> 
                    <label for="nome-cliente">Nome</label>
                    <input type="text" name="nome" placeholder="Nome" required>
                </section>
                <section class="textfield"> 
                    <label for="data-nasc-usuario">Data de nascimento</label>
                    <input type="date" name="data" placeholder="Data de nascimento" required>
                </section>
                <section class="textfield"> 
                    <label for="CPF-usuario">CPF/CNPJ</label>
                    <input type="text" maxlength="11" name="CPF" placeholder="Somente números" required>
                </section>
                <section class="textfield"> 
                    <label for="email-usuario">Email</label>
                    <input type="email" name="email" placeholder="Usuário" required>
                </section>
                <section class="textfield"> 
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" placeholder="Senha" required>
                </section>
                <section class="textfield"> 
                    <label for="telefone">Telefone</label>
                    <input type="text" maxlength="9" name="telefone" placeholder="99999 9999" required>
                </section>
                <section class="textfield"> 
                    <label for="DDD">DDD</label>
                    <input type="text" maxlength="2" name="DDD" placeholder="11" required>
                </section>
                <input class="btn-login" type="submit"  name="cadastrar" value="Cadastrar">
                
            </form>
            </section>
        </section>
        <section>
            <?php
                include('../All/conexao.php');
                if(isset($_POST['cadastrar'])){
                    $nome = $_POST['nome'];
                    $data = $_POST['data'];
                    $CPF = $_POST['CPF'];
                    $telefone = $_POST['telefone'];
                    $email = $_POST['email'];
                    $senha = $_POST['senha'];
                    $ddd = $_POST['DDD'];
                    $crip = base64_encode($senha);
                    $sqlpegarinfo ='select * from funcionario where fun_CPF ="'.$CPF.'";';
                    $resulinfo = mysqli_query($conexao,$sqlpegarinfo);
                    $confirmar_nao_existe = mysqli_num_rows($resulinfo); 
                    if($confirmar_nao_existe != 0){
                        echo('<script>window.alert("CPF já cadastrado no sistema!");window.location="Cadastro_Funcionario.php";</script>');                      
                    }else{
                        $sql_cadastrar_funcionario = 'INSERT into funcionario(fun_nome,fun_email,fun_senha,fun_data_de_nascimento,fun_cpf) values("'.$nome.'","'.$email.'","'.$crip.'","'.$data.'","'.$CPF.'");';
                        $resul = mysqli_query($conexao,$sql_cadastrar_funcionario);
                        if($resul){
                            $sqlinfo = 'select * from funcionario where fun_cpf = "'.$CPF.'";';
                            $resulinfo = mysqli_query($conexao, $sqlinfo);
                            $con = mysqli_fetch_array($resulinfo);
                            echo $con['fun_codigo'];
                            $sql_cadastrar_telefone = 'INSERT into telefone_de_funcionario(tef_DDD,tef_numero,fk_Funcionario_fun_codigo) values("'.$ddd.'","'.$telefone.'","'.$con['fun_codigo'].'");';
                            mysqli_query($conexao,$sql_cadastrar_telefone);
                            echo('<script>window.alert("Usuário cadastrado com sucesso");window.location="../../Pages/Login.php";</script>');
                        }else{
                            echo('<script>window.alert("Nenhuma Imagem selecionada!");window.location="Cadastro_Funcionario.php";</script>');
                        }
                    }
                }
            ?>
        </section>
    </body>
</html>