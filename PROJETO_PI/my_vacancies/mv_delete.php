<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../login/login.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];

// Verifica se o ID da vaga foi enviado via POST
if (!isset($_POST['id_vaga'])) {
    echo "ID da vaga não fornecido.";
    exit();
}

$id_vaga = $_POST['id_vaga'];

// Conectar ao banco de dados
$conn = mysqli_connect("localhost", "root", "12345", "projeto_site");

if (!$conn) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}

// Busca o nome da vaga para criar o nome da tabela correspondente
$sql_get_nome_vaga = "SELECT nome FROM vagas WHERE id = ?";
$stmt = $conn->prepare($sql_get_nome_vaga);
$stmt->bind_param("i", $id_vaga);
$stmt->execute();
$result_nome_vaga = $stmt->get_result();

if ($result_nome_vaga->num_rows > 0) {
    $row_vaga = $result_nome_vaga->fetch_assoc();
    $nome_vaga = $row_vaga['nome'];
} else {
    echo "Vaga não encontrada.";
    exit();
}

// Gerar o nome da tabela da vaga
$nome_tabela = "vaga_" . $id_vaga . "_" . preg_replace('/[^a-zA-Z0-9_]/', '', str_replace(' ', '_', $nome_vaga));

// Verifica se o usuário está inscrito na vaga
$sql_check_inscrito = "SELECT * FROM $nome_tabela WHERE id_usuario = ?";
$stmt_check = $conn->prepare($sql_check_inscrito);
$stmt_check->bind_param("i", $id_usuario);
$stmt_check->execute();
$result_inscrito = $stmt_check->get_result();

if ($result_inscrito->num_rows > 0) {
    // Deleta o registro do usuário da tabela da vaga
    $sql_delete = "DELETE FROM $nome_tabela WHERE id_usuario = ?";
    $stmt_delete = $conn->prepare($sql_delete);
    $stmt_delete->bind_param("i", $id_usuario);

    if ($stmt_delete->execute()) {
        // Inscrição cancelada com sucesso
        header("Location: minhas_vagas.php?msg=inscricao_deletada");
        exit();
    } else {
        echo "Erro ao cancelar a inscrição: " . $conn->error;
    }
} else {
    echo "Você não está inscrito nesta vaga.";
}

$stmt->close();
$conn->close();
?>
