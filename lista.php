<?php
include('conexao.php');

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
             HAVING(ponto_valor + ponto_ano + ponto_km + ponto_modelo + ponto_marca + ponto_cor + ponto_cambio ) >=1";


/*$result*/
$carro_id = 2;

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

        echo "cliente ID: " . $id . "<br>";
        echo "Nome: " . $nome . "<br>";
        echo "Telefone: " . $telefone . "<br>";
        echo "Pontos valor: " . $ponto_valor . "<br>";
        echo "Pontos ano: " . $ponto_ano . "<br>";
        echo "Pontos km: " . $ponto_km . "<br>";
        echo "Pontos modelo: " . $ponto_modelo . "<br>";
        echo "Pontos marca: " . $ponto_marca . "<br>";
        echo "Pontos cor: " . $ponto_cor . "<br>";
        echo "Pontos cambio: " . $ponto_cambio . "<br>";
        echo "Pontos: " . $ponto_total . "<br>";
        echo "<br>";
    }

    //exemplo de exibição dos pontos
    /*foreach ($pontos as $nome => $ponto) {
        echo "Usuário ID: " . $nome . " - pontos: " . $ponto . "<br>";
    }*/
} else {
    echo  "Nenhum cliente corresponde a este carro.";
}
