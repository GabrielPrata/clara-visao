<?php
// Funções relacionadas aos usuários
if (!isset($_SESSION)) {
	SESSION_START();
}
// verifica se a variavel f (função) está sendo utilizada
if (isset($_GET['f'])) {
	// se f (função) for igual a leave ele desloga o usuário e retorna para o index
	if ($_GET['f'] == 'leave') {
		SESSION_DESTROY();
		header("Location:../index.php");
	}
}
