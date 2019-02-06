<?php
include("conexao.php");
  if (!isset($_SESSION)) {
    session_start();
  }
  $nivel = $_SESSION['UsuarioNivel'];
  if( $nivel == 1){
    header("Location: usuario.php");
  }
  if ($nivel == 0){
	  header("Location: conta_nao_validada.php");
  }
   if( $nivel == 3){
    header("Location: painel_aluno.php");
  }
?>
<?php 

// Variável de pesquisa em registros do banco
	$parametro = filter_input(INPUT_GET, "parametro"); 

// Verificação 1
	if($parametro){
		$dados = mysqli_query($conexao, "SELECT * FROM ocorrencias WHERE oc_id like '$parametro%' ORDER BY oc_id");	
	}
// Verificação 2
	else {
		$dados = mysqli_query($conexao, "SELECT * FROM ocorrencias ORDER BY oc_id");
	}
// Recebendo as linhas de dados
	$linha = mysqli_fetch_assoc($dados);
// Armazena total de linhas recuperadas
	$total = mysqli_num_rows($dados);
	
?>
<?php 
$conexao = mysqli_connect("localhost", "root", "", "sgoa");
// Variável de pesquisa em registros do banco
	$parametro = filter_input(INPUT_GET, "parametro"); 

		$dadosFinalizado = mysqli_query($conexao, "SELECT * FROM ocorrencias WHERE oc_processo='Finalizado'");	
	   $totalFinalizado = mysqli_num_rows($dadosFinalizado);
  $dadosEmAndamento = mysqli_query($conexao, "SELECT * FROM ocorrencias WHERE oc_processo='Em andamento'");  
     $totalEmAndamento = mysqli_num_rows($dadosEmAndamento);

	
?>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Sistema de Gerenciamento de ocorrências acadêmicas | Painel </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
	
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/vendor.css">
        <!-- Theme initialization -->
        <script>
            var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {};
            var themeName = themeSettings.themeName || '';
            if (themeName)
            {
                document.write('<link rel="stylesheet" id="theme-style" href="css/app-' + themeName + '.css">');
            }
            else
            {
                document.write('<link rel="stylesheet" id="theme-style" href="css/app.css">');
            }
        </script>
		
		<script>
      function preecherOcorrencias(elem){
        tipoOcorrencia = elem.value;

        ocorrencias.innerHTML = null;
        ocorrencias =  document.getElementById('ocorrencias');
		if (tipoOcorrencia == "I"){
        teste = document.createElement('option');
        teste.innerHTML = "I- Faltar com asseio pessoal, dos seus pertences e das dependências e equipamentos do campus sob sua repsonsabilidade e/ou uso.";
        teste.value = 'I- Faltar com asseio pessoal, dos seus pertences e das dependências e equipamentos do campus sob sua repsonsabilidade e/ou uso.';
        ocorrencias.appendChild(teste);        
        teste = document.createElement('option');
        teste.innerHTML = "II-  Descumprir o hotário geral do campus.";
        teste.value = 'II-  Descumprir o hotário geral do campus.';
        ocorrencias.appendChild(teste);
		teste = document.createElement('option');
        teste.innerHTML = "III- Proferir palavras obscenas ou de baixo calão.";
        teste.value = 'III- Proferir palavras obscenas ou de baixo calão.';
        ocorrencias.appendChild(teste);
		teste = document.createElement('option');
        teste.innerHTML = "IV- Descumprir as normas do campus que orientam quanto ao  uso de vestuários, uniformes e adornos.";
        teste.value = 'V- Descumprir as normas do campus que orientam quanto ao  uso de vestuários, uniformes e adornos.';
        ocorrencias.appendChild(teste);
		teste = document.createElement('option');
        teste.innerHTML = "V- Manter-se em atitude de desiteresse frente aos  servidores e colegas, pertubando o ambiente de trabalho.";
        teste.value = 'V- Manter-se em atitude de desiteresse frente aos  servidores e colegas, pertubando o ambiente de trabalho.';
        ocorrencias.appendChild(teste);
		teste = document.createElement('option');
        teste.innerHTML = "VI- Outras não constantes nesse rol e que podem ser equiparadas.";
        teste.value = 'VI- Outras não constantes nesse rol e que podem ser equiparadas.';
        ocorrencias.appendChild(teste);
        }
        if (tipoOcorrencia == "II"){
        teste = document.createElement('option');
        teste.innerHTML = "I- Praticar atos atentatórios à dignidade moral dos colegas e servidores.";
        teste.value = 'I- Praticar atos atentatórios à dignidade moral dos colegas e servidores.';
        ocorrencias.appendChild(teste);        
        teste = document.createElement('option');
        teste.innerHTML = "II- Causar danos em bens pertecentes ao campus e propriedade alheia.";
        teste.value = 'II- Causar danos em bens pertecentes ao campus e propriedade alheia.';
        ocorrencias.appendChild(teste);
		 teste = document.createElement('option');
        teste.innerHTML = "III- Omitir-se, sem justificativa, de programas esportivas, cívicas, artítiscas, culturais e religiosos no campus ou fora dele, quando representado.";
        teste.value = 'III- Omitir-se, sem justificativa, de programas esportivas, cívicas, artítiscas, culturais e religiosos no campus ou fora dele, quando representado.';
        ocorrencias.appendChild(teste);
		 teste = document.createElement('option');
        teste.innerHTML = "IV- Descumprir as tarefas escolares, sem justificativa.";
        teste.value = 'IV- Descumprir as tarefas escolares, sem justificativa.';
        ocorrencias.appendChild(teste);
		 teste = document.createElement('option');
        teste.innerHTML = "V- Usar de meios ilícitos durante a realização de avaliações e/ou trabalhos escolares.";
        teste.value = 'V- Usar de meios ilícitos durante a realização de avaliações e/ou trabalhos escolares.';
        ocorrencias.appendChild(teste);
		 teste = document.createElement('option');
        teste.innerHTML = "VI- Usar de desonestidade para eximir-se das atividades escolares.";
        teste.value = 'VI- Usar de desonestidade para eximir-se das atividades escolares.';
        ocorrencias.appendChild(teste);
		 teste = document.createElement('option');
        teste.innerHTML = "VII- Omitir e/ou distorcer informações  quando solicitadas.";
        teste.value = 'VII- Omitir e/ou distorcer informações  quando solicitadas.';
        ocorrencias.appendChild(teste);
		 teste = document.createElement('option');
        teste.innerHTML = "VIII- Agir de forma incoveniente aos bons usos e costumes em sala de aula e demais dependências do campus, ou fora deste, quando em visitas técnicas ou atividades complementares.";
        teste.value = 'VIII- Agir de forma incoveniente aos bons usos e costumes em sala de aula e demais dependências do campus, ou fora deste, quando em visitas técnicas ou atividades complementares.';
        ocorrencias.appendChild(teste);
		 teste = document.createElement('option');
        teste.innerHTML = "IX- Vetado.";
        teste.value = 'IX- Vetado.';
        ocorrencias.appendChild(teste);
		 teste = document.createElement('option');
        teste.innerHTML = "X- Utilizar o telefone celular ou outro equipamento eletrônico que interfia no bom andamento das atividades escolares.";
        teste.value = 'X- Utilizar o telefone celular ou outro equipamento eletrônico que interfia no bom andamento das atividades escolares.';
        ocorrencias.appendChild(teste);
		 teste = document.createElement('option');
        teste.innerHTML = "XI- Manter-se em atitude de desrespeito frente aos servidores e colegas, pertubando o ambiente de trabalho.";
        teste.value = 'XI- Manter-se em atitude de desrespeito frente aos servidores e colegas, pertubando o ambiente de trabalho.';
        ocorrencias.appendChild(teste);
		 teste = document.createElement('option');
        teste.innerHTML = "XII- Outras não constantes nesse rol e que podem ser equiparadas.";
        teste.value = 'XII- Outras não constantes nesse rol e que podem ser equiparadas.';
        ocorrencias.appendChild(teste);
        }
		if (tipoOcorrencia == "III"){
        teste = document.createElement('option');
        teste.innerHTML = "I- Tentativa de furto ou roubo.";
        teste.value = 'I- Tentativa de furto ou roubo.';
        ocorrencias.appendChild(teste);        
        teste = document.createElement('option');
        teste.innerHTML = "II- Tentativa de agressão.";
        teste.value = 'II- Tentativa de agressão.';
        ocorrencias.appendChild(teste);
		teste = document.createElement('option');
        teste.innerHTML = "III- Coagir colegas à compra de rifas e/ou à participação em sorteios ou em jogos de azar.";
        teste.value = 'III- Coagir colegas à compra de rifas e/ou à participação em sorteios ou em jogos de azar.';
        ocorrencias.appendChild(teste);
		teste = document.createElement('option');
        teste.innerHTML = "IV- Chegar com sinais e sintomas de embriaguez nas dependências do campus.";
        teste.value = 'IV- Chegar com sinais e sintomas de embriaguez nas dependências do campus.';
        ocorrencias.appendChild(teste);
		teste = document.createElement('option');
        teste.innerHTML = "V- Praticara retirada de equipamentos, produtos e outros, de qualquer setor, sem a prévia autorização do responsável pelo mesmo.";
        teste.value = 'V- Praticara retirada de equipamentos, produtos e outros, de qualquer setor, sem a prévia autorização do responsável pelo mesmo.';
        ocorrencias.appendChild(teste);
		teste = document.createElement('option');
        teste.innerHTML = "VI- Usar de forma indevida o nome ou símbolo do IF SERTÃO-PE.";
        teste.value = 'VI- Usar de forma indevida o nome ou símbolo do IF SERTÃO-PE.';
        ocorrencias.appendChild(teste);
		teste = document.createElement('option');
        teste.innerHTML = "VII- Promover eventos, usando o nome da Instituição, sem a devida autorização da Direção Geral.";
        teste.value = 'VII- Promover eventos, usando o nome da Instituição, sem a devida autorização da Direção Geral.';
        ocorrencias.appendChild(teste);
		teste = document.createElement('option');
        teste.innerHTML = "VIII- Efetuar transação comercial dentro do campus.";
        teste.value = 'VIII- Efetuar transação comercial dentro do campus.';
        ocorrencias.appendChild(teste);
		teste = document.createElement('option');
        teste.innerHTML = "IX- Divulgar, sem autorização, por qualquer meio de pubilicdade, assuntos que envolvam direta ou indiretamente o nome do IF SERTÃO-PE e de servidores.";
        teste.value = 'IX- Divulgar, sem autorização, por qualquer meio de pubilicdade, assuntos que envolvam direta ou indiretamente o nome do IF SERTÃO-PE e de servidores.';
        ocorrencias.appendChild(teste);
		teste = document.createElement('option');
        teste.innerHTML = "X- Outras não constantes nesse rol e que podem ser equiparadas.";
        teste.value = 'X- Outras não constantes nesse rol e que podem ser equiparadas.';
        ocorrencias.appendChild(teste);
        }
		if (tipoOcorrencia == "IV"){
        teste = document.createElement('option');
        teste.innerHTML = "I- Portar ou usar qualquer espécie de arma";
        teste.value = 'I- Portar ou usar qualquer espécie de arma';
        ocorrencias.appendChild(teste);        
        teste = document.createElement('option');
        teste.innerHTML = "II- Furtar ou roubar.";
        teste.value = 'II- Furtar ou roubar.';
        ocorrencias.appendChild(teste);
		 teste = document.createElement('option');
        teste.innerHTML = "III- Usar, portar ou depoistar bebidas alcoólicas,  entorpecentes e/ou drogas lícitas e/ou ilícitas nas dependências da instituição.";
        teste.value = 'III- Usar, portar ou depoistar bebidas alcoólicas,  entorpecentes e/ou drogas lícitas e/ou ilícitas nas dependências da instituição.';
        ocorrencias.appendChild(teste);
		 teste = document.createElement('option');
        teste.innerHTML = "IV- Agredir física ou moralmente colegas ou servidores.";
        teste.value = 'IV- Agredir física ou moralmente colegas ou servidores.';
        ocorrencias.appendChild(teste);
		 teste = document.createElement('option');
        teste.innerHTML = "V- Adulterar pareceres e/ou documentos.";
        teste.value = 'V- Adulterar pareceres e/ou documentos.';
        ocorrencias.appendChild(teste);
		 teste = document.createElement('option');
        teste.innerHTML = "VI- Depedrar o patrimônio público.";
        teste.value = 'VI- Depedrar o patrimônio público.';
        ocorrencias.appendChild(teste);
		 teste = document.createElement('option');
        teste.innerHTML = "VII- Promover vandalismo.";
        teste.value = 'VII- Promover vandalismo.';
        ocorrencias.appendChild(teste);
		 teste = document.createElement('option');
        teste.innerHTML = "VIII- Usar demaneira indevida diferentes espaços do campus colocando em risco a integridade própria e/ou de terceiros.";
        teste.value = 'VIII- Usar demaneira indevida diferentes espaços do campus colocando em risco a integridade própria e/ou de terceiros.';
        ocorrencias.appendChild(teste);
		 teste = document.createElement('option');
        teste.innerHTML = "IX- Aplicar trotes atentatórios à dignidade de  colegas e servidores.";
        teste.value = 'IX- Aplicar trotes atentatórios à dignidade de  colegas e servidores.';
        ocorrencias.appendChild(teste);
		 teste = document.createElement('option');
        teste.innerHTML = "X- Usar barragens, rios, lagos e açudes do campus de origem e proximidades para banho, pesca ou outras atividades afins, sem autorização.";
        teste.value = 'X- Usar barragens, rios, lagos e açudes do campus de origem e proximidades para banho, pesca ou outras atividades afins, sem autorização.';
        ocorrencias.appendChild(teste);
		 teste = document.createElement('option');
        teste.innerHTML = "XI-  Praticar atos sexuais ou  libidinosos dentro da escola.";
        teste.value = 'XI-  Praticar atos sexuais ou  libidinosos dentro da escola.';
        ocorrencias.appendChild(teste);
		 teste = document.createElement('option');
        teste.innerHTML = "XII- Outras constantes nesse rol e que podem ser equiparadas.";
        teste.value = 'XII- Outras constantes nesse rol e que podem ser equiparadas.';
        ocorrencias.appendChild(teste);
		
        }
     
      }
    </script>
    </head>

    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                <header class="header">
                    <div class="header-block header-block-collapse hidden-lg-up"> <button class="collapse-btn" id="sidebar-collapse-btn">
    			<i class="fa fa-bars"></i>
    		</button> </div>
                    <div class="header-block header-block-search hidden-sm-down">
                      
                    </div>
                   
                    <div class="header-block header-block-nav">
                        <ul class="nav-profile">
                            <li class="notifications new"> <a href="" data-toggle="dropdown"><!--Antes do  nome da pessoa --> </a>
                     <div class="dropdown-menu notifications-dropdown-menu">
                                    
                                    
                            <li class="profile dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <div class="img" style="background-image: url('https://imgur.com/nh3ZIVx')"> </div> <span class="name">
    			      <?php echo $_SESSION['UsuarioNome']?>
    			    </span> </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1"> <a class="dropdown-item" href="#">
    			     
                                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="logout.php">
    			      <i class="fa fa-power-off icon"></i>
    			      Encerrar Sessão
    			    </a> </div>
                            </li>
                        </ul>
                    </div>
                </header>
                <aside class="sidebar">
                    <div class="sidebar-container">
                        <div class="sidebar-header">
                            <div class="brand">
                                <div class="logo"> <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> </div> SGOA </div>
                        </div>
						
                        <nav class="menu">
                            <ul class="nav metismenu" id="sidebar-menu">
                                <li class="active"> <a href="painel_propedeutico.php"> <!-- LINK DO PAINEL -->
    						<i class="fa fa-home"></i> Início
    					</a> </li>
						
                                <li> <a href="cadastro_ocorrencia.php">
    						<i class="fa fa-pencil-square-o"></i> Cadastrar ocorrência
    					</a> </li>
						 <li> <a href="gerenciador_de_ocorrencias.php">
    						<i class="fa fa-wrench"></i> Gerenciador de OC
							</a></li>
							<li>
						
                                <li> <a href="gerenciador_de_tickets.php">
    						<i class="fa fa-tag"></i> Gerenciador de tickets
							</a></li>
							<li>
							<a href="gerenciador_de_usuarios.php">
    						<i class="fa fa-user"></i> Gerenciador de usuários
							</a></li>
                            </ul>
                        </nav>
                    </div>
                    <footer class="sidebar-footer">
                        <ul class="nav metismenu" id="customize-menu">
                            <li>
                                <ul>
                                    <li class="customize">
                                        <div class="customize-item">
                                            <div class="row customize-header">
                                                <div class="col-xs-4"> </div>
                                                <div class="col-xs-4"> <label class="title">fixed</label> </div>
                                                <div class="col-xs-4"> <label class="title">static</label> </div>
                                            </div>
                                            <div class="row hidden-md-down">
                                                <div class="col-xs-4"> <label class="title">Sidebar:</label> </div>
                                                <div class="col-xs-4"> <label>
    				                        <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed" >
    				                        <span></span>
    				                    </label> </div>
                                                <div class="col-xs-4"> <label>
    				                        <input class="radio" type="radio" name="sidebarPosition" value="">
    				                        <span></span>
    				                    </label> </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4"> <label class="title">Header:</label> </div>
                                                <div class="col-xs-4"> <label>
    				                        <input class="radio" type="radio" name="headerPosition" value="header-fixed">
    				                        <span></span>
    				                    </label> </div>
                                                <div class="col-xs-4"> <label>
    				                        <input class="radio" type="radio" name="headerPosition" value="">
    				                        <span></span>
    				                    </label> </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-4"> <label class="title">Footer:</label> </div>
                                                <div class="col-xs-4"> <label>
    				                        <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
    				                        <span></span>
    				                    </label> </div>
                                                <div class="col-xs-4"> <label>
    				                        <input class="radio" type="radio" name="footerPosition" value="">
    				                        <span></span>
    				                    </label> </div>
                                            </div>
                                        </div>
                                        <div class="customize-item">
                                            <ul class="customize-colors">
                                                <li> <span class="color-item color-red" data-theme="red"></span> </li>
                                                <li> <span class="color-item color-orange" data-theme="orange"></span> </li>
                                                <li> <span class="color-item color-green active" data-theme=""></span> </li>
                                                <li> <span class="color-item color-seagreen" data-theme="seagreen"></span> </li>
                                                <li> <span class="color-item color-blue" data-theme="blue"></span> </li>
                                                <li> <span class="color-item color-purple" data-theme="purple"></span> </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul> <a href="">
    					<i class="fa fa-cog"></i> Customize
    				</a> </li>
                        </ul>
                    </footer>
                </aside>
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <article class="content dashboard-page">
				
					<!-- Criando a tabela com todas as ocorrências existentes-->
					 <section class="section">
                        <div class="row sameheight-container">
                            <div class=".col-xs-12 .col-md-8">
                                <div class="card sameheight-item stats" data-exclude="xs">
                                    <div class="card-block">
                                        <div class="title-block">
                                            <h4 class="title"> Cadastro de ocorrência </h4>
                                            <p class="title-description"> Insira os dados para cadastrar a ocorrência.</p>
												<form name="cadastro_de_ocorrencia" method="post" action="validacao_c_ocorrencia.php">
<fieldset>
<br>
<table>

<tr>
    <td rowspan="13">
		<img src="img/svg/pixel.svg" width="100" height="100">
	</td>

<tr>
	<td>
		<label for="nome1">Nome:</label>
	</td>
	<td align="left">
		<input type="text" name="nome1" id="nome1" maxlength="100" required>
	</td>
</tr>
<tr>
    <td>
        <label for="matricula1">Matrícula:</label>
    </td>
    <td>
        <input type="text" name="matricula1" id="matricula1" maxlength="10" required>
    </td>
</tr>
<tr>
    <td>
        <label for="data1">Data:</label>
    </td>
    <td>
        <input type="date" name="data1" id="data1" required>
    </td>
</tr>
<tr>
	<td>
		<label for="turno1">Turno:</label>
	</td>
	<td align="left">
		<input type="radio" name="turno1" value="Manhã" id="turno1" checked>Manhã
		<input type="radio" name="turno1" value="Tarde" id="turno1">Tarde
		<input type="radio" name="turno1" value="Noite" id="turno1">Noite
	</td>
</tr>
<tr>
	<td>
	<label for="ocorrencia1">Tipo da ocorrência:</label>
	</td>
	<td>
		<select onchange="preecherOcorrencias(this)" name="ocorrencia1" id="ocorrencia1" required>
			<option value="I" >I- Leve, passívél de repreensão verbal e, em caso de reincidência, no período de seis meses, será classificada como falta média.</option>
			<option value="II">II- Média, passivél de advertência escrita, registrada em ficha individual e, em caso de reincidencia, no período de seis meses, será classificada como falta grave.</option>
			<option value="III">III- Grave, passível de suspensão máxima de 15 dias, ressalvada a aplicação de agravante e, em caso de reincidência em até 6 meses, será classificada como gravíssima.</option>
			<option value="IV">IV- Gravíssima, passível  de cancelamento de matrícula.</option>
		</select>
	</td>
</tr>
<tr>
	<td>
	<label for="ocorrido1">Ocorrência:</label>
	</td>
	<td>
		<select id="ocorrencias" name="ocorrido1" id="ocorrido1" required>
			<option>I- Faltar com asseio pessoal, dos seus pertences e das dependências e equipamentos do campus sob sua repsonsabilidade e/ou uso.</option>
			<option>II-  Descumprir o hotário geral do campus.</option>
			<option>III- Proferir palavras obscenas ou de baixo calão.</option>
			<option>IV- Descumprir as normas do campus que orientam quanto ao  uso de vestuários, uniformes e adornos.</option>
			<option>V- Manter-se em atitude de desiteresse frente aos  servidores e colegas, pertubando o ambiente de trabalho.</option>
			<option>VI- Outras não constantes nesse rol e que podem ser equiparadas.</option>
		</select>
	</td>
</tr>
<tr>
	<td>
		<label for="processo1">Processo:</label>
	</td>
	<td align="left">
		<input type="radio" name="processo1" value="Em andamento" id="processo1" checked>Em andamento
		<input type="radio" name="processo1" value="Finalizado" id="processo1">Finalizado
	</td>
</tr>
<td><label for="sancao1">Sansção:</label>
	</td>
	<td>
	<select name="sancao1" id="sancao1" required>
	<option>I- Advertência oral.</option>
	<option>II- Avertência escrita, com registro em ficha individual do estudante.</option>
	<option>III- Medidas sócioeducativas de caráter alternativo.</option>
	<option>IV- Suspensão.</option>
	<option>V- Cancelamento de matrícula.</option>
	</select>
	</td>
</tr>
<tr>
<td><label for="depoimento1">Depoimento:</label>
	</td>
	<td>
	<textarea name="depoimento1" id="depoimento1" maxlength="1000" required></textarea>
	</td>
</tr>


<tr>
	<td><input type="submit" name="btEnviar" value="Cadastrar" class="btn btn-primary"></td>
	<td><input type="reset" value="Limpar Dados" class="btn btn-primary"></td>
</tr>
</table>           
</fieldset>
</table>

</form>
                                        </div>
                                        
                            
                        </div>
                    </section>
					
					
                    
                   
               
                <footer class="footer">
                    <center><div class="footer-block buttons">© João Igôr Rodrigues Nunes. Todos os direitos reservados.</div></center>
                    <div class="footer-block author">
                        <ul>
                            <li>  <a href="https://github.com/modularcode">ModularCode</a> </li>
                            <li> <a href="https://github.com/modularcode/modular-admin-html#get-in-touch">get in touch</a> </li>
                        </ul>
                    </div>
                </footer>
                
                
            </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
        <script src="js/vendor.js"></script>
        <script src="js/app.js"></script>
		

</html>