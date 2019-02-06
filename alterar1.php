<?php 
include("conexao.php");
$id = filter_input(INPUT_GET, "oc_id");
$processo= filter_input(INPUT_GET, "oc_processo");


if ($conexao){
	$query = mysqli_query($conexao, "UPDATE ocorrencias SET oc_processo='$processo' WHERE oc_id='$id';");
	if ($query){
		header("Location: gerenciador_de_ocorrencias.php");
	}
	else {
		die ("Error: " . mysqli_error($conexao));
	}
}
else {
	die ("Error: " . mysqli_error($conexao));
}


?>