<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "1234";
    $bd = "TESTEWEB2";
    
    $mysqli = new mysqli($host, $usuario, $senha, $bd);
    
    if($mysqli->connect_errno){
        echo "Falha na conexão: (" .$mysqli->connect_errno.") ".$mysqli->connect_error;
    }
?>

