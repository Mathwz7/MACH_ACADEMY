
<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='../../Css/Perfis/Perfil_aluno_style/EXCLUIR_SAIR.css'>
    <script src="https://kit.fontawesome.com/e2a21d01bc.js" crossorigin="anonymous"></script>
    <title>Sair</title>
</head>

<body>
    <?php 
    ?>
    <section class="card-perfil-aluno">
        <section class="nav-bar-perfil-aluno-sair">
        <a href="Visualizar_perfil.php"><img class="imagem-perfil-aluno" src="fotos/perfis/<?php echo $_SESSION['foto'];?>"></a>

            <h1><?php echo $_SESSION['nome'];?></h1>

            <ul class="ul-nav-bar-perfil-aluno-sair">
            
                <li class="li-nav-bar-perfil-aluno-sair">
                    <a href="Perfil.php">
                        <p> <i class="fa-solid fa-pen-to-square"></i> &nbsp&nbspEditar perfil</p>
                    </a>
                </li>

                <li class="li-nav-bar-perfil-aluno-sair">
                    <a href="Cursos.php">
                        <p><i class="fa-solid fa-book-open-reader"></i> &nbsp&nbspMeus Cursos</p>
                    </a>
                </li>
                
                <li class="li-nav-bar-perfil-aluno-sair">
                    <a href="Sair_perfil.php">
                        <p><i class="fa-solid fa-right-from-bracket"></i> &nbsp&nbspSair</p>
                    </a>
                </li>
                <li class="li-nav-bar-perfil-aluno-sair">
                    <a href="Excluir_perfil.php">
                        <p> <i class="fa-solid fa-trash-can"></i> &nbsp&nbspExcluir conta</p>
                    </a>
                </li>

            </ul>
        </section>
        <section class="card-exibicao-perfil-aluno">
            <section class="card-sair-perfil">
                <form name="form_excluir_perfil_aluno" action="../Parts/All/destruir.php" method="POST">
                    <p>Você tem certeza que deseja sair? <i class="fa-solid fa-face-tired"></i></p>
                    <h1>Até breve... </h1>
                    <input class="btn-login-sair" type="submit" name="sair" value="Sair">
                </form>
            </section>
        </section>
    </section>
</body>

</html>