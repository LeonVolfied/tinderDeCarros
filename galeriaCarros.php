<?php

include('conexao.php');
include('chamarCarro.php');



$query_carros = "SELECT id, foto, nomeModelo FROM cadastrocarros ORDER BY id ASC";
$result_carros = $conn->prepare($query_carros);
$result_carros->execute();
$row_carro = $result_carros->fetch(PDO::FETCH_ASSOC);




?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Carros</title>
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

    <div class="escolhaGaleria">
        <div class="containedGaleria">
            <h1>Galeria de Carros</h1>
            <div class="carros">


                <a href='carro1.php' class="link">
                    <div class="b1">
                        <?php

                        extract($row_carro);
                        echo "<img src='carros/$id/$foto' width='200px'>";
                        echo "<p>$nomeModelo</p>";

                        ?>
                        <!--<img class="carroImg" src="img/carroex.jpg" alt="Carro 1">
                        <p>carro 1 voyage</p>-->
                    </div>
                </a>

                <a href="carro2.php" class="link">
                    <div class="b1">
                        <?php

                        $row_carro = $result_carros->fetch(PDO::FETCH_ASSOC);
                        extract($row_carro);
                        echo "<img src='carros/$id/$foto' width='200px'>";
                        echo "<p>$nomeModelo</p>";

                        ?>
                        <!--<img class="carroImg" src="img/carroex.jpg" alt="Carro 2">
                        <p>carro 2 uno</p>-->
                    </div>
                </a>

                <a href="carro3.php" class="link">
                    <div class="b1">
                        <?php

                        $row_carro = $result_carros->fetch(PDO::FETCH_ASSOC);
                        extract($row_carro);
                        echo "<img src='carros/$id/$foto' width='200px'>";
                        echo "<p>$nomeModelo</p>";

                        ?>
                        <!--<img class="carroImg" src="img/carroex.jpg" alt="Carro 3 ">
                        <p>carro 3 meriva</p>-->
                    </div>
                </a>

                <a href="carro4.php" class="link">
                    <div class="b1">
                        <?php

                        $row_carro = $result_carros->fetch(PDO::FETCH_ASSOC);
                        extract($row_carro);
                        echo "<img src='carros/$id/$foto' width='200px'>";
                        echo "<p>$nomeModelo</p>";
                        ?>
                        <!--<img class="carroImg" src="img/carroex.jpg" alt="Carro 4">
                        <p>carro 4 fiesta</p>-->
                    </div>
                </a>

                <a href="carro5.php" class="link">
                    <div class="b1">
                        <?php

                        $row_carro = $result_carros->fetch(PDO::FETCH_ASSOC);
                        extract($row_carro);
                        echo "<img src='carros/$id/$foto' width='200px'>";
                        echo "<p>$nomeModelo</p>";
                        ?>
                    </div>
                </a>

                <a href="carro6.php" class="link">
                    <div class="b1">
                        <?php

                        $row_carro = $result_carros->fetch(PDO::FETCH_ASSOC);
                        extract($row_carro);
                        echo "<img src='carros/$id/$foto' width='200px'>";
                        echo "<p>$nomeModelo</p>";
                        ?>
                    </div>
                </a>

                <a href="carro7.php" class="link">
                    <div class="b1">
                        <?php

                        $row_carro = $result_carros->fetch(PDO::FETCH_ASSOC);
                        extract($row_carro);
                        echo "<img src='carros/$id/$foto' width='200px'>";
                        echo "<p>$nomeModelo</p>";
                        ?>
                    </div>
                </a>

                <a href="carro8.php" class="link">
                    <div class="b1">

                        <?php

                        $row_carro = $result_carros->fetch(PDO::FETCH_ASSOC);
                        extract($row_carro);
                        echo "<img src='carros/$id/$foto' width='200px'>";
                        echo "<p>$nomeModelo</p>";
                        ?>
                    </div>
                </a>

            </div>
        </div>
    </div>

</body>

</html>