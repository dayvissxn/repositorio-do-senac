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

    <link rel="stylesheet" type="text/css" href="candidatos.css" media="screen">

    <title>Candidatos</title>

    <script>
        function confirmDelete(event) {
            if (!confirm('Você tem certeza que deseja excluir esta vaga?')) {
                event.preventDefault();
            }
        }
    </script>

    <style>

    </style>
</head>
<body>
    <div class="container_left">
        <div class="configurar_vagas">
            <h1>Configurar vagas</h1>
        </div>
        <div class="button-container"> 

            <a href="../create_vacancy/criar_vaga.html" class="criar_vaga_btn"><i class="fa-regular fa-square-plus"></i>Criar vaga</a>

            <a href="../update_vacancy/atualizar_vaga.php" class="atualizar_vaga_btn"><i class="fa-regular fa-pen-to-square"></i>Atualizar vaga</a>
            
            <a href="#" class="candidatos_btn"><i class="fa-solid fa-clipboard"></i>Candidatos</a>

            <a href="../talent_pool/banco_de_talentos.php" class="banco_de_talentos_btn"><i class="fa-regular fa-user"></i>Banco de talentos</a>

            <a href="../home_loggedin/logged_in.php" class="voltar_btn"><i class="fa-regular fa-circle-left"></i>Voltar</a>

        </div>
    </div>
    <div class="container_right">
        <?php
        $conn = mysqli_connect("localhost", "root", "12345", "emprega_mais");
        if ($conn->connect_error) {
            die("Connection failed:" . $conn->connect_error);
        }

        $sql = "SELECT id, nome, tipo, disponivel, quantidade_vagas, escolaridade, empresa, localidade, carga_horaria, descricao_vaga FROM vagas";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='white-box'>";
                    echo "<form action='c_ver_candidatos.php' method='GET'>";
                        echo "<div class='titulo_id'>";
                            echo "<label>ID:</label><input type='text' name='id' value='" . $row["id"] . "' readonly>";
                        echo "</div>";

                        echo "<div class='nome_empresa'>";
                            echo "<div class='nome'>";
                                echo "<input type='text' id='nome_" . $row["id"] . "' name='nome' value='" . $row["nome"] . "' readonly>";
                            echo "</div>";
                            echo "<div class='empresa'>";
                                echo "<input type='text' id='empresa_" . $row["id"] . "' name='empresa' value='" . $row["empresa"] . "' readonly>";
                            echo "</div>";
                        echo "</div>";

                        echo "<div class='l_qv_d'>";
                            echo "<div class='localidade'>";
                                echo "<i class='fa-solid fa-location-dot'></i>";
                                echo "<input type='text' id='localidade_" . $row["id"] . "' name='localidade' value='" . $row["localidade"] . "' readonly>";
                            echo "</div>";
                            echo "<div class='quantidade_vagas'>";
                                echo "<i class='fa-solid fa-users'></i>";
                                echo "<input type='text' id='quantidade_vagas_" . $row["id"] . "' name='quantidade_vagas' value='" . $row["quantidade_vagas"] . "' readonly>";
                            echo "</div>";
                            echo "<div class='disponivel'>";
                                echo "<i class='fa-solid fa-circle-exclamation'></i>";
                                echo "<input type='text' id='disponivel_" . $row["id"] . "' name='disponivel' value='" . $row["disponivel"] . "' readonly>";
                            echo "</div>";
                        echo "</div>";

                        echo "<div class='t_e_ch'>";
                            echo "<div class='tipo'>"; 
                                echo "<i class='fa-solid fa-file-contract'></i>";
                                echo "<input type='text' id='tipo_" . $row["id"] . "' name='tipo' value='" . $row["tipo"] . "' readonly>";
                            echo "</div>";
                            echo "<div class='escolaridade'>";
                                echo "<i class='fa-solid fa-graduation-cap'></i>";
                                echo "<input type='text' id='escolaridade_" . $row["id"] . "' name='escolaridade' value='" . $row["escolaridade"] . "' readonly>";
                            echo "</div>";
                            echo "<div class='carga_horaria'>";
                                echo "<i class='fa-solid fa-clock'></i>";
                                echo "<input type='text' id='carga_horaria_" . $row["id"] . "' name='carga_horaria' value='" . $row["carga_horaria"] . "' readonly>";
                            echo "</div>";
                        echo "</div>";

                        echo "<div class='descricao_vaga'>";
                            echo "<textarea id='descricao_vaga_" . $row["id"] . "' name='descricao_vaga' readonly>" . $row["descricao_vaga"] . "</textarea>";
                        echo "</div>";
            
                        echo "<div class='botao_ver'>";
                                echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                                echo "<button type='submit' class='ver'>Ver inscritos</button>";  
                                   
                        echo "</div>";
                    echo "</form>";
                echo "</div>";
            }
        } else {
            echo "0 result";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
