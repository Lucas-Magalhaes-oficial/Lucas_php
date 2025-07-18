<?php
    $texto = file_get_contents("texto.txt");
    echo nl2br($texto)."<hr/>";
    $texto = $texto. " extra";
    echo nl2br($texto)."<hr/>";
    file_put_contents("texto.txt", $texto);
?>