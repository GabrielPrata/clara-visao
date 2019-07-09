<?php
// Formulário que executa funções como salvar, editar e apagar orçamentos 
if (!isset($_SESSION)) {
	SESSION_START();
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
	if (mysqli_query($conn, "DELETE FROM ORCAMENTOS WHERE ID='$id'")) {
		print "<script>alert('Orçamento apagado com sucesso!'); history.go(-1)</script>";
	}



} else {
	print "<script>history.go(-1)</script>";
	exit();
}


?>