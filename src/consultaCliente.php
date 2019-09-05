<?php
// Formulário que busca um cliente digitado pelo usuário ao tentar cadastrar um orçamento
if (!isset($_SESSION)) {
	SESSION_START();
}

// Verifica se o usuário foi autenticado
if ($_SESSION['autenticado'] == 0) {
	header("Location:../index.php");
}

if (!isset($_GET['name'])) {
	print "<script>history.go(-1)</script>";
	exit();
}

if ($_GET['name'] == "" || $_GET['name'] == null) {
	print "<script>history.go(-1)</script>";
	exit();
}

include 'conn.php';

$name = mysqli_real_escape_string($conn, $_GET['name']);
//Tratar nome do cliente 
$comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');
$semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U');

$name = str_replace($comAcentos, $semAcentos, $name);
$name = strtoupper($name);

$sql = "SELECT * FROM CLIENTES WHERE CLIENTE LIKE '%" . $name . "%'";
$query = mysqli_query($conn, $sql);
$count = mysqli_num_rows($query);

if ($count == 0) {
    print "<script>alert('Esse cliente não possui cadastro.'); history.go(-1)</script>";
	exit();
}

$array = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>ClaraVisão | Pesquisas por <?php print $name; ?></title>
	<link rel="stylesheet" href="../css/materialize.min.css" media="screen,projection">
	<link rel='stylesheet' href='../css/pesquisas.css?version=1212' media='screen,projection'>
	<link rel="shortcut icon" href="../favicon.png" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<?php include '../includes/inc_navbar.php'; ?>

	<?php 
		$tabela = mysqli_query($conn, "SELECT * FROM CLIENTES WHERE CLIENTE LIKE '%" . $name . "%'");
		$tabelaNum = mysqli_num_rows($tabela);
	?>
	<div class="container center">
		<table class="margem margem-top">
			<caption class='pesquisa-title'>Resultados Encontrados</caption>
			<thead>
				<tr>
					<th class='pesquisa-th borda'>Cliente</th>
					<th class='pesquisa-th borda'>Data de Nascimento</th>
					<th class='pesquisa-th'>Ação</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($tabelaDados = mysqli_fetch_array($tabela)) {
					echo "<tr class='zebrado'> ";
					$data = explode("-",  $tabelaDados['DATA_NASCIMENTO']);
					$orcamento = mysqli_query($conn, "SELECT * FROM ORCAMENTOS WHERE CLIENTE = '" . $tabelaDados['ID'] . "' ORDER BY DATA_CRIACAO DESC LIMIT 1");
					$count = mysqli_num_rows($orcamento);
					$link = "";
					if ($count != 0) {
						$link = "painel.php?f=details&user=" . $tabelaDados['ID'] . "&orc=" . $tabelaDados['ID'] . "";
					}
					$orcamento = mysqli_fetch_array($orcamento);
					echo "<td class='pesquisa-td borda'>" . $tabelaDados['CLIENTE'] . "</td>";
					echo "<td class='pesquisa-td borda'>" . $data[2] . "/" . $data[1] . "/" . $data[0] . "</td>";
					echo "<td class='pesquisa-td'>
					<a href='painel.php?f=new&user=" . $tabelaDados['ID'] . "' class='voltar2'>Novo Orça.</a> 
					<a href='" . $link . "' class='voltar2'>Ultimo Orça.</a></td>";
					echo "</tr>";
				} ?>
			</tbody>
		</table>
		<div class="margem2 margem-bottom">
			<a href='painel.php' class='voltar2'>Voltar</a>
		</div>
	</div>
	
	<?php include '../includes/inc_footer.php'; ?>
</body>
</html>
