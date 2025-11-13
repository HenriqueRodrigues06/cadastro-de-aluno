<html>
<head>
    <meta charset="utf-8">
    <title>Conectando ao BD</title>
</head>
<body>
    <h3>Recebendo dados ao BD</h3>

    <?php
    require('dao.php');

    try {
        // Conexão com o banco
        $ret = conectar('localhost:3307', 'root', '', 'rick001');

        // Corrigido: faltava "ORDER" no comando SQL
        $consulta = "SELECT * FROM alunos ORDER BY rgm";

        $obj_consulta = mysqli_query($ret, $consulta) or die(mysqli_error($ret));
    ?>
        <table border="2" cellspacing="1" cellpadding="4">
            <tr>
                <th>RGM</th>
                <th>NOME</th>
                <th>TELEFONE</th>
                <th>SEXO</th>
            </tr>

            <?php
            while ($reg_consulta = mysqli_fetch_array($obj_consulta)) {
                echo "<tr>";
                echo "<td align='center'>" . $reg_consulta["rgm"] . "</td>";
                echo "<td>" . $reg_consulta["nome"] . "</td>";
                echo "<td>" . $reg_consulta["telefone"] . "</td>";
                echo "<td align='center'>" . $reg_consulta["sexo"] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>

    <?php
    } catch (Exception $e) {
        echo "Falha na conexão: " . $e->getMessage();
    }
    ?>

</body>
</html>
