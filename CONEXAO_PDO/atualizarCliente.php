<?php
require_once 'conexao.php';

$conexao = conectarBanco();

$idCliente = $_GET['id'] ?? null;
$cliente = null;
$msgErro = "";

// Função para buscar cliente por ID
function buscarClientePorID($idCliente, $conexao) {
    $stmt = $conexao->prepare("SELECT id_cliente, nome, endereco, telefone, email FROM cliente WHERE id_cliente = :id");
    $stmt->bindParam(":id", $idCliente, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(); // retorna array ou false
}

if ($idCliente && is_numeric($idCliente)) {
    $cliente = buscarClientePorID($idCliente, $conexao);
    if (!$cliente) {
        $msgErro = "Erro: Cliente não encontrado.";
    }
} elseif ($idCliente !== null) {
    $msgErro = "Digite um ID válido para buscar os dados.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Cliente</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function habilitarEdicao(campo){
            document.getElementById(campo).removeAttribute("readonly");
        }
    </script>
</head>
<body>
    <h2>Atualizar Cliente</h2>

    <!-- Campo de busca (sempre aparece) -->
    <form action="atualizarCliente.php" method="GET">
        <label for="id">ID do Cliente:</label>
        <input type="text" name="id" id="id" required>
        <button type="submit">Buscar</button>
    </form>

    <!-- Mensagem de erro -->
    <?php if ($msgErro): ?>
        <p style="color:red;"><?= htmlspecialchars($msgErro) ?></p>
    <?php endif; ?>

    <!-- Formulário de atualização (só aparece se cliente for encontrado) -->
    <?php if ($cliente): ?>
        <form action="processarAtualizacao.php" method="POST">
            <input type="hidden" name="id_cliente" value="<?= htmlspecialchars($cliente['id_cliente']) ?>">

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" readonly onclick="habilitarEdicao('nome')">

            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" value="<?= htmlspecialchars($cliente['endereco']) ?>" readonly onclick="habilitarEdicao('endereco')">

            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="<?= htmlspecialchars($cliente['telefone']) ?>" readonly onclick="habilitarEdicao('telefone')">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($cliente['email']) ?>" readonly onclick="habilitarEdicao('email')">

            <button type="submit">Atualizar cliente</button>
        </form>
    <?php endif; ?>
</body>
</html>