<?php
include_once("conexao.php");
include_once("consulta.php");

$linhas = mysqli_affected_rows($conexao);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chute Sal</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #4682B4;
            height: 5%;
            display: flex;
            align-items: center;
        }

        #logo {
            width: 6%;
            height: 6%;
            padding: 1%;
            margin-left: 2%;
            border-radius: 50%;
        }

        

        .central {
            padding: 20px;
            margin: 10px 50px 50px 50px;
            text-align: center;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border: 1px solid black;
            border-radius: 20px;
        }

        .links {
            margin-right: 5%;
            background-color: white;
            color: black;
            border-radius: 5px;
            padding: 15px;
            text-decoration: none;
        }

        .links:hover{
            background-color: #8470FF;
        }
        .pesquisa {
            border-radius: 20px;
            height: 6%;
        }

        .box-links {
            height: 20%;
            width: 40%;
            display: flex;
            margin-left: auto;
            align-items: center;
            padding-right: 2%;
        }

        .titulo {
            text-transform: uppercase; 
            text-align: center;
        }


        .bloco-imagens{
            display: flex;
            align-items: center;
        }

        .espaço{
            width: 80%;
        }

        #add{
            height: 50px;
            width: 50px;
            margin-top: 20px;
        }

        .imagens{
            width: 30px;
            height: 30px;
            margin-left: 2px;
        }

        #box-form{
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
        }

        #formulario {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
        }


        article{
            width: 100%;
            box-sizing: border-box;
            padding:10px;
            background-color: #8470FF;
            margin-bottom: 5px;
            border-radius: 20px;
            font-family: "Gill Sans";
        }

    </style>
</head>
<body>
    <header>
        <img src="logo.jpg" id="logo">
        <div class="box-links">
            <a class="links" href="cadastrar.html">Cadastrar</a>
            <a class="links" href="cadastrar.html">Campeonatos</a>
            <a class="links" href="unidades.php">Unidades</a>
            <a class="links" href="telaQuadras.html">Quadras</a>
        </div>
    </header>
    <div class="titulo">
        <h1>Unidades</h1>
    </div>
    <div class="central">
        <form method = "get" action = "">
            Filtrar por unidade: <input type = "texte" name = "filtro" class = "campo" required autofocus>
            <input type = "submit" value = "Pesquisar" class = "btn">

        </form>
        
        <?php

print "$registros registros encontrados";
print "<br><br>";

while($exibirRegistros = mysqli_fetch_array($consulta)){

    $codigo = $exibirRegistros[0];
    $nome = $exibirRegistros[1];
    $bairro = $exibirRegistros[2];
    $logradouro = $exibirRegistros[3];
    $cep = $exibirRegistros[4];
    $funcionario = $exibirRegistros[5];

    print "<article>";

    print "Código: $codigo<br>";
    print "Nome: $nome<br>";
    print "Bairro: $bairro<br>";
    print "Logradouro: $logradouro<br>";
    print "CEP: $cep<br>";
    print "Funcionário: $funcionario<br>";
    
    print "</article>";
}
    mysqli_close($conexao);
?>
    <img src="adicionar.png" id="add" onclick="exibirFormulario()">
    </div>
    <div class="box-form">
        <div id="formulario">
            <span class="close" id="closeModalBtn">&times;</span>
            <h2>Adicionar Unidade</h2>
            <form method="post" action="processa.php"  >
                <label for="nome">Nome:</label>
                </br>
                <input type="text" id="nome" name="nome">
                </br>

                <label for="codigo-unidade">Código Unidade:</label>
                </br>
                <input type="text" id="codigo-unidade" name="codigo-unidade">
                </br>

                <label for="logradouro">Logradouro:</label>
                </br>
                <input type="text" id="logradouro" name="logradouro">
                </br>
                
                <label for="bairro">Bairro:</label>
                </br>
                <input type="text" id="bairro" name="bairro">
                </br>

                <label for="cep">CEP:</label>
                </br>
                <input type="text" id="cep" name="cep">
                </br>
                
                <label for="funcionario">Funcionario:</label>
                </br>
                <input type="num" id="funcionario" name="funcionario">
                </br>                
                <button type="submit">Adicionar</button>
            </form>
        </div>
    </div>
    <script>
        function exibirFormulario() {
            var formulario = document.getElementById('formulario');
            formulario.style.display = 'block';
        }

        closeModalBtn.addEventListener('click', () => {
            formulario.style.display = 'none';
        });
    </script>
</body>
</html>
