<?php
function conectar($servidor, $usuario, $senha, $banco) {
    $con = mysqli_connect($servidor, $usuario, $senha, $banco);

    if (!$con) {
        throw new Exception("Erro ao conectar: " . mysqli_connect_error());
    }

    return $con;
}
?>
