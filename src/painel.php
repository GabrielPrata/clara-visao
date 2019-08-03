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

// Define se a página é do usuário normal ou se é do admin
if ($_SESSION['admin'] == 1) { ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>ClaraVisão | Painel</title>
	<link rel="stylesheet" href="../css/materialize.min.css" media="screen,projection">
	<link rel="shortcut icon" href="../favicon.png" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<?php 
	include '../includes/inc_navbar.php'; 
	include '../includes/inc_orcamento.php'; ?>
	<br> <br>
	<?php
	include '../includes/inc_footer.php'; 
	?>

	<script src="js/materialize.min.js"></script>
	<script src="js/navbar.js"></script>
</body>
</html>

<!-- define a página como a do usuário -->
<?php } else { ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>ClaraVisão | Painel</title>
	<link rel="stylesheet" href="../css/materialize.min.css" media="screen,projection">
	<link rel="shortcut icon" href="../favicon.png" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<?php 
	include '../includes/inc_navbar.php'; 
	include '../includes/inc_orcamento.php'; ?>
	<br> <br>
	<?php
	include '../includes/inc_footer.php'; 
	?>

	<script src="js/materialize.min.js"></script>
	<script src="js/navbar.js"></script>
</body>
</html>

<?php } 

mysqli_close();
mysql_free_result($rs);

?>
