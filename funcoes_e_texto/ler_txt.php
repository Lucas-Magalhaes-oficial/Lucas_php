<?php
    $texto = file_get_contents("texto.txt");
    echo nl2br($texto);
    var_dump($texto);
?>