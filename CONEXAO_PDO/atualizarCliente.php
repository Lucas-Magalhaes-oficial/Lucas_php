<?php
require_once 'conexao.php';

$conexao = conectarBanco();

$idCliente = $_GET['id'] ?? null;
$cliente = null;
$msgErro = "";

function buscarClientePorID($idCliente, $conexao) {
    $stmt = $conexao->prepare("SELECT id_cliente, nome, endereco, telefone, email FROM cliente WHERE id_cliente = :id");
    $stmt->bindParam(":id", $idCliente, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function habilitarEdicao(campo){
            document.getElementById(campo).removeAttribute("readonly");
            document.getElementById(campo).focus();
        }
    </script>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">CRUD de Clientes</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="menuPrincipal">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Início</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Clientes</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="inserirCliente.php">Inserir Cliente</a></li>
            <li><a class="dropdown-item" href="listarClientes.php">Listar Clientes</a></li>
            <li><a class="dropdown-item" href="pesquisarCliente.php">Pesquisar Cliente</a></li>
            <li><a class="dropdown-item" href="atualizarCliente.php">Atualizar Cliente</a></li>
            <li><a class="dropdown-item" href="deletarCliente.php">Deletar Cliente</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="d-flex align-items-center justify-content-center min-vh-100">
  <div class="container" style="max-width: 500px;">
    <h2 class="mb-4 text-center">Atualizar Cliente</h2>

    <form action="atualizarCliente.php" method="GET" class="card p-4 shadow-sm mb-4">
        <div class="mb-3">
            <label for="id" class="form-label">ID do Cliente:</label>
            <input type="text" name="id" id="id" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Buscar</button>
    </form>

    <?php if ($msgErro): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($msgErro) ?></div>
    <?php endif; ?>

    <?php if ($cliente): ?>
        <form action="processarAtualizacao.php" method="POST" class="card p-4 shadow-sm">
            <input type="hidden" name="id_cliente" value="<?= htmlspecialchars($cliente['id_cliente']) ?>">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" class="form-control" readonly onclick="habilitarEdicao('nome')">
            </div>

            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço:</label>
                <input type="text" id="endereco" name="endereco" value="<?= htmlspecialchars($cliente['endereco']) ?>" class="form-control" readonly onclick="habilitarEdicao('endereco')">
            </div>

            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="text" id="telefone" name="telefone" value="<?= htmlspecialchars($cliente['telefone']) ?>" class="form-control" readonly onclick="habilitarEdicao('telefone')">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($cliente['email']) ?>" class="form-control" readonly onclick="habilitarEdicao('email')">
            </div>

            <button type="submit" class="btn btn-success w-100">Atualizar cliente</button>
        </form>
    <?php endif; ?>
  </div>
</div>
<center><address>
    Lucas Magalhães Sarmento | Estudante | Técnico de desenvolvimento de sistema
    </address></center>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
