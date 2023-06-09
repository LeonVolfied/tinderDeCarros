<?php

include('conexao.php');

?>

<!DOCTYPE html>
<html lang="Pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Esse é um projeto de apresentação podendo no futuro ser um produto">
    <meta name="keywords" content="carros,html,css,php,revenda,vendas,organização,clientes,apoio,portifolio">
    <meta name="author" content="Leonardo Leote(Leon Volfied)">
    <title>Leote Car</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="menu">
                <a href="index.php">inicio</a>
                <a href="galeriaCarros.php">Galeria de Carros</a>
                <a href="galeriaClientes.php">Galeria de Clientes</a>
                <a href="sobre.php">Sobre</a>
            </div>
            <div class="menuCadastro">
                <a href="CadastrarCarro.php">Cadastro de Carro</a>
                <a href="CadastrarCliente.php">Cadastro de Cliente</a>
            </div>
        </nav>
    </header>

    <div id="escolha" class="escolha">
        <div class="contained">
            <div class="icones">

                <a href="galeriaCarros.php" class="link">
                    <div class="b1Index">
                        <img class="icone" src="img/galeriaCarros.png" alt="Galeria de Carros"><br>
                        <p>Galeria de Carros</p>
                    </div>
                </a>

                <a href="galeriaClientes.php" class="link">
                    <div class="b1Index">
                        <img class="icone" src="img/users.png" alt="Galeria de Clientes"><br>
                        <p>Clientes</p>
                    </div>
                </a>

                <a href="CadastrarCarro.php" class="link">
                    <div class="b1Index">
                        <img class="icone" src="img/addCarro.png" alt="Cadastro de Carro "><br>
                        <p>Cadastrar novo Carro</p>
                    </div>
                </a>

                <a href="CadastrarCliente.php" class="link">
                    <div class="b1Index">
                        <img class="icone" src="img/userAdd.png" alt="Cadastro de Clientes"><br>
                        <p>Cadastrar novo Cliente</p>
                    </div>
                </a>
            </div>
        </div>
    </div>


</body>

</html>