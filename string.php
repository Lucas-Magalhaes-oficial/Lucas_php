<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exemplo de string idade</title>
</head>
<body>
    <?php
        $age = 16;
        print "Você tem " . $age . " anos.\n";
        print "Você tem $age anos.\n"; #você tem 16 anos 
        print ' Você tem $idade anos.\n';
    ?>
    <br>
    <br>
    <?php
        $cidade = "Joinville";
        $estado = "Dança";
        $idade = 174;
        $frase_capital = "A cidade de $cidade é a capital da $estado";
        $frase_idade = "$cidade tem mais de $idade anos";
        echo "<h3>$frase_capital </h3>";
        echo "<h4>$frase_idade </h4>";
    ?>
    <br>
    <br>
    <?php
        $ageth = 16;
        print "Hoje é seu $ageth aniversário.\n"; #$ageth não vai ser encontrado
        print "Hoje é seu {$age} aniversário.\n"; #$age agora funciona, adicionando as chaves evita ambiguidade
    ?>
</body>
</html>