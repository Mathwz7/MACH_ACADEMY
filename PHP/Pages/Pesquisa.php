<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include("../Parts/Home/linksCss.html"); ?>
        <title>Pesquisa</title>
    </head>
    <body>
        <Header>
            <?php
                include("../Parts/Home/main.php");
            ?>
        </Header> 
        <main>
        <section class="cursos">
            <h2 class="categoria-cursos">Resultados</h2>
            <button class="ant-btn"><i class="fa-solid fa-chevron-right" alt=""></i></button>
      <button class="prox-btn"><i class="fa-solid fa-chevron-right" alt=""></i></button>
            <section class="container-cursos">
                <?php
                $pesquisa = $_POST['pesquisa'];
                $sql_cursos_home = 'SELECT * from Curso where cur_nome LIKE "%'.$pesquisa.'%";';
                $resul_curso = mysqli_query($conexao,$sql_cursos_home);
                    while ($while_curso = mysqli_fetch_array($resul_curso)){
                    //$porcentagem = $while_curso['cur_preco']/100*50;
                    //$preco_atual = $while_curso['cur_preco'] - $porcentagem;
                ?>
                <section class="curso-card">
                <section class="curso-image">
                  
                    <?php echo '<img src="fotos/cursos/'.$while_curso['cur_imagem'].'" class="thumb-curso"/>';?>
                    <a href="Interface_curso.php?id=<?php echo $while_curso['cur_codigo'];?>"><button class="card-btn">Comprar</button></a>
                </section>
                <section class="curso-info">
                    <h2 class="curso-nome"><?php echo $while_curso['cur_nome']; ?></h2>
                    <p class="curso-descricao"><?php echo $while_curso['cur_descricao']; ?></p>
                    <span class="preco-atual">R$<?php  echo $while_curso['cur_preco']; ?></span>
                </section>
                </section>
            <?php
              }
           ?>
      </section>
    </section>
        </main>
        <footer>
            <?php
                include("../Parts/Home/linksJs.html");
            ?>
        </footer>
    </body>
</html>