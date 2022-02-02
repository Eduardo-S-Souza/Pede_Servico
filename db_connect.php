<?php
//conexão BD

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_pede_servico";

$connect = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($connect, "utf-8");

if (mysqli_connect_error()) {
	echo "Falha na conexão:".mysqli_connect_error();
}
?>