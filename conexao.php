<?php

$host = "containers-us-west-28.railway.app";
$user = "root";
$pass = "m9OgbNefruEBLbCyYQd6";
$dbname = "carros";



try {

    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    //echo "conectado lets go bouraaa";

} catch (PDOException $err) {
    echo "Erro: conexão falhou. Erro gerado " . $err->getMessage();
}
