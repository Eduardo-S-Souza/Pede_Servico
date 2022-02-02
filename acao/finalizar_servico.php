<?php
//conexão BD
	require_once '../bd_connect.php';

	$id =$_GET['id'];
	session_start();
	$id_usuario = $_SESSION['id_usuario'];

	$sql = "UPDATE servico SET finalizado = true WHERE id_prestador = '$id' AND id_cliente = '$id_usuario' AND finalizado = false";

		if (mysqli_query($connect, $sql)) {
			header("Location:../avaliar_servico.php?id=". $id);

}
?>