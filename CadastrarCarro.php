<?php

include('conexao.php');

/*if (isset($_POST['submit'])) {

    print_r('Foto do modelo: ' . $_POST['fotoCarro']);
    print_r('<br>');
    print_r('Modelo : ' . $_POST['modelo']);
    print_r('<br>');
    print_r('ano do modelo: ' . $_POST['ano']);
    print_r('<br>');
    print_r('valor do modelo: ' . $_POST['valor']);
    print_r('<br>');
    print_r('km  do modelo: ' . $_POST['km']);
    print_r('<br>');
    print_r('marca  do modelo: ' . $_POST['marca']);
    print_r('<br>');
    print_r('cor do modelo: ' . $_POST['cor']);
    print_r('<br>');
    print_r('cambio do modelo: ' . $_POST['cambio']);
    
}*/

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if (!empty($dados['submit'])) {
    $arquivo = $_FILES['fotoCarro'];
    // var_dump($dados);
    //var_dump($arquivo);

    $query_carro = "INSERT INTO cadastrocarros (foto, nomeModelo, anoModelo, valorModelo, kmModelo , marcaModelo, corModelo, cambioModelo) 
    VALUES (:foto, :nomeModelo, :anoModelo, :valorModelo, :kmModelo, :marcaModelo, :corModelo, :cambioModelo)";

    $cad_carro = $conn->prepare($query_carro);

    $cad_carro->bindParam(':foto', $arquivo['name']);
    $cad_carro->bindParam(':nomeModelo', $dados['modelo'], PDO::PARAM_STR);
    $cad_carro->bindParam(':anoModelo', $dados['ano']);
    $cad_carro->bindParam(':valorModelo', $dados['valor']);
    $cad_carro->bindParam(':kmModelo', $dados['km']);
    $cad_carro->bindParam(':marcaModelo', $dados['marca'], PDO::PARAM_STR);
    $cad_carro->bindParam(':corModelo', $dados['cor']);
    $cad_carro->bindParam(':cambioModelo', $dados['cambio']);
    $cad_carro->execute();

    //verificação se cadastrou
    if ($cad_carro->rowCount()) {
        //verificar imagem do carro
        if ((isset($arquivo['name'])) and (!empty($arquivo['name']))) {
            //recuperar ultimo id
            $ultimo_id = $conn->lastInsertId();
            //diretorio imagens o carros
            $diretorio = "carros/$ultimo_id/";

            //criar diretorio
            mkdir($diretorio, 0755);

            //upload do arquivo
            $nome_arquivo = $arquivo['name'];
            move_uploaded_file($arquivo['tmp_name'], $diretorio . $arquivo['name']);

            echo "<p>Cadastrado com sucesso</p>";
        }
    } else {
        echo "<p>não foi se vira</p>";
    }
}



?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Carro</title>
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

    <div class="cadastroCarro">
        <div class="formularioCarro">
            <h1>Cadastrar Carro</h1>
            <form class="form" method="POST" action="" enctype="multipart/form-data">

                <p class="fotoCarro">
                    <label for="fotoCarro">Carregar a Foto Do Carro:</label><br>
                    <input value="" type="file" name="fotoCarro" id="fotoCarro">
                </p>

                <p>
                    <label for="modelo">Nome do Modelo:</label>
                    <input value="" type="text" name="modelo" id="modelo">
                </p>

                <p>
                    <label for="ano">Ano do Modelo:</label>
                    <input value="" type="number" name="ano" id="ano">
                </p>

                <p>
                    <label for="valor">Valor do Modelo em R$:</label>
                    <input value="" type="number" name="valor" id="valor">
                </p>

                <p>
                    <label for="km">km do Modelo:</label>
                    <input value="" type="number" name="km" id="km">
                </p>

                <p>
                    <label for="marca">Marca do Modelo:</label>
                    <input value="" type="text" name="marca" id="marca">
                </p>



                <p>
                    <label for="cor">Cor do Modelo:</label>
                    <input value="preto" type="radio" name="cor" id="cor"> Preto
                    <input value="prata" type="radio" name="cor" id="cor"> Prata
                    <input value="vermelho" type="radio" name="cor" id="cor"> Vermelho
                    <input value="branco" type="radio" name="cor" id="cor"> Branco
                    <input value="azul" type="radio" name="cor" id="cor"> Azul
                </p>

                <p>
                    <label for="cambio">Câmbio do Modelo:</label>
                    <input value="manual" type="radio" name="cambio" id="cambio"> Manual
                    <input value="automatico" type="radio" name="cambio" id="cambio"> Automático
                </p>



                <p class="botaoCadastrar"><input class="botao" value="Cadastrar" type="submit" name="submit"></p>
            </form>

        </div>
    </div>



</body>

</html>


<!--<p>
    <label for=""></label>
    <input value="" type="" name="" id="">
</p>