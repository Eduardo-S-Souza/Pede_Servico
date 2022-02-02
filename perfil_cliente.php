<!DOCTYPE html>
<?php
	require_once 'db_connect.php';

	session_start();

	if (!isset($_SESSION['logado'])) {
		header('location: login.php');
	}

	$id = $_SESSION['id_usuario'];
	$sql = "SELECT * FROM  login WHERE id = '$id'";
	$resultado = mysqli_query($connect, $sql);
	$dados = mysqli_fetch_array($resultado);
?>
<html>
<head>
	<link rel="icon" sizes="16x16" href="img/favicon.png">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/perfil.css">
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	
	<title>Perfil Cliente</title><link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,300&display=swap" rel="stylesheet">
	<style>
		h1{
		font-family: 'Montserrat', sans-serif;
		margin-left: 34%;
}
	</style>
</head>
<body>
	<header>
		<div class="container" id="nav-container"></div>
		<nav class="navbar navbar-expand-lg fixed-top">
			<a href="#" class="navbar-brand">
			<img id="logo" src="img/logo.png"></a>
			<button class="navbar-toggler" type="button" data-toggle="colapse" data-target="#navbar-links" aria-controls="navbar-links" aria-explanded="false" aria-label="toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="colappse navbar-collapse justify-content-end" id="navbar-links">
				<div class="navbar-nav">
					<a href="menu_cliente.php"><button type="button" class="btn btn-outline-light" class="nav-item nav-link" id="inicio-menu">Menu</button></a>
					<a href="sac_cliente.html"><button type="button" class="btn btn-outline-light" class="nav-item nav-link" id="inicio-menu-sac">SAC</button></a>
				</div>
			</div>
		</nav>
	</header>
	<br><br><br><br>

	<?php 
	
		echo '<img src="fotos/'.md5($dados['id']).'.jpg" class="foto"><br><br>';
		echo "<h1><b>Nome:</b><i> ".$dados['nome']."</i></h1><br>";
		echo "<h1><b>Telefone:</b><i> ".$dados['telefone']."</i></h1><br>";
		echo "<h1><b>Email:</b><i> ".$dados['email']."</i></h1><br>";
		echo "<h1><b>Endereço:</b><i> ".$dados['endereco']."</i></h1><br>";

	?>
	

</body>
</html>