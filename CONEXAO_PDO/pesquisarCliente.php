<?php
require_once 'conexao.php';

$conexao = conectarBanco();
$busca = $_GET['busca'] ?? '';

if (!$busca) {
    // Tela inicial com formulário de busca
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pesquisar Cliente</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">

    <!-- Navbar com Dropdown -->
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

    <div class="container mt-5">
        <h1 class="mb-4 text-center">Pesquisar Cliente</h1>
        <form action="pesquisarCliente.php" method="GET" class="card p-4 shadow-sm mx-auto" style="max-width:400px;">
            <div class="mb-3">
                <label for="busca" class="form-label">Digite o ID ou Nome:</label>
                <input type="text" class="form-control" id="busca" name="busca" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Pesquisar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
    <?php
    exit;
}

// Consulta no banco
if (is_numeric($busca)) {
    $stmt = $conexao->prepare(
        "SELECT id_cliente, nome, endereco, telefone, email 
         FROM cliente WHERE id_cliente = :id"
    );
    $stmt->bindParam(":id", $busca, PDO::PARAM_INT);
} else {
    $stmt = $conexao->prepare(
        "SELECT id_cliente, nome, endereco, telefone, email 
         FROM cliente WHERE nome LIKE :nome"
    );
    $buscaNome = "%$busca%"; // corrigido: removido '0'
    $stmt->bindParam(":nome", $buscaNome, PDO::PARAM_STR);
}

$stmt->execute();
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!$clientes) {
    die("Erro: Nenhum cliente encontrado.");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resultado da Pesquisa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Navbar com Dropdown -->
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

<div class="container mt-5">
    <h1 class="mb-4">Resultado da Pesquisa</h1>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?= htmlspecialchars($cliente['id_cliente']) ?></td>
                <td><?= htmlspecialchars($cliente['nome']) ?></td>
                <td><?= htmlspecialchars($cliente['endereco']) ?></td>
                <td><?= htmlspecialchars($cliente['telefone']) ?></td>
                <td><?= htmlspecialchars($cliente['email']) ?></td>
                <td>
                    <a href="atualizarCliente.php?id=<?= $cliente['id_cliente'] ?>" class="btn btn-warning btn-sm">Editar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="pesquisarCliente.php" class="btn btn-secondary mt-3">Nova pesquisa</a>
</div>
<center><address>
    Lucas Magalhães Sarmento | Estudante | Técnico de desenvolvimento de sistema
    </address></center>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
