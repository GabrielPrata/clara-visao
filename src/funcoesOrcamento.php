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
	$id = $_GET['id'];
	if ($id == "") {
		print "<script>history.go(-1)</script>";
		exit();
	}

	include 'conn.php';
	$query = mysqli_query($conn, "SELECT * FROM ORCAMENTOS WHERE ID='$id'");
	$array = mysqli_fetch_array($query);

	if (!mysqli_query($conn, "DELETE FROM ORCAMENTOS WHERE ID='$id'")) {
		print "<script>alert('Ocorreu um erro ao apagar o orçamento!'); history.go(-1)</script>";
		exit();
	}

	if (!mysqli_query($conn, "DELETE FROM MEDIDAS WHERE ID='" . $array['MEDIDAS'] . "'")) {
		print "<script>alert('Ocorreu um erro ao apagar as medidas!'); history.go(-1)</script>";
		exit();
	}

	mysqli_close($conn);
	mysqli_free_result($array);
	print "<script>alert('Orçamento apagado com sucesso!'); history.go(-1)</script>";

} else {
	print "<script>history.go(-1)</script>";
	exit();
}


?>