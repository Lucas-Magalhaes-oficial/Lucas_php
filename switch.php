<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>switch com php</title>
</head>
<body>
    <?php
        $s = "lampada";
        switch ($s) {
            case "casa":
                print "A casa é amarela";
                break;
            case "arvore":
                print "a árvore é bonito";
                break;
            case "lampada":
                print "joao apagou a lampada";
                break;
            default:
                print "você não selecionou";
                break;
        }
    ?>
    <address>
                Lucas Magalhães Sarmento | Estudante | Técnico de desenvolvimento de sistema
        </address>
</body>
</html>