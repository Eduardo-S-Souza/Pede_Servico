<?php
//conexão BD
	require_once 'bd_connect.php';

	if (isset($_POST['btn_cadastrar'])) {
		$nome = mysqli_escape_string($connect, $_POST['nome']);
		$telefone = mysqli_escape_string($connect, $_POST['telefone']);
		$email = mysqli_escape_string($connect, $_POST['email']);
		$endereco = mysqli_escape_string($connect, $_POST['endereco']);
		$senha = mysqli_escape_string($connect, $_POST['senha']);
		$senha = md5($senha);
		$foto = mysqli_escape_string($connect, $_POST['foto']);
		$prestador = mysqli_escape_string($connect, $_POST['prestador']);
		$pedecoin = mysqli_escape_string($connect, $_POST['pedecoin']);
		$mediaNota = mysqli_escape_string($connect, $_POST['mediaNota']);


		$sql = "INSERT INTO login(nome, telefone, email, endereco, senha, foto, prestador,pedecoin, mediaNota) 
		VALUES ('$nome', '$telefone', '$email', '$endereco', '$senha', '$foto', '$prestador', '$pedecoin', 
		'$mediaNota')";

		if (mysqli_query($connect, $sql)) {
			header('Location: ../login.php?Sucesso');
	}else{
		header('Location: ../login.php?Erro');
	}
}
?>