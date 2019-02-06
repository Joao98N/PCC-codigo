<?php
	$oc_id = filter_input(INPUT_GET, "oc_id");
	
?>
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
                                            <h4 class="title"> Alterando processo  da ocorrência </h4>
                                            <p class="title-description"> Verifique se a ocorrência está finalizada ou em aberto antes de alterar.</p>
												<form role="form" action="alterar1.php">
				<input type="hidden" name="oc_id" value="<?php echo $oc_id ?>" />
				
				
				   
					
					<div class="form-group"> <label class="control-label"></label>
                                    <div> <label>
			                    <input class="radio squared" name="oc_processo" value="Em andamento" type="radio" checked >
			                    <span>Em andamento</span>
			                </label> <label>
			                    <input class="radio squared" name="oc_processo" value="Finalizado" type="radio">
			                    <span>Finalizado</span>
			                </label> </div>
							<input type="submit" name="btEnviar" value="Alterar" class="btn btn-primary">
                                </div>
					
			</form>
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