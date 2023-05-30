<?php

include('conexao.php');

?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Clientes</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="menu">
                <a href="index.html">inicio</a>
                <a href="galeriaCarros.php">Galeria de Carros</a>
                <a href="galeriaClientes.php">Galeria de Clientes</a>
                <a href="sobre.html">Sobre</a>
            </div>
            <div class="menuCadastro">
                <a href="CadastrarCarro.php">Cadastro de Carro</a>
                <a href="CadastrarCliente.php">Cadastro de Cliente</a>
            </div>
        </nav>
    </header>

    <div class="escolha">
        <div class="contained">
            <h1>Galeria de Clientes</h1>

            <?php

            $query_usuarios = "SELECT * FROM cadastroclientes ORDER BY id ASC";
            $result_usuarios = $conn->prepare($query_usuarios);
            $result_usuarios->execute();

            while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
                //var_dump($row_usuario);
                extract($row_usuario);
                echo "ID: $id <br>";
                echo "Nome: $nome <br>";
                echo "Telefone: $telefone <br>";
                //echo "<img src='carros/$id/$foto' width='150px'>";

                /*if ((!empty($foto)) and (file_exists("imagens/$id/$foto"))) {
                    echo "<img src='carros/$id/$foto' width='150px'><br>";
                } else {
                    echo "<img src='img/addCarro.png' width='150px'><br>";
                }*/

                echo "<hr>";
            }
            ?>





            <!--<ol>
                <li>Cliente 1</li>
                <li>Cliente 2</li>
                <li>Cliente 3</li>
                <li>Cliente 4</li>
                <li>Cliente 5</li>
            </ol>-->
        </div>
    </div>

</body>

</html>