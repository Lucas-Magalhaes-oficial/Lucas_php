<?php
    require("conecta.php");

    //obtem o id da imagem de url, garantindo que seja um numero inteiro
    $id_imagem = isset($_GET['id'])? intval($_GET['id']):0;


    //verifica se o id é validor (maior que zero)
    if($id_imagem > 0){
        //criar a query segura usando o prepared statement
        $queryExclusao = "DELETE FROM imagens WHERE codigo = ?";

        //prepara a query
        $stmt = $conexao ->prepare($queryExclusao);
        $stmt->bind_param("i",$id_imagem); //define o id com um inteiro

        //executa a exclusão
        if($stmt -> execute()) {
            echo"imagem excluida com sucesso! ";
        }else{
            die("erro ao excluir a imagem: ".$stmt->error);
        }

        //fecha a consulta
        $stmt->close();
    } else {
        echo "id invalido";
    }

    header("Location :index.php");
    exit();
?>