<?php

error_reporting(0);

$server = "localhost";
$username = "root";
$password = "";
$name = "claravisao";

$conn = mysqli_connect($server, $username, $password, $name);

if (!$conn) {
	print "Ocorreu um erro ao tentar conectar o banco de dados! Contate um administrador.";
}

?>