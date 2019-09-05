<?php
// Página de Pesquisa de Orçamentos
if (!isset($_SESSION)) {
	SESSION_START();
}

// Verifica se o usuário foi autenticado
if ($_SESSION['autenticado'] == 0) {
	header("Location:../index.php");
}

if (!$_GET['id']){
	header("Location:pesquisar.php");
	exit();
}

include 'conn.php';
$id = mysqli_real_escape_string($conn, $_GET['id']);
$busca = mysqli_query($conn, "SELECT * FROM CLIENTES WHERE ID = '$id'");
$count = mysqli_num_rows($busca);

if ($count == 0) {
	header("Location:pesquisar.php");
	exit();
}

$dados = mysqli_fetch_array($busca);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>ClaraVisão | Observações sobre <?php print $dados['CLIENTE']; ?></title>
	<link rel="stylesheet" href="../css/pesquisas.css?version=121212" media="screen,projection">
	<link rel="stylesheet" href="../css/style.css" media="screen,projection">
	<link rel="stylesheet" href="../css/extra.css?version=125" media="screen,projection">
	<link rel="stylesheet" href="../css/materialize.min.css" media="screen,projection">
	<link rel="shortcut icon" href="../favicon.png" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<!-- Incluir navbar no projeto -->
	<?php 
	include '../includes/inc_navbar.php'; 
	$tabela = mysqli_query($conn, "SELECT * FROM ORCAMENTOS WHERE CLIENTE = '$id' ORDER BY DATA_CRIACAO DESC");
	$tabelaNum = mysqli_num_rows($tabela);
	?>
	<div class="container center">
		<h4 class="titulo-orcamentos">Observações sobre <?php print $dados['CLIENTE']; ?></h4>

		<form action="funcoesOrcamento.php?f=saveOrc&id=<?php print $dados['ID']; ?>" method="POST" accept-charset="utf-8">

			<div class="container">
				<textarea  cols=40 rows=25 name="text_obs" class="textareaObs"><?php echo $dados['OBSERVACAO']; ?></textarea>
			</div>

			<div class="margem2">
				<a href='orcamentos.php?id=<?php print $dados['ID']; ?>' class='voltar2'>Voltar</a>
				<input type="submit" name="submit" value="Salvar" class="obs2">
			</div>
		</form>

	</div>
	<!-- Incluir rodapé -->
	<?php include '../includes/inc_footer.php'; ?>

	<script src="../js/materialize.min.js"></script>
	<script src="../js/navbar.js"></script>
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/lsmain.js"></script>
</body>
</html>

<?php 

mysql_free_result($dados);
mysqli_close($conn);

?>
