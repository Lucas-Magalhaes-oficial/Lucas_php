<?php
    // formFornecedorBack.php

    if (
        isset($_POST['textname'])  && isset($_POST['email']) &&
        isset($_POST['cnpj'])      && isset($_POST['telefone']) &&
        isset($_POST['logradouro'])&& isset($_POST['cidade']) &&
        isset($_POST['tipo'])
    ) {
        // Recebe cada campo
        $nome       = $_POST['textname'];
        $email      = $_POST['email'];
        $cnpj       = $_POST['cnpj'];
        $telefone   = $_POST['telefone'];
        $logradouro = $_POST['logradouro'];
        $cidade     = $_POST['cidade'];
        $tipo       = $_POST['tipo'];

        // Exibe os dados
        echo " Recebido o fornecedor: <strong>{$nome}</strong><br>";
        echo " Email: <strong>{$email}</strong><br>";
        echo " CNPJ: <strong>{$cnpj}</strong><br>";
        echo " Telefone: <strong>{$telefone}</strong><br>";
        echo " Logradouro: <strong>{$logradouro}</strong><br>";
        echo " Cidade: <strong>{$cidade}</strong><br>";
        echo " Tipo de Produto: <strong>{$tipo}</strong><br>";
    }
?>
