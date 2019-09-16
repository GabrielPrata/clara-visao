<?php
include 'conn.php';

if (!isset($_SESSION)) {
	SESSION_START();
}

// Verifica se o usuário foi autenticado
if ($_SESSION['autenticado'] == 0) {
	header("Location:../index.php");
}

$verif = mysqli_query($conn, "SELECT * FROM CLIENTES");
$cont = mysqli_num_rows($verif);

if ($cont == 0) {
	?>
	<div class="container center" style="height: 200px;">
		<p>Oops! Nenhum cliente cadastrado no sistema.</p>
	</div>
	<?php
} else {

	$mensErro = "";

	$query = "SELECT * FROM CLIENTES ORDER BY CLIENTE ASC LIMIT 25";

	if (isset($_POST['consulta'])) {
		$q = $conn->real_escape_string($_POST['consulta']);
		$query = "SELECT * FROM CLIENTES WHERE CLIENTE LIKE '%".$q."%' OR DATA_NASCIMENTO LIKE '%".$q."%'";
	}
	$resultado = mysqli_query($conn, $query);

	if ($resultado->num_rows>0) {
		$mensErro.="<table border='1px' cellpadding='5px' class='bordered striped centered highlight tabela-pesquisa'>
		<thead>
		<caption class='pesquisa-title'>Resultados Encontrados</caption>
		<tr>
		<th class='pesquisa-th borda'>Nome do Cliente</th>
		<th class='pesquisa-th borda'>Data de Nascimento</th>
		<th class='pesquisa-th acoesTable'>Ações</th>
		</tr>
		</thead>
		<tbody>

		";

		while ($fila = $resultado->fetch_assoc()) {
			$data = explode("-", $fila['DATA_NASCIMENTO']);
			$dataf = $data[2] . "/" . $data[1] . "/" . $data[0];
			$mensErro.="<tr class='zebrado'>
			<td class='pesquisa-td borda'>".$fila['CLIENTE']."</td>
			<td class='pesquisa-td borda'>".$dataf."</td>
			<td class='pesquisa-td'><a href='orcamentos.php?id=" . $fila['ID'] . "' class='voltar2'>Ver Mais</a></td>
			</tr>";
		}
		$mensErro.="</tbody></table>";
	}else{
		$mensErro.="<br><br>Oops! Não encontramos o cliente que você procura.<br><br><br><br><br>";
	}

	echo $mensErro;

	$conexao->close();
}
?>