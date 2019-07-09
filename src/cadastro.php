<?php
// formulario para o cadastro de novos laboratorios 
if (!isset($_SESSION)) {
	SESSION_START();
}

if (!isset($_GET['f'])) {
	print "<script>history.go(-1)</script>";
	exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>ClaraVisão | Cadastro de <?php if ($_GET['f'] == "lab") {
		echo "Laboratórios";
	} elseif ($_GET['f'] == "tipArmacao") {
		echo "Tipos de Armação";
	}
	?></title>
	<link rel="stylesheet" href="../css/materialize.min.css" media="screen,projection">
	<link rel="shortcut icon" href="../favicon.png" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<?php

	include '../includes/inc_navbar.php'; 

	if ($_GET['f'] == "lab") {
		include '../includes/inc_cadLab.php'; 
	} elseif ($_GET['f'] == "tipArmacao") {
		include '../includes/inc_cadTipoArmacao.php'; 
	}

	include '../includes/inc_footer.php'; 

	?>

</body>
</html>