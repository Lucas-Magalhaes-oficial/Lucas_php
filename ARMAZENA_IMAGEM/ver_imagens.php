<?php
    error_reporting(E_ALL);
    ini_set('display_erros',1);
    ob_clean(); //Limpa qualquer saida inesperada antes do header 

    //inclui a conexao com banco de dados
    require("conecta.php");

    //obtem o id da imagem da url, garantindo que seja numero inteiro
    $id_imagem = isset($_GET['id'])? intval($_GET['id']):0;

    //cria a consulta para buscar a imagem no banco de dados
    $querySelecionaPorCodigo = "SELECT imagem, tipo_imagem FROM imagens WHERE codigo = ?";

    //usa prepared statement para maior segurança
    $stmt = $conexao->prepare($querySelecionaPorCodigo);
    $stmt->bind_param("i",$id_imagem);
    $stmt->execute();
    $resultado=$stmt->get_result();

    //verifica se a imagem existe no banco de dados
    if($resultado->num_rows > 0){
        $imagem = $resultado->fetch_object();


        //define o tipo correto da imagem(fallback para jpeg caso esteja vazio)
        $tipoImagem = !empty($imagem->tipo_imagem)? $imagem->tipo_imagem :"imagem/jpeg";
        header("content-type: ".$tipoImagem);

        //exibe a imagem armazenada no banco de dados
        echo $imagem->imagem;
    } else{
        echo "Imagem não encontrada";
    }

    //fecha a consulta
    $stmt->close();
?>