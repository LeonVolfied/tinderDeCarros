<?php

include('conexao.php');
include('chamarCarro.php');



$query_carros = "SELECT id, foto, nomeModelo, anoModelo, valorModelo, kmModelo, marcaModelo,corModelo,cambioModelo  FROM cadastrocarros 
WHERE id=8";
$result_carros = $conn->prepare($query_carros);
$result_carros->execute();
$row_carro = $result_carros->fetch(PDO::FETCH_ASSOC);

extract($row_carro);
/*echo "<img src='carros/$id/$foto' width='100px'>";
echo "<p>$nomeModelo</p>";*/


?>



<!DOCTYPE html>
<html lang="Pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes</title>
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color: yellow;">
    <header>
        <nav class="navbar">
            <div class="menu">
                <a href="index.php">inicio</a>
                <a href="galeriaCarros.php">Galeria de Carros</a>
                <a href="galeriaClientes.php">Galeria de Clientes</a>
                <a href="sobre.php">sobre</a>
            </div>
            <div class="menuCadastro">
                <a href="CadastrarCarro.php">Cadastro de Carro</a>
                <a href="CadastrarCliente.php">Cadastro de Cliente</a>
            </div>
        </nav>
    </header>

    <div class="pagCarro">

        <div class="foto">
            <?php
            echo "<img src='carros/$id/$foto' >";
            ?>

        </div>
        <div class="nome">
            <h1>Nome do modelo:</h1>
            <?php

            echo "<p>$nomeModelo</p>";
            ?>
        </div>
        <div class="ano">
            <h2>ano do modelo:</h2>
            <?php

            echo "<p>$anoModelo</p>";
            ?>
        </div>
        <div class="valor">
            <h2>valor do modelo:</h2>
            <?php

            echo "<p>RS:$valorModelo</p>";
            ?>
        </div>
        <div class="cambio">
            <h2>cambio do modelo:</h2>
            <?php

            echo "<p>$cambioModelo</p>";
            ?>
        </div>
        <div class="km">
            <h2>km do modelo:</h2>
            <?php

            echo "<p>$kmModelo KM</p>";
            ?>
        </div>


        <!--<img src="img/ESBOÇO MODELO FINAL PAG CARRO.png">-->
    </div>


    <div class="lista">
        <h1>lista de clientes</h1>
        <?php


        $consulta = "SELECT tclientes.id, tclientes.nome, tclientes.telefone,
(CASE WHEN(tclientes.valorDesejado BETWEEN tcarros.valorModelo - 5000 AND tcarros.valorModelo + 5000) THEN 1 ELSE 0 END) AS ponto_valor,
(CASE WHEN (tclientes.anoDesejado BETWEEN - tcarros.anoModelo - 2 AND tcarros.anoModelo +2)  THEN 1 ELSE 0 END) AS ponto_ano,
(CASE WHEN (tclientes.kmDesejado BETWEEN  tcarros.kmModelo - 5000 AND tcarros.kmModelo + 5000)  THEN 1 ELSE 0 END) AS ponto_km,
(CASE WHEN tclientes.modeloDesejado  = tcarros.nomeModelo  THEN 1 ELSE 0 END) AS ponto_modelo,
(CASE WHEN tclientes.marcaDesejada  = tcarros.marcaModelo  THEN 1 ELSE 0 END) AS ponto_marca,
(CASE WHEN tclientes.corDesejada = tcarros.corModelo  THEN 1 ELSE 0 END) AS ponto_cor,
(CASE WHEN tclientes.cambioDesejado  = tcarros.cambioModelo  THEN 1 ELSE 0 END) AS ponto_cambio
FROM cadastroclientes tclientes
CROSS JOIN cadastrocarros tcarros 
WHERE tcarros.id = :carro_id                  
GROUP BY tclientes.id, tclientes.nome, tclientes.telefone
HAVING(ponto_valor + ponto_ano + ponto_km + ponto_modelo + ponto_marca + ponto_cor + ponto_cambio ) >=2";


        /*$result*/
        $carro_id = 8;

        $stmt = $conn->prepare($consulta);
        $stmt->bindParam(':carro_id', $carro_id);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            //armazena os pontos em uma variavel
            //$pontos = array();
            foreach ($result as $row) {
                $id = $row["id"];
                $nome = $row["nome"];
                $telefone = $row["telefone"];
                $ponto_valor = $row["ponto_valor"];
                $ponto_ano = $row["ponto_ano"];
                $ponto_km = $row["ponto_km"];
                $ponto_modelo = $row["ponto_modelo"];
                $ponto_marca = $row["ponto_marca"];
                $ponto_cor = $row["ponto_cor"];
                $ponto_cambio = $row["ponto_cambio"];
                $ponto_total = $ponto_valor + $ponto_ano + $ponto_km + $ponto_modelo + $ponto_marca + $ponto_cor + $ponto_cambio;
                //$pontos[$nome] = $ponto;

                echo "<div class = 'cliente'>";
                echo "cliente ID: " . $id . " | ";
                echo "Nome: " . $nome . " | ";
                echo "Telefone: " . $telefone . " | ";
                echo "Pontos valor: " . $ponto_valor . " | ";
                echo "Pontos ano: " . $ponto_ano . " | ";
                echo "Pontos km: " . $ponto_km . " | ";
                echo "Pontos modelo: " . $ponto_modelo . " | ";
                echo "Pontos marca: " . $ponto_marca . " | ";
                echo "Pontos cor: " . $ponto_cor . " | ";
                echo "Pontos cambio: " . $ponto_cambio . " | ";
                echo "Pontos: " . $ponto_total . " | ";
                echo "<br>";
                echo "</div>";
            }

            //exemplo de exibição dos pontos
            /*foreach ($pontos as $nome => $ponto) {
echo "Usuário ID: " . $nome . " - pontos: " . $ponto . "<br>";
}*/
        } else {
            echo  "Nenhum cliente corresponde a este carro.";
        }
        ?>
    </div>

</body>

</html>