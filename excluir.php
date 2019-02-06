<?php
include("conexao.php");
$id = filter_input(INPUT_GET, "id");

if($conexao){
	$query = mysqli_query($conexao, "DELETE FROM usuarios WHERE id='$id'");
	if ($query){
		header("Location: gerenciador_de_usuarios.php");
	}
	else {
		die ("Error: " . mysqli_error($conexao)); 
	}
}
else{
	die("Error: " . mysqli_error($conexao));
}
?>