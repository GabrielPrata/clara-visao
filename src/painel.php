<?php
// Painel do usuario
if (!isset($_SESSION)) {
	SESSION_START();
}

// Verifica se o usuário foi autenticado
if ($_SESSION['autenticado'] == 0) {
	header("Location:../index.php");
}

include 'conn.php';
$sql = "SELECT ID FROM ORCAMENTOS ORDER BY ID DESC LIMIT 1";
$rs = mysqli_query($conn, $sql);
$rs = mysqli_fetch_array($rs);
$orcamento = $rs['ID'] + 1;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>ClaraVisão | Painel</title>
	<link rel="stylesheet" href="../css/materialize.min.css" media="screen,projection">
	<link rel='stylesheet' href='../css/pesquisas.css' media='screen,projection'>
	<link rel="shortcut icon" href="../favicon.png" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<?php 
	include '../includes/inc_navbar.php'; 

	if (!isset($_GET['f'])) {
		include '../includes/inc_orcamento.php'; 
	} else {
		if ($_GET['f'] == "details") {
			if (isset($_GET['user'])) {
				$id = mysqli_real_escape_string($conn, $_GET['user']);
				$orc = mysqli_real_escape_string($conn, $_GET['orc']);
				$query = mysqli_query($conn, "SELECT * FROM CLIENTES WHERE ID = '" . $id . "'");
				$count = mysqli_num_rows($query);
				if ($count != 1) {
					?>
					<div class="container left">
						<h3 class="erro404-h">Erro 404 - Página não existe</h3>
						<p class="erro404-p">Seu cliente emitiu uma solicitação malformada ou ilegal.</p>
					</div>
					<?php
					include '../includes/inc_footer.php'; 
					mysqli_close($conn);
					exit();
				}
				$cliente = mysqli_fetch_array($query);
				$query = mysqli_query($conn, "SELECT * FROM ORCAMENTOS WHERE ID = '" . $orc . "'");
				$count = mysqli_num_rows($query);
				if ($count != 1) {
					?>
					<div class="container left">
						<h3 class="erro404-h">Erro 404 - Página não existe</h3>
						<p class="erro404-p">Seu cliente emitiu uma solicitação malformada ou ilegal.</p>
					</div>
					<?php
					include '../includes/inc_footer.php'; 
					mysqli_free_result($cliente);
					mysqli_close($conn);
					exit();
				}
				$orcamentos = mysqli_fetch_array($query);
				$query = mysqli_query($conn, "SELECT * FROM MEDIDAS WHERE ID = '" . $orcamentos['MEDIDAS'] . "'");
				$count = mysqli_num_rows($query);
				if ($count != 1) {
					?>
					<div class="container left">
						<h3 class="erro404-h">Erro 404 - Página não existe</h3>
						<p class="erro404-p">Seu cliente emitiu uma solicitação malformada ou ilegal.</p>
					</div>
					<?php
					include '../includes/inc_footer.php';
					mysqli_free_result($cliente);
					mysqli_free_result($orcamentos); 
					mysqli_close($conn);
					exit();
				}
				$medidas = mysqli_fetch_array($query);

				if ($orcamentos['CLIENTE'] != $cliente['ID']) {
					?>
					<div class="container left">
						<h3 class="erro404-h">Erro 404 - Página não existe</h3>
						<p class="erro404-p">Seu cliente emitiu uma solicitação malformada ou ilegal.</p>
					</div>
					<?php
					include '../includes/inc_footer.php';
					mysqli_free_result($cliente);
					mysqli_free_result($medidas);
					mysqli_free_result($orcamento);
					mysqli_close($conn);
					exit();
				}

				include '../includes/inc_orcamentoDetalhes.php'; 

				mysqli_free_result($cliente);
				mysqli_free_result($medidas);
				mysqli_free_result($orcamento);
			} else {
				?>
				<div class="container left">
					<h3 class="erro404-h">Erro 404 - Página não existe</h3>
					<p class="erro404-p">Seu cliente emitiu uma solicitação malformada ou ilegal.</p>
				</div>
				<?php
			}
		} elseif ($_GET['f'] == "new") {
			if (isset($_GET['user'])) {
				$id = mysqli_real_escape_string($conn, $_GET['user']);
				$query = mysqli_query($conn, "SELECT * FROM CLIENTES WHERE ID = '" . $id . "'");
				$count = mysqli_num_rows($query);
				if ($count != 1) {
					?>
					<div class="container left">
						<h3 class="erro404-h">Erro 404 - Página não existe</h3>
						<p class="erro404-p">Seu cliente emitiu uma solicitação malformada ou ilegal.</p>
					</div>
					<?php
					include '../includes/inc_footer.php'; 
					mysqli_close($conn);
					exit();
				}
				$cliente = mysqli_fetch_array($query);

				include '../includes/inc_orcamentoNew.php'; 

				mysqli_free_result($cliente);
			} else {
				?>
				<div class="container left">
					<h3 class="erro404-h">Erro 404 - Página não existe</h3>
					<p class="erro404-p">Seu cliente emitiu uma solicitação malformada ou ilegal.</p>
				</div>
				<?php
			}
		} else {
			?>
			<div class="container left">
				<h3 class="erro404-h">Erro 404 - Página não existe</h3>
				<p class="erro404-p">Seu cliente emitiu uma solicitação malformada ou ilegal.</p>
			</div>
			<?php
		} 
	}
	?>
	<br> <br>
	<?php
	include '../includes/inc_footer.php'; 
	?>

	<script src="js/materialize.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/navbar.js"></script>
</body>
</html>

<?php

mysqli_close($conn);
mysql_free_result($rs);

?>
