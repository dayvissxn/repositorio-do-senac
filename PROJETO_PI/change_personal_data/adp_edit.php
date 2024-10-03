<?php
session_start();
include('adp_conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_usuario = $_SESSION['id'];
    $nome_completo = $_POST['nomecompleto'];
    $email = $_POST['email'];
    $data_nascimento = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['datanascimento'])));
    $genero = $_POST['genero'];
    $telefone = $_POST['telefone'];

    // Query para atualizar os dados no banco de dados
    $sql = "UPDATE usuarios SET nome_completo = '$nome_completo', email = '$email', data_nascimento = '$data_nascimento', genero = '$genero', telefone = '$telefone' WHERE id = '$id_usuario'";

    if (mysqli_query($mysqli, $sql)) {
        $_SESSION['mensagem'] = "Dados atualizados com sucesso!";
        $_SESSION['tipo_mensagem'] = "sucesso";
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar dados: " . mysqli_error($mysqli);
        $_SESSION['tipo_mensagem'] = "erro";
    }

    mysqli_close($mysqli);

    // Redirecionar de volta para a página de alteração de dados
    header("Location: alterar_dados_pessoais.php");
    exit();
}
?>
