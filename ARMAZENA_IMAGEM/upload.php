<?php
require_once("conecta.php");

//OBTEM OS DADOS ENVIADOS PELO FORMULARIO
$evento = $_POST['evento'];
$descricao = $_POST['descricao'];
$imagem = $_FILES['imagem']['tmp_name'];
$tamanho = $_FILES['imagem']['size'];
$tipo = $_FILES['imagem']['type'];
$nome = $_FILES['imagem']['name'];

//verifica se o arquivo foi enviado corretamente
if(!empty($imagem) && $tamanho>0){
    //le o conteudo do arquivo
    $fp = fopen($imagem,'rb');
    $conteudo = fread($fp, filesize($imagem));
    fclose($fp);

    //Protege contra problemas de caracteres no SQL
    $conteudo = mysqli_real_escape_string($conexao, $conteudo);

    $queryInsercao = "INSERT INTO imagens (evento, descricao, nome_imagem, tamanho_imagem, tipo_imagem, imagem) VALUES ('$evento', '$descricao', '$nome', '$tamanho', '$tipo', '$conteudo')";
    $resultado = mysqli_query($conexao, $queryInsercao);

    //verifica se a inserção foi bem sucedida
    if($resultado) {
        echo "Registro inserido com sucesso!";
        header('location: index.php');
        exit();
    } else {
        die("Erro ao armazenar imagem: " . mysqli_error($conexao));
    }
} else {
    echo "Erro: Nenhuma imagem foi enviada";
}
?>