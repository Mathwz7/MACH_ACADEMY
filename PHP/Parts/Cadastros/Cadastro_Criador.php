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
            <img class="imagem-login-esquerda" src="../../Images/Cadastros/Creator-animate.svg" alt="Creator">
        </section>
        <section class="login-direita">
            <section class="card-login">
                <form enctype="multipart/form-data" class="form-login" name= "login" action="#" method="POST">
                    <section class="textfield"> 
                        <label for="nome-cliente">Nome</label>
                        <input type="text" name="nome" placeholder="Nome" required>
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
                        <label for="CPF-CNPJ-usuario">CPF/CNPJ</label>
                        <input type="text" name="CPF/CNPJ" placeholder="Somente números" maxlength="11" required>
                    </section>
                    <section class="textfield"> 
                        <label for="data-nasc-usuario">Data de nascimento</label>
                        <input type="date" name="data" placeholder="Data de nascimento" required>
                    </section>
                    
                    
                    <section class="textfield"> 
                        <label for="imagem">Foto de perfil (PNG)</label>
                        <input type="file" name="crc_imagem" required>
                    </section>
                    <input class="btn-login" type="submit"  name="cadastrar" value="Cadastrar">
                </form>
            </section>
        </section>
        </section>
        <section>
            <?php
                if(isset($_POST['cadastrar'])){
                    $nome = $_POST['nome'];
                    $senha = $_POST['senha'];
                    $email = $_POST['email'];
                    $CPF = $_POST['CPF/CNPJ'];
                    $data = $_POST['data'];
                    $documento = $_FILES['crc_imagem'];

                    $crip = base64_encode($senha);

                    if(!empty($documento['name'])){
                        
                        /*função prag_match faz uma comparação entre formatos de string, compara tipos de extensão pra ver se é imagem mesmo, por exemplo*/
                        /* a barra invertida na linha abaixo serve para anular uma barra normal*/ 
                        $extensao = explode('.',$documento["name"]);
                        $extensao = strtolower($extensao[1]);

                        if($extensao!='png'){
                            echo('<script>window.alert("Não é uma imagem");window.location="CadastroCriador.php";</script>');
                        }else{
                            $nome_documento = md5(uniqid(time())).'.'.$extensao[0].$extensao[1].$extensao[2];
                            $caminho_documento = "fotos/perfis/".$nome_documento;
                            move_uploaded_file($documento["tmp_name"], $caminho_documento);
                            $aprovado = 0;

                            $sqlpegarinfo ='select * from criador_de_conteudo where crc_CPF_CNPJ ="'.$CPF.'";';
                            $resulinfo = mysqli_query($conexao,$sqlpegarinfo);
                            $confirmar_nao_existe = mysqli_num_rows($resulinfo);
                            
                            if($confirmar_nao_existe != 0){
                                echo('<script>window.alert("CPF já cadastrado no sistema!");window.location="CadastroCriador.php";</script>');
                                
                            }else{
                                $data = date('y,m,d');
                                $sqlin = 'insert into criador_de_conteudo(crc_nome,crc_email,crc_senha,crc_CPF_CNPJ,crc_data_de_nascimento,crc_imagem,fk_Tipo_de_usuario_tiu_codigo)values("'.$nome.'","'.$email.'","'.$crip.'","'.$CPF.'","'.$data.'","'.$nome_documento.'","2");';
                                $resul = mysqli_query($conexao,$sqlin);  

                                if($resul){
                                    echo('<script>window.alert("Usuário cadastrado com sucesso");window.location="Login.php";</script>');
                                }
                            }
                        }
                    }else{
                        echo('<script>window.alert("Nenhum documento selecionado!");window.location="CadastroCriador.php";</script>');
                    }
                        
                }
            ?>
        </section>
    </body>
</html>