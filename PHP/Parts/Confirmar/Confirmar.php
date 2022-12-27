<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e2a21d01bc.js" crossorigin="anonymous"></script>
    <title>Pagamento</title>
</head>

<body>
    <section class="card-login">
        <h1 class="h1-card-login">Confirmar</h1>
        <hr class="hr-card-login">
        <form class="form-login" name="form_perfil" action="#" method="POST">
            <label class="lbl-h1-title-form-perfil" for="nome_cliente">
                <h1>Dados pessoais</h1>
            </label>
            <section>
                <?php
                    include('../Parts/All/conexao.php');
                    $id =  $_GET['id'];
                    $sql = 'select * from interprete where int_codigo="'.$_SESSION['id'].'";';
                    $resul = mysqli_query($conexao,$sql);
                    $con = mysqli_fetch_array($resul);
                    
                    $sqlcurso = 'select * from curso where cur_codigo ='.$id.';';
                    $resulcurso = mysqli_query($conexao,$sqlcurso);
                    $concurso = mysqli_fetch_array($resulcurso);
                    $valor = ($concurso['cur_preco']*0.20);
                    
                    $sqlprofessor = 'select * from criador_de_conteudo where crc_codigo='.$concurso['fk_Criador_de_Conteudo_crc_codigo'].';';
                    $resulprofessor = mysqli_query($conexao,$sqlprofessor);
                    $conprofessor = mysqli_fetch_array($resulprofessor);
                ?>
            </section>
            <section class="textfield">

                <label for="nome-cliente">Nome</label>
                <input type="text" name="nome" placeholder="<?php echo $con['int_nome']?>" readonly required>
            </section>
            <label class="lbl-h1-title-form-perfil" for="dados_conta_cliente">
                <h1>Dados da conta</h1>
            </label>
            <section class="textfield">
                <label for="email_usuario">Email:</label>
                <input type="text" name="email" placeholder="<?php echo $con['int_email']?>" readonly transformrequired>
            </section>
            <!--  <section class="textfield"> 
                        <label for="senha_atual">Digite sua senha atual:</label>
                        <input type="password" name="senha_atual" placeholder="Senha" required>
                   </section> -->
            <label class="lbl-h1-title-form-perfil" for="dados_compra">
                <h1>Dados do curso</h1>
            </label>
            <section class="textfield">

                <label for="nome_curso">Curso</label>
                <input type="text" name="nome_curso" placeholder="<?php echo $concurso['cur_nome']?>" readonly disabled required>
            </section>


            <section class="textfield">
                <label for="descricao_venda_curso">Descrição</label>

                <textarea name="descricao_venda_curso" readonly disabled id="descricao_venda_curso"
                    class="textarea-descricao-venda" maxlength="300" placeholder="<?php echo $concurso['cur_descricao']?>"></textarea>
            </section>

            <section class="textfield">

                <label for="valor_curso">Valor</label>
                <input type="decimal" name="valor_curso" readonly placeholder="<?php echo $concurso['cur_preco']?>" disabled required>
            </section>

            <section class="textfield">

                <label for="cartao_cliente">Valor da tradução</label>
                <input type="text" name="valor_traducao" readonly placeholder="<?php echo $valor?>" disabled required>
            </section>
            <section class="btn-compra">
             <input class = "btn-login" type="submit" name="finalizar" value="Confirmar"> 
            </section>
        </form>
    </section>
        <?php
        if(isset($_POST['finalizar'])){
            $idcurso = $id;
            $update = 'update curso set fk_Interprete_int_codigo = '.$_SESSION['id'].' where cur_codigo='.$id.';';
            $resul = mysqli_query($conexao,$update);
        
            if($resul){
                echo('<script>window.alert("Confirmação realizada! Aguarde retorno!");window.location="Home.php";</script>');
            }
        }
        ?>
    </section>
</body>

</html>