<!DOCTYPE html>
<html lang="pt-br">
  <body>
    <section class="cursos">
      <h2 class="categoria-cursos">Mais vendidos</h2>
      <button class="prox-btn"><i alt="" class="fa-solid fa-chevron-right"></i></button>
      <button class="ant-btn"><i alt="" class="fa-solid fa-chevron-right"></i></button>
      <section class="container-cursos">
        <?php
          $sql_cursos_catalogo = 'select * from Curso where fk_Tipo_de_Curso_tic_codigo="1" and cur_aprovado = "1"and cur_traducao ="1";';
          $resul_curso = mysqli_query($conexao,$sql_cursos_catalogo);
            while ($while_curso = mysqli_fetch_array($resul_curso)){
              $porcentagem = $while_curso['cur_preco']/100*16;
              $preco_atual = $while_curso['cur_preco'] - $porcentagem;
        ?>
        <section class="curso-card">
          <section class="curso-image">
            <?php echo '<img src="fotos/cursos/'.$while_curso['cur_imagem'].'" class="thumb-curso"/>';?>
            <a href="Interface_curso.php?cur_codigo=<?php echo $while_curso['cur_codigo'];?>"><button class="card-btn">Comprar</button></a>
            
          </section>
          <section class="curso-info">
            <h2 class="curso-nome"><?php echo $while_curso['cur_nome']; ?></h2>
            <p class="curso-descricao"><?php echo $while_curso['cur_descricao']; ?></p>
            <span class="preco-atual">R$<?php echo $while_curso['cur_preco']; ?></span>
          </section>
        </section>
        <?php
            }
        ?>    
      </section>
    </section>

    <section class="cursos">
      <h2 class="categoria-cursos">Adicionados Recentemente</h2>
      <button class="prox-btn"><i alt="" class="fa-solid fa-chevron-right"></i></button>
      <button class="ant-btn"><i alt="" class="fa-solid fa-chevron-right"></i></button>
      <section class="container-cursos">
        <?php
          $sql_cursos_catalogo = 'select * from curso where cur_aprovado = 1 order by cur_codigo desc ;';
          $resul_curso = mysqli_query($conexao,$sql_cursos_catalogo);
            while ($while_curso = mysqli_fetch_array($resul_curso)){
              $porcentagem = $while_curso['cur_preco']/100*16;
              $preco_atual = $while_curso['cur_preco'] - $porcentagem;
        ?>
        <section class="curso-card">
          <section class="curso-image">
            <?php echo '<img src="fotos/cursos/'.$while_curso['cur_imagem'].'" class="thumb-curso"/>';?>
             <a href="Interface_curso.php?cur_codigo=<?php echo $while_curso['cur_codigo'];?>"><button class="card-btn">Comprar</button></a>
          </section>
          <section class="curso-info">
            <h2 class="curso-nome"><?php echo $while_curso['cur_nome']; ?></h2>
            <p class="curso-descricao"><?php echo $while_curso['cur_descricao']; ?></p>
            <span class="preco-atual">R$<?php echo $while_curso['cur_preco']; ?></span>
          </section>
        </section>
        <?php
            }
        ?>  
      </section>
    </section>
        
        

    <section class="cursos">
      <h2 class="categoria-cursos">Promoções</h2>
      <button class="prox-btn"><i alt="" class="fa-solid fa-chevron-right"></i></button>
      <button class="ant-btn"><i alt="" class="fa-solid fa-chevron-right"></i></button>
      <section class="container-cursos">
        <?php
          $sql_cursos_catalogo = 'select * from Curso where fk_Tipo_de_Curso_tic_codigo="3" and cur_aprovado = "1"and cur_traducao ="1";';
          $resul_curso = mysqli_query($conexao,$sql_cursos_catalogo);
            while ($while_curso = mysqli_fetch_array($resul_curso)){
              $porcentagem = $while_curso['cur_preco']/100*16;
              $preco_atual = $while_curso['cur_preco'] - $porcentagem;
        ?>
        <section class="curso-card">
          <section class="curso-image">
            <?php echo '<img src="fotos/cursos/'.$while_curso['cur_imagem'].'" class="thumb-curso"/>';?>
            <a href="Interface_curso.php?cur_codigo=<?php echo $while_curso['cur_codigo'];?>"><button class="card-btn">Comprar</button></a>
          </section>
          <section class="curso-info">
            <h2 class="curso-nome"><?php echo $while_curso['cur_nome']; ?></h2>
            <p class="curso-descricao"><?php echo $while_curso['cur_descricao']; ?></p>
            <span class="preco-atual">R$<?php echo $preco_atual; ?></span>
          </section>
        </section>
        <?php
            }
        ?>  
      </section>
    </section>
  </body>
</html>

