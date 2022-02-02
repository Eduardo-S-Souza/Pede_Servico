<?php
//conexão BD
	require_once '../bd_connect.php';

//cadastro
	if (isset($_POST['btn_cadastrar'])) {
		$nome = mysqli_escape_string($connect, $_POST['nome']);
		$telefone = mysqli_escape_string($connect, $_POST['telefone']);
		$email = mysqli_escape_string($connect, $_POST['email']);
		$endereco = mysqli_escape_string($connect, $_POST['endereco']);
		$senha = mysqli_escape_string($connect, $_POST['senha']);
		$senha = md5($senha);
		$_UP['pasta'] = 'foto/';
		$prestador = mysqli_escape_string($connect, $_POST['prestador']);
		$profissao = mysqli_escape_string($connect, $_POST['profissao']);
		$pedecoin = 0;
		$mediaNota = 0;


		$sql = "INSERT INTO login(nome, telefone, email, endereco, senha, prestador, profissao, pedecoin, mediaNota) VALUES ('$nome', '$telefone', '$email', '$endereco', '$senha', '$prestador', 
			'$profissao', '$pedecoin','$mediaNota')";
		 header('Location: ../login.php?Sucesso');

		if (mysqli_query($connect, $sql)) {
			$sql1 = "SELECT id FROM login WHERE email = '$email' AND senha = '$senha'";
			$resultado = mysqli_query($connect, $sql1);
			$id = mysqli_fetch_array($resultado)['id'];
			if (isset($_FILES['foto'])){
            $permitidos=array('jpg');
            $extensao=pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            if(in_array($extensao , $permitidos)){
                $pasta="../fotos/";
                $temporario=$_FILES['foto']['tmp_name'];
                $novoNome=md5($id).'.'.$extensao;
                if (move_uploaded_file($temporario, $pasta.$novoNome)) {
                    #header('Location: ../login.php?Sucesso');    
                }
            }               
        }
	}else{
		header('Location: ../login.php?Erro');
	}
}
//comprar pede coin

	if (isset($_POST['btn_comprar'])) {
		$pedecoin = mysqli_escape_string($connect, $_POST['pedecoin']);
		echo "$pedecoin";

		session_start();
		$id = $_SESSION['id_usuario'];
		$sqli = "SELECT pedecoin FROM login WHERE id = '$id'";
		$resultado = mysqli_query($connect, $sqli);
		$pedecoin = $pedecoin + mysqli_fetch_array($resultado)['pedecoin'];
		$sql1 = "UPDATE login SET pedecoin = '$pedecoin' WHERE id = '$id'";
		if (mysqli_query($connect, $sql1)) {
			header('Location: ../comprar.php');
	}
}

//pesquisar

	if (isset($_POST['btn_pesquisar'])) {
		$nome = mysqli_escape_string($connect, $_POST['nome']);
		$telefone = mysqli_escape_string($connect, $_POST['telefone']);
		$email = mysqli_escape_string($connect, $_POST['email']);
		$endereco = mysqli_escape_string($connect, $_POST['endereco']);
		$foto = mysqli_escape_string($connect, $_POST['foto']);
		$_UP['pasta'] = 'foto/';
		$prestador = mysqli_escape_string($connect, $_POST['prestador']);
		$profissao = mysqli_escape_string($connect, $_POST['profissao']);

		
		session_start();
		$sql2 = "SELECT * FROM login WHERE '$campo_pesquisar'= nome OR '$campo_pesquisar'= profissao";
		$resultado = mysqli_query($connect, $sql);
		if (mysqli_query($connect, $sql2)) {
			header('Location: ../pesquisar.php');
	}
}
?>