<?php
 //formulário responsavel pela autenticação do usuário

if (!isset($_SESSION)) {
	SESSION_START();
}

include 'conn.php';

if ($_POST) {
	// Coleta as informações enviadas pelo formulário index.php
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$senha = mysqli_real_escape_string($conn, $_POST['password']);
	// Verifica se o Username foi enviado, se não retorna para o index e exibe uma mensagem
	if ($username == "") {
		echo"<script language='javascript' type='text/javascript'>window.location.href='../index.php?error=1';</script>";
		$_SESSION['autenticado'] = 0;
		exit();
	}
	// Verifica se a Senha foi enviado, se não retorna para o index e exibe uma mensagem
	if ($senha == "") {
		echo"<script language='javascript' type='text/javascript'>window.location.href='../index.php?error=2';</script>";
		$_SESSION['autenticado'] = 0;
		exit();
	}
	// Realiza a busca do username indicado, podendo ser o e-mail ou o username
	$sql = "SELECT * FROM USUARIOS WHERE (EMAIL='$username') OR (USERNAME='$username')";
	$busca = mysqli_query($conn, $sql);
	$dados = mysqli_fetch_array($busca);
	$result = mysqli_num_rows($busca);
	// verifica se só existe um valor com esse e-mail/username
	if ($result == 1) {
		$pass = $dados['SENHA'];
		$validarPass = password_verify($senha, $pass);
		// Se a senha se confirma, envia o user para a página de administração
		if ($validarPass == true) {
			$_SESSION['autenticado'] = 1;
			$_SESSION['admin'] = $dados['ADM'];
			$_SESSION['user'] = $dados['NOME'];
			$_SESSION['admin_id'] = $dados['ID'];
			header("Location:painel.php");
		} else { //retorna para o index alegando senha incorreta
			echo"<script language='javascript' type='text/javascript'>window.location.href='../index.php?error=4';</script>";
			$_SESSION['autenticado'] = 0;
			exit();
		}
	} else { //retorna para o index alegando username/e-mail incorreto
		echo"<script language='javascript' type='text/javascript'>window.location.href='../index.php?error=3';</script>";
		$_SESSION['autenticado'] = 0;
		exit();
	}
	// limpa os valores das variaveis e desconecta do banco
	mysqli_free_result($dados);
	mysqli_close($conn);
} else { //retorna para o index se nenhuma informação for enviada 
	header("Location:../index.php");
	$_SESSION['autenticado'] = 0;
	exit();
}
