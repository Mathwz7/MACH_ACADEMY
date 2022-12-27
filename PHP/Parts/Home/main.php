<?php
    session_start();
    include("../Parts/All/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <script src="https://kit.fontawesome.com/e2a21d01bc.js" crossorigin="anonymous"></script>
<body>
    <nav>
        <ul class="menu">

            <li class="li-logo">
                <a href="Home.php">
                    <img class="logo" src="../../Images/Home/Logo_Only.svg" alt="logo">
                </a>
            </li>
           <li class="icones">
                <figure>
                    <a href="Home.php"><img src="https://img.icons8.com/material-rounded/48/000000/home.png"/></a>
                    <figcaption>&nbsp&nbspInício&nbsp&nbsp</figcaption>
                </figure>
            </li>
           <li class="icones">
                <figure>
                    <a href="Catalogo.php"><img src="https://img.icons8.com/material/48/000000/video-gallery.png"/></a>
                    <figcaption>Catálogo</figcaption>
                </figure>
            </li>
            <li class="icones">
                <figure>
                    <a href="Sobre_Nos.php"><img src="https://img.icons8.com/material/48/000000/about-us-male.png"></a>
                    <figcaption>Sobre nós</figcaption>
                </figure>
            </li>

           <section class="barra-pesquisa">

           
            <form action="Pesquisa.php" method="POST">
                <input class="input-pesquisa" type="text" maxlength="25" value="" name="pesquisa">
            </form>
            <?php//
                //$pesquisa = $_POST['pesquisa'];
                //$sql_search = 'select * from cursos where cur_nome like '%"'.$pesquisa.'"%';';
                //$query_search
            ?>
            <!-- <img src="https://img.icons8.com/external-tanah-basah-glyph-tanah-basah/48/000000/external-user-user-tanah-basah-glyph-tanah-basah-4.png"/> -->
            </section>

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
            $_SESSION['foto'] = $id_con1['crc_imagem'];
            $_SESSION['tipo_user'] = "professor";

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
                            $_SESSION['foto'] = $id_con2['fun_imagem'];
                            $_SESSION['tipo_user'] = "funcionario";	

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
                $_SESSION['foto'] = $id_con3['cli_imagem'];
                $_SESSION['tipo_user'] = "cliente";

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
                            $_SESSION['foto'] = $id_con4['int_imagem'];
                            $_SESSION['tipo_user'] = "interprete";
            
			}}}}
                    if($_SESSION['tipo_user'] == "cliente"){
                        ?>
                        <section class="navigation">
                            <section class="userBx">
                                <section class="imgBx">
                                    <img class="profile-image-menu" src="fotos/perfis/<?php echo $_SESSION['foto'];?>">
                                </section>
                                <p class="username"><?php echo $_SESSION['nome'];?></p>
                            </section>
                            <section class="menuToggle"></section>
                            <ul class="menud">
                                <li><a href="Cursos.php"><i class="fa-brands fa-readme"></i>Meus Cursos</a></li>
                                <li><a href="Perfil.php"><i class="fa-solid fa-gear"></i>Configurações</a></li>
                                <li><a href="Sobre_Nos.php"><i class="fa-solid fa-question"></i>Sobre nós</a></li>
                                <li><a href="../Parts/All/destruir.php"><i class="fa-solid fa-right-from-bracket"></i>Sair</a></li>
                            </ul>
                        </section>
                        <?php


                    }else if($_SESSION['tipo_user'] == "professor"){
                        ?>
                        <section class="navigation">
                            <section class="userBx">
                                <section class="imgBx">
                                    <img class="profile-image-menu" src="fotos/perfis/<?php echo $_SESSION['foto'];?>">
                                </section>
                                <p class="username"><?php echo $_SESSION['nome'];?></p>
                            </section>
                            <section class="menuToggle"></section>
                            <ul class="menud">
                                <li><a href="Cursos.php"><i class="fa-brands fa-readme"></i>Meus Cursos</a></li>
                                <li><a href="Insercao_Curso.php"><i class="fa-solid fa-file-arrow-up"></i>Adicionar Curso</a></li>
                                <li><a href="Perfil.php"><i class="fa-solid fa-gear"></i>Configurações</a></li>
                                <li><a href="Sobre_Nos.php"><i class="fa-solid fa-question"></i>Sobre nós</a></li>
                                <li><a href="../Parts/All/destruir.php"><i class="fa-solid fa-right-from-bracket"></i>Sair</a></li>
                            </ul>
                        </section>
                        <?php


                    }else if($_SESSION['tipo_user'] == "interprete"){
                        ?>
                        <section class="navigation">
                            <section class="userBx">
                                <section class="imgBx">
                                    <img class="profile-image-menu" src="fotos/perfis/<?php echo $_SESSION['foto'];?>">
                                </section>
                                <p class="username"><?php echo $_SESSION['nome'];?></p>
                            </section>
                            <section class="menuToggle"></section>
                            <ul class="menud">
                                <li><a href="Cursos.php"><i class="fa-solid fa-hands"></i>Traduzir cursos</a></li>
                                <li><a href="Perfil.php"><i class="fa-solid fa-gear"></i>Configurações</a></li>
                                <li><a href="Sobre_Nos.php"><i class="fa-solid fa-question"></i>Sobre nós</a></li>
                                <li><a href="../Parts/All/destruir.php"><i class="fa-solid fa-right-from-bracket"></i>Sair</a></li>
                            </ul>
                        </section>
                        <?php
                    }else if($_SESSION['tipo_user'] == "funcionario"){
                        ?>
                        <section class="navigation">
                            <section class="userBx">
                                <section class="imgBx">
                                    <img class="profile-image-menu" src="fotos/perfis/<?php echo $_SESSION['foto'];?>">
                                </section>
                                <p class="username"><?php  echo $_SESSION['nome'];?></p>
                            </section>
                            <section class="menuToggle"></section>
                            <ul class="menud">
                                <li><a href="Cursos.php"><i class="fa-brands fa-readme"></i>Ver Cursos</a></li>
                                <li><a href="vercursos.php"><i class="fa-solid fa-hands"></i>Colocar URL</a></li>
                                <li><a href="../Parts/All/destruir.php"><i class="fa-solid fa-right-from-bracket"></i>Sair</a></li>
                            </ul>
                        </section>

                    <?php
                    }
                }else{
            ?>
            <section class="navigation">
                <section class="userBx">
                    <section class="imgBx">
                        <i style="font-size: 2.5em;" class="fa-solid fa-circle-user"></i>
                    </section>
                    <p class="username">Login/Cadastrar</p>
                </section>
                <section class="menuToggle"></section>
                <ul class="menud">
                    <li><a href="Login.php"><i class="fa-solid fa-address-card"></i>Login</a></li>
                    <li><a href="Cards.php"><i class="fa-brands fa-readme"></i>Cadastro</a></li>
                    <li><a href="Sobre_Nos.php"><i class="fa-solid fa-question"></i>Sobre nós</a></li>
                </ul>
            </section>
            <?php
                }
            ?>
            <script>
                let menuToggle = document.querySelector('.menuToggle');
                let navigation = document.querySelector('.navigation');
                menuToggle.onclick = function(){
                    navigation.classList.toggle('active');
                }
            </script>

            </ul>
    </nav>
</body>
</html>
<?php
    //}else{
       // header('location:../Parts/All/destruir.php');
   // }
?>