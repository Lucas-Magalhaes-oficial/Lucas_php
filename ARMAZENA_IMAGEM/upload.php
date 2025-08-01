<?php
    require_once('conecta.php');

    //obtem os dados enviados pelo formulario
    $evento=$_POST['evento'];
    $descricao=$_POST['descricao'];
    $imagem=$_FILES['imagem']['tmp_name'];
    $imagem=$_FILES['imagem']['size'];
    $imagem=$_FILES['imagem']['type'];
    $nome=$_FILES['imagem']['name'];


    //verifica se o arquivo foi enviado corretamente
    if(!empty($imagem)&& $tamanho>0){
        //le o conteudo do arquivo
        $fp = fopen($imagem, "rb");
        $conteudo = fread($fp,filesize((imagem)));
        fclose($fp);

        //protege contra problemas de caracteres no sql
        $conteudo-mysqli_real_escape_string($conexai,$conteudo);
        $queryInsercao = "INSERT INTO tabela_imagens(evento,descricao,nome_imagem,tamanho_imagem,tipo_imagem,imagem) values('$evento','$descricao','$nome','$tamanho','$tipo','$conteudo')";
        $resultado=mysqli_query($conexao,$queryInsercao);

        //verifica se a insercao foi bem sucedida
        if($resultado){
            echo 'Registro inserido com sucesso!';
            header('Location: index.php');
            exit();
        }else{
            die("Erro ao inserir no banco: ".mysqli_error($conexao));
        }
    }else{
        echo"erro: nenhuma imagem foi enviada";
    }
?>