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

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>ClaraVisão | Orçamentos</title>
	<link rel="stylesheet" href="../css/materialize.min.css" media="screen,projection">
	<link rel="stylesheet" href="css/style.css?version=47448" media="screen,projection">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="shortcut icon" href="../favicon.png" />
</head>
<body>
	<?php include 'includes/inc_navbar.php'; ?>

	<div class="corpo">
		<label class="titulo">Orçamentos <span>Todos</span></label>
	</div>

	<?php include 'includes/inc_orcamento.php'; ?>

	<script src="../js/materialize.min.js"></script>
	<script src="../js/navbar.js"></script>
</body>
</html>