<?php
    //habilita relatorio detalhado de erros no mysqli
    mysqli_report(mysqli_report_error | mysqli_report_strict);

    //MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT

    /**
     * função para conectar ao banco de dados
     * retorna um objeto de conexao mysqli ou interrompe e o script em caso de erro.
    */
    function conectadb() {
        //configuração do banco de dados
        $endereco = "localhost"; //enderço do servidor
        $usuario = "root"; //nome de usuario
        $senha = ""; // senha do banco
        $banco = "empresa" //nome do banco

        try{
            //criação da conexão
            $con = new mysqli($endereco, $usuario, $senha, $banco);
    
            //definição de conjunto de caracteres para evitar problemas de acentuação
    
            $con->set_charset("utf8mb4"); //reorna o objeto de conexão
            return $con;
        }catch (Exception $e) {
            die("Erro na conexão:".$e->getMessage());
        }
    }

    
?>