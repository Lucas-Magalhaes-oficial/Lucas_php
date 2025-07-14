<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>função string php</title>
</head>
<body>
    <?php
        $vogais = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");

        echo "Hello World of php<br/>";
        $cons = str_replace($vogais, "", "Hello world of php");
        echo "consoantes:".$cons,"<br/>";
        // 012345678901
        $test = "Hello World! \n";
        print "posição da letra 'o' :";
        print strpos($test, "o")."<br/>";
        print "posição da letra 'o' após 5ª :";
        print strpos($test, "o", 5)."<hr/>";
        $message = "troca letra uma a uma";
        echo $message."<br/>";
        $new_message = strtr($message, 'abcdef', '123456');
        echo "criptogranfando: ".$new_message."<br/>";
        $new_message = strtr($message, '123456', 'abcdef');
        echo "descriptogranfando: ".$new_message."<br/>";
    ?>
</body>
</html>