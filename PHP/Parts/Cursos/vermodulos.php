<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Inserção módulos</title>
    </head>
    <body>    
    <?php
    // session_start();
    include('../Parts/All/conexao.php');
    if($_SESSION['tipo_user'] == "professor"){
    //print_r($_SESSION);
    $sql ='select * from criador_de_conteudo where crc_codigo='.$_SESSION['id'].';';
    $executar = mysqli_query($conexao,$sql);
    $array = mysqli_fetch_array($executar);
    $idcurso = $_GET['cur_codigo'];
    $query = 'SELECT * FROM modulo WHERE fk_Curso_cur_codigo='.$_GET['cur_codigo'].';';
    $exe = mysqli_query($conexao,$query);
     
            ?>
        <section class="card-perfil-aluno">
            <section class="card-nav-bar-perfil-aluno">
                <section class="nav-bar-perfil-aluno">

                    <a href="Visualizar_perfil_aluno.php"><img class="imagem-perfil-aluno" src="fotos/perfis/<?php echo $_SESSION['foto'];?>"></a>
                    <!-- <a href="Visualizar_perfil_professor.php"><img class="imagem-perfil-aluno" src="../../../Images/Interface/thiagao.jpg"></a> -->

                    <h1><?php echo $array['crc_nome'];?></h1>

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
                    <h1 class="h1-card-login">Cadastro de módulos</h1>
                    <hr class="hr-card-login">
                    <?php
                        while($listarmodulos = mysqli_fetch_array($exe)){
                          $idmodulo = $listarmodulos['mod_codigo'];
                          ?>
                    <form class="form-login" name="form_modulos" action="#" method="POST">
                        <label class="lbl-h1-title-form-perfil" for="nome_professor">
                            <h1>Informações dos módulos</h1>
                        </label>
                        
                        <section class="textfield">

                            <label for="mod_id">Código</label>
                            <input
                                type="number"
                                name="nome"
                                placeholder="<?php echo $idmodulo;?>"
                                disabled="disabled"
                                required="required">
                        </section>

                        <section class="textfield">
                            <label for="mod_nome">Nome</label>
                            <input
                                type="text"
                                name="mod_nome"
                                placeholder="<?php echo $listarmodulos['mod_nome'];?>"
                                required="required"
                                disabled>
                        </section>
                        <section class="textfield">

                            <label for="mod-descricao">Descrição</label>

                            <textarea
                                name="curso"
                                id="mod-descricao"
                                class="textarea-biografia"
                                maxlength="300"
                                placeholder="<?php echo $listarmodulos['mod_descricao'];?>"
                                ></textarea>

                        </section>
                        <input type='hidden' name='idmodulo' value='<?php echo $idmodulo;?>'>
                        <input class="btn-login" type="submit" name="cadastrar" value="Cadastrar">
                    </form>
                    <?php
                        }       
                    ?>
                </section>
            </section>
        </section>
    <?php
        if(isset($_POST['cadastrar'])){
            
            $id = $_POST['idmodulo'];
            $descricao = $_POST['curso'];
            $query = 'update modulo set mod_descricao="'.$descricao.'"where mod_codigo='.$id.';';
            $exe = mysqli_query($conexao,$query);
            if($exe){
            echo('<script>window.alert("Módulo atualizado com sucesso!");window.location="insercao_video.php?mod_codigo='.$id.'"</script>'); 
            }
        }
    }elseif($_SESSION['tipo_user'] =='interprete'){
        ?>
        <section class="card-perfil-aluno">
            <section class="card-nav-bar-perfil-aluno">
                <section class="nav-bar-perfil-aluno">

                    <a href="Visualizar_perfil_aluno.php"><img class="imagem-perfil-aluno" src="fotos/perfis/<?php echo $_SESSION['foto'];?>"></a>
                    <!-- <a href="Visualizar_perfil_professor.php"><img class="imagem-perfil-aluno" src="../../../Images/Interface/thiagao.jpg"></a> -->

                    <h1><?php echo $_SESSION['nome'];?></h1>

                    <ul class="ul-nav-bar-perfil-aluno">
                        <li class="li-nav-bar-perfil-aluno">
                            <a href="Visualizar_perfil_professor.php">
                                <p>
                                    <i class="fa-solid fa-eye"></i>
                                    &nbsp&nbspVisualizar perfil</p>
                            </a>
                        </li>
                        <li class="li-nav-bar-perfil-aluno">
                            <a href="Perfil_professor.php">
                                <p>
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    &nbsp&nbspEditar perfil</p>
                            </a>
                        </li>

                        <li class="li-nav-bar-perfil-aluno">
                            <a href="Cursos_professor.php">
                                <p>
                                    <i class="fa-solid fa-book-open-reader"></i>
                                    &nbsp&nbspMeus Cursos</p>
                            </a>
                        </li>
                        <li class="li-nav-bar-perfil-aluno">
                            <a href="Sair_perfil_professor.php">
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
                            <a href="Excluir_perfil_professor.php">
                                <p>
                                    <i class="fa-solid fa-trash-can"></i>
                                    &nbsp&nbspExcluir conta</p>
                            </a>
                        </li>

                    </ul>
                </section>
            </section>
            <?php
        $query = 'SELECT * FROM modulo WHERE fk_Curso_cur_codigo='.$_GET['cur_codigo'].';';
        $exe = mysqli_query($conexao,$query);
        ?>
        <section class="card-exibicao-perfil-aluno">
                <section class="card-login">
                    <h1 class="h1-card-login">Cadastro de módulos</h1>
                    <hr class="hr-card-login">
                    <?php
                        while($listarmodulos = mysqli_fetch_array($exe)){
                          $idmodulo = $listarmodulos['mod_codigo'];
                          ?>
                    <form class="form-login" name="form_modulos" action="insercao_video.php" method="GET">
                        <label class="lbl-h1-title-form-perfil" for="nome_professor">
                            <h1>Informações dos módulos</h1>
                        </label>
                        
                        <section class="textfield">

                            <label for="mod_id">Código</label>
                            <input
                                type="number"
                                name="nome"
                                placeholder="<?php echo $idmodulo;?>"
                                disabled="disabled"
                                required="required">
                        </section>

                        <section class="textfield">
                            <label for="mod_nome">Nome</label>
                            <input
                                type="text"
                                name="mod_nome"
                                placeholder="<?php echo $listarmodulos['mod_nome'];?>"
                                required="required"
                                disabled>
                        </section>
                        <input type='hidden' name='mod_codigo' value='<?php echo $idmodulo;?>'>
                        <input class="btn-login" type="submit" name="cadastrar" value="Cadastrar">
                    </form>
                    <?php
                        }       
                    ?>
                </section>
            </section>
        </section>
        <?php }elseif($_SESSION['tipo_user'] =='funcionario'){
                $id = $_GET['cur_codigo'];
        ?>
        <section class="card-perfil-aluno">
            <section class="card-nav-bar-perfil-aluno">
                <section class="nav-bar-perfil-aluno">

                    <a href="Visualizar_perfil_aluno.php"><img class="imagem-perfil-aluno" src="fotos/perfis/<?php echo $_SESSION['foto'];?>"></a>
                    <!-- <a href="Visualizar_perfil_professor.php"><img class="imagem-perfil-aluno" src="../../../Images/Interface/thiagao.jpg"></a> -->

                    <h1><?php echo $_SESSION['nome'];?></h1>

                    <ul class="ul-nav-bar-perfil-aluno">
                        <li class="li-nav-bar-perfil-aluno">
                            <a href="Visualizar_perfil_professor.php">
                                <p>
                                    <i class="fa-solid fa-eye"></i>
                                    &nbsp&nbspVisualizar perfil</p>
                            </a>
                        </li>
                        <li class="li-nav-bar-perfil-aluno">
                            <a href="Perfil_professor.php">
                                <p>
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    &nbsp&nbspEditar perfil</p>
                            </a>
                        </li>

                        <li class="li-nav-bar-perfil-aluno">
                            <a href="Cursos_professor.php">
                                <p>
                                    <i class="fa-solid fa-book-open-reader"></i>
                                    &nbsp&nbspMeus Cursos</p>
                            </a>
                        </li>
                        <li class="li-nav-bar-perfil-aluno">
                            <a href="Sair_perfil_professor.php">
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
                            <a href="Excluir_perfil_professor.php">
                                <p>
                                    <i class="fa-solid fa-trash-can"></i>
                                    &nbsp&nbspExcluir conta</p>
                            </a>
                        </li>

                    </ul>
                </section>
            </section>
            <?php
        $query = 'SELECT * FROM modulo WHERE fk_Curso_cur_codigo='.$id.';';
        $exe = mysqli_query($conexao,$query);
        ?>
        <section class="card-exibicao-perfil-aluno">
                <section class="card-login">
                    <h1 class="h1-card-login">Cadastro de módulos</h1>
                    <hr class="hr-card-login">
                    <?php
                        while($listarmodulos = mysqli_fetch_array($exe)){
                          $idmodulo = $listarmodulos['mod_codigo'];
                          ?>
                    <form class="form-login" name="form_modulos" action="insercao_video.php" method="GET">
                        <label class="lbl-h1-title-form-perfil" for="nome_professor">
                            <h1>Informações dos módulos</h1>
                        </label>
                        
                        <section class="textfield">

                            <label for="mod_id">Código</label>
                            <input
                                type="number"
                                name="nome"
                                placeholder="<?php echo $idmodulo;?>"
                                disabled="disabled"
                                required="required">
                        </section>

                        <section class="textfield">
                            <label for="mod_nome">Nome</label>
                            <input
                                type="text"
                                name="mod_nome"
                                placeholder="<?php echo $listarmodulos['mod_nome'];?>"
                                required="required"
                                disabled>
                        </section>
                        <input type='hidden' name='mod_codigo' value='<?php echo $idmodulo;?>'>
                        <input class="btn-login" type="submit" name="cadastrar" value="Cadastrar">
                    </form>
                    <?php
                        }       
                    ?>
                </section>
            </section>
        </section>
    <?php
    }else{
        echo('<script>window.alert("PERMISSÃO NEGADA!");window.location="Home.php";</script>');
    }
/*else{
        echo "Variável não encontrada!";
    }
    unset($_SESSION['idcurso']);*/
?>
    </body>
</html>
</body>
</html>