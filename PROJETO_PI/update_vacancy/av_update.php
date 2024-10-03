<?php
$conn = mysqli_connect("localhost", "root", "12345", "projeto_site");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $disponivel = $_POST['disponivel'];
    $quantidade_vagas = $_POST['quantidade_vagas'];
    $escolaridade = $_POST['escolaridade'];
    $empresa = $_POST['empresa'];
    $localidade = $_POST['localidade'];
    $carga_horaria = $_POST['carga_horaria'];
    $descricao_vaga = $_POST['descricao_vaga'];

    // Recupera o nome atual da vaga antes da atualização
    $sql_nome_atual = "SELECT nome FROM vagas WHERE id='$id'";
    $result = $conn->query($sql_nome_atual);

    if ($result->num_rows > 0) {
        // Obtém o nome atual da vaga
        $row = $result->fetch_assoc();
        $nome_atual = $row['nome'];

        // Gera o nome da tabela antiga
        $nome_tabela_antiga = "vaga_" . $id . "_" . preg_replace('/[^a-zA-Z0-9_]/', '', str_replace(' ', '_', $nome_atual));

        // Atualiza a vaga
        $sql_update_vaga = "UPDATE vagas SET nome='$nome', tipo='$tipo', disponivel='$disponivel', quantidade_vagas='$quantidade_vagas', escolaridade='$escolaridade', empresa='$empresa', localidade='$localidade', carga_horaria='$carga_horaria', descricao_vaga='$descricao_vaga' WHERE id='$id'";

        if ($conn->query($sql_update_vaga) === TRUE) {
            echo "Registro atualizado com sucesso.";

            // Gera o nome da nova tabela com o novo nome da vaga
            $nome_tabela_nova = "vaga_" . $id . "_" . preg_replace('/[^a-zA-Z0-9_]/', '', str_replace(' ', '_', $nome));

            // Renomeia a tabela
            $sql_renomear_tabela = "RENAME TABLE $nome_tabela_antiga TO $nome_tabela_nova";

            if ($conn->query($sql_renomear_tabela) === TRUE) {
                echo "Tabela renomeada com sucesso.";
            } else {
                echo "Erro ao renomear tabela: " . $conn->error;
            }

        } else {
            echo "Erro ao atualizar o registro: " . $conn->error;
        }

    } else {
        echo "Vaga não encontrada.";
    }

    $conn->close();
    header("Location: atualizar_vaga.php");
    exit();
} else {
    echo "ID da vaga não especificado.";
}
?>

