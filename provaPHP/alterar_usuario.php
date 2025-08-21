<?php
session_start();
require_once 'conexao.php';

//verifica se o usuario tem permissao de adm
if($_SESSION['perfil'] !=1){
    echo "<script>alert('Acesso Negado');window.location.href='principal.php';</script>";
    exit();
}

//inicializa variáveis
$usuario = null;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST['busca_usuario'])){
        $busca = trim($_POST['busca_usuario']);

        //verifica se a busca é um numero (id) ou um nome
        if(is_numeric($busca)){
            $sql = "SELECT * FROM usuario WHERE id_usuario = :busca";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':busca',$busca,PDO::PARAM_INT);
        }else{
            $sql = "SELECT * FROM usuario WHERE nome LIKE :busca_nome";
            $stmt = $pdo->prepare($sql);
            //adiona o caractere de porcentagem para busca parcial
            $buscaLike = "%$busca%";
            $stmt->bindParam(':busca_nome', $buscaLike, PDO::PARAM_STR);
        }

        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        //se o usuario não for encontrado, exibe um alerta
        if(!$usuario){
            echo "<script>alert('Usuario não encontrado');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar usuario</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <!-- certifique-se de que o javascript está sendo carregado corretamente-->
    <script:src="scripts.js"></script>
</head>
<body>

<?php
$permissoes = [
    1 => [
        "Cadastrar" => ["cadastro_usuario.php", "cadastro_perfil.php", "cadastro_cliente.php", "cadastro_fornecedor.php", "cadastro_produto.php", "cadastro_funcionario.php"],
        "Buscar"    => ["buscar_usuario.php", "buscar_perfil.php", "buscar_cliente.php", "buscar_fornecedor.php", "buscar_produto.php", "buscar_funcionario.php"],
        "Alterar"   => ["alterar_usuario.php", "alterar_perfil.php", "alterar_cliente.php", "alterar_fornecedor.php", "alterar_produto.php", "alterar_funcionario.php"],
        "Excluir"   => ["excluir_usuario.php", "excluir_perfil.php", "excluir_cliente.php", "excluir_fornecedor.php", "excluir_produto.php", "excluir_funcionario.php"]
    ],
    2 => [
        "Cadastrar" => ["cadastro_cliente.php"],
        "Buscar"    => ["buscar_cliente.php", "buscar_fornecedor.php", "buscar_produto.php"],
        "Alterar"   => ["alterar_fornecedor.php", "alterar_produto.php"],
        "Excluir"   => ["excluir_produto.php"]
    ],
    3 => [
        "Cadastrar" => ["cadastro_fornecedor.php", "cadastro_produto.php"],
        "Buscar"    => ["buscar_cliente.php", "buscar_fornecedor.php", "buscar_produto.php"],
        "Alterar"   => ["alterar_fornecedor.php", "alterar_produto.php"],
        "Excluir"   => ["excluir_produto.php"]
    ],
    4 => [
        "Cadastrar" => ["cadastro_usuario.php"],
        "Buscar"    => ["buscar_produto.php"],
        "Alterar"   => ["alterar_cliente.php"]
    ]
];

$id_perfil = (int) $_SESSION['perfil'];
$opcoes_menu = $permissoes[$id_perfil] ?? [];

?>
<!-- MENU -->
<nav>
        <ul class="menu">
            <?php foreach ($opcoes_menu as $categoria => $arquivos): ?>
                <li class="dropdown">
                    <a href="#"><?= htmlspecialchars($categoria) ?></a>
                    <ul class="dropdown-menu">
                        <?php foreach ($arquivos as $arquivo): ?>
                            <li>
                                <a href="<?= htmlspecialchars($arquivo) ?>">
                                    <?= ucwords(str_replace('_', ' ', basename($arquivo, '.php'))) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <h2>Alterar Usuario</h2>
    <form action="alterar_usuario.php" method="POST" onsubmit="return validarAlterar()">
        <label for="busca_usuario">Digite o id ou nome do usuario</label>
        <input type="text" id="busca_usuario" name="busca_usuario" require onkeyup="buscarSugestoes()">

        <!-- div para exibir sugestões de usuarios -->
         <div id="sugestoes"></div>
         <button type="submit">Buscar</button>
    </form>

    <?php if($usuario): ?>
        <!-- formulario para alterar usuario -->
         <form action="processa_alteracao_usuario.php" method="POST">
            <input type="hidden" name="id_usuario" value="<?=htmlspecialchars($usuario['id_usuario'])?>">

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?=htmlspecialchars($usuario['nome'])?>"required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?=htmlspecialchars($usuario['email'])?>"required>

            <label for="id_perfil">Perfil:</label>
            <select id="id_perfil" name="id_perfil">
                <option value="1" <?=$usuario['id_perfil'] == 1 ?'select':''?>>Administrador</option>
                <option value="2" <?=$usuario['id_perfil'] == 2 ?'select':''?>>Secretaria</option>
                <option value="3" <?=$usuario['id_perfil'] == 3 ?'select':''?>>Almoxarife</option>
                <option value="4" <?=$usuario['id_perfil'] == 4 ?'select':''?>>Cliente</option>
            </select>

            <!-- se o usuario logado for admin, exibir a opção de alterar senha -->
             <?php if ($_SESSION['perfil'] == 1): ?>
                <label for="nova_senha">Nova Senha</label>
                <input type="password" id="nova_senha" name="nova_senha">
            <?php endif; ?>
            <button type="submit">Alterar</button>
            <button type="reset">Cancelar</button>
         </form>
    <?php endif; ?>
    <a href="principal.php" class="btn btn-primary btn-sm">Voltar</a>

<br>
        <br>
    <center>
  <address>Lucas Magalhães Sarmento | Estudante | Técnico de desenvolvimento de sistema</address>
</center>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>