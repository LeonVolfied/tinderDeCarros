<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "carros";



try {

    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    //echo "conectado lets go bouraaa";

} catch (PDOException $err) {
    echo "Erro: conexão falhou. Erro gerado " . $err->getMessage();
}
