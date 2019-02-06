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
	setTimeout("window.location='gerenciador_de_tickets.php'", 0);
}
</script>
</head>
<body>
<?php
$nome1=$_POST['nome1'];
$matricula1=$_POST['matricula1'];
$data1=$_POST['data1'];
$turno1=$_POST['turno1'];
$ocorrencia1=$_POST['ocorrencia1'];
$ocorrido1=$_POST['ocorrido1'];
$processo1=$_POST['processo1'];
$sancao1=$_POST['sancao1'];
$depoimento1=$_POST['depoimento1'];


if ( $ocorrencia1 == "I" ){ $ocorrencia1="I- Leve, passívél de repreensão verbal e, em caso de reincidência, no período de seis meses, será classificada como falta média.";}
if ( $ocorrencia1 == "II" ){ $ocorrencia1="II- Média, passivél de advertência escrita, registrada em ficha individual e, em caso de reincidencia, no período de seis meses, será classificada como falta grave.";}
if ( $ocorrencia1 == "III" ){ $ocorrencia1="III- Grave, passível de suspensão máxima de 15 dias, ressalvada a aplicação de agravante e, em caso de reincidência em até 6 meses, será classificada como gravíssima.";}
if ( $ocorrencia1 == "IV" ){ $ocorrencia1="IV- Gravíssima, passível  de cancelamento de matrícula.";}

$cont= 0;
 

if($cont == 0){
$sql = mysqli_query($conexao, "INSERT INTO ocorrencias(oc_nome, oc_matricula, oc_data, oc_turno, oc_ocorrencia, oc_ocorrido , oc_processo , oc_sancao , oc_depoimento)
VALUES ('$nome1', '$matricula1', '$data1', '$turno1', '$ocorrencia1', '$ocorrido1', '$processo1', '$sancao1', '$depoimento1')");
echo "<script language=javascript>alert( 'Ocorrência cadastrada com sucesso!' );</script>";
echo "<script>redirecionar()</script>";
}


?>
</body>
</html>