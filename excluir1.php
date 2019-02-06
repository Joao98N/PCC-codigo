<?php
include("conexao.php");
$id = filter_input(INPUT_GET, "oc_id");


if($conexao){
	$query = mysqli_query($conexao, "DELETE FROM ocorrencias WHERE oc_id='$id'");
	if ($query){
		header("Location: gerenciador_de_ocorrencias.php");
	}
	else {
		die ("Error: " . mysqli_error($conexao)); 
	}
}
else{
	die("Error: " . mysqli_error($conexao));
}
?>