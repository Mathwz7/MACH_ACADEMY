<?php
if(isset($_POST['enviarvideo'])){
            $idmodulo = $_POST['idmodulo'];
            echo $nomemodulo.'<br><br><br><br><br>';
            $video = $_FILES['videoteste'];
            $idmodulo = $_POST['idmodulo'];
            $tipo = $_POST['tipo_de_video'];
            //$url = $_POST['url'];
            $resultadonome = $_POST['nomecurso'];
            $nomevideo = $_POST['nomevideo'];
            switch($tipo){
                case '1':
                    $tipo_valor = 1;
                    $tipo_nome = 'semtraducao';
                break;
                case '2':
                    $tipo_valor = 2;
                    $tipo_nome = 'datraducao';
                break;
                case '3':
                    $tipo_valor = 3;
                    $tipo_nome = 'traduzido';
                break;
                default:
                    $tipo_valor = 0;
            }
                $extensao = explode('.',$video['name']);
                /*md5 gera uma rash de 32 caracteres, facilitando a manutenção do banco*/
                /*a função uniqid pega o tempo atual em MILISEGUNDOS e gera uma identificação única*/
                if($extensao[1]!='mp4'){
                    echo('<script>window.alert("Não é uma imagem!");window.location="Insercao_Video.php";</script>');
                }
                preg_match("/\.(mp4){1}$/i", $video["name"], $ext);
                $nome_video = md5(uniqid(time())).$tipo_nome.'.'.$ext[1];
                //$nome_do_curso = $resultadonome.$id;
                /*echo $resultadonome.'<br>';
                echo $idmodulo.'<br>';
                echo $nome_video.'<br>';
                echo $nomemodulo.'<br>';*/
                $teste = explode("_",$nomemodulo);
                //echo $teste[1].'<br>';
                echo $teste[0].'<br><br>';

                $caminho_video = 'documentos/'.$resultadonome.$_SESSION['id'].'/modulo_'.$teste[1].'crc_codigo'.$_SESSION['id'].'/'.$nome_video;
                //$caminho_video = '../Parts/'.$nome_video;
                var_dump($caminho_video);
                move_uploaded_file($video["tmp_name"], $caminho_video);
                

                $query = 'insert into video (vid_nome, fk_Tipo_de_Video_tiv_codigo,fk_Modulo_mod_codigo) values("'.$nome_video.'","'.$tipo.'","'.$idmodulo.'");';
                $exe = mysqli_query($conexao,$query);


                if($exe){
                    //echo('<script>window.alert("Upload feito com sucesso");window.location="Insercao_Video.php?id='.$idcurso.'";</script>');
                }     
    }
?>





<?php //echo('<script>window.alert("Módulo atualizado com sucesso!");window.location="vermodulos.php?cur_codigo='.$idcurso.'</script>'); ?>