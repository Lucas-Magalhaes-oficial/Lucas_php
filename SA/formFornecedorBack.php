<?php
session_start();

// Inicializa a sessão de fornecedores se ainda não estiver criada
if (!isset($_SESSION['fornecedores'])) {
    $_SESSION['fornecedores'] = [];
}

// Verifica se os campos do formulário foram enviados
if (
    isset($_POST['textname'])  && isset($_POST['email']) &&
    isset($_POST['cnpj'])      && isset($_POST['telefone']) &&
    isset($_POST['logradouro'])&& isset($_POST['cidade']) &&
    isset($_POST['tipo'])
) {
    // Cria o array do fornecedor com os dados enviados
    $fornecedor = [
        'nome'       => $_POST['textname'],
        'email'      => $_POST['email'],
        'cnpj'       => $_POST['cnpj'],
        'telefone'   => $_POST['telefone'],
        'logradouro' => $_POST['logradouro'],
        'cidade'     => $_POST['cidade'],
        'tipo'       => $_POST['tipo']
    ];

    // Adiciona na sessão
    $_SESSION['fornecedores'][] = $fornecedor;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Fornecedores</title>
    <link rel="stylesheet" href="fornecedor.css">
</head>
<body>
    <h1>Fornecedores Cadastrados</h1>

    <?php if (!empty($_SESSION['fornecedores'])): ?>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>CNPJ</th>
            <th>Telefone</th>
            <th>Logradouro</th>
            <th>Cidade</th>
            <th>Tipo</th>
        </tr>
        <?php foreach ($_SESSION['fornecedores'] as $fornecedor): ?>
        <tr>
            <td><?= htmlspecialchars($fornecedor['nome']) ?></td>
            <td><?= htmlspecialchars($fornecedor['email']) ?></td>
            <td><?= htmlspecialchars($fornecedor['cnpj']) ?></td>
            <td><?= htmlspecialchars($fornecedor['telefone']) ?></td>
            <td><?= htmlspecialchars($fornecedor['logradouro']) ?></td>
            <td><?= htmlspecialchars($fornecedor['cidade']) ?></td>
            <td><?= htmlspecialchars($fornecedor['tipo']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php else: ?>
        <p>Nenhum fornecedor cadastrado até agora.</p>
    <?php endif; ?>

    <br>
</body>
</html>

