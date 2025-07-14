<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>função php 2</title>
</head>
<body>
    <?php
        #rand  - gera um inteiro aleatório
        $sorteio = rand( 0 , 5);
        echo "Sorteado: $sorteio <hr/>";
        #array_merge - combina um ou mais arrays
        #range - cria
        $vetor = array_merge( range( 0 , 10),
            range( $sorteio, 10, 2),
            array( $sorteio));
        
        print_r($vetor);
        echo "<hr/>";
        shuffle($vetor);
        print_r($vetor);
        echo "<hr/>";
    ?>
</body>
</html>