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

    if ($_GET['form'] == "orc") {
        //Inicio de deletar Orcamentos

        include '../src/conn.php';
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
    
        //Fim de deletar Orcamentos
    } elseif ($_GET['form'] == "func") {
        //Inicio de deletar Usuários
        include '../src/conn.php';
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        if ($id == "") {
		    print "<script>history.go(-1)</script>";
		    exit();
        }
        
        if (!mysqli_query($conn, "UPDATE FUNCIONARIOS SET STATUS_FUNC = 0 WHERE ID = '$id'")) {
	    	mysqli_close($conn);
	    	mysqli_free_result($array);
	    	print "<script>alert('Ocorreu um erro ao apagar o funcionario!'); history.go(-1)</script>";
	    	exit();
	    }

        mysqli_close($conn);
	    print "<script>alert('Funcionario apagado com sucesso!'); history.go(-1)</script>";
        //Fim de deletar Usuários
    } else {
        print "<script>history.go(-1)</script>";
        exit();
	}
	
} elseif ($_GET['f'] == "update") {

	if ($_GET['form'] == "func") {

		$txtNome = mysqli_real_escape_string($conn, $_POST['txtNome']);
		$txtEmail = mysqli_real_escape_string($conn, $_POST['txtEmail']);
		$txtCodigo = mysqli_real_escape_string($conn, $_POST['txtCodigo']);
		$txtTelefone = mysqli_real_escape_string($conn, $_POST['txtTelefone']);
		$txtBairro = mysqli_real_escape_string($conn, $_POST['txtBairro']);
		$txtEndereco = mysqli_real_escape_string($conn, $_POST['txtEndereco']);
		$txtStatus = mysqli_real_escape_string($conn, $_POST['txtStatus']);

		//Verificar se os campos obrigatorios foram inseridos corretamente
		if ($txtNome == "" || $txtNome == " ") {
			echo"<script language='javascript' type='text/javascript'>alert('O nome do funcionario não foi informado!'); history.go(-1)</script>"; //Erro 1, Nome do cliente não informado
			exit();
		}

		if ($txtCodigo == "" || $txtCodigo == " ") {
			echo"<script language='javascript' type='text/javascript'>alert('O código do funcionario não foi inserido!'); history.go(-1)</script>"; //Erro 2, Data Nascimento não informada 
			exit();
		}

		//Verificar se o código do funcionario já existe no banco de dados
		$query = mysqli_query($conn, "SELECT * FROM FUNCIONARIOS WHERE CODIGO='" . $txtCodigo . "'");
		$count = mysqli_num_rows($query);
		if ($count != 0) {
			echo"<script language='javascript' type='text/javascript'>alert('O código do funcionario informado se encontra em uso!'); history.go(-1)</script>"; //Erro 2, Data Nascimento não informada 
			exit();
		}

		// Preparar para gravar
		$sql = "INSERT INTO FUNCIONARIOS (CODIGO, NOME, TELEFONE, EMAIL, ENDERECO, BAIRRO) VALUES ('$txtCodigo', '$txtNome', '$txtTelefone', '$txtEmail', '$txtEndereco', '$txtBairro')";
		if (mysqli_query($conn, $sql)) {
			mysqli_close($conn);
			print "<script>alert('Cadastro efetuado com sucesso!'); window.location.href='cadastros.php?f=funcionario';</script>";
			exit();
		} else {
			mysqli_close($conn);
			echo"<script language='javascript' type='text/javascript'>alert('Ocorreu um erro ao cadastrar. Contate um administrador!'); history.go(-1)</script>"; //Erro 500, Ocorreu um erro ao cadastrar, contate um administrador
			exit();
		}
		//Fim do cadastro de funcionarios



	} else {
		print "<script>history.go(-1)</script>";
		exit();
	}

} else {
    print "<script>history.go(-1)</script>";
	exit();
}

?>