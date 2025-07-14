<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Fornecedor S.A</title>
  <link rel="stylesheet" href="fornecedor.css">
</head>
<body>

<ul>
  <li><a href="#">Inicio</a></li>
  <li class="dropdown">
    <a href="#" class="dropbtn">Cadastros</a>
    <div class="dropdown-content">
      <a href="#">Formulario de Fornecedor</a>
      <a href="#">Formulario de Produto</a>
      <a href="#">Formulario de Funcionario</a>
    </div>
  </li>
</ul>

<center>
  <form id="meuform" method="post" action="formFornecedorBack.php">
    <table cellspacing="0" cellpadding="5" width="500px">
      <tr>
        <td rowspan="2" class="logo-td"></td>
        <th colspan="2" class="titulo-td">Cadastro de <br>Fornecedor</th>
      </tr>
      <tr><td colspan="2"></td></tr>

      <tr><th>Nome</th><td><input type="text" name="textname"></td></tr>
      <tr><th>Email</th><td><input type="email" name="email"></td></tr>
      <tr><th>CNPJ</th><td><input type="text" name="cnpj"></td></tr>
      <tr><th>Telefone</th><td><input type="number" name="telefone"></td></tr>
      <tr><th>Logradouro</th><td><input type="text" name="logradouro"></td></tr>
      <tr><th>Cidade</th><td><input type="text" name="cidade"></td></tr>
      <tr><th>Tipo de produto</th><td><input type="text" name="tipo"></td></tr>

      <tr>
        <td colspan="2" align="center">
          <input type="submit" value="Salvar"><br>
          <input type="reset" value="Limpar">
        </td>
      </tr>
    </table>
  </form>
</center>

<center>
  <address>Lucas Magalhães Sarmento | Estudante | Técnico de desenvolvimento de sistema</address>
</center>

<script src="fornecedor.js"></script>
</body>
</html>
