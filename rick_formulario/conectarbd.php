<?php
require('dao.php'); 

try {
    
    $conexao = conectar('localhost:3307', 'root', '', 'rick001');

    $rgm = 12347;
    $nome = "Lucas Alves";
    $telefone = "999999999";
    $sexo = "M";

    $check = mysqli_query($conexao, "SELECT * FROM alunos WHERE rgm = '$rgm'");
    if (!$check) {
        die("Erro na consulta: " . mysqli_error($conexao));
    }

    if (mysqli_num_rows($check) > 0) {
        echo " Esse aluno já existe no banco de dados.<br>";
    } else {
        
        $sql = "INSERT INTO alunos (rgm, nome, telefone, sexo)
                VALUES ('$rgm', '$nome', '$telefone', '$sexo')";

        if (mysqli_query($conexao, $sql)) {
            echo " Aluno cadastrado com sucesso!<br>";
        } else {
            echo " Erro ao cadastrar: " . mysqli_error($conexao);
        }
    }

} catch (Exception $e) {
    echo "Erro de conexão: " . $e->getMessage();
}
?>
