<?php
require('dao.php'); // Certifique-se que este arquivo existe e conecta ao BD

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conexao = conectar('localhost:3307', 'root', '', 'rick001');

        // Recebendo dados do formulário
        $rgm = mysqli_real_escape_string($conexao, $_POST['rgm']);
        $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
        $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
        $sexo = mysqli_real_escape_string($conexao, $_POST['sexo']);

        // Verifica se o RGM já existe
        $check = mysqli_query($conexao, "SELECT * FROM alunos WHERE rgm = '$rgm'");
        if (mysqli_num_rows($check) > 0) {
            $msg = "⚠️ Aluno com RGM $rgm já cadastrado.";
        } else {
            $sql = "INSERT INTO alunos (rgm, Nome, telefone, sexo) VALUES ('$rgm', '$nome', '$telefone', '$sexo')";
            if (mysqli_query($conexao, $sql)) {
                $msg = "✅ Aluno cadastrado com sucesso!";
            } else {
                $msg = "❌ Erro ao cadastrar: " . mysqli_error($conexao);
            }
        }
    } catch (Exception $e) {
        $msg = "Erro de conexão: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Cadastro de Alunos</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form-container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.2);
            width: 400px;
        }

        h2 {
            text-align: center;
            color: #004080;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
        }

        input, select {
            width: 100%;
            padding: 8px 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background-color: #007acc;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #005f99;
        }

        .message {
            text-align: center;
            margin-top: 15px;
            font-weight: 600;
        }

        .link-lista {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007acc;
            text-decoration: none;
            font-weight: 600;
        }

        .link-lista:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Cadastro de Aluno</h2>

        <?php if ($msg != ""): ?>
            <p class="message"><?php echo $msg; ?></p>
        <?php endif; ?>

        <form method="post" action="">
            <label for="rgm">RGM (número único):</label>
            <input type="number" id="rgm" name="rgm" required />

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required />

            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" required />

            <label for="sexo">Sexo:</label>
            <select id="sexo" name="sexo" required>
                <option value="">-- Escolha --</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </select>

            <button type="submit">Cadastrar</button>
        </form>

        <a href="listar_alunos.php" class="link-lista">Ver lista de alunos</a>
    </div>
</body>
</html>
