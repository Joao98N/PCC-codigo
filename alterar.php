<?php 
include("conexao.php");

$id = filter_input(INPUT_GET, "id");
$nivel= filter_input(INPUT_GET, "nivel");

if ($conexao){
	$query = mysqli_query($conexao, "UPDATE usuarios SET nivel='$nivel' WHERE id='$id';");
	if ($query){
		header("Location: gerenciador_de_usuarios.php");
	}
	else {
		die ("Error: " . mysqli_error($conexao));
	}
}
else {
	die ("Error: " . mysqli_error($conexao));
}


?>