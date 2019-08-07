<?php
// Formulário que executa funções como salvar, editar e apagar orçamentos 
if (!isset($_SESSION)) {
	SESSION_START();
}

// Verifica se o usuário foi autenticado
if ($_SESSION['autenticado'] == 0) {
	header("Location:../index.php");
}

if (!isset($_GET['form']) || !isset($_GET['f'])) {
	print "<script>history.go(-1)</script>";
	exit();
}

if ($_GET['f'] == "c") {
	// Cadastro do formulário Laboratorios

	include 'conn.php';

	if ($_GET['form'] == "lab") {
		$txtLab = mysqli_real_escape_string($conn, $_POST['txtLab']);
		$txtEndereco = mysqli_real_escape_string($conn, $_POST['txtEndereco']);
		$txtTelefone = mysqli_real_escape_string($conn, $_POST['txtTelefone']);

		if ($txtLab == "") {
			echo"<script language='javascript' type='text/javascript'>window.location.href='cadastro.php?f=lab&erro=1';</script>"; //Erro 1, Campo nome do laboratorio não preenchido
			exit();
		}

		// Preparar SQL para inserção
		$sql = "INSERT INTO LABORATORIOS (NOME, TELEFONE, ENDERECO) VALUES ('$txtLab', '$txtTelefone', '$txtEndereco')";

		if (mysqli_query($conn, $sql)) {
			mysqli_close($conn);
			print "<script>alert('Cadastro efetuado com sucesso!'); window.location.href='cadastro.php?f=tipArmacao';</script>";
		} else {
			mysqli_close($conn);
			echo"<script language='javascript' type='text/javascript'>window.location.href='cadastro.php?f=lab&erro=500';</script>"; //Erro 500, Ocorreu um erro ao cadastrar, contate um administrador
		}
		// FIM DO CADASTRO DE LABORATORIOS
	}
	// Cadastro de Tipo de Armação
	if ($_GET['form'] == "tipArmacao") {
		$txtTipoArm = mysqli_real_escape_string($conn, $_POST['txtTipoArm']);

		if ($txtTipoArm == "") {
			echo"<script language='javascript' type='text/javascript'>window.location.href='cadastro.php?f=tipArmacao&erro=1';</script>"; //Erro 1, Campos obrigatorios não preenchidos
			exit();
		}

		// Preparar SQL para inserção
		$sql = "INSERT INTO ARMACAO (ARMACAO) VALUES ('$txtTipoArm')";

		if (mysqli_query($conn, $sql)) {
			mysqli_close($conn);
			print "<script>alert('Cadastro efetuado com sucesso!'); window.location.href='cadastro.php?f=tipArmacao';</script>";
		} else {
			mysqli_close($conn);
			echo"<script language='javascript' type='text/javascript'>window.location.href='cadastro.php?f=tipArmacao&erro=500';</script>"; //Erro 500, Ocorreu um erro ao cadastrar, contate um administrador
		}
		// FIM DO CADASTRO DE TIPO ARMAÇÃO
	}

	// Cadastro de Oftalmologista
	if ($_GET['form'] == "oftalmologista") {
		$txtNomeOftalmo = mysqli_real_escape_string($conn, $_POST['txtNomeOftalmo']);
		$txtTelefone = mysqli_real_escape_string($conn, $_POST['txtTelefone']);

		if ($txtNomeOftalmo == "") {
			echo"<script language='javascript' type='text/javascript'>window.location.href='cadastro.php?f=oftalmologista&erro=1';</script>"; //Erro 1, Campos obrigatorios não preenchidos
			exit();
		}

		// Preparar SQL para inserção
		$sql = "INSERT INTO OFTALMOLOGISTA (OFTALMOLOGISTA, TELEFONE) VALUES ('$txtNomeOftalmo', '$txtTelefone')";

		if (mysqli_query($conn, $sql)) {
			mysqli_close($conn);
			print "<script>alert('Cadastro efetuado com sucesso!'); window.location.href='cadastro.php?f=oftalmologista';</script>";
		} else {
			mysqli_close($conn);
			echo"<script language='javascript' type='text/javascript'>window.location.href='cadastro.php?f=oftalmologista&erro=500';</script>"; //Erro 500, Ocorreu um erro ao cadastrar, contate um administrador
		}
		// FIM DO CADASTRO DE TIPO ARMAÇÃO
	}



}

?>