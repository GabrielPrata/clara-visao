<?php
// Formulário que executa funções como salvar, editar e apagar orçamentos 
if (!isset($_SESSION)) {
	SESSION_START();
}

// Verifica se o usuário foi autenticado
if ($_SESSION['autenticado'] == 0) {
	header("Location:../index.php");
}

if (!isset($_GET['id']) || !isset($_GET['f'])) {
	print "<script>history.go(-1)</script>";
	exit();
}

if ($_GET['f'] == "del") {
	include 'conn.php';

	$id = mysqli_real_escape_string($conn, $_GET['id']);
	if ($id == "") {
		print "<script>history.go(-1)</script>";
		exit();
	}

	$query = mysqli_query($conn, "SELECT * FROM ORCAMENTOS WHERE ID='$id'");
	$array = mysqli_fetch_array($query);

	if (!mysqli_query($conn, "DELETE FROM ORCAMENTOS WHERE ID='$id'")) {
		mysqli_close($conn);
		mysqli_free_result($array);
		print "<script>alert('Ocorreu um erro ao apagar o orçamento!'); history.go(-1)</script>";
		exit();
	}

	if (!mysqli_query($conn, "DELETE FROM MEDIDAS WHERE ID='" . $array['MEDIDAS'] . "'")) {
		mysqli_close($conn);
		mysqli_free_result($array);
		print "<script>alert('Ocorreu um erro ao apagar as medidas!'); history.go(-1)</script>";
		exit();
	}

	mysqli_close($conn);
	mysqli_free_result($array);
	print "<script>alert('Orçamento apagado com sucesso!'); history.go(-1)</script>";

} elseif ($_GET['f'] == "saveOrc") {
	include 'conn.php';

	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$orc = mysqli_real_escape_string($conn, $_POST['text_obs']);

	if ($id == "") {
		print "<script>history.go(-1)</script>";
		exit();
	}

	$sql = "UPDATE CLIENTES SET OBSERVACAO = '" . $orc . "' WHERE ID = '" . $id . "'";

	if (!mysqli_query($conn, $sql)) {
		mysqli_close($conn);
		print "<script>alert('Ocorreu um erro ao atualizar a observação do cliente!'); history.go(-1)</script>";
		exit();
	}

	mysqli_close($conn);
	print "<script>alert('Observação atualizada com sucesso!'); history.go(-1)</script>";
} else {
	print "<script>history.go(-1)</script>";
	exit();
}


?>