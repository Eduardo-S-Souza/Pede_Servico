<?php
//conexão BD
	require_once '../bd_connect.php';

	$id =$_GET['id'];
	session_start();
	$id_usuario = $_SESSION['id_usuario'];

	$sql = "INSERT INTO servico(id_prestador, id_cliente, finalizado) VALUES ('$id', '$id_usuario', false)";

		if (mysqli_query($connect, $sql)) {
			header("Location:../menu_cliente.php");
}
?>