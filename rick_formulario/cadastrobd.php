<?php
require('dao.php');

try {
    $conexao = conectar('localhost:3307', 'root', '', 'rick001');

    $rgm = 12345;
    $nome = "Lucas Alves";
    $telefone = "999999999";
    $sexo = "M";

    $sql = "INSERT INTO alunos (rgm, nome, telefone, sexo)
            VALUES ('$rgm', '$nome', '$telefone', '$sexo')";

    if (mysqli_query($conexao, $sql)) {
        echo "✅ Aluno inserido com sucesso!";
    } else {
        echo "❌ Erro ao inserir: " . mysqli_error($conexao);
    }

} catch (Exception $e) {
    echo "Erro de conexão: " . $e->getMessage();
}
?>

