<?php
// Conexão com o banco de dados
require 'c_conexao.php';

// Verifica se o ID da vaga e o ID do usuário foram passados na URL
if (isset($_GET['id']) && isset($_GET['id_vaga'])) {
    $id = (int) $_GET['id'];
    $id_vaga = (int) $_GET['id_vaga'];

    // Consulta para buscar o nome da vaga
    $sql_vaga = "SELECT nome FROM vagas WHERE id = ?";
    $stmt_vaga = $conn->prepare($sql_vaga);
    $stmt_vaga->bind_param("i", $id_vaga);
    $stmt_vaga->execute();
    $result_vaga = $stmt_vaga->get_result();

    if ($result_vaga->num_rows > 0) {
        $vaga = $result_vaga->fetch_assoc();
        // Monta o nome da tabela de candidatos
        $candidatos_table_name = "vaga_" . $id_vaga . "_" . preg_replace('/[^a-zA-Z0-9_]/', '', str_replace(' ', '_', $vaga['nome']));
    } else {
        echo "<p>Vaga não encontrada.</p>";
        exit;
    }

    // Consulta para buscar os dados do usuário na tabela usuarios
    $sql = "SELECT nome_completo, cpf, data_nascimento, telefone, email, genero, caminho_fotoperfil, experiencia_antecessora, caminho_curriculo
            FROM usuarios WHERE id = ?";

    // Preparando a consulta
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    // Executa a consulta
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome_completo = $row['nome_completo'];
        $cpf = $row['cpf'];
        $data_nascimento = $row['data_nascimento'];
        $telefone = $row['telefone'];
        $email = $row['email'];
        $genero = $row['genero'];
        $caminho_fotoperfil = $row['caminho_fotoperfil'];
        $experiencia_antecessora = $row['experiencia_antecessora'];
        $caminho_curriculo = $row['caminho_curriculo'];
    } else {
        echo "<p>Candidato não encontrado.</p>";
        exit;
    }
} else {
    echo "<p>ID do candidato ou ID da vaga não especificados.</p>";
    exit;
}
?>




<!doctype html>
<html lang="pt-br">

<head>
    <!-- Metadados -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CODIGO DA FONTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <!-- FIM DO CODIGO DA FONTE  -->
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="#" media="screen">
    <!-- Adicionar Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- Fim do código para Font Awesome -->

    <link rel="stylesheet" type="text/css" href="c_perfil_candidato.css" media="screen">

    <!-- Título da página (aparece na aba) -->
    <title>Perfil do candidato</title>

    
<style>

</style>

</head>
<body>
    <div class="container_left">
        
        <div class="button-container">
            <a href="javascript:void(0);" class="voltar_btn" onclick="window.history.back();">
                <i class="fa-regular fa-circle-left"></i>Voltar
            </a>
        </div>
    </div> 

    <div class="container_right">
        <div class="white-box">
            
            <div class="foto_perfil">
                <img src="<?php echo htmlspecialchars($caminho_fotoperfil ?? 'img_candidates/foto_perfil_btn.png'); ?>" alt="Foto de Perfil">
            </div>   
            

            <div class="dados">
            <!-- Campos de Dados Pessoais -->

                <!-- Dados do lado esquerdo nome, data... -->
                <div class="lado_esquerdo">

                    <label for="nomecompleto">Nome completo</label>
                    <input type="text" name="nomecompleto" id="nomecompleto" value="<?php echo $nome_completo; ?>" readonly>

                    
                    <label for="datanascimento">Data de nascimento</label>
                    <input type="text" placeholder="dd/mm/aaaa" name="datanascimento" id="datanascimento" value="<?php echo date('d/m/Y', strtotime($data_nascimento)); ?>" readonly>
                        
                    <label for="telefone">Telefone</label>
                    <input type="tel" placeholder="(99) 99999-9999" name="telefone" id="telefone" value="<?php echo $telefone; ?>" readonly>

                </div>
            

                <!-- Dados do lado direito cpf, email... -->
                <div class="lado_direito">

                    <label for="cpf">CPF</label>
                    <input type="text" placeholder="123.456.789-00" name="cpf" id="cpf" value="<?php echo $cpf; ?>" readonly>

                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" value="<?php echo $email; ?>" readonly>

                    <label for="genero">Gênero</label>
                    <input type="text" id="genero" name="genero" value="<?php echo $genero; ?>" readonly>

                </div>

            </div>

            <div class="experiencia">
                <label for="experiencia">Experiências anteriores:</label>
                <textarea name="experiencia" id="experiencia" rows="10" cols="10" readonly><?php echo $experiencia_antecessora; ?></textarea>

                <form action="<?php echo $caminho_curriculo; ?>" target="_blank">
                    <div class="curriculo-container">
                        <i class="fa-regular fa-file"></i>
                        <button class="curriculo">VER CURRÍCULO</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
   
    
</body>
</html>