<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Lista de Alunos</title>
    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            color: #333;
            padding: 20px;
        }

        h3 {
            text-align: center;
            margin-bottom: 30px;
            color: #004080;
            font-weight: 700;
            font-size: 2rem;
            text-shadow: 1px 1px 2px #ccc;
        }

        table {
            width: 80%;
            margin: 0 auto 40px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: #007acc;
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f0f4f8;
        }

        tr:hover {
            background-color: #d0e4ff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        td:first-child, th:first-child {
            text-align: center;
            width: 10%;
        }

        td:last-child, th:last-child {
            text-align: center;
            width: 10%;
        }

        .no-data {
            text-align: center;
            font-style: italic;
            color: #666;
            margin-top: 20px;
        }

        /* Link para cadastro */
        .link-cadastro {
            display: block;
            width: 150px;
            margin: 0 auto;
            padding: 10px 0;
            background-color: #007acc;
            color: #fff;
            text-align: center;
            text-decoration: none;
            font-weight: 600;
            border-radius: 5px;
            box-shadow: 0 3px 5px rgba(0,122,204,0.4);
            transition: background-color 0.3s ease;
        }

        .link-cadastro:hover {
            background-color: #005f99;
        }
    </style>
</head>
<body>

    <h3>Lista de Alunos Cadastrados</h3>

    <?php
    require('dao.php');

    try {
        $conexao = conectar('localhost:3307', 'root', '', 'rick001');
        $sql = "SELECT * FROM alunos ORDER BY rgm";
        $resultado = mysqli_query($conexao, $sql);

        if (!$resultado) {
            die("<p class='no-data'>Erro na consulta: " . mysqli_error($conexao) . "</p>");
        }

        if (mysqli_num_rows($resultado) == 0) {
            echo "<p class='no-data'>Nenhum aluno cadastrado.</p>";
        } else {
            echo "<table>";
            echo "<tr><th>RGM</th><th>Nome</th><th>Telefone</th><th>Sexo</th></tr>";

            while ($linha = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($linha['RGM']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['Nome']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['Telefone']) . "</td>";
                echo "<td>" . htmlspecialchars($linha['sexo']) . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        }
    } catch (Exception $e) {
        echo "<p class='no-data'>Erro ao conectar: " . $e->getMessage() . "</p>";
    }
    ?>

    <a href="cadastrar_alunos.php" class="link-cadastro">Cadastrar Aluno</a>

</body>
</html>
