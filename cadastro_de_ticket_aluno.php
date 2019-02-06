<?php
	
	$matricula = filter_input(INPUT_GET, "matricula");
?>
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
  if ($nivel == 1){
	  header("Location: painel_docente.php");
  }
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
						
                       
                                <li> <a href="cadastro_de_ticket_aluno.php">
    						<i class="fa fa-tag"></i> Enviar ticket
							</a></li>
							<li>
							
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
                                            <h4 class="title"> Cadastro de ticket </h4>
                                            <p class="title-description"> Insira os dados para cadastrar o ticket</p>
												<form name="cadastro_de_ticket_aluno" method="post" action="validacao_c_ticket_aluno.php">
<fieldset>
<table>
<input type="hidden" name="oc_id" value="<?php echo $oc_id ?>" />
<tr>
    <td rowspan="14">
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
	<td>
	<label for="ocorrido1">Ocorrido:</label>
	</td>
	<td>
		<textarea name="ocorrido1" maxlength="250">  </textarea>
			
	</td>
</tr>
<tr>
<td><label for="turma1">Turma:</label>
	</td>
	<td>
	<input type="text" name="turma1" required>
	</td>
</tr>
<td><label for="envolvidos1">Envolvidos:</label>
	</td>
	<td>
	<input type="text" name="envolvidos1" required>
	</td>
</tr>
<tr>
	<td><input type="submit" value="Enviar Ticket" class="btn btn-primary"></td>
	<td><input type="reset" value="Resetar Dados" class="btn btn-primary"></td>
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