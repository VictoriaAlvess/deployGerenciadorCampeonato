<?php
include_once("conexao.php");

$unidadeId = $_POST['unidade_id'];

// Consulta SQL para buscar os dados da unidade pelo ID
$sql = "SELECT Bairro_uni,Cod_func,Logradouro_uni,CEP_uni FROM unidade WHERE cod_uni = '$unidadeId'";
$result = mysqli_query($conexao, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
} else {
    echo json_encode(array('error' => 'Erro na consulta'));
}

mysqli_close($conexao);
?>
