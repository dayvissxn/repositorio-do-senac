<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CODIGO DA FONTE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <!-- FIM DO CODIGO DA FONTE  -->

    <!-- Adicionar Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- Fim do código para Font Awesome -->

    <!-- Adicionar bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Fim do código para bootstrap -->

    <link rel="stylesheet" type="text/css" href="c_ver_candidatos.css" media="screen">

    <title>Candidatos inscritos</title>

<style>

</style>

</head>
<body>

<?php
// Conexão com o banco de dados
$conn = mysqli_connect("localhost", "root", "12345", "emprega_mais");
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}

// Verifica se o id da vaga foi enviado via GET
$id_vaga = isset($_GET['id']) ? $_GET['id'] : '';

if (!empty($id_vaga)) {
    // Busca as informações da vaga com base no ID
    $sql_vaga = "SELECT id, nome, empresa FROM vagas WHERE id = ?";
    $stmt = $conn->prepare($sql_vaga);
    $stmt->bind_param("i", $id_vaga);
    $stmt->execute();
    $result_vaga = $stmt->get_result();

    if ($result_vaga->num_rows > 0) {
        $vaga = $result_vaga->fetch_assoc();
        echo "<div class='infos'>";
            echo "<p class='vaga-id'>ID da vaga: " . htmlspecialchars($vaga['id']) . "</p>";
            echo "<p class='nome-id'>Vaga: " . htmlspecialchars($vaga['nome']) . "</p>";  
            echo "<p class='empresa-id'>Empresa: " . htmlspecialchars($vaga['empresa']) . "</p>";
        echo "</div>";
    } else {
        echo "<p>Vaga não encontrada.</p>"; // Mensagem clara se a vaga não for encontrada
    }
    $stmt->close();
}
?>

<!-- Caixa de pesquisa -->
<form method="GET" action="">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id_vaga); ?>">
    <div class="caixa_pesquisar">
        <i class="fa fa-search"></i>
        <input class="input_pesquisar" type="text" placeholder="Pesquisar" name="pesquisar" id="pesquisar">        
    </div>           
    <div class="botao_buscar">
        <button type="submit">Buscar</button>
    </div>
</form>


<!-- Tabela de usuários -->
<?php
// Tabela de candidatos
$candidatos_table_name = "vaga_" . $id_vaga . "_" . preg_replace('/[^a-zA-Z0-9_]/', '', str_replace(' ', '_', $vaga['nome']));

// Verifica se o parâmetro de pesquisa foi enviado
$pesquisa = isset($_GET['pesquisar']) ? $_GET['pesquisar'] : '';
$sql = "
    SELECT u.id, u.nome_completo, u.cpf, u.data_nascimento, u.genero 
    FROM $candidatos_table_name AS c
    JOIN usuarios AS u ON c.id_usuario = u.id
";
if (!empty($pesquisa)) {
    // Adiciona a cláusula WHERE para buscar em nome_completo, cpf, data_nascimento ou genero
    $sql .= " WHERE nome_completo LIKE '%$pesquisa%' 
            OR cpf LIKE '%$pesquisa%' 
            OR data_nascimento LIKE '%$pesquisa%' 
            OR genero LIKE '%$pesquisa%'";
}

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo '<table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NOME COMPLETO</th>
                <th scope="col">CPF</th>
                <th scope="col">DATA DE NASCIMENTO</th>
                <th scope="col">GÊNERO</th>
                <th scope="col">AÇÕES</th>
            </tr>
        </thead>
        <tbody>';

    $index = 1;
    while ($row = $result->fetch_assoc()) {
        if (isset($row['id'])) {
            echo '<tr>
                <th scope="row">' . $index . '</th>
                <td>' . htmlspecialchars($row['nome_completo']) . '</td>
                <td>' . htmlspecialchars($row['cpf']) . '</td>
                <td>' . htmlspecialchars($row['data_nascimento']) . '</td>
                <td>' . htmlspecialchars($row['genero']) . '</td>
                <td>
                    <a href="../candidates/c_perfil_candidato.php?id=' . htmlspecialchars($row['id']) . '&id_vaga=' . htmlspecialchars($id_vaga) . '" class="btn visualizar" role="button">Visualizar</a>
                </td>
            </tr>';
            $index++;
        }
    }

    echo '</tbody></table>';

    // Botão de Voltar
    echo '<div class="voltar">
        <a href="../candidates/candidatos.php" class="voltar_btn">
            <i class="fa-regular fa-circle-left"></i> Voltar
        </a>
    </div>';
} else {
    echo "<p>0 resultados.</p>";
}

$conn->close();



?>

</body>
</html>
