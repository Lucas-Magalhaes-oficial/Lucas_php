<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notas feitas com if e else php</title>
</head>
<body>
    <?php
        $mediaNota = 7;

        if ($mediaNota >= 7) {
            echo "Você passou com louvor";
        } elseif ($mediaNota < 7) {
            echo "meh, tá ok";
        } else {
            echo "reprovado";
        }
    ?>

        <address>
                Lucas Magalhães Sarmento | Estudante | Técnico de desenvolvimento de sistema
        </address>
</body>
</html>