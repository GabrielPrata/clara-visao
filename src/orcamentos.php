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
}

include 'conn.php';

$id = mysqli_real_escape_string($conn, $_GET['id']);
$busca = mysqli_query($conn, "SELECT * FROM CLIENTES WHERE ID = '$id'");
$dados = mysqli_fetch_array($busca);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>ClaraVisão | Orçamentos de <?php print $dados['CLIENTE']; ?></title>
	<link rel="stylesheet" href="../css/pesquisas.css?version=1212" media="screen,projection">
	<link rel="stylesheet" href="../css/style.css" media="screen,projection">
	<link rel="stylesheet" href="../css/extra.css?version=7878" media="screen,projection">
	<link rel="stylesheet" href="../css/materialize.min.css" media="screen,projection">
	<link rel="shortcut icon" href="../favicon.png" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<?php 
	$count = mysqli_num_rows($busca);
	if ($count == 0) {
		include '../includes/inc_navbar.php'; 
		?>
		<div class="container left">
			<h3 class="erro404-h">Erro 404 - Página não existe</h3>
			<p class="erro404-p">Seu cliente emitiu uma solicitação malformada ou ilegal.</p>
		</div>
		<?php
		mysqli_free_result($conn);
		mysqli_close($conn);
		include '../includes/inc_footer.php';
		exit();
	}
	?>

	<?php 
	include '../includes/inc_navbar.php'; 
	$tabela = mysqli_query($conn, "SELECT * FROM ORCAMENTOS WHERE CLIENTE = '$id' ORDER BY DATA_CRIACAO DESC");
	$tabelaNum = mysqli_num_rows($tabela);
	?>
	<div class="container center">
		<h4 class="titulo-orcamentos">Orçamentos de <?php print $dados['CLIENTE']; ?></h4>

		<?php if ($tabelaNum == 0) {
			?>

			<div class="container center" style="height: 300px; margin-top: 10%;">
				<p>O cliente <span style="color: #4CBCC8; font-weight: bold;"><?php print $dados['CLIENTE']; ?></span> não possui orçamentos cadastrados.</p> <br>
				<a href='pesquisar.php' class='voltar2'>Voltar</a>
				<a href='observacoes.php?id=<?php print $id; ?>' class='obs'>Observações</a>
			</div>

			<?php
		} else {?>
		<table class="margem">
			<caption class='pesquisa-title'>Resultados Encontrados</caption>
			<thead>
				<tr>
					<th class='pesquisa-th borda'>Data de Emissão</th>
					<th class='pesquisa-th borda'>Vendedor</th>
					<th class='pesquisa-th borda'>Valor Total</th>
					<th class='pesquisa-th'>Ação</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($tabelaDados = mysqli_fetch_array($tabela)) {
					echo "<tr class='zebrado'> ";
					$data = explode("-",  $tabelaDados['DATA_CRIACAO']);
					$vendedor = mysqli_query($conn, "SELECT * FROM FUNCIONARIOS WHERE ID = '" . $tabelaDados['VENDEDOR_ID'] . "'");
					$vendedor = mysqli_fetch_array($vendedor);
					echo "<td class='pesquisa-td borda'>" . $data[2] . "/" . $data[1] . "/" . $data[0] . "</td>";
					echo "<td class='pesquisa-td borda'>" . $vendedor['NOME'] . "</td>";
					echo "<td class='pesquisa-td borda'> R$ " . $tabelaDados['TOTAL'] . "</td>";
					echo "<td class='pesquisa-td'><a href='painel.php?f=details&user=" . $id . "&orc=" . $tabelaDados['ID'] . "' class='voltar2'>Var Detalhes</a> 
					<a href='funcoesOrcamento.php?id=" . $tabelaDados['ID'] . "&f=del' class='apagar'>Apagar</a></td>";
					echo "</tr>";
				} ?>
			</tbody>
		</table>
		<div class="margem">
			<a onclick="voltar()" class='voltar2' style="cursor: pointer;">Voltar</a>
			<a href='observacoes.php?id=<?php print $id; ?>' class='obs'>Observações</a>
		</div>
		<?php } ?>
	</div>
	<!-- Incluir rodapé -->
	<?php include '../includes/inc_footer.php'; ?>

	<script src="../js/materialize.min.js"></script>
	<script src="../js/navbar.js"></script>
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/lsmain.js"></script>
	<script type="text/javascript">
		function voltar() {
			window.history.go(-1);
		}
	</script>
</body>
</html>
