<?php 
// Envio de e-mail
if (!isset($_SESSION)) {
	SESSION_START();
}

if ($_POST) {
	include 'conn.php';
	include '../PHPMailer/PHPMailerAutoload.php';

	//Username informado pelo usuário
	$username = mysqli_real_escape_string($conn, $_POST['username']);

	//Verifica mais uma vez se o username é igual a vazio 
	if ($username == "") {
		header("Location: recuperarSenha.php?r=S&erro=1");
		$_SESSION['recuperarSenha'] = 0;
	}

	//Verificar se o username existe
	$verif = mysqli_query($conn, "SELECT * FROM USUARIOS WHERE (USERNAME='$username') OR (EMAIL='$username')");
	$count = mysqli_num_rows($verif);

	if ($count == 1) {
		// Receber o e-mail do usuário informado
		$dados = mysqli_fetch_array($verif);
		$email_usuario = $dados['EMAIL'];

		// Receber os dados que estão cadastrados no banco de dados para envio de e-mail
		$site = mysqli_query($conn, "SELECT * FROM SITE_SETTINGS WHERE ATRIBUTO='recuperar_senha'");
		$dados_site = mysqli_fetch_array($site);

		// Preparando o link temporario com 70 caracteres
		$token = substr(bin2hex(random_bytes(35)), 1);
		$tempLink = "http://localhost/clientes/ClaraVisaoV2/src/recupera.php?token=" . $token;
		$expiraLink = date('Y-m-d H:i:s', strtotime("+2 hours"));

		//Preparação do E-mail
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->SMTPOptions = array(
			'ssl'=> array(
				'verify_peer'=> false,
				'verify_peer_name'=> false,
				'allow_self_signed'=> true
			)
		);
		$mail->Host = $dados_site['VALUE3'];
		$mail->SMTPSecure = "tls";
		$mail-> Port = $dados_site['VALUE4'];
		$mail->SMTPAuth = true;
		$mail->IsHTML(true);
		//info
		$mail->Username= $dados_site['VALUE1'];
		$mail->Password= $dados_site['VALUE2'];
		//info2 
		$mail->setFrom($dados_site['VALUE1'], 'ClaraVisão - Redefinição de Senha');
		$mail->addAddress($email_usuario);
		$mail->Subject = 'Recuperar a senha da sua conta';
		$mail->Body = '
		<table id="Tabela_01" width="550" height="600" border="0" cellpadding="0" cellspacing="0">
		<tr>
		<td>
		<img src="https://i.imgur.com/4RV18Id.gif" width="550" height="289" alt=""></td>
		</tr>
		<tr>
		<td>
		<a href="' . $tempLink . '">
		<img src="https://i.imgur.com/jVrejTa.jpg" width="550" height="63" border="0" alt="Bot&#227;o para recuperar senha"></a></td>
		</tr>
		<tr>
		<td>
		<img src="https://i.imgur.com/t9Hb8mX.gif" width="550" height="248" alt=""></td>
		</tr>
		</table>
		';
		if ($mail->send()) {
			$id = $dados['ID'];
			$sql = "INSERT INTO TEMPEMAIL (TEMP_LINK, EXPIRA, ID_ACCOUNT) VALUES ('$token', '$expiraLink', '$id')";
			if (!mysqli_query($conn, $sql)) {
				$_SESSION['recuperarSenha'] = 0;
				mysqli_close($conn);
				mysqli_free_result($verif);
				header("Location: recuperarSenha.php?r=S&erro=3");
			}
			?>
			
			<!DOCTYPE html>
			<html lang="pt-br">
			<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta http-equiv="X-UA-Compatible" content="ie=edge">
				<title>ClaraVisão | Esqueci minha senha</title>
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
										<span class="titulo">Enviamos a redefinição de senha para o E-mail cadastrado na conta informada.</span>
									</div>
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
			$_SESSION['recuperarSenha'] = 0;
			mysqli_close($conn);
			mysqli_free_result($verif);
			header("Location: recuperarSenha.php?r=S&erro=3");
		}


	} else {
		$_SESSION['recuperarSenha'] = 0;
		mysqli_close($conn);
		mysqli_free_result($verif);
		header("Location: recuperarSenha.php?r=S&erro=2");
	}

} else {
	header("Location: recuperarSenha.php?r=S&erro=1");
	$_SESSION['recuperarSenha'] = 0;
}
