<?php
include("conexao.php");
require("conexao.php");
?>
<html>
<head>
<title>Processando</title>
<script type="text/javascript">
function redirecionar() {
	setTimeout("window.location='painel_propedeutico.php'", 0);
}
function redirecionar1() {
	setTimeout("window.location='cadastro_ocorrencia.php'", 0);
}
</script>
</head>
<body>
<?php
$nome=$_POST['nome1'];
$data=$_POST['data1'];
$turno=$_POST['turno1'];
$ocorrido=$_POST['ocorrido1'];
$turma=$_POST['turma1'];
$envolvidos=$_POST['envolvidos1'];
$nivel=3;
$matricula=3;



$cont= 0;
 

if($cont == 0){
$sql = mysqli_query($conexao, "INSERT INTO ticket(tk_nome, tk_matricula, tk_data, tk_turno, tk_ocorrido, tk_turma, tk_envolvidos, tk_nivel)
VALUES ('$nome', '$matricula', '$data', '$turno', '$ocorrido','$turma', '$envolvidos', '$nivel')");
echo "<script language=javascript>alert( 'Ticket cadastrador com sucesso!' );</script>";
echo "<script>redirecionar()</script>";
}


?>
</body>
</html>