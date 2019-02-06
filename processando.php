<?php
include("conexao.php");
require("conexao.php");
?>
<html>
<head>
<title>Processando</title>
<script type="text/javascript">
function redirecionar() {
	setTimeout("window.location='index.html#hero'", 0);
}
function redirecionar1() {
	setTimeout("window.location='cadastro.html'", 0);
}
</script>
</head>
<body>
<?php
$nome=$_POST['us_nome'];
$matricula=$_POST['us_matricula'];
$email=$_POST['us_email'];
$senha=$_POST['us_senha'];
$nivel=0;


 
$consulta = mysqli_query($conexao, "SELECT * FROM usuarios WHERE email='$email'");
$linha = mysqli_num_rows($consulta);
 
 
if($linha == 0){
$sql = mysqli_query($conexao, "INSERT INTO usuarios(nome, matricula, email, senha, nivel)
VALUES ('$nome', '$matricula', '$email', '$senha', '$nivel')");
echo "<script language=javascript>alert( 'Você foi cadastrado com sucesso! Aguarde um momento para logar.' );</script>";
echo "<script>redirecionar()</script>";
}
else
{
	echo "<script language=javascript>alert( 'E-mail já cadastrado! Porfavor insira os dados novamente.' );</script>";
	echo "<script>redirecionar1()</script>";
}

?>
</body>
</html>