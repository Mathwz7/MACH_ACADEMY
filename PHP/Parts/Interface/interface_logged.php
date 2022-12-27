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
                
                $sqlprofessor = 'select * from criador_de_conteudo where crc_codigo ='.$exe['fk_Criador_de_Conteudo_crc_codigo'].';';
                $resulprofessor = mysqli_query($conexao,$sqlprofessor);
                $exeprofessor = mysqli_fetch_array($resulprofessor);

                $sqlinterprete = 'select * from interprete where int_codigo ='.$exe['fk_Interprete_int_codigo'].';';
                $resulinterprete = mysqli_query($conexao,$sqlinterprete);
                $exeinterprete = mysqli_fetch_array($resulinterprete);

            ?>

        </section>
        <section class="card-menu-direita">

            <section class="card">
                <h1 class="h1-conteudo-curso"><?php echo $exe['cur_nome'];?></h1>
                <section class="menu-direita">

                <input class="modulos" type="checkbox" id="item-1">
                <section class="aulas-wrapper">
                    
                        <?php 
                        while($exe2 = mysqli_fetch_array($resul2)){
                                    $sql3 ='select * from video where fk_Modulo_mod_codigo ='.$exe2['mod_codigo'].' and fk_Tipo_de_Video_tiv_codigo = 3;';
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
                                    $_SESSION['url'] = $exe3['vid_url'];
                                    $i++;
                            ?>
                            <ul class="slide-aulas">
                                <li><a class="aula" href="<?php echo $exe3['vid_url'];?>">
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
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/NGFlX2gQGE4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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

                        echo $exe['cur_descricao'];
                        ?>
                        
                        
                        </p>
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
                <!-- </section> -->
            <!-- </section> -->
                    <!-- </section> -->
                    
        
       



    </main>
    <footer>
    </footer>
</body>

</html>

