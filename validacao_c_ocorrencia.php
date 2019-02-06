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

$nome=0;
$matricula=0;
$data=0;
$turno=0;
$ocorrencia=0;
$ocorrido=0;
$processo=0;
$sancao=0;
$depoimento=0;


$nome=$_POST['nome1'];
$matricula=$_POST['matricula1'];
$data=$_POST['data1'];
$turno=$_POST['turno1'];
$ocorrencia=$_POST['ocorrencia1'];
$ocorrido=$_POST['ocorrido1'];
$processo=$_POST['processo1'];
$sancao=$_POST['sancao1'];
$depoimento=$_POST['depoimento1'];


if ( $ocorrencia == "I" ){ $ocorrencia="I- Leve, passívél de repreensão verbal e, em caso de reincidência, no período de seis meses, será classificada como falta média.";}
if ( $ocorrencia == "II" ){ $ocorrencia="II- Média, passivél de advertência escrita, registrada em ficha individual e, em caso de reincidencia, no período de seis meses, será classificada como falta grave.";}
if ( $ocorrencia == "III" ){ $ocorrencia="III- Grave, passível de suspensão máxima de 15 dias, ressalvada a aplicação de agravante e, em caso de reincidência em até 6 meses, será classificada como gravíssima.";}
if ( $ocorrencia == "IV" ){ $ocorrencia="IV- Gravíssima, passível  de cancelamento de matrícula.";}

$cont= 0;
 

if($cont == 0){
$sql = mysqli_query($conexao, "INSERT INTO ocorrencias(oc_nome, oc_matricula, oc_data, oc_turno, oc_ocorrencia, oc_ocorrido , oc_processo , oc_sancao , oc_depoimento)
VALUES ('$nome', '$matricula', '$data', '$turno', '$ocorrencia', '$ocorrido', '$processo', '$sancao', '$depoimento')") or die(mysqli_error($conexao));
echo "<script language=javascript>alert( 'Ocorrência cadastrada com sucesso!' );</script>";
echo "<script>redirecionar()</script>";
}


?>
</body>
</html>