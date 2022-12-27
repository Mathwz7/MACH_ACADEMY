<!DOCTYPE html>
<html>

    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Page Title</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='../../../Css/Interface/interface_logout.css'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src='main.js'></script>
    </head>

    <body>
        <header>
            <img class="imagem-banner" src="../../Images/Interface/banner.png">
        </header>

        <main>
            <?php
                if(!empty($_GET['cur_codigo'])){
                $id = $_GET['cur_codigo'];

                $sql ='select * from curso where cur_codigo ='.$id.';';
                $resul = mysqli_query($conexao,$sql);
                $exe = mysqli_fetch_array($resul);
                $sqlprofessor = 'select * from criador_de_conteudo where crc_codigo ='.$exe['fk_Criador_de_Conteudo_crc_codigo'].';';
                $resulprofessor = mysqli_query($conexao,$sqlprofessor);
                $exeprofessor = mysqli_fetch_array($resulprofessor);

                $sqlinterprete = 'select * from interprete where int_codigo ='.$exe['fk_Interprete_int_codigo'].';';
                $resulinterprete = mysqli_query($conexao,$sqlinterprete);
                $exeinterprete = mysqli_fetch_array($resulinterprete);

                $sql ='select * from curso where cur_codigo = '.$id.';';
                $resul = mysqli_query($conexao,$sql);
                $linhas = mysqli_num_rows($resul);
                $con = mysqli_fetch_array($resul);
                if($linhas!=0){   
            ?>
            <section class="card-menu-direita">
                <section class="card">
                <h2 class="curso-nome"><?php echo $con['cur_nome']; ?></h2>
                    <?php echo '<img  src="fotos/cursos/'.$con['cur_imagem'].'"class="capa-video"/>';?>
                    <section class="menu-direita">
                        <ul class="icons-curso">
                            <li class="li-img-cursos"> <i class="large material-icons">school</i>
                                <p class="paraf">Certificado de conclusão</p>
                            </li>
                            <li class="li-img-cursos"> <i class="large material-icons">star_half</i>
                                <p class="paraf"> 9.8 classificação</p>
                            </li>
                            <li class="li-img-cursos"> <i class="large material-icons">star_half</i>
                                <p class="paraf"> Carga Horária: 3 horas</p>
                            </li>
                            <li class="li-img-cursos"> <i class="large material-icons">work</i>
                                <p class="paraf">20% começaram uma nova carreira após concluir o curso</p>
                            </li>
                            <li class="li-img-cursos"> <i class="large material-icons">trending_up</i>
                                <p class="paraf">30% teve vantagens significativas na carreira com o curso</p>
                            </li>

                        </ul>
    <section class="compra">
        <section class="valor-exibicao">
            <h1><?php echo "R$ ".$con['cur_preco'];?></h1>
        </section>
        <!-- <a href="Interface_curso.php?id=<?php echo $while_curso['cur_codigo'];?>"><button class="card-btn">Comprar</button></a> -->

        <?php
        if(empty($_SESSION['id'])){
            ?>
                <a class ="link" href="Login.php"> <button class="btn-comprar"> <h2>Comprar</h2></a></button>
            <?php
        }else if($_SESSION['tipo_user'] == "cliente"){
            ?>
                <a class ="link" href="Pagamento.php?id=<?php echo $id;?>"> <button class="btn-comprar"> <h2>Comprar</h2></a></button>
            <?php
        }else if($_SESSION['tipo_user'] == "interprete"){
            ?>
        <a class ="link" href="Confirmar.php?id=<?php echo $id;?>"> <button class="btn-comprar"> <h2>Traduzir</h2></a></button>
        <?php
        }
        ?>
    </section>

                    </section>
                </section>
            </section>
            </section>
            <section class="video-desc">
                <section class="video">
                    <section class="videoyoutube">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/NGFlX2gQGE4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </section>
                </section>

                <section class="card-desc">

                    <section class="title-descricao">
                        <p> Sobre o curso</p>
                    </section>

                    <section class="descricao">


                        <p><?php echo $con['cur_descricao'];?></p>
                       
                    </section>

                </section>

            </section>
            <section class="background-professor">
            <section class="professor">
                <section class="a-box">
                    <section class="img-container">
                        <section class="img-inner">
                            <section class="inner-skew">
                                <img 
                                src="fotos/perfis/<?php echo $exeprofessor['crc_imagem'];?>">
                            </section>
                        </section>
                    </section>
                    <section class="text-container">
                        <section class="color">
                            <h3><?php echo $exeprofessor['crc_nome'];?></h3>
                        </section>
                        <section class="no-color">
                            <h3><?php echo $exeprofessor['crc_nome'];?></h3>
                            <section>
                                Contato:<?php echo $exeprofessor['crc_email'];?>
                            </section>
                        </section>
                    </section>
                </section>
            </section>

            <?php if(!empty($exeinterprete['int_codigo'])){?>

            <section class="interprete">
                <section class="a-box">
                    <section class="img-container">
                        <section class="img-inner">
                            <section class="inner-skew">
                                <img
                                src="fotos/perfis/<?php echo $exeinterprete['int_imagem'];?>">
                            </section>
                        </section>
                    </section>
                    <section class="text-container">
                        <section class="color">
                        <h3><?php echo $exeinterprete['int_nome'];?></h3>
                        </section>
                        <section class="no-color">
                        <h3><?php echo $exeinterprete['int_nome'];?></h3>
                            <section>
                            Contato:<?php echo $exeinterprete['int_email'];?>
                            </section>
                        </section>
                    </section> 
                </section> 
             </section> 
            </section> 
            <?php 
                }else{
            ?>
                <section class="interprete">
                <section class="a-box">
                    <section class="img-container">
                        <section class="img-inner">
                            <section class="inner-skew">
                                <img
                                src="fotos/perfis/<?php echo $exeinterprete['int_imagem'];?>">
                            </section>
                        </section>
                    </section>
                    <section class="text-container">
                        <section class="color">
                        <h3><?php echo "Venha trabalhar conosco!";?></h3>
                        </section>
                        <section class="no-color">
                        <h3><?php  echo "Seja um intérprete";?></h3>
                            <section>
                            <?php echo "A Mach Academy te espera!";?>
                            </section>
                        </section>
                    </section> 
                </section> 
             </section> 
            </section> 
            <?php
                }
            ?>
            
            <section class="avaliacao">

                <h1>Avaliações de quem já <br>voou com a gente</h1>
                <img class="animation-avaliacao" src="../../Images/Interface/career-progress-animate.svg">
            </section>
    <section class="avaliacoes">
            <ul class="slider-avaliacao">
                <li>
                    <input type="radio" id="slide1" name="slide" checked>
                    <label class="nav-bar-avaliacao" for="slide1"></label>
        
                    <section class="card-profissionais">
                        <section class="card-profissional-image">
                            <h1 class="h1-card-profissionais">Beatriz Souza</h1>
                            <a href=""><img class="profile-image" src="../../Images/Interface/beatriz.jpeg"></a>
                        </section>
                        <section class="card-profissional-desc">
                            <p class="p-card-profissional-desc">Finalmente encontrei esse curso, professor com uma ótima
                                didática</p>
                        </section>
                    </section>
        
                </li>
                <li>
                    <input type="radio" id="slide2" name="slide">
                    <label class="nav-bar-avaliacao" for="slide2"></label>
        
                    <section class="card-profissionais">
                        <section class="card-profissional-image">
                            <h1 class="h1-card-profissionais">Maria Antônia</h1>
                            <a href=""><img class="profile-image" src="../../Images/Interface/maria.jpeg"></a>
                        </section>
                        <section class="card-profissional-desc">
                            <p class="p-card-profissional-desc">Agora posso dizer: estou preparada pra trabalhar com algo que gosto. Gratidão por esse curso maravilhoso!</p>
                        </section>
                    </section>
        
                </li>
                <li>
                    <input type="radio" id="slide3" name="slide">
                    <label class="nav-bar-avaliacao" for="slide3"></label>
        
                    <section class="card-profissionais">
                        <section class="card-profissional-image">
                            <h1 class="h1-card-profissionais">Paulo Henrique</h1>
                            <a href=""><img class="profile-image" src="../../Images/Interface/paulo.jpeg"></a>
                        </section>
                        <section class="card-profissional-desc">
                            <p class="p-card-profissional-desc">Me abriu muitas portas, curso extremamente completo com um ótimo professor!</p>
                        </section>
                    </section>
        
                </li>
            </ul>
        </section>
        </main>
        <footer>
            <?php
                }else{
                    echo('<script>window.alert("ID inexistente!");window.location="Home.php";</script>');
                }
            }else{
                echo ('<script>window.alert("Variável vazia!");window.location="Home.php";</script>');
            }
            ?>
        </footer>
    </body>
</html>
