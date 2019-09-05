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
			echo"<script language='javascript' type='text/javascript'>alert('Campos obrigatórios não preenchidos!'); history.go(-1)</script>"; //Erro 1, Campo nome do laboratorio não preenchido
			exit();
		}

		// Preparar SQL para inserção
		$sql = "INSERT INTO LABORATORIOS (NOME, TELEFONE, ENDERECO) VALUES ('$txtLab', '$txtTelefone', '$txtEndereco')";

		if (mysqli_query($conn, $sql)) {
			mysqli_close($conn);
			print "<script>alert('Cadastro efetuado com sucesso!'); window.location.href='cadastro.php?f=lab';</script>";
		} else {
			mysqli_close($conn);
			echo"<script language='javascript' type='text/javascript'>alert('Ocorreu um erro ao cadastrar. Contate um administrador!'); history.go(-1)</script>"; //Erro 500, Ocorreu um erro ao cadastrar, contate um administrador
			exit();
		}
		// FIM DO CADASTRO DE LABORATORIOS
	}
	// Cadastro de Tipo de Armação
	if ($_GET['form'] == "tipArmacao") {
		$txtTipoArm = mysqli_real_escape_string($conn, $_POST['txtTipoArm']);

		if ($txtTipoArm == "") {
			echo "<script language='javascript' type='text/javascript'>alert('Campos obrigatórios não preenchidos!'); history.go(-1)</script>"; //Erro 1, Campos obrigatorios não preenchidos
			exit();
		}

		// Preparar SQL para inserção
		$sql = "INSERT INTO ARMACAO (ARMACAO) VALUES ('$txtTipoArm')";

		if (mysqli_query($conn, $sql)) {
			mysqli_close($conn);
			print "<script>alert('Cadastro efetuado com sucesso!'); window.location.href='cadastro.php?f=tipArmacao';</script>";
		} else {
			mysqli_close($conn);
			echo"<script language='javascript' type='text/javascript'>alert('Ocorreu um erro ao cadastrar. Contate um administrador!'); history.go(-1)</script>"; //Erro 500, Ocorreu um erro ao cadastrar, contate um administrador
			exit();
		}
		// FIM DO CADASTRO DE TIPO ARMAÇÃO
	}

	// Cadastro de Oftalmologista
	if ($_GET['form'] == "oftalmologista") {
		$txtNomeOftalmo = mysqli_real_escape_string($conn, $_POST['txtNomeOftalmo']);
		$txtTelefone = mysqli_real_escape_string($conn, $_POST['txtTelefone']);

		if ($txtNomeOftalmo == "") {
			echo"<script language='javascript' type='text/javascript'>alert('Campos obrigatórios não preenchidos!'); history.go(-1)</script>"; //Erro 1, Campos obrigatorios não preenchidos
			exit();
		}

		// Preparar SQL para inserção
		$sql = "INSERT INTO OFTALMOLOGISTA (OFTALMOLOGISTA, TELEFONE) VALUES ('$txtNomeOftalmo', '$txtTelefone')";

		if (mysqli_query($conn, $sql)) {
			mysqli_close($conn);
			print "<script>alert('Cadastro efetuado com sucesso!'); window.location.href='cadastro.php?f=oftalmologista';</script>";
			exit();
		} else {
			mysqli_close($conn);
			echo"<script language='javascript' type='text/javascript'>alert('Ocorreu um erro ao cadastrar. Contate um administrador!'); history.go(-1)</script>"; //Erro 500, Ocorreu um erro ao cadastrar, contate um administrador
			exit();
		}
		// FIM DO CADASTRO DE TIPO ARMAÇÃO
	}

	// Cadastro de Cliente
	if ($_GET['form'] == "cliente") {
		$txtNomeCliente = mysqli_real_escape_string($conn, $_POST['txtNomeCliente']);
		$txtProfissao = mysqli_real_escape_string($conn, $_POST['txtProfissao']);
		$txtDataNascimento = mysqli_real_escape_string($conn, $_POST['txtDataNascimento']);
		$txtTelefone1 = mysqli_real_escape_string($conn, $_POST['txtTelefone1']);
		$txtTelefone2 = mysqli_real_escape_string($conn, $_POST['txtTelefone2']);
		$txtCidade = mysqli_real_escape_string($conn, $_POST['txtCidade']);

		if ($txtNomeCliente == "" || $txtNomeCliente == " ") {
			echo"<script language='javascript' type='text/javascript'>alert('O nome do cliente não foi informado!'); history.go(-1)</script>"; //Erro 1, Nome do cliente não informado
			exit();
		}

		if ($txtDataNascimento == "" || $txtDataNascimento == " ") {
			echo"<script language='javascript' type='text/javascript'>alert('A Data de Nascimento não foi informada!'); history.go(-1)</script>"; //Erro 2, Data Nascimento não informada 
			exit();
		}

		if ($txtTelefone1 == "" || $txtTelefone1 == " ") {
			echo"<script language='javascript' type='text/javascript'>alert('O telefone não foi informado!'); history.go(-1)</script>"; //Erro 3, Telefone não informado
			exit();
		}

		//Remover a acentuação do nome do cliente
		$comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');

		$semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U');

		$txtNomeCliente = str_replace($comAcentos, $semAcentos, $txtNomeCliente);

		//Transformar todos os caracateres em caixa alta
		$txtNomeCliente = strtoupper($txtNomeCliente);

		//Verificar se o Numero de Telefone já foi cadastrado
		$sql = "SELECT * FROM CLIENTES WHERE (TELEFONE_1='" . $txtTelefone1 . "') OR (TELEFONE_2='" . $txtTelefone1 . "')";
		$query = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($query);
		if ($count != 0) {
			echo"<script language='javascript' type='text/javascript'>alert('Telefone 1 já cadastrado!'); history.go(-1)</script>"; // Usuário já cadastrado
			exit();
		}

		$sql = "SELECT * FROM CLIENTES WHERE (TELEFONE_1='" . $txtTelefone2 . "') OR (TELEFONE_2='" . $txtTelefone2 . "')";
		$query = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($query);
		if ($count != 0) {
			echo"<script language='javascript' type='text/javascript'>alert('Telefone 2 já cadastrado!'); history.go(-1)</script>"; // Usuário já cadastrado
			exit();
		}

		//Verificar se já existe esse cliente
		$sql = "SELECT * FROM CLIENTES WHERE CLIENTE='" . $txtNomeCliente . "' AND DATA_NASCIMENTO='" . $txtDataNascimento . "'";
		$query = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($query);
		if ($count != 0) {
			echo"<script language='javascript' type='text/javascript'>alert('Cliente já cadastrado!'); history.go(-1)</script>"; // Usuário já cadastrado
			exit();
		}

		// Preparar para gravar
		$sql = "INSERT INTO CLIENTES (CLIENTE, PROFISSAO, DATA_NASCIMENTO, TELEFONE_1, TELEFONE_2, CIDADE) VALUES ('$txtNomeCliente', '$txtProfissao', '$txtDataNascimento', '$txtTelefone1', '$txtTelefone2', '$txtCidade')";
		if (mysqli_query($conn, $sql)) {
			mysqli_close($conn);
			print "<script>alert('Cadastro efetuado com sucesso!'); window.location.href='cadastro.php?f=cliente';</script>";
			exit();
		} else {
			mysqli_close($conn);
			echo"<script language='javascript' type='text/javascript'>alert('Ocorreu um erro ao cadastrar. Contate um administrador!'); history.go(-1)</script>"; //Erro 500, Ocorreu um erro ao cadastrar, contate um administrador
			exit();
		}



		// FIM DO CADASTRO DE CLIENTES
	}



}

?>