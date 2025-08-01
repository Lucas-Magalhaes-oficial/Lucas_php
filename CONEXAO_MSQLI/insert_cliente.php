<?php
    //inclui o arquivo de conexão com o banco de dados
    require_once "conexao.php";

    //estabelece conexão
    $conexao = conectadb();

    //definição dos valores para inserção
    $nome ="Lucas Magalhães";
    $endereco ="Rua Bungas, 69";
    $telefone ="(41)5657-5785";
    $email = "lucasmagalhaes@teste.com";

    //prepara a consulta sql 'prepare()' para evitar SQL Injection
    $stmt = $conexao->prepare("INSERT INTO cliente (nome, endereco, telefone, email) VALUES (?, ?, ?, ?)");

    //Associa os parâmetros aos valores da consulta
    $stmt->bind_param("ssss", $nome, $endereco, $telefone, $email);

    //executa a inserção
    if($stmt->execute()) {
        echo "Cliente adicionado com sucesso!";
    }else{
        echo "Erro ao adicionar cliente: ".$stmt->error;
    }
    //fecha a consulta e a conexão com o banco de dados
    $stmt->close();
    $conexao->close();
?>