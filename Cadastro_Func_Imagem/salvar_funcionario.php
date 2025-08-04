<?php
    //função para redimensionar a imagem
    function redimensionarImagem($imagem,$largura,$altura){
        //obtem as dimensões originais da imagem
        //getimagesize() retorna a largura e a altura de uma imagem
        list($larguraOriginal,$alturaOriginal) = getimagesize($imagem);

        //cria uma nova imagem em branco com as novas dimensões
        //imagecreatetruecolor() cria uma nova imagem em branco em alta qualidade
        $novaImagem = imagecreatetruecolor($largura,$altura);

        //carrega a imagem original (jpeg) a partit do arquivo
        //imagecreatefromjpeg() cria uma imagem php a partir de um arquivo JPEG
        $imageOriginal = imagecreatefromjpeg($imagem);

        //copia e redimensiona a imagem original  para a nova
        //imagecopyresampled() copia com redimensionamento e suavização
        imagecopyresampled($novaImagem,$imagemOriginal, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);

        //inicia um buffer para guardar a imagem com o texto binario
        //ob_start() inicia o "output buffering" guardando a saida
        ob_start();

        //imagejpeg() envia a imagem para o output
        imagejpeg($novaImagem);

        //OB_GET_CLEAN PEGA O CONTEUDO DO BUFFER E LIMPA
        $dadosImagem = ob_get_clean();

        //libera a memoria usada pelas imagens
        //imagedestroy() limpa a memoria da imagem criada
        imagedestroy($novaImagem);
        imagedestroy($imagemOriginal);

        //retorna a imagem redimensionada em formato binario
        return $dadosImagem;
    }

    //configuração do banco de dados
    $host = 'localhost';
    $dbname = 'bd_imagens'
    $username =  'root';
    $password = '';

    try{
        //conexao com banco de dados usando PDO
        $pdo = mew PDO("mysql:host=$host;dbname=$dbname", $username,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //define que erros vão lançar exceções


        //verifica se foi um post e se o arquivo
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto'])){

            if($_FILES['foto']['error'] == 0){

                $nome = $_POST['nome'];// pega o nome do funcionario
                $telefone = $_POST['telefone'];// pega o telefone do funcionario
                $nomeFoto = $_FILES['foto']['name']; // pega o nome original do arquivo
                $tipoFoto = $_FILES['foto']['type']; // pega o tipo mime da imagem

                //redimensiona a imagem
                $foto = redimensionarImagem($_FILES['foto']['tmp_name'], 300,400);//tmp_name é o caminho temporario

                //insere no banco de dados usando sql preparada
                $sql = "INSERT INTO funcionarios (nome, telefone, nome_foto, tipo_foto, foto) VALUES(:nome,:telefone,:nome_foto,:tipo_foto,:foto)";
                $stmt = $pdo ->prepare($sql); // prepara a query para evitar ataque sql injection

                $stmt->bindParam(':nome',$nome); //liga os parametros as variaveis
                $stmt->bindParam(':telefone',$telefone); //liga os parametros as variaveis
                $stmt->bindParam(':nome_foto',$nomeFoto); //liga os parametros as variaveis
                $stmt->bindParam(':tipo_foto',$tipoFoto); //liga os parametros as variaveis
                $stmt->bindParam(':foto',$foto, PDO::PARAM_LOB); //LOB = Large Object usado para dados binarios com imagens

                if($stmt->execute()){
                    echo "Funcionario cadastrado com sucesso";
                }else{
                    echo "Erro ao cadastrar o funcionario";
                }
            }else{
                echo "ao fazer o upload da foto! codigo : ".$_FILES['foto']['error'];
            }
        }
    } catch(PDOExecption $e){
        echo "Erro" .$e->getMessage(); //Mostra o erro se houver;
    }
?>