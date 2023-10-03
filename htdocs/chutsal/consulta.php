<?php

include_once("conexao.php");


$sql = "select distinct 
        unidade.cod_uni, 
        nome_uni, 
        bairro_uni, 
        logradouro_uni, 
        cep_uni, 
        unidade.Cod_func, 
        funcionarios.Nome_func 
        from unidade

        left join quadra on quadra.cod_uni = unidade.Cod_uni
        inner join funcionarios on funcionarios.Cod_func = unidade.Cod_func

        order by Cod_uni ASC ";

$consulta = mysqli_query($conexao, $sql);
$registros = mysqli_num_rows($consulta);



?>

