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
        <h1 class="h1-card-login">Pagamento</h1>
        <hr class="hr-card-login">
        <form class="form-login" name="form_perfil" action="#" method="POST">
            <label class="lbl-h1-title-form-perfil" for="nome_cliente">
                <h1>Dados pessoais</h1>
            </label>
            <section>
                <?php
                    include('../Parts/All/conexao.php');
                    $id =  $_GET['id'];
                    $sql = 'select * from cliente where cli_codigo="'.$_SESSION['id'].'";';
                    $resul = mysqli_query($conexao,$sql);
                    $con = mysqli_fetch_array($resul);
                    
                    $sqlcurso = 'select * from curso where cur_codigo ='.$id.';';
                    $resulcurso = mysqli_query($conexao,$sqlcurso);
                    $concurso = mysqli_fetch_array($resulcurso);
                    
                    $sqlprofessor = 'select * from criador_de_conteudo where crc_codigo='.$concurso['fk_Criador_de_Conteudo_crc_codigo'].';';
                    $resulprofessor = mysqli_query($conexao,$sqlprofessor);
                    $conprofessor = mysqli_fetch_array($resulprofessor);
                ?>
            </section>
            <section class="textfield">

                <label for="nome-cliente">Nome</label>
                <input type="text" name="nome" placeholder="<?php echo $con['cli_nome']?>" readonly required>
            </section>
            <label class="lbl-h1-title-form-perfil" for="dados_conta_cliente">
                <h1>Dados da conta</h1>
            </label>
            <section class="textfield">
                <label for="email_usuario">Email:</label>
                <input type="text" name="email" placeholder="<?php echo $con['cli_email']?>" readonly transformrequired>
            </section>
            <!--  <section class="textfield"> 
                        <label for="senha_atual">Digite sua senha atual:</label>
                        <input type="password" name="senha_atual" placeholder="Senha" required>
                   </section> -->
            <label class="lbl-h1-title-form-perfil" for="dados_compra">
                <h1>Dados da compra</h1>
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

                <label for="cartao_cliente">Número do cartão</label>
                <input type="text" name="cartao_cliente" maxlength="16" placeholder="Somente números" required>
            </section>
            <section class="textfield">

                <label for="cartao_cliente_data_expiracao">Data expiração</label>
                <input type="date" name="cartao_cliente_data_expiracao" placeholder="" required>
            </section>

            <section class="textfield">

                <label for="cartao_cliente_cvv">Código CVV</label>
                <input type="text" name="cartao_cliente_cvv" maxlength="3" placeholder="Somente números" required>
            </section>


            <section class="btn-compra">
             <input class = "btn-login" type="submit" name="finalizar" value="Finalizar compra"> 
            </section>
        </form>
    </section>
        <?php
        if(isset($_POST['finalizar'])){
            $hoje = date ('Y/m/d');
            $idcliente = $_SESSION['id'];
            $idcurso = $id;
            $sqlinsercao = 'insert into venda (ven_data,fk_Curso_cur_codigo,fk_Cliente_cli_codigo)values("'.$hoje.'","'.$idcurso.'","'.$idcliente.'");';
            $resul = mysqli_query($conexao,$sqlinsercao);
        
            if($resul){
                echo('<script>window.alert("Compra realizada com sucesso!");window.location="Home.php";</script>');
            }
        }
        ?>
    </section>
</body>

</html>