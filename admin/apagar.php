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
    } elseif ($_GET['form'] == "cli") {
		//inicio de deletar cliente
		include '../src/conn.php';
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        if ($id == "") {
			print "<script>history.go(-1)</script>";
		    exit();
		}
		
		if (!mysqli_query($conn, "DELETE FROM ORCAMENTOS WHERE CLIENTE = '$id'")) {
	    	mysqli_close($conn);
	    	mysqli_free_result($array);
	    	print "<script>alert('Ocorreu um erro ao apagar o funcionario!'); history.go(-1)</script>";
	    	exit();
		}
		
		if (!mysqli_query($conn, "DELETE FROM MEDIDAS WHERE CLIENTE = '$id'")) {
	    	mysqli_close($conn);
	    	mysqli_free_result($array);
	    	print "<script>alert('Ocorreu um erro ao apagar o funcionario!'); history.go(-1)</script>";
	    	exit();
		}
		
		if (!mysqli_query($conn, "DELETE FROM CLIENTES WHERE ID = '$id'")) {
	    	mysqli_close($conn);
	    	mysqli_free_result($array);
	    	print "<script>alert('Ocorreu um erro ao apagar o funcionario!'); history.go(-1)</script>";
	    	exit();
	    }
		mysqli_close($conn);
		print "<script>alert('O cliente foi apagado com sucesso!'); window.location.href='relatorios.php?f=clientes';</script>";
		exit();
	
	} elseif ($_GET['form'] == "user") {
		//inicio de deletar usuários
		include '../src/conn.php';
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        if ($id == "") {
			print "<script>history.go(-1)</script>";
		    exit();
		}

		if (!mysqli_query($conn, "DELETE FROM USUARIOS WHERE ID = '$id'")) {
	    	mysqli_close($conn);
	    	mysqli_free_result($array);
	    	print "<script>alert('Ocorreu um erro ao apagar o usuário!'); history.go(-1)</script>";
	    	exit();
		}
		mysqli_close($conn);
		print "<script>alert('O cliente foi apagado com sucesso!'); window.location.href='relatorios.php?f=users';</script>";
		exit();
	
	} else {
        print "<script>history.go(-1)</script>";
        exit();
	}
	
} elseif ($_GET['f'] == "update") {

	if ($_GET['form'] == "func") {
		include '../src/conn.php';

		$id = mysqli_real_escape_string($conn, $_GET['id']);
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

		// Preparar para gravar
		$sql = "UPDATE FUNCIONARIOS SET CODIGO = '$txtCodigo', NOME = '$txtNome', TELEFONE = '$txtTelefone', EMAIL = '$txtEmail', ENDERECO = '$txtEndereco', BAIRRO = '$txtBairro', STATUS_FUNC = '$txtStatus' WHERE ID = $id";
		if (mysqli_query($conn, $sql)) {
			mysqli_close($conn);
			print "<script>alert('Update efetuado com sucesso!'); window.location.href='sobre.php?f=details';</script>";
			exit();
		} else {
			mysqli_close($conn);
			echo "<script language='javascript' type='text/javascript'>alert('Ocorreu um erro ao fazer a atualização. Contate um administrador!'); history.go(-1)</script>"; //Erro 500, Ocorreu um erro ao cadastrar, contate um administrador
			exit();
		}
		//Fim do cadastro de funcionarios

	} elseif ($_GET['form'] == "usuarios") {
		include '../src/conn.php';
	
		$id = mysqli_real_escape_string($conn, $_GET['id']);
		$txtNome = mysqli_real_escape_string($conn, $_POST['txtNome']);
		$txtSobrenome = mysqli_real_escape_string($conn, $_POST['txtSobrenome']);
		$txtUsername = mysqli_real_escape_string($conn, $_POST['txtUsername']);
		$txtEmail = mysqli_real_escape_string($conn, $_POST['txtEmail']);
		$txtAdmin = mysqli_real_escape_string($conn, $_POST['txtAdmin']);
		$txtTelefone = mysqli_real_escape_string($conn, $_POST['txtTelefone']);

		//Verificar se os campos obrigatorios foram inseridos corretamente
		if ($txtNome == "" || $txtNome == " ") {
			echo"<script language='javascript' type='text/javascript'>alert('O nome do usuário não foi informado!'); history.go(-1)</script>"; //Erro 1, Nome do cliente não informado
			exit();
		}

		if ($txtSobrenome == "" || $txtSobrenome == " ") {
			echo"<script language='javascript' type='text/javascript'>alert('O sobrenome do usuario não foi inserido!'); history.go(-1)</script>"; //Erro 2, Data Nascimento não informada 
			exit();
		}

		if ($txtUsername == "" || $txtUsername == " ") {
			echo"<script language='javascript' type='text/javascript'>alert('O username do usuario não foi inserido!'); history.go(-1)</script>"; //Erro 2, Data Nascimento não informada 
			exit();
		}

		if ($txtEmail == "" || $txtEmail == " ") {
			echo"<script language='javascript' type='text/javascript'>alert('O e-mail do usuario não foi inserido!'); history.go(-1)</script>"; //Erro 2, Data Nascimento não informada 
			exit();
		}

		// Preparar para gravar
		$sql = "UPDATE USUARIOS SET NOME = '$txtNome', SOBRENOME = '$txtSobrenome', USERNAME = '$txtUsername', EMAIL = '$txtEmail', ADM = '$txtAdmin', TELEFONE = '$txtTelefone' WHERE ID = $id";
		if (mysqli_query($conn, $sql)) {
			mysqli_close($conn);
			print "<script>alert('Update efetuado com sucesso!'); window.location.href='sobre.php?f=usuarios';</script>";
			exit();
		} else {
			mysqli_close($conn);
			echo "<script language='javascript' type='text/javascript'>alert('Ocorreu um erro ao fazer a atualização. Contate um administrador!'); history.go(-1)</script>"; //Erro 500, Ocorreu um erro ao cadastrar, contate um administrador
			exit();
		}


	} else {
		print "<script>history.go(-1)</script>";
		exit();
	}

} else {
    print "<script>history.go(-1)</script>";
	exit();
}

?>