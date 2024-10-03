<?php
// Conexão com o banco de dados
$conn = mysqli_connect("localhost", "root", "12345", "projeto_site");
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}

// Verifica se o ID foi enviado
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Query de exclusão
    $sql = "DELETE FROM usuarios WHERE id = ?";
    
    // Prepara e executa a query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "Usuário excluído com sucesso!";
    } else {
        echo "Erro ao excluir o usuário: " . $conn->error;
    }
    
    $stmt->close();
    header("Location: banco_de_talentos.php");
    exit();
} else {
    echo "ID do usuário não informado.";
}

$conn->close();
?>
