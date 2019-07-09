<?php
//Esqueceu a senha
if (!isset($_SESSION)) {
	SESSION_START();
}

if (isset($_GET['error'])) {
	$erro = $_GET['error'];
	if ($erro == 1) {
		$mensagem = "<br> <span>Oops! Você não inseriu a nova senha! </span>";
	} else if ($erro == 2) {
		$mensagem = "<br> <span>Oops! Você não inseriu a confirmação da senha! </span>";
	} else if ($erro == 3) {
		$mensagem = "<br> <span>As senhas não coincidem! </span>";
	}  else if ($erro == 4) {
		$mensagem = "<br> <span>Sua senha está incorreta! </span>";
	}
} else {
	$mensagem = "";
}

if (isset($_GET['token'])) {

	include 'conn.php';

	$token = $_GET['token'];
	$sql = "SELECT EXPIRA FROM TEMPEMAIL WHERE TEMP_LINK = '$token'";
	$busca = mysqli_query($conn, $sql);
	$num = mysqli_num_rows($busca);
	$dados = mysqli_fetch_array($busca);

	if ($num != 1) {
		header("Location:recuperarSenha.php?r=S");
		$_SESSION['recuperarSenha'] = 0;
	}

	$data = date('Y-m-d H:i:s');
	if (strtotime($data) > strtotime($dados['EXPIRA'])) {
		mysqli_query($conn, "DELETE FROM TEMPEMAIL WHERE TEMP_LINK = '$token'");
		header("Location:recuperarSenha.php?r=S");
		$_SESSION['recuperarSenha'] = 0;
	} 

	$_SESSION['recuperarToken'] = $token;
	?>

	<!DOCTYPE html>
	<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>ClaraVisão | Alterar Senha</title>
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
							<form action="recupera2.php" method="POST" accept-charset="utf-8">
								<div class="form-group col-md-12 text-center">
									<img class="logo" src="../img/logo.png" alt="ClaraVisão" height="120">
									<br>
									<span class="titulo">Digite sua nova senha</span>
									<?php 
									print $mensagem;
									?>
									<br>
								</div>
								<br>
								<input class="caixa" type="password" name="password" placeholder="Senha" autofocus class="form-control">
								<br>
								<input class="caixa" type="password" name="password2" placeholder="Confirme sua senha" autofocus class="form-control">
								<br> <br>
								<input class="botao" type="submit" value="Salvar nova senha">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="../js/materialize.min.js"></script>
	</body>
	</html>

	<?php
} else {
	// retorna para o index quando o form não receber r=S por GET
	header("Location:recuperarSenha.php?r=S");
	// define variavel da sessão como 0, negando acesso as páginas seguintes mesmo que a URL passe r=S
	$_SESSION['recuperarSenha'] = 0;
	$_SESSION['recuperarToken'] = "";
}

?>