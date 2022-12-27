<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Cadastro</title>
    </head>
    <body>
        <section class="login-main">
            <section class="login-esquerda">
                <h1>Junte-se a nossa equipe!</h1>
                <img class="imagem-login-esquerda" src="../../Images/Cadastros/Interprete-animate.svg" alt="interprete">
            </section>
            <section class="login-direita">
        <section class="card-login">
            <!-- Multipart/form-data só pode ser utilizado com o método POST-->
            <form class="form-login" name="cad" action="#" method="POST" enctype="multipart/form-data">
                <section class="textfield"> 
                    <label for="nome-cliente">Nome</label>
                    <input type="text" name="int_nome" placeholder="Nome" required><br>
                </section>
                <section class="textfield"> 
                    <label for="email-usuario">Email</label>
                    <input type="email" name="int_email" placeholder="Email" required><br>
                </section>
                <section class="textfield"> 
                    <label for="senha">Senha</label>
                    <input type="password" name="int_senha" placeholder="Senha" required><br>
                </section>
                <section class="textfield"> 
                    <label for="CPF-CNPJ-usuario">CPF</label>
                    <input type="text" name="int_CPF" maxlength="11" placeholder="Somente números" required><br>
                </section>
                <section class="textfield"> 
                    <label for="data-nasc-usuario">Data de nascimento</label>
                    <input type="date" name="data_de_nascimento" required><br>
                </section>
                <section class="textfield"> 
                    <label for="imagem">Foto de Perfil (PNG)</label>
                    <input type="file" name="imagem" required><br>
                </section>
                <section class="textfield"> 
                    <label for="documento">Currículo (PDF)</label>
                    <input type="file" name="int_curriculo" required><br>
                </section>
                
                <input class="btn-login" type="submit" name="cadastrar" value="Cadastrar">
            </form>
        </section>
            </section>
        </section>
        <section>
            <?php
                if(isset($_POST['cadastrar'])){
                    $nome = $_POST['int_nome'];
                    $senha = $_POST['int_senha'];
                    $email = $_POST['int_email'];
                    $CPF = $_POST['int_CPF'];
                    $data = $_POST['data_de_nascimento'];
                    $documento = $_FILES['int_curriculo'];
                    $imagem = $_FILES['imagem'];

                    $crip = base64_encode($senha);

                    if(!empty($documento['name'])){
                        
                        /*função prag_match faz uma comparação entre formatos de string, compara tipos de extensão pra ver se é imagem mesmo, por exemplo*/
                        /* a barra invertida na linha abaixo serve para anular uma barra normal*/
                        $extensaofoto = explode('.',$imagem["name"]); 
                        $extensao = explode('.',$documento["name"]);
                        $extensao = strtolower($extensao[1]);
                        $extensaofoto = strtolower($extensaofoto[1]);

                        if($extensao!="pdf" and $extensaofoto!="png"){
                            echo('<script>window.alert("Coloque os documentos com as extensões corretas! (PDF E PNG)");window.location="CadastroInterprete.php";</script>');
                        }else{
                            $nome_documento = md5(uniqid(time())).'.'.$extensao[0].$extensao[1].$extensao[2];
                            

                            $nome_imagem = md5(uniqid(time())).'.'.$extensaofoto[0].$extensaofoto[1].$extensaofoto[2];
                            $nomepasta = $nome;
                            //mkdir('curriculos/'.$nomepasta);

                            $caminho_documento = "curriculos/".$nome_documento;
                            move_uploaded_file($documento["tmp_name"], $caminho_documento);

                            $caminho_imagem = "fotos/perfis/".$nome_imagem;
                            move_uploaded_file($imagem["tmp_name"], $caminho_imagem);

                            $aprovado = 0;

                            $sqlpegarinfo ='select * from interprete where int_CPF ="'.$CPF.'";';
                            $resulinfo = mysqli_query($conexao,$sqlpegarinfo);
                            $confirmar_nao_existe = mysqli_num_rows($resulinfo);
                            
                            if($confirmar_nao_existe != 0){
                                echo('<script>window.alert("CPF já cadastrado no sistema!");window.location="CadastroInterprete.php";</script>');
                                
                            }else{
                                $data = date('y,m,d');
                                $sqlin = 'insert into interprete(int_nome,int_email,int_senha,int_CPF,int_data_de_nascimento,int_aprovado,int_imagem)values("'.$nome.'","'.$email.'","'.$crip.'","'.$CPF.'","'.$data.'","'.$aprovado.'","'.$nome_imagem.'");';
                                $resul = mysqli_query($conexao,$sqlin);  

                                if($resul){
                                    $sqlpegarinfo2 ='select * from interprete where int_CPF ="'.$CPF.'";';
                                    $resulinfo2 = mysqli_query($conexao,$sqlpegarinfo2);
                                    $con = mysqli_fetch_array($resulinfo2); 
                                    $sqlindoc = 'insert into curriculo_interprete(cui_data,cui_curriculo,fk_Interprete_int_codigo)values("'.$data.'","'.$nome_documento.'",'.$con[0].');';
                                    mysqli_query($conexao,$sqlindoc);
                                    echo('<script>window.alert("Usuário cadastrado com sucesso");window.location="Login.php";</script>');
                                }
                            }
                        }
                    }else{
                        echo('<script>window.alert("Nenhum documento selecionado!");window.location="Cadastro_Interprete.php";</script>');
                    }
                        
                }
            ?>
        </section>
    </body>
</html>