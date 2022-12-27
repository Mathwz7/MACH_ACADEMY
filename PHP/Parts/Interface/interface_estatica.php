<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../../Css/Interface/interface_logged.css'>
    <script src='main.js'></script>
</head>

<body>
    <header>

    </header>

    <main>
        <section>
            <?php
                $idcurso = $_GET['cur_codigo'];
                $sql ='select * from curso where cur_codigo ='.$idcurso.';';
                $resul = mysqli_query($conexao,$sql);
                $exe = mysqli_fetch_array($resul);

                $sql2 ='select * from modulo where fk_Curso_cur_codigo ='.$idcurso.';';
                $resul2 = mysqli_query($conexao,$sql2);
                
                

            ?>

        </section>
        <section class="card-menu-direita">

            <section class="card">
                <h1 class="h1-conteudo-curso"><?php echo $exe['cur_nome'];?></h1>
                <section class="menu-direita">



                    <input class="modulos" type="checkbox" id="item-1">
                    <section class="aulas-wrapper">
                        <?php while($exe2 = mysqli_fetch_array($resul2)){
                                    $sql3 ='select * from video where fk_Modulo_mod_codigo ='.$exe2['mod_codigo'].';';
                                    $resul3 = mysqli_query($conexao,$sql3);
                                    $teste = explode(("_"),$exe2['mod_nome']);
                                    
                            ?>
                        <label for="item-1">
                            <p class="modulo-title"><?php echo "Módulo ".$teste[1];?></p>
                        </label>
                        <section class="aulas">
                            <?php 
                                $i = 0;
                                while($exe3 = mysqli_fetch_array($resul3)){
                                    
                                    $i++;
                            ?>
                            <ul class="slide-aulas">
                                <li><a class="aula" href="#">
                                        <p class="title-aula"><?php echo "Vídeo ".$i;?></p>
                                    </a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </section>
                        <?php
                            }
                        ?>
                    </section>

                </section>
            </section>
        </section>
        <section class="video-desc">
            <section class="video">
                <section class="videoyoutube">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/1ZTta03ptwM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </section>
            </section>
            
                <section class="card-desc">

                <section class="title-descricao">
               <p> Sobre o curso</p>
              </section>

                    <section class="descricao">
                    <p>
                        <?php
                        $sql = 'select * from curso where cur_codigo='.$idcurso.';';
                        $resul = mysqli_query($conexao,$sql);
                        $exe = mysqli_fetch_array($resul);
                        ?>
                        

                        </p>
                        <!--  <section class="desc-esquerda">
                        <section class="desc-tempo-conclusao">
                            <section class="icons">
                                <img class="icons-descricao" src="../../../Images/Interface/relogio.png">
                                <h1>12H</h1>
                            </section>
                            <p>Para Conclusão</p>
                        </section>
                        <section class="desc-certificado">
                            <section class="icons">
                                <img class="icons-descricao" src="../../../Images/Interface/certificado.png">
                                <h1>Certificado</h1>
                            </section>
                            <p>De conclusão</p>
                        </section>
                    </section>
                    <section class="desc-direita">
                        <section class="desc-avaliacao">
                            <section class="icons">
                                <img class="icons-descricao" src="../../../Images/Interface/estrela.png">
                                <h1>Avaliação</h1>
                            </section>
                            <p>Avaliação</p>
                        </section>
                        <section class="desc-inscritos">
                            <section class="icons">
                                <img class="icons-descricao" src="../../../Images/Interface/pessoas.png">
                                <h1>Inscritos</h1>
                            </section>

                            <p>Nesse curso</p>
                        </section>
                    </section>
 -->
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
                                    src="../../Images/Interface/thiagao.jpg">
                            </section>
                        </section>
                    </section>
                    <section class="text-container">
                        <section class="color">
                            <h3>Thiago Melo</h3>
                            <section>
                                This a demo experiment to skew image container. It looks good.
                            </section>
                        </section>
                        <section class="no-color">
                            <h3>Thiago Melo</h3>
                            <section>
                                This a demo experiment to skew image container. It looks good.
                                This a demo experiment to skew image container. It looks good.
                                This a demo experiment to skew image container. It looks good.
                                This a demo experiment to skew image container. It looks good.
                                This a demo experiment to skew image container. It looks good.
                                This a demo experiment to skew image container. It looks good.
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        
            <section class="interprete">
                <section class="a-box">
                    <section class="img-container">
                        <section class="img-inner">
                            <section class="inner-skew">
                                <img
                                    src="https://media.discordapp.net/attachments/1014305139991007323/1050102892369035274/Design_sem_nome_12.png?width=245&height=225">
                            </section>
                        </section>
                    </section>
                    <section class="text-container">
                        <section class="color">
                            <h3>Roberta Oliveira</h3>
                            <section>
                                This a demo experiment to skew image container. It looks good.
                            </section>
                        </section>
                        <section class="no-color">
                            <h3>Roberta Oliveira</h3>
                            <section>
                                This a demo experiment to skew image container. It looks good.
                                This a demo experiment to skew image container. It looks good.
                                This a demo experiment to skew image container. It looks good.
                                This a demo experiment to skew image container. It looks good.
                                This a demo experiment to skew image container. It looks good.
                                This a demo experiment to skew image container. It looks good.
                            </section>
                        </section>
                    <!-- </section> -->
                <!-- </section> -->
            <!-- </section> -->
                    <!-- </section> -->
                    
        
       



    </main>
    <footer>
    </footer>
</body>

</html>

