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
          if($_SESSION['tipo_user'] == 'funcionario'){

          $sql_meucurso = 'select * from curso where cur_aprovado=0;';
          $query_meucurso = mysqli_query($conexao, $sql_meucurso);

          while ($meu = mysqli_fetch_array($query_meucurso)){
          ?>
      <section class="curso-card">
        <section class="curso-image">
          <span class="tag-desconto">16% off</span>
          <?php echo '<img src="fotos/cursos/'.$meu['cur_imagem'].'" class="thumb-curso"/>';?>
          <a href="vermodulos.php?cur_codigo=<?php echo $meu['cur_codigo'];?>"><button class="card-btn">Inserir URL</button></a>
        </section>
        <section class="curso-info">
  
          <h2 class="curso-nome"><?php echo $meu['cur_nome']; ?></h2>
          <p class="curso-descricao"><?php echo $meu['cur_descricao']; ?></p>
        </section>
      </section>
        <?php
        }
      }
?>
</html>