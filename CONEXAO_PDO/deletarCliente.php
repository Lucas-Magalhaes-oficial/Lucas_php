<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Excluir Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
  <div class="container" style="max-width: 400px;">
    <h2 class="mb-4 text-center">Excluir Cliente</h2>

    <form action="processarDelecao.php" method="POST" class="card p-4 shadow-sm">
        <div class="mb-3">
            <label for="id" class="form-label">ID do Cliente:</label>
            <input type="number" id="id" name="id" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-danger w-100">Excluir Cliente</button>
    </form>
  </div>
</div>
<center><address>
    Lucas Magalhães Sarmento | Estudante | Técnico de desenvolvimento de sistema
    </address></center>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
