<?php
include('../Parts/All/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' type='text/css' media='screen'
    href='../../Css/Perfis/Perfil_aluno_style/Meus_cursos-Perfil_Visualizacao_style.css'>



  <title>CURSOS ALUNO</title>
</head>

<body>
  <header>
    <img class="imagem-banner" src="../../Images/Interface/banner.png">
  </header>
  <main>
    <section class="cursos">
      <h2 class="categoria-cursos">Cursos</h2>
      <button class="ant-btn"><i class="fa-solid fa-chevron-right" alt=""></i></button>
      <button class="prox-btn"><i class="fa-solid fa-chevron-right" alt=""></i></button>
      <section class="container-cursos">
        <?php
          if($_SESSION['tipo_user'] == 'cliente'){

          $sql_venda_home = 'select * from venda where fk_Cliente_cli_codigo = "'.$_SESSION['id'].'";';
          $resul_venda = mysqli_query($conexao, $sql_venda_home);
          while($while_venda = mysqli_fetch_array($resul_venda)){

          $sql_meucurso = 'select * from curso where cur_codigo="'.$while_venda['fk_Curso_cur_codigo'].'";';
          $query_meucurso = mysqli_query($conexao, $sql_meucurso);

          while ($meu = mysqli_fetch_array($query_meucurso)){
      ?>
      <section class="curso-card">
        <section class="curso-image">
          <?php echo '<img src="fotos/cursos/'.$meu['cur_imagem'].'" class="thumb-curso"/>';?>
          <a href="interface_curso.php?cur_codigo=<?php echo $meu['cur_codigo'];?>"><button class="card-btn">Assistir</button></a>
        </section>
        <section class="curso-info">
  
          <h2 class="curso-nome"><?php echo $meu['cur_nome']; ?></h2>
          <p class="curso-descricao"><?php echo $meu['cur_descricao']; ?></p>
        </section>
      </section>
        <?php
        }
        }
          }if($_SESSION['tipo_user'] == 'professor'){
            $sql_meucurso = 'select * from curso where fk_Criador_de_conteudo_crc_codigo='.$_SESSION['id'].';';
            $query_meucurso = mysqli_query($conexao, $sql_meucurso);
            while ($while_curso = mysqli_fetch_array($query_meucurso)){
              ?>
              <section class="curso-card">
              <section class="curso-image">
                <?php echo '<img src="fotos/cursos/'.$while_curso['cur_imagem'].'" class="thumb-curso"/>';?>
                <img
                  src="https://images.canaldapeca.com.br/produtos/gg/50/37/tinta-para-piso-fosco-cinza-18l-6553750-1583341303808.jpg"
                  class="thumb-curso"
                  alt=""
                />
                <?php
                  if($_SESSION){
                    $lugar = 'interface_logout.html';
                  }else{
                    $lugar = 'interface_logged.html';
                  }
                ?>
                <a href="vermodulos.php?cur_codigo=<?php echo $while_curso['cur_codigo'];?>"><button class="card-btn">Modificar</button></a>
              </section>
              <section class="curso-info">
                <h2 class="curso-nome"><?php echo $while_curso['cur_nome']; ?></h2>
                <p class="curso-descricao"><?php echo $while_curso['cur_descricao']; ?></p>
              </section>
              </section>
              <?php
            }
          }
          if($_SESSION['tipo_user'] == 'funcionario'){
            $sql_meucurso = 'select * from curso where cur_aprovado = 0;';
            $query_meucurso = mysqli_query($conexao, $sql_meucurso);
            while ($while_curso = mysqli_fetch_array($query_meucurso)){
              ?>
              <section class="curso-card">
              <section class="curso-image">

                <?php echo '<img src="fotos/cursos/'.$while_curso['cur_imagem'].'" class="thumb-curso"/>';?>
                <img
                  src="https://images.canaldapeca.com.br/produtos/gg/50/37/tinta-para-piso-fosco-cinza-18l-6553750-1583341303808.jpg"
                  class="thumb-curso"
                  alt=""
                />
                <?php
                  if($_SESSION){
                    $lugar = 'interface_logout.html';
                  }else{
                    $lugar = 'interface_logged.html';
                  }
                ?>
                <a href="Update.php?cur_codigo=<?php echo $while_curso['cur_codigo'];?>"><button class="card-btn">Aprovar Curso</button></a>
              </section>
              <section class="curso-info">
                <h2 class="curso-nome"><?php echo $while_curso['cur_nome']; ?></h2>
                <p class="curso-descricao"><?php echo $while_curso['cur_descricao']; ?></p>
              </section>
                </section>
              <?php
            }
          
          }
          if($_SESSION['tipo_user'] =='interprete'){
            $sql_meucurso = 'select * from curso WHERE cur_traducao=0 and fk_Interprete_int_codigo=0;';
            $query_meucurso = mysqli_query($conexao, $sql_meucurso);
            while ($while_curso = mysqli_fetch_array($query_meucurso)){
              ?>
              <section class="curso-card">
              <section class="curso-image">
                <?php echo '<img src="fotos/cursos/'.$while_curso['cur_imagem'].'" class="thumb-curso"/>';?>
                <img
                  src="https://images.canaldapeca.com.br/produtos/gg/50/37/tinta-para-piso-fosco-cinza-18l-6553750-1583341303808.jpg"
                  class="thumb-curso"
                  alt=""
                />
                <?php
                  if($_SESSION){
                    $lugar = 'interface_logout.html';
                  }else{
                    $lugar = 'interface_logged.html';
                  }
                ?>
                <a href="Interface_curso.php?cur_codigo=<?php echo $while_curso['cur_codigo'];?>"><button class="card-btn">Ver Curso</button></a>
              </section>
              <section class="curso-info">
                <h2 class="curso-nome"><?php echo $while_curso['cur_nome']; ?></h2>
                <p class="curso-descricao"><?php echo $while_curso['cur_descricao']; ?></p>
               
              </section>
              </section>
              
              <?php
            }
          
          ?>
              
              </section>
              </section>
    

      <section class="cursos">
      <h2 class="categoria-cursos">Meus cursos</h2>
      <button class="ant-btn"><i class="fa-solid fa-chevron-right" alt=""></i></button>
      <button class="prox-btn"><i class="fa-solid fa-chevron-right" alt=""></i></button>
      <section class="container-cursos">

          <?php
              $sql_meucurso = 'select * from curso WHERE fk_Interprete_int_codigo='.$_SESSION['id'].';';
            $query_meucurso = mysqli_query($conexao, $sql_meucurso);
            while ($while_curso = mysqli_fetch_array($query_meucurso)){
              ?>
              <section class="curso-card">
              <section class="curso-image">

                <?php echo '<img src="fotos/cursos/'.$while_curso['cur_imagem'].'" class="thumb-curso"/>';?>
                <img
                  src="https://images.canaldapeca.com.br/produtos/gg/50/37/tinta-para-piso-fosco-cinza-18l-6553750-1583341303808.jpg"
                  class="thumb-curso"
                  alt=""
                />
                <?php
                  if($_SESSION){
                    $lugar = 'interface_logout.html';
                  }else{
                    $lugar = 'interface_logged.html';
                  }
                ?>
                <a href="vermodulos.php?cur_codigo=<?php echo $while_curso['cur_codigo'];?>"><button class="card-btn">Enviar vídeos</button></a>
              </section>
              <section class="curso-info">
                <h2 class="curso-nome"><?php echo $while_curso['cur_nome']; ?></h2>
                <p class="curso-descricao"><?php echo $while_curso['cur_descricao']; ?></p>
              </section>
              </section>

              
              <?php
              }
            }
          
        
          ?>
      
    
      </section>
    </section>
  </main>
  <footer>

  </footer>
</body>

</html>
