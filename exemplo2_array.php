<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exemplo 02 array com php</title>
</head>
<body>
    <?php
        $estados = array("PR", "SC", "RS", "SP", "RJ", "MG", "BA", "RN", "AM");
        echo "ORIGINAL: ";
        print_r ($estados);
        echo "<hr/>STRTOLOWER: Converte uma string para minúsculas<br/>";
        for ($i = 0; $i < count($estados); $i++) {
            $estados[$i] = strtolower($estados[$1]);
        }
        echo "STRTOLOWER: "; print_r ($estados);
        echo "<hr/>SHIFT: Retira o primeiro elemento de um array<br/>";
        $rotaciona = array_shift($estados);

        echo "SHIFT: "; print_r ($estados);
        echo "<hr/>POP: Extrai um elemento do final do array<br/>";
        array_pop($estados);

        echo "POP: "; print_r ($estados);
        echo "<hr/>PUSH: Extrai um elemento do final do array<br/>";
        array_pop($estados);
    ?>
</body>
</html>