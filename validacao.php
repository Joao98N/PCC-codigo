<?php
include("conexao.php");
?>
<html>
    <head>
<script type="text/javascript">
function loginfailed() {
	 setTimeout("window.location='index.html'", 5000);

}
</script>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
        if (!empty($_POST) AND ( empty($_POST['email']) OR empty($_POST['senha']))) {
            header("Location: index.html");
            exit;
        }

        $email = mysqli_real_escape_string($conexao, $_POST['email']);
        $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

        // Validação do usuário/senha digitados
        $sql = "SELECT * 
FROM  `usuarios` 
WHERE  `email` = '" . $email . "'
AND  `senha` = '" . $senha . "'";

        $query = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($query) != 1) {
            // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
            echo "<center>Login inválido!</center>";
			echo "<script>loginfailed()</script>";
			
            exit;
        } else {
            // Salva os dados encontados na variável $resultado
            $resultado = mysqli_fetch_assoc($query);

            // Se a sessão não existir, inicia uma
            if (!isset($_SESSION)) {
                session_start();
            }

            // Salva os dados encontrados na sessão
            $_SESSION['UsuarioID'] = $resultado['id'];
            $_SESSION['UsuarioNome'] = $resultado['nome'];
            $_SESSION['UsuarioNivel'] = $resultado['nivel'];
			$_SESSION['UsuarioEmail'] = $resultado['email'];
			$_SESSION['UsuarioMatricula1'] = $resultado['matricula'];

            // Redireciona o visitante
            if ($resultado['nivel'] == 2 ) {
                header("Location: painel_propedeutico.php");
                exit;
            }
			
			if ($resultado['nivel'] == 1) {
                header("Location: painel_docente.php");
                exit;
            }
			if ($resultado['nivel'] == 3) {
				header("Location:  painel_aluno.php");
			}
			
			else {
                header("Location: conta_nao_validada.php");
                exit;
            }

        }
        ?>



    </body>
</html>
