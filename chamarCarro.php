<?php




function chamarCarro()
{
    include('conexao.php');
    $query_carros = "SELECT id, foto, nomeModelo FROM cadastrocarros ORDER BY id ASC";
    $result_carros = $conn->prepare($query_carros);
    $result_carros->execute();
    $row_carro = $result_carros->fetch(PDO::FETCH_ASSOC);
    extract($row_carro);
    /*echo "<img src='carros/$id/$foto' width='100px'>";
    echo "<p>$nomeModelo</p>";*/
    return;
}

function chamarOutroCarro()
{
    chamarCarro();

    extract($row_carro);
    echo "<img src='carros/$id/$foto' width='100px'>";
    echo "<p>$nomeModelo</p>";
    return;
}

function exibir_mensagem()
{
    echo "olá\n";
    echo "funcionou?";
}
