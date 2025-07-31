<?php
require 'conexao.php';

$conexao = conectarBanco();
$stmt = $conexao->prepare("SELECT * FROM cliente");
$stmt->execute();
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Clientes</title>
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
    <h2 class="mb-4">Lista de Clientes</h2>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($clientes as $cliente): ?>
                <tr>
                    <td><?= htmlspecialchars($cliente["id_cliente"]) ?></td>
                    <td><?= htmlspecialchars($cliente["nome"]) ?></td>
                    <td><?= htmlspecialchars($cliente["endereco"]) ?></td>
                    <td><?= htmlspecialchars($cliente["telefone"]) ?></td>
                    <td><?= htmlspecialchars($cliente["email"]) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<center><address>
    Lucas Magalhães Sarmento | Estudante | Técnico de desenvolvimento de sistema
    </address></center>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
