<?php
//definir as credenciais da conexao
$endereco="localhost";
$usuario="root";
$senha="";
$bancoDados="armazena_imagem";

//criando a conexao usando msqli
$conexao= new mysqli($endereco,$usuario,$senha,$bancoDados);

//verificar se houve um erro de conexao
if($conexao->connect_error){
    die("falha na conexao".$conexao->connect_error);
}
?>