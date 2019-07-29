<?php
// Página de Pesquisa de Orçamentos
if (!isset($_SESSION)) {
	SESSION_START();
}
include 'conn.php';
// Verifica se o usuário foi autenticado
if ($_SESSION['autenticado'] == 0) {
	header("Location:../index.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>ClaraVisão | Pesquisar</title>
	<link rel="stylesheet" href="../css/style.css" media="screen,projection">
	<link rel="stylesheet" href="../css/extra.css?version=125" media="screen,projection">
	<link rel='stylesheet' href='../css/pesquisas.css?version=124' media='screen,projection'>
	<link rel="stylesheet" href="../css/materialize.min.css" media="screen,projection">
	<link rel="shortcut icon" href="../favicon.png" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<!-- Incluir navbar no projeto -->
	<?php include '../includes/inc_navbar.php'; ?>
	<div class="container center">
		<h4 class="titulo-orcamentos">Pesquisar Orçamentos</h4>

		<div class="pesquisar">
			<h5 class="titulo-pesquisar">Nome do Cliente</h5>
			<label>
				<input class="caixa" type="text" name="pesq_buscar" id="pesq_buscar" placeholder="Nome do Cliente">
				<a href="#" class="caixa2"><i class="material-icons lupa">search</i></a>
			</label>
			<div id="tabela"></div>
		</div>

	</div>
	<!-- Incluir rodapé -->
	<?php include '../includes/inc_footer.php'; ?>

	<script src="../js/materialize.min.js"></script>
	<script src="../js/navbar.js"></script>
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/lsmain.js"></script>
</body>
</html>