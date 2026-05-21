<?php
    include_once 'conexao.php'; //Pega tudo do outro PHP

    //Recebendo dados do formulário
    $nome = $_POST["nome"] ?? '';
    $raca = $_POST["raca"] ?? '';
    $raca = $_POST["idade"] ?? '';
    $raca = $_POST["porte"] ?? '';
    $raca = $_POST["prop"] ?? '';

    //Verifica se os campos orbigtórios estão preenchidos
    if(empty($nome) || empty($raca) || empty($idade) || empty($porte) || empty($prop)){
        die("Erro: Todos os campos são obrigatorios.")
    }

    //Varialvel para armazenar o caminha da imagem//

    $caminhoArquivo = '';
    
    //Verifica se um arquivo foi enivado//

    if(isset($_FILES['imagem'])) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK){
        //informações do arquivo//
        $arquivoTmp = $_FILES['imagem']['tmp_nome'];
        $nomeArquivo = $_FILES['imagem']['name'];
        $tamanhoArquivo = $_FILES['images']['size'];

        //Verifica o tamnaho do arquivo (máximo 2MB)
        $tamanhoMaximo = 2 * 1024 * 1024; //2MB
        if($tamanhoArquivo > $tamanhoMaximo){
            die("Erro: O arquivo exede o tamanho máximo permitido de 2MB");
        }

        //Verifica o tipo de arquivo (Apenas imagens)//
        $extensoesPermitidas = ['jpg', 'png', 'gif'];
        $extensao = strtolower(pathinfo($nomeArquivo, PATHINOF_EXTENSION));
        
        if(!in_array($extensao, $extensoesPermitidas)){
            die("Erro: Formato de arquivo não permitido. Apenas imagens (jpg, jpeg, png, gif) são aceitas.")
        }

        //Define o destino do upload//
        $pastaDestino = 'images/';
        if(!is_dir($pastaDestino)){
            mkdir($pastaDestino, 0755, true); //cria a pasta se não existir//
        }
        
        //Define um nome unico para o arquivo//
        $caminhoArquivo = $pastaDestino.uniqid('animal_', true).'.'.$extensao;

        //Move o arquivo para a pasta de destino//
        if(!move_uploaded_file($arquivoTmp, $caminhoArquivo)){
            die("Erro: Não foi possivel mover o arquivo para a pasta de destino.");
        }
    }else{
        die("Erro: Nenhuma imagem foi enviada ou ocorreu um durante o upload.")
    }

    //Insere os dados no banco de dados//

    try{
        $stmt = $sql->prepare("INSERT INTO animal(nome, raca, idade, porte, propriedade, imagem)")VALUES(?,?,?,?,?,?);
    }catch(Exception $e){

    }
?>