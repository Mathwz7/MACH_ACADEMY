<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='../../../../Css/Perfis/Perfil_professor_style/Perfil_professor.css'>
    <title>Inserção vídeo</title>
</head>
<body>
    <?php
        if($_SESSION['tipo_user'] == "professor" or $_SESSION['tipo_user'] == "interprete" or $_SESSION['tipo_user'] == "funcionario"){

                    $idmodulo = $_GET['mod_codigo'];
                    $sql = 'select * from modulo where mod_codigo='.$idmodulo.';';
                    $resul = mysqli_query($conexao,$sql);
                    $exe = mysqli_fetch_array($resul);
                    $sqlcurso = 'select * from curso where cur_codigo='.$exe['fk_Curso_cur_codigo'].';';
                    $resul2 = mysqli_query($conexao,$sqlcurso);
                    $exe2 = mysqli_fetch_array($resul2);
         
    ?>
<section class="card-perfil-aluno">
        <section class="card-nav-bar-perfil-aluno">
            <section class="nav-bar-perfil-aluno">
            <?php 
                echo '<img src="fotos/perfis/'.$_SESSION['foto'].'" class="imagem-perfil-aluno"/>';
            ?>

                <h1><?php echo $_SESSION['nome'];?></h1>

                <ul class="ul-nav-bar-perfil-aluno">
                    <li class="li-nav-bar-perfil-aluno">
                        <a href="Perfil.php">
                            <p> <i class="fa-solid fa-pen-to-square"></i> &nbsp&nbspEditar perfil</p>
                        </a>
                    </li>

                    <li class="li-nav-bar-perfil-aluno">
                        <a href="Cursos.php">
                            <p><i class="fa-solid fa-book-open-reader"></i> &nbsp&nbspCursos</p>
                        </a>
                    </li>
                    <li class="li-nav-bar-perfil-aluno">
                        <a href="Sair_perfil.php">
                            <p><i class="fa-solid fa-right-from-bracket"></i> &nbsp&nbspSair</p>
                        </a>
                    </li>
                    <li class="li-nav-bar-perfil-aluno">
                        <a href="vermodulos.php?cur_codigo=<?php echo $exe['fk_Curso_cur_codigo'];?>">
                            <p><i class="fa-solid fa-list-ul"></i> &nbsp&nbspMódulos</p>
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
                <h1 class="h1-card-login">Cadastro de vídeos</h1>
                <hr class="hr-card-login">
                
                <form class="form-login" name="form_perfil" action="#" method="POST" enctype='multipart/form-data'>
                    <label class="lbl-h1-title-form-perfil" for="nome_professor">
                        <h1>Informações do vídeo</h1>
                    </label>
                    <section class="textfield">

                        <label for="mod_id">Código do Módulo:</label>
                        <input type="text" name="idmodulo" placeholder="<?php echo $idmodulo; ?>" disabled>
                    </section>
                    
                    <section class="textfield">
                        <label for="mod_nome">Nome do módulo</label>
                        <input type="text" name="mod_nome" placeholder="<?php echo $exe['mod_nome']; ?>" disabled>
                    </section>

                    <section class="textfield">
                        <label for="vid_nome">Nome do vídeo</label>
                        <input type="text" name="nomevideo" placeholder="" required>
                    </section>

                    <?php
                        if($_SESSION['tipo_user'] =='funcionario'){
                    ?>

                    <section class="textfield">
                        <label for="vid_arquivo">Insira a URL</label>
                        <input type="text" name="url" placeholder="" required>
                    </section>
                    <?php
                        }else{
                    ?>

                    <section class="textfield">
                        <label for="vid_arquivo">Insira o vídeo</label>
                        <input type="file" name="videoteste" placeholder="" required>
                    </section>

                    <?php
                        }
                    ?>

                    <section class="textfield">
                    <label for="tipo_video">Tipo de vídeo</label>
                    <select class="tipo_de_curso" id="tipo_de_video" name = 'tipo_de_video'>
                        <?php
                        ?>
                    <option value = '1'>Vídeo sem tradução</option>
                    <option value = '2'>Vídeo da tradução</option>
                    <option value = '3'>Vídeo Traduzido</option>

                </select>
                    </section>

             
                <input class="btn-login" type="submit" name="enviarvideo" value="Cadastrar">
                </form>
            </section>
        </section>
    </section>
</body>
</html>
<?php
    if(isset($_POST['enviarvideo']) and $_SESSION['tipo_user'] == 'interprete' || $_SESSION['tipo_user'] == 'professor'){
            $nomemodulo = $exe['mod_nome'];
            $video = $_FILES['videoteste'];
            $tipo = $_POST['tipo_de_video'];
            $resultadonome = $exe2['cur_nome'];
            $nomevideo = $_POST['nomevideo'];
            switch($tipo){
                case '1':
                    $tipo_valor = 1;
                    $tipo_nome = 'semtraducao';
                break;
                case '2':
                    $tipo_valor = 2;
                    $tipo_nome = 'datraducao';
                break;
                case '3':
                    $tipo_valor = 3;
                    $tipo_nome = 'traduzido';
                break;
                default:
                    $tipo_valor = 0;
            }
                $extensao = explode('.',$video['name']);
                /*md5 gera uma rash de 32 caracteres, facilitando a manutenção do banco*/
                /*a função uniqid pega o tempo atual em MILISEGUNDOS e gera uma identificação única*/
                if($extensao[1]!='mp4'){
                    echo('<script>window.alert("Não é uma imagem!");window.location="Insercao_Video.php";</script>');
                }
                preg_match("/\.(mp4){1}$/i", $video["name"], $ext);
                $nome_video = md5(uniqid(time())).$tipo_nome.'.'.$ext[1];
                //$nome_do_curso = $resultadonome.$id;
                /*echo $resultadonome.'<br>';
                echo $idmodulo.'<br>';
                echo $nome_video.'<br>';
                echo $nomemodulo.'<br>';*/
                $teste = explode("_",$nomemodulo);
                //echo $teste[1].'<br>';

                $caminho_video = 'documentos/'.$resultadonome.$_SESSION['id'].'/modulo_'.$teste[1].'crc_codigo'.$_SESSION['id'].'/'.$nome_video;
                //$caminho_video = '../Parts/'.$nome_video;
                move_uploaded_file($video["tmp_name"], $caminho_video);
                

                $query = 'insert into video (vid_nome, fk_Tipo_de_Video_tiv_codigo,fk_Modulo_mod_codigo) values("'.$nome_video.'","'.$tipo.'","'.$idmodulo.'");';
                $exe = mysqli_query($conexao,$query);


                if($exe){
                    echo('<script>window.alert("Upload feito com sucesso");window.location="insercao_video.php?mod_codigo='.$idmodulo.'";</script>');
                }     
            }elseif(isset($_POST['enviarvideo']) and $_SESSION['tipo_user'] == 'funcionario'){
                $codigomodulo = $exe['mod_codigo'];
                $url = $_POST['url'];
                $nomevideo = $_POST['nomevideo'];
                $tipo = $_POST['tipo_de_video'];

                $sql = 'insert into video(vid_nome,vid_url,fk_Modulo_mod_codigo,fk_Tipo_de_video_tiv_codigo)values("'.$nomevideo.'","'.$url.'","'.$codigomodulo.'","'.$tipo.'");';

                $executar = mysqli_query($conexao,$sql);

                if($executar){
                    echo('<script>window.alert("URL inserida");window.location="Insercao_Video.php?mod_codigo='.$idmodulo.'";</script>');
                }
            }
        }