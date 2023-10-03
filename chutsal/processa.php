<?php

include_once("conexao.php");
include_once("consulta.php");

$codigouni = $_POST['codigo-unidade'];
$nomeuni = $_POST['nome'];
$loguni = $_POST['logradouro'];
$bairrouni = $_POST['bairro'];
$cepuni = $_POST['cep'];
$func = $_POST['funcionario'];




$sql = "insert into unidade (
    Cod_uni,Nome_uni,Bairro_uni,Cod_func,Logradouro_uni,CEP_uni) values ('$codigouni','$nomeuni','$bairrouni','$func','$loguni','$cepuni')";
$salvar = mysqli_query($conexao, $sql);

$linhas = mysqli_affected_rows($conexao);

$unidade = "select distinct 
            unidade.cod_uni, 
            nome_uni, 
            bairro_uni, 
            logradouro_uni, 
            cep_uni, 
            unidade.Cod_func, 
            Nome_func 
            from unidade

            left join quadra on quadra.cod_uni = unidade.Cod_uni
            inner join funcionarios on funcionarios.Cod_func = unidade.Cod_func

            order by Cod_uni ASC";

$dados = mysqli_query($conexao, $unidade) or die(mysqli_error());
$listuni = mysqli_fetch_assoc($dados);
$total = mysqli_num_rows($dados);

mysqli_close($conexao);
?>

