<?php
$conexao = mysqli_connect("localhost", "root", "12345", "projeto_site");

// Checar conexão
if (!$conexao) {
    die("NÃO CONECTADO: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST['cpf'];
    $cpf = mysqli_real_escape_string($conexao, $cpf);
    $sql = "SELECT cpf FROM usuarios WHERE cpf='$cpf'";
    $retorno = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($retorno) > 0) {
        $message = "CPF JÁ CADASTRADO!";
    } else {
        // Verifica se o arquivo foi enviado
        if (isset($_FILES["enviarcurriculo"]) && $_FILES["enviarcurriculo"]["error"] == 0) {
            // Define o caminho da pasta de currículos
            $pastaCurriculos = "C:/xampp/htdocs/curriculos/";

            // Verifica se a pasta existe, se não, cria a pasta
            if (!file_exists($pastaCurriculos)) {
                mkdir($pastaCurriculos, 0777, true);
            }

            // Define o caminho completo do arquivo
            $caminhoArquivo = $pastaCurriculos . basename($_FILES["enviarcurriculo"]["name"]);

            // Tenta mover o arquivo enviado para a pasta de currículos
            if (!move_uploaded_file($_FILES["enviarcurriculo"]["tmp_name"], $caminhoArquivo)) {
                $message = "Erro ao enviar o currículo.";
                header("Location: register.html?message=" . urlencode($message));
                exit();
            }
        } else {
            $caminhoArquivo = null;
        }

        // Prepara a instrução SQL para evitar SQL injection
        $stmt = $conexao->prepare("INSERT INTO usuarios (nome_completo, cpf, senha, telefone, data_nascimento, genero, caminho_curriculo, experiencia_antecessora, pergunta1, pergunta2, pergunta3, pergunta4) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssss", $nome_completo, $cpf, $senha, $telefone, $data_nascimento, $genero, $caminhoArquivo, $experiencia_antecessora, $pergunta1, $pergunta2, $pergunta3, $pergunta4);

        // Define os valores dos parâmetros
        $nome_completo = $_POST['nomecompleto'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        $data_nascimento = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['datanascimento'])));
        $genero = $_POST['genero'];
        $experiencia_antecessora = $_POST['experiencia'];
        $pergunta1 = $_POST['pergunta1']; // 1 - Qual foi o nome da sua primeira escola? 
        $pergunta2 = $_POST['pergunta2']; // 2 - Qual era o nome do seu primeiro animal de estimação? 
        $pergunta3 = $_POST['pergunta3']; // 3- Qual é o nome do seu filme favorito? 
        $pergunta4 = $_POST['pergunta4']; // 4 - Qual é o nome do seu melhor amigo de infância? 


        // Executa a instrução SQL
        if ($stmt->execute()) {
            // Recupera o ID do usuário recém-criado
            $usuario_id = $conexao->insert_id;

            // Substitui pontos e traço por underscore no CPF para formar o nome da tabela
            $cpf_modificado = str_replace(['.', '-'], '_', $cpf);

            // Gera o nome da tabela com base no ID e CPF
            $nome_tabela = "usuario_" . $usuario_id . "_" . $cpf_modificado;

            // Instrução SQL para criar a nova tabela do usuário
            $sql_create_table = "CREATE TABLE IF NOT EXISTS $nome_tabela (
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                id_vaga INT NOT NULL,
                nome TEXT,
                tipo TEXT,
                disponivel TEXT,
                quantidade_vagas TEXT,
                escolaridade TEXT,
                empresa TEXT,
                localidade TEXT,
                carga_horaria TEXT,
                descricao_vaga TEXT,
                CONSTRAINT fk_vaga_{$usuario_id} FOREIGN KEY (id_vaga) REFERENCES vagas(id) ON DELETE CASCADE ON UPDATE CASCADE 
            )";

            // Tenta criar a tabela
            if ($conexao->query($sql_create_table) === TRUE) {
                $message = "CONTA CRIADA COM SUCESSO! Tabela $nome_tabela criada.";
                if ($caminhoArquivo) {
                    $message .= " O currículo enviado com sucesso!";
                }
            } else {
                $message = "Erro ao criar tabela para o usuário: " . $conexao->error;
            }
        } else {
            $message = "Erro ao salvar os dados no banco de dados: " . $stmt->error;
        }

        // Fecha a instrução
        $stmt->close();
    }

    header("Location: register.html?message=" . urlencode($message));
    exit();
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>
