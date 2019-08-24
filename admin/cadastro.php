<?php 

// Painel do admin
if (!isset($_SESSION)) {
	SESSION_START();
}

// Verifica se o usuário foi autenticado
if ($_SESSION['autenticado'] == 0) {
	header("Location:../index.php");
}

// Verifica se o Usuário é admin
if ($_SESSION['admin'] == 0) {
	header("Location:../index.php");
}

include '../src/conn.php';
$sql = "SELECT * FROM USUARIOS WHERE ID = '" .$_SESSION['admin_id']. "'";
$admin = mysqli_query($conn, $sql);
$admin = mysqli_fetch_array($admin);

if ($_GET['f'] == "lab") {
	$f = "Laboratórios";
} elseif ($_GET['f'] == "tipArmacao") {
	$f = "Tipos de Armação";
} elseif ($_GET['f'] == "cliente") {
	$f = "Cliente";
} elseif ($_GET['f'] == "oftalmologista") {
	$f = "Oftalmologista";
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>ClaraVisão | Cadastro de <?php print $f; ?></title>
	<link rel="stylesheet" href="../css/materialize.min.css" media="screen,projection">
	<link rel="stylesheet" href="css/style.css?version=47448" media="screen,projection">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="shortcut icon" href="../favicon.png" />
</head>
<body>
	<?php include 'includes/inc_navbar.php'; ?>

	<div class="corpo">
		<label class="titulo">Cadastros <span>Cadastrar <?php print $f; ?></span></label>

		<?php
		if ($_GET['f'] == "lab") {
			include 'includes/inc_cadLab.php'; 
		} elseif ($_GET['f'] == "tipArmacao") {
			include 'includes/inc_cadTipoArmacao.php'; 
		} elseif ($_GET['f'] == "cliente") {
			include 'includes/inc_cadCliente.php'; 
		} elseif ($_GET['f'] == "oftalmologista") {
			include 'includes/inc_cadOftalmologista.php'; 
		}
		?>

	</div>
	
	<script src="../js/materialize.min.js"></script>
	<script src="../js/navbar.js"></script>
</body>
</html>