<?php
include('../Parts/All/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='../../Css/Perfis/Perfil_aluno_style/EXCLUIR_SAIR.css'>
    <script src="https://kit.fontawesome.com/e2a21d01bc.js" crossorigin="anonymous"></script>
    <title>Excluir</title>
</head>

<body>

    <section class="card-perfil-aluno">
        <section class="nav-bar-perfil-aluno-excluir">
        <?php echo '<a href="Visualizar_perfil.php"><img class="imagem-perfil-aluno"
                    src="fotos/perfis/'.$_SESSION['foto'].'"></a>';?>

            <h1><?php echo $_SESSION['nome'];?></h1>

            <ul class="ul-nav-bar-perfil-aluno-excluir">
               
                <li class="li-nav-bar-perfil-aluno-excluir">
                    <a href="Perfil.php">
                        <p> <i class="fa-solid fa-pen-to-square"></i> &nbsp&nbspEditar perfil</p>
                    </a>
                </li>

                <li class="li-nav-bar-perfil-aluno-excluir">
                    <a href="Cursos.php">
                        <p><i class="fa-solid fa-book-open-reader"></i> &nbsp&nbspMeus Cursos</p>
                    </a>
                </li>
                <li class="li-nav-bar-perfil-aluno-excluir">
                    <a href="Sair_perfil.php">
                        <p><i class="fa-solid fa-right-from-bracket"></i> &nbsp&nbspSair</p>
                    </a>
                </li>
                <li class="li-nav-bar-perfil-aluno-excluir">
                    <a href="Excluir_perfil.php">
                        <p> <i class="fa-solid fa-trash-can"></i> &nbsp&nbspExcluir conta</p>
                    </a>
                </li>

            </ul>
        </section>
        <section class="card-exibicao-perfil-aluno">
            <section class="card-excluir-perfil">
                <form name="form_excluir_perfil_aluno" action="#" method="POST">
                    <p>Você tem certeza que deseja excluir permanentemente sua conta?<i
                            class="fa-solid fa-face-sad-cry"></i></p> <br>
                    <?php
                        if($_SESSION['tipo_user'] =="professor"){
                    ?>
                    <h1>Sua conta não pode ser deletada!</h1>
                    <?php
                        }
                    ?>
                    <input class="btn-login" type="submit" name="excluir" value="Excluir">
                </form>
            </section>
        </section>
    </section>
    <main>
        <?php
                    if(isset($_POST["excluir"])){

                        if($_SESSION['tipo_user'] == "cliente"){

                        $codigo = $_SESSION['id'];
                            $sqlexcluir = 'delete from cliente where cli_codigo = "'.$codigo.'";';
                            $resulexclusao = mysqli_query($conexao,$sqlexcluir);
                            if($resulexclusao){
                                unset($_SESSION['id']);

                                echo('<script>window.alert("USUÁRIO DELETADO COM SUCESSO");window.location="Home.php";</script>');  
                            }

                        }else if($_SESSION['tipo_user'] == "interprete"){

                        $codigo = $_SESSION['id'];
                            $sqlexcluir = 'delete from interprete where int_codigo = "'.$codigo.'";';
                            $resulexclusao = mysqli_query($conexao,$sqlexcluir);
                            if($resulexclusao){
                                unset($_SESSION['id']);

                                echo('<script>window.alert("USUÁRIO DELETADO COM SUCESSO");window.location="Home.php";</script>');  
                            }
                        }else if($_SESSION['tipo_user'] == "professor"){
                            
                        $codigo = $_SESSION['id'];
                            $sqlexcluir = 'delete from criador_de_conteudo where crc_codigo = "'.$codigo.'";';
                            $resulexclusao = mysqli_query($conexao,$sqlexcluir);
                            if($resulexclusao){
                                unset($_SESSION['id']);

                                echo('<script>window.alert("USUÁRIO DELETADO COM SUCESSO");window.location="Home.php";</script>');  
                            }          
                        }                            
                    }
                //}
            ?>
    </main>
</body>

</html>

                