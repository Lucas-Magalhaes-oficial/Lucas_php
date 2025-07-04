<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>funções string php</title>
</head>
<body>
    <?php
        # index 0123456789012345
        echo $name = "Stefanie Hatcher <br>";
        echo $length = strlen($name);
        echo $cmp = strcmp($name, "Brian Le <br>");
        echo $index = strpos($name, "e <br>");
        echo $first = substr($name, 9, 5);
        echo $name = strtoupper($name);
    ?>
</body>
</html>