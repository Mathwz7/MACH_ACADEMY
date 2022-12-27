<?php
    include('../Parts/All/conexao.php');
    if($_SESSION['tipo_user'] == "professor"){
    $sql ='select * from criador_de_conteudo where crc_codigo ='.$_SESSION['id'].';';
    $resul = mysqli_query($conexao,$sql);
    $con = mysqli_fetch_array($resul);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Cadastro</title>
    </head>
    <body>
        <section class="card-perfil-aluno">
            <section class="card-nav-bar-perfil-aluno">
                <section class="nav-bar-perfil-aluno">

                <a href="Visualizar_perfil.php"><img class="imagem-perfil-aluno" src="fotos/perfis/<?php echo $_SESSION['foto'];?>"></a>

                    <h1><?php echo $con['crc_nome']?></h1>

                    <ul class="ul-nav-bar-perfil-aluno">
                        
                        <li class="li-nav-bar-perfil-aluno">
                            <a href="Perfil.php">
                                <p>
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    &nbsp&nbspEditar perfil</p>
                            </a>
                        </li>

                        <li class="li-nav-bar-perfil-aluno">
                            <a href="Cursos.php">
                                <p>
                                    <i class="fa-solid fa-book-open-reader"></i>
                                    &nbsp&nbspMeus Cursos</p>
                            </a>
                        </li>
                        <li class="li-nav-bar-perfil-aluno">
                            <a href="Sair_perfil.php">
                                <p>
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    &nbsp&nbspSair</p>
                            </a>
                        </li>
                        <li class="li-nav-bar-perfil-aluno">
                            <a href="Insercao_curso.php">
                                <p>
                                <i class="fa-solid fa-laptop-file"></i>
                                    &nbsp&nbspInserir Curso</p>
                            </a>
                        </li>
                        <li class="li-nav-bar-perfil-aluno">
                            <a href="Excluir_perfil.php">
                                <p>
                                    <i class="fa-solid fa-trash-can"></i>
                                    &nbsp&nbspExcluir conta</p>
                            </a>
                        </li>
                    </ul>
                </section>
            </section>
            <section class="card-exibicao-perfil-aluno">
                <section class="card-login">
                    <h1 class="h1-card-login">Cadastro de curso</h1>
                    <hr class="hr-card-login">
                    <form
                        class="form-login"
                        name="form_perfil"
                        action="#"
                        method="POST"
                        enctype="multipart/form-data">
                        <label class="lbl-h1-title-form-perfil" for="nome_professor">
                            <h1>Informações do curso</h1>
                        </label>
                        <section class="textfield">

                            <label for="cur_nome">Nome</label>
                            <input type="text" name="cur_nome" placeholder="" required="required">
                        </section>
                        <section class="textfield">
                            <label for="cur_descricao">Descrição</label>
                            <textarea
                                name="cur_descricao"
                                id="cur_descricao"
                                class="textarea-biografia"
                                maxlength="300"
                                placeholder="Sobre o curso"></textarea>
                        </section>
                        <section class="textfield">
                            <label for="modulos">Módulos</label>
                            <input
                                type="text"
                                name="modulo"
                                placeholder="Número de módulos"
                                required="required">
                        </section>
                        <section class="textfield">
                            <label for="cur_imagem">Foto do curso:</label>
                            <input type="file" name="cur_imagem" placeholder="" required="required">
                        </section>
                        <section class="textfield">
                            <label for="preco">Preço:</label>
                            <input type="number" name="preco" placeholder="R$000,00" required="required">
                        </section>
                        <section class="textfield">
                            <label>Tipo de Curso:</label>
                            <select class="tipo_de_curso" id="tipo_de_curso" name="tipo_de_curso">
                                <option value="Informatica">Informática</option>
                                <option value="Humanas">Humanas</option>
                                <option value="Exatas">Exatas</option>
                                <option value="Biologicas">Biológicas</option>
                            </select>
                        </section>
                        <input class="btn-login" type="submit" name="cadastrar" value="Cadastrar">
                    </form>
                </section>
            </section>
        </section>
        <section>
            <?php

                if(isset($_POST['cadastrar'])){
                    $nome = $_POST['cur_nome'];
                    $descricao = $_POST['cur_descricao'];
                    $imagem = $_FILES['cur_imagem'];
                    $tipo = $_POST['tipo_de_curso'];
                    $modulo = $_POST['modulo'];
                    $preco = $_POST['preco']; 
                    $tipo_valor = "";
                    $codigo_criador = $_SESSION['id'];
                    switch($tipo){
                        case 'Informatica':
                            $tipo_valor = 1;
                        break;
                        case 'Humanas':
                            $tipo_valor = 2;
                        break;
                        case 'Exatas':
                            $tipo_valor = 3;
                        break;
                        case 'Biologicas':
                            $tipo_valor = 4;
                        break;
                        default:
                            $tipo_valor = 0;
                    }
                    if(!empty($imagem['name'])){
                        /*largura e altura em px e tamanho em bytes
                        */
                        $largura = 1000000000;
                        $altura = 1000000000;
                        $tamanho = 1000000000;
                        /*função prag_match faz uma comparação entre formatos de string, compara tipos de extensão pra ver se é imagem mesmo, por exemplo*/
                        /* a barra invertida na linha abaixo serve para anular uma barra normal*/ 
                        if(!preg_match("/^image\/(jpg|jpeg|gif|png|bpm)$/",$imagem["type"])){
                            echo('<script>window.alert("Não é uma imagem!");window.location="Insercao_Curso.php";</script>');
                        }
                        /*getimagesize geral um array, por isso utilizar as posições para fazer as validações*/
                        $dimensoes = getimagesize($imagem["tmp_name"]);
    
                        if($dimensoes[0] > $largura){
                            echo('<script>window.alert("A largura da imagem não pode ultrapassar '.$largura.' pixels");window.location="Insercao_Curso.php";</script>');
                        }
    
                        if($dimensoes[1] > $altura){
                            echo('<script>window.alert("A altura da imagem não pode ultrapassar '.$altura.' pixels");window.location="Insercao_Curso.php";</script>');
                        }
    
                        if($imagem['size'] > $tamanho){
                            echo('<script>window.alert("O tamanho da imagem não pode ultrapassar '.$tamanho.' bytes");window.location="Insercao_Curso.php";</script>');
                        }
    
                        /*preg_match também serve para gerar valor o colocando em uma váriavel, será usado para pegar o nome da imagem*/
                        preg_match("/\.(jpg|jpeg|gif|png|bpm){1}$/i", $imagem["name"], $ext);
    
                        /*md5 gera uma rash de 32 caracteres, facilitando a manutenção do banco*/
                        /*a função uniqid pega o tempo atual em MILISEGUNDOS e gera uma identificação única*/
                        $nome_imagem = md5(uniqid(time())).'.'.$ext[1];

                        $caminho_foto = "fotos/cursos/".$nome_imagem;
                        move_uploaded_file($imagem['tmp_name'], $caminho_foto);
    
                        $sqlin = 'insert into curso(cur_nome,cur_descricao,cur_imagem, fk_Tipo_de_Curso_tic_codigo,fk_Criador_de_Conteudo_crc_codigo,cur_preco,cur_aprovado, fk_Interprete_int_codigo,cur_traducao)values("'.$nome.'","'.$descricao.'","'.$nome_imagem.'","'.$tipo_valor.'","'.$codigo_criador.'","'.$preco.'","0","0","0");';
                        $resul = mysqli_query($conexao,$sqlin);
                        $nomepasta = $nome.$codigo_criador;
                        $idcurso = mysqli_insert_id($conexao);
                        mkdir('documentos/'.$nomepasta);

                        if($resul){
                            
                            for($i = 1; $i <= $modulo; $i++){
                                mkdir('documentos/'.$nomepasta.'/modulo_'.$i.'crc_codigo'.$codigo_criador);
                                $sqlmodulo = 'insert into modulo (mod_nome, fk_Curso_cur_codigo) values("modulo_'.$i.'",'.$idcurso.');';
                                mysqli_query($conexao,$sqlmodulo);
                            }

                            
                        }
                        echo('<script>window.alert("Curso cadastrado com sucesso!");window.location="vermodulos.php?cur_codigo='.$idcurso.'";</script>');
                        
                    }
                    
                }
                ?>

            <!-- <a href="vermodulos.php?cur_codigo=<?php ?>">Ver Módulos</a> -->
        <?php
                }else{
                    echo('<script>window.alert("PERMISSÃO NEGADA!");window.location="Home.php";</script>');
                }
            ?>

        </section>
    </body>
</html>