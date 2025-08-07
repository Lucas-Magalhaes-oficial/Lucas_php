<?php
//configuração do banco de dados
$host = 'localhost';
$dbname = 'bd_imagens';
$user =  'root';
$password = '';

try{
    //conexao com banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //define que erros vão lançar exceções

    //verifica se foi um post e se o arquivo
    if(isset($_GET['id'])){
        $id=$_GET['id']; //obtem o id do funcionario atraves da url

        //recupera os dados do funcionario no banco de dados
        $sql = "SELECT nome, telefone, tipo_foto, foto FROM funcionarios where id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); //vincula o valor do id ao parametro :ID
        $stmt->execute(); //executa a instrução sql


        //verifica se encontrou o funcionario
        if ($stmt->rowCount() > 0){
            // A LINHA ABAIXO BUSCA OS DADOS DOS FUNCIONARIOS COM UM ARRAY ASSOCIATIVO
            $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);

            //verifica se foi solicitado a exclusão do funcionario;
            //linha abaixo verifica se os dados foram enviados via formulario com o metodo post
            //isset verifica se ha um valor definido na variavel
            //verifica se o formulario foi enviado via post e se existe o campo "excluir_id"
            if($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST['excluir_id'])){
                //a linha abaixo pega o valor id que foi enviado pelo formulario(id do funcionario a ser excluido)
                $excluir_id = $_POST['excluir_id'];

                //monta a query sql para deletar o funcionario com o id correspondente
                $sql_excluir = "DELETE FROM funcionarios WHERE id= :id";
                

                //prepara a query para a execução segura evitando sql injection
                $stmt_excluir = $pdo->prepare($sql_excluir);

                // associa o valor ID ao parametro :id na query garantidno que sera tratado com um numero
                $stmt_excluir->bindParam(':id',$excluir_id, PDO:: PARAM_INT);

                //executa a query excluido o funcionario do bd
                $stmt_excluir->execute();

                header("Location: consulta_funcionario.php");
                exit();

            }
        }
        ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>visualizar funcionario</title>
</head>
<body>
    <h1>Dados do funcionario</h1>
    <p>Nome: <?=htmlspecialchars($funcionario['nome'])?></p>
    <p>Telefone: <?=htmlspecialchars($funcionario['telefone'])?></p>
    <p>Foto:</p>
        <img src="data:<?$funcionario['tipo_foto']?>;base64,<?=base64_encode($funcionario['foto'])?>" alt="Foto do Funcionario">

    <!-- formulario para excluir funcionario -->
    <form method="POST">
        <input type="hidden" name="excluir_id" value="<?=$id ?>">
        <button type="submit">Excluir Funcionario</button>
    </form>
</body>
</html>

<?php
    }else{
        echo "Funcionario não encontrado.";
    }

    }else{
        echo "ID do funcionario não foi fornecido.";
    }
catch(PDOExecption $e){
    echo "Erro: ". $e->getMessage();
}
?>