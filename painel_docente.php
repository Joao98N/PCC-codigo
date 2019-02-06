<?php
include("conexao.php");
  if (!isset($_SESSION)) {
    session_start();
  }
  $nivel = $_SESSION['UsuarioNivel'];
  if( $nivel == 2){
    header("Location: painel_propedeutico.php");
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


	$dadosFinalizado = mysqli_query($conexao, "SELECT * FROM ocorrencias WHERE oc_processo='Finalizado'");	
		$totalFinalizado = mysqli_num_rows($dadosFinalizado);
	$dadosEmAndamento = mysqli_query($conexao, "SELECT * FROM ocorrencias WHERE oc_processo='Em andamento'");  
		$totalEmAndamento = mysqli_num_rows($dadosEmAndamento);

	
?>
<?php
       //Inicia cessão
        if (!isset($_SESSION)){
            session_start();
        }
		
        // Armazana matricula1 com o valor da matricula da sessão
		$matricula1=$_SESSION['UsuarioMatricula1'];

		$nivel=$_SESSION['UsuarioNivel'];
	
		// Selecionando Todos os dados onde oc_processo = Finalizado
	
			$dadosMatricula = mysqli_query($conexao, "SELECT * FROM ocorrencias WHERE oc_processo = 'Finalizado'");	

	   $totalFinalizado = mysqli_num_rows($dadosMatricula);
		
	


// Recebendo as linhas de dados
	$linha = mysqli_fetch_assoc($dadosMatricula);
// Armazena total de linhas recuperadas
	$total = mysqli_num_rows($dadosMatricula);
	
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
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
     var data = google.visualization.arrayToDataTable([
          ['Status', 'Porcentagem'],
          ['Finalizados',     <?php echo $totalFinalizado?>],
          ['Em andamento',      <?php echo $totalEmAndamento?>],          
        ]);

        var options = {
          title: 'Atual quantidade de ocorrências',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
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
                                <li class="active"> <a href="painel_aluno.php"> <!-- LINK DO PAINEL -->
    						<i class="fa fa-home"></i> Início
    					</a> </li>
					
                                <li> <a href="cadastro_de_ticket_docente.php">
    						<i class="fa fa-tag"></i> Enviar ticket
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="card-title-block">
                                            <h3 class="title"> Tabela de ocorrências </h3>
                                        </div>
                                        <section class="example">
                                            <div class="table-responsive">
											
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                           <td>Nome:</td>
					<td>Matricula:</td>
					<td>Data:</td>
					<td>Turno:</td>
					<td>Ocorrência:</td>
					<td>Ocorrido:</td>
					<td>Processo:</td>
					<td>Sanção:</td>
					<td>Depoimento:</td>
															
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         <?php 
			if($total){ do{	
		?>

                    <tr>
						<td><?php echo $linha['oc_nome'] ?></td>
						<td><?php echo $linha['oc_matricula'] ?></td>
						<td><?php echo $linha['oc_data'] ?></td>
						<td><?php echo $linha['oc_turno'] ?></td>
						<td><?php echo $linha['oc_ocorrencia'] ?></td>
						<td><?php echo $linha['oc_ocorrido'] ?></td>
						<td><?php echo $linha['oc_processo'] ?></td>
						<td><?php echo $linha['oc_sancao'] ?></td>
						<td><?php echo $linha['oc_depoimento'] ?></td>

					
                    </tr>
		<?php
		// Executa os dados da linha até que seja igual a 0
			} while($linha = mysqli_fetch_assoc($dadosMatricula));
		// Para os dados
			mysqli_free_result($dadosMatricula);
			}
		// Fecha o BD
			mysqli_close($conexao);
		?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
					
					
                       <!-- Sessão de  utilidades-->
                    <section class="section">
                        <div class="row sameheight-container">
                            
                                        
                                        
                            <div class="col-xl-4">
                                <div class="card sameheight-item sales-breakdown" data-exclude="xs,sm,lg">
                                    <div class="card-block">
                                        <div class="title-block">
                                            <h3 class="title"> Gráfico de Ocorrências </h3>
                                        </div>
                                    </div>
										<div id="donutchart" style="width: 405px; height: 200px;"></div>
                                </div>
                            </div>
							<div class="col-xl-4">
                                <div class="card sameheight-item sales-breakdown" data-exclude="xs,sm,lg">
                                    <div class="card-header">
                                        <div class="header-block">
                                            <h3 class="title"> Acesse o SAGE </h3>
                                        </div>
										
                                    </div>
                                    
										<center><a href="https://sage.salgueiro.ifsertao-pe.edu.br/"><img src="https://sage.salgueiro.ifsertao-pe.edu.br/img/logo.png" style="width: 405px; height: 200px"></a></center>
                                    
                                </div>
                            </div>
							<div class="col-xl-4">
                                <div class="card sameheight-item sales-breakdown" data-exclude="xs,sm,lg">
                                    <div class="card-header">
                                        <div class="header-block">
                                            <h3 class="title"> Site da Instituição </h3>
                                        </div>
                                    </div>
                                    
										<center><a href="https://www.ifsertao-pe.edu.br/"><img src="img/logoif.png" style="width: 405px; height: 200px"></a></center>
                                    
                                </div>
                            </div>
							
                        </div>
                    </section>
                   
                </article>
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