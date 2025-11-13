<?php
require('dao.php');

try {
    // ⚙️ Altere os valores abaixo conforme o seu MySQL
    $conexao = conectar('localhost:3307', 'root', '', 'rick001');

    echo "✅ Conexão bem-sucedida com o banco de dados!";
} catch (Exception $e) {
    echo "❌ Falha na conexão: " . $e->getMessage();
}
?>
