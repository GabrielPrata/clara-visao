<?php
if (!isset($_SESSION)) {
	SESSION_START();
}

if ($_POST) {

	include 'conn.php';

	$token = $_SESSION['recuperarToken'];
	if ($token == "") {
		header("Location:recuperarSenha.php?r=S");
		$_SESSION['recuperarSenha'] = 0;
		$_SESSION['recuperarToken'] = "";
	}

	$sql = "SELECT * FROM TEMPEMAIL WHERE TEMP_LINK = '$token'";
	$busca = mysqli_query($conn, $sql);
	$dados = mysqli_fetch_array($busca);

	$senha = $_POST['password'];
	$senhaConfirm = $_POST['password2'];

	if ($senha == "") {
		header("Location:recupera.php?token=$token&error=1");
		exit();
	}
	if ($senhaConfirm == "") {
		header("Location:recupera.php?token=$token&error=2");
		exit();
	}

	if ($senha != $senhaConfirm) {
		header("Location:recupera.php?token=$token&error=3");
		exit();
	}

	$senhacrip = password_hash($senha, PASSWORD_BCRYPT);
	$id = $dados['ID_ACCOUNT'];

	$sql = "UPDATE USUARIOS SET SENHA = '$senhacrip' WHERE ID = '$id'";

	if (mysqli_query($conn, $sql)) { 
		mysqli_query($conn, "DELETE FROM TEMPEMAIL WHERE TEMP_LINK = '$token'");
		?>

		<!DOCTYPE html>
		<html lang="pt-br">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta http-equiv="X-UA-Compatible" content="ie=edge">
			<title>ClaraVisão | Alterar Senha</title>
			<link rel="stylesheet" href="../css/materialize.min.css" media="screen,projection">
			<link rel="stylesheet" href="../css/login.css" media="screen,projection">
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

								<img class="logo" src="../img/logo.png" alt="ClaraVisão" height="120">
								<br>
								<div class="formRec1">
									<span class="titulo">Você alterou sua senha com sucesso.</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<script src="js/materialize.min.js"></script>
		</body>
		</html>

		<?php } else { ?>

		<!DOCTYPE html>
		<html lang="pt-br">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta http-equiv="X-UA-Compatible" content="ie=edge">
			<title>ClaraVisão | Alterar Senha</title>
			<link rel="stylesheet" href="../css/materialize.min.css" media="screen,projection">
			<link rel="stylesheet" href="../css/login.css" media="screen,projection">
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

								<img class="logo" src="../img/logo.png" alt="ClaraVisão" height="120">
								<br>
								<div class="formRec1">
									<span class="titulo">Ocorreu um erro ao tentar alterar a senha da sua conta, contate um administrador do sistema.</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<script src="js/materialize.min.js"></script>
		</body>
		</html>


		<?php }

	} else {
		header("Location:recuperarSenha.php?r=S");
		$_SESSION['recuperarSenha'] = 0;
		$_SESSION['recuperarToken'] = "";
	}

	?>