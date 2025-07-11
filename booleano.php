<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exemplo booleano</title>
</head>
<body>
    <?php
        #Declara variável numérica
        $umidade = 91;
        #testa se $umidade maior que 90. Retorna um booleano
        $vaiChover = ($umidade > 90);
        #testa se $vaiChover é verdadeiro
        if ($vaiChover)
        {
            echo "Vai chover com toda certeza absoluta da terra!";
        }
    ?>
<address>
    Lucas Magalhães Sarmento | Estudante | Técnico de desenvolvimento de sistema
</address>
</body>
</html>