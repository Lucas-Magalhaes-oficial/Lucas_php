<!--aqui será onde será feito a aba inicial de seleção do CRUD-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD de Clientes - Menu</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold mx-auto" href="#">CRUD de Clientes</a>
        </div>
    </nav>

    <div class="container text-center mt-5">
        <h1 class="mb-4">Menu Principal</h1>
        <div class="row justify-content-center g-4">

            <div class="col-md-3">
                <a href="inserirCliente.php" class="btn btn-primary w-100 p-3">
                    ➕ Inserir Cliente
                </a>
            </div>

            <div class="col-md-3">
                <a href="listarClientes.php" class="btn btn-secondary w-100 p-3">
                    📜 Listar Clientes
                </a>
            </div>

            <div class="col-md-3">
                <a href="pesquisarCliente.php" class="btn btn-info w-100 p-3 text-white">
                    🔍 Pesquisar Cliente
                </a>
            </div>

            <div class="col-md-3">
                <a href="atualizarCliente.php" class="btn btn-warning w-100 p-3">
                    ✏️ Atualizar Cliente
                </a>
            </div>

            <div class="col-md-3">
                <a href="deletarCliente.php" class="btn btn-danger w-100 p-3">
                    🗑️ Deletar Cliente
                </a>
            </div>

        </div>
    </div>
    <br>
    <center><address>
    Lucas Magalhães Sarmento | Estudante | Técnico de desenvolvimento de sistema
    </address></center>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
