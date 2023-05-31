<?php

include('conexao.php');

/* enviar informações via submit está funcionando
if (isset($_POST['submit'])) {

    print_r('Nome: ' . $_POST['nome']);
    print_r('<br>');
    print_r('Email: ' . $_POST['email']);
    print_r('<br>');
    print_r('telefone: ' . $_POST['telefone']);
    print_r('<br>');
    print_r('Modelo desejado: ' . $_POST['modeloDesejado']);
    print_r('<br>');
    print_r('ano desejado: ' . $_POST['anoDesejado']);
    print_r('<br>');
    print_r('valor desejado: ' . $_POST['valorDesejado']);
    print_r('<br>');
    print_r('km desejado: ' . $_POST['kmDesejado']);
    print_r('<br>');
    print_r('marca desejada: ' . $_POST['marcaDesejada']);
    print_r('<br>');
    print_r('cor desejada: ' . $_POST['corDesejada']);
    print_r('<br>');
    print_r('cambio desejado: ' . $_POST['cambioDesejado']);


    
}*/

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if (!empty($dados['submit'])) {
    // var_dump($dados);


    $query_cliente = "INSERT INTO cadastroclientes (nome, email, telefone,  ModeloDesejado, anoDesejado, valorDesejado, kmDesejado , marcaDesejada, corDesejada, cambioDesejado) 
    VALUES (:nome,:email, :telefone, :ModeloDesejado, :anoDesejado, :valorDesejado, :kmDesejado, :marcaDesejada, :corDesejada, :cambioDesejado)";

    $cad_cliente = $conn->prepare($query_cliente);

    $cad_cliente->bindParam(':nome', $dados['nome']);
    $cad_cliente->bindParam(':email', $dados['email']);
    $cad_cliente->bindParam(':telefone', $dados['telefone']);
    $cad_cliente->bindParam(':ModeloDesejado', $dados['modeloDesejado'], PDO::PARAM_STR);
    $cad_cliente->bindParam(':anoDesejado', $dados['anoDesejado']);
    $cad_cliente->bindParam(':valorDesejado', $dados['valorDesejado']);
    $cad_cliente->bindParam(':kmDesejado', $dados['kmDesejado']);
    $cad_cliente->bindParam(':marcaDesejada', $dados['marcaDesejada'], PDO::PARAM_STR);
    $cad_cliente->bindParam(':corDesejada', $dados['corDesejada']);
    $cad_cliente->bindParam(':cambioDesejado', $dados['cambioDesejado']);
    $cad_cliente->execute();

    //verificação se cadastrou
    if ($cad_cliente->rowCount()) {
        echo "<p>Cadastrado com sucesso</p>";
    } else {
        echo "<p>não foi se vira</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="Pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
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

    <div class="cadastraCliente">
        <div class="formularioCliente">
            <h1>Cadastrar Cliente</h1>
            <form class="form" method="POST" action="CadastrarCliente.php">

                <p>
                    <label for="nome">Nome Completo: </label>
                    <input value="" type="text" name="nome" id="nome">
                </p>

                <p>
                    <label for="email">E-mail:</label>
                    <input value="" type="text" name="email" id="email">
                </p>

                <p>
                    <label for="telefone">Telefone de Contato:</label>
                    <input value="" type="number" name="telefone" id="telefone">
                </p>

                <p>
                    <label for="modeloDesejado">Modelo Desejado:</label>
                    <input value="" type="text" name="modeloDesejado" id="modeloDesejado">
                </p>

                <p>
                    <label for="anoDesejado">Ano desejado: </label>
                    <input value="" type="number" name="anoDesejado" id="anoDesejado">
                </p>

                <p>
                    <label for="valorDesejado">Valor desejado: </label>
                    <input value="" type="number" name="valorDesejado" id="valorDesejado">
                </p>

                <p>
                    <label for="kmDesejado">KM desejados:</label>
                    <input value="" type="number" name="kmDesejado" id="kmDesejado">
                </p>

                <p>
                    <label for="marcaDesejada">Marca Desejada:</label>
                    <input value="" type="text" name="marcaDesejada" id="marcaDesejada">
                </p>

                <p>
                    <label for="corDesejada">Cor Desejada:</label>
                    <input value="preto" type="radio" name="corDesejada" id="corDesejada"> Preto
                    <input value="prata" type="radio" name="corDesejada" id="corDesejada"> Prata
                    <input value="vermelho" type="radio" name="corDesejada" id="corDesejada"> Vermelho
                    <input value="branco" type="radio" name="corDesejada" id="corDesejada"> Branco
                    <input value="azul" type="radio" name="corDesejada" id="corDesejada"> Azul
                </p>

                <p>
                    <label for="cambioDesejado">Câmbio Desejado:</label>
                    <input value="manual" type="radio" name="cambioDesejado" id="cambioDesejado"> Manual
                    <input value="automatico" type="radio" name="cambioDesejado" id="cambioDesejado"> Automático
                </p>


                <p class="botaoCadastrar"><input class="botao" value="Cadastrar" type="submit" name="submit"></p>

            </form>

        </div>
    </div>

</body>

</html>



<!--
nome > e-mail> telefone > marca desejada > modelo > ano extimativa de 4 anos > valor estimativa de entre 5k > km > cor > cambio > extras