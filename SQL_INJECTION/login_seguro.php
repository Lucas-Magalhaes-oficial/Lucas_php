<?php
    //configuração do banco de dados
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "empresa_teste";

    //conexão usando MySqli sem proteção contra SQL injection
    $conexao = new mysqli($servidor, $usuario, $senha, $banco);

    //verifica se há erro na conexão
    if($conexao->connect_error){
        die("Erro de conexão: ".$conexao->connect_error);
    }

    //captura os dados do formulário (nome de usuário)
    $nome=$_POST["nome"];

    //prepara a consulta sql segura
    $stmt = $conexao->prepare("SELECT * FROM cliente_teste WHERE nome = ?");
    $stmt->bind_param("s",$nome);
    $stmt->execute();
    $result = $stmt->get_result();

    //verifica se há resultados (se existe o nome informado no banco)
        if($result->num_rows > 0){
            //login bem sucecido e redireciona para área restrita
            header("Location:area_restrita.php");

            //garante que o script pare após redirecionamento
            exit();
        }else{
            echo "nome não encontrado.";
        }
        //fecha a consulta e a conexão
        $stmt->close();
        $conexao->close();
?>