<?php
 //Esqueceu a senha
if (!isset($_SESSION)) {
	SESSION_START();
}

if ($_GET['r'] == "S") {
	// define variavel como 1, permitindo acesso as páginas seguintes
	$_SESSION['recuperarSenha'] = 1;

	// Mensagens de erro que aparecerão no caso de valores errados passados para o formulário seguinte
	if (isset($_GET['erro'])) {
		$erro = $_GET['erro'];
		if ($erro == 1) {
			$mensagem = "<br> Oops! Você não inseriu o Usuário!";
		} else if ($erro == 2) {
			$mensagem = "<br> Oops! Não encontramos o usuário informado em nosso sistema!";
		} else if ($erro == 3) {
			$mensagem = "<br> Ocorreu um erro ao enviar o e-mail de recuperação, contate o administrador do sistema!";
		} 
	} else {
		$mensagem = "";
	}

	?>
	<!DOCTYPE html>
	<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>ClaraVisão | Esqueci minha senha</title>
		<link rel="stylesheet" href="../css/login.css" media="screen,projection">
		<link rel="stylesheet" href="../css/materialize.min.css" media="screen,projection">
		<link rel="shortcut icon" href="../favicon.png" />
	</head>
	<body>
		<!-- Tela inicial do sistema -->
		<div class="container center-align">
			<div class="row center">
				<div class="col s12 topo">
					<div class="card cardLogin">
						<div class="card-content white-text center">
							<!-- Passa o valor S para a variavel r, validando o formulario de esqueceu a senha -->
							<form action="recuperarSenha2.php" method="POST" accept-charset="utf-8">

								<img class="logo" src="../img/logo.png" alt="ClaraVisão" height="120">
								<br>
								<div class="formRec1">
									<span class="titulo">Digite seu Usuário ou E-mail para a redefinição de senha</span>
									<?php 
			// Printa a mensagem de erro informada por GET
									print $mensagem;
									?>
								</div>
								<br>
								<input class="caixa" type="text" name="username" placeholder="Usuário" autofocus>
								<br> <br>
								<input class="botao" type="submit" value="Confirmar">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="js/materialize.min.js"></script>
	</body>
	</html>

	<?php
} else {
	// retorna para o index quando o form não receber r=S por GET
	header("Location:../index.php");
	// define variavel da sessão como 0, negando acesso as páginas seguintes mesmo que a URL passe r=S
	$_SESSION['recuperarSenha'] = 0;
}
?>