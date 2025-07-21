<?php
    $bdServidor = '127.0.0.1';
    $bdUsuario = 'root';
    $bdSenha = 'root';
    $bdBanco = 'lucas_magalhaes';
    $conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);
        if (mysqli_connect_errno()) {
            echo "Problemas para conectar no banco. Verifique os dados informados.";
            die();
        }
?>