<?php
	require_once 'db_connect.php';

	session_start();

	if (!isset($_SESSION['logado'])) {
		header('location: login.php');
	}

	$id = $_SESSION['id_usuario'];
	$id_usuario = $id;
	$sql = "SELECT * FROM  login WHERE id = '$id'";
	$resultado = mysqli_query($connect, $sql);
	$dados = mysqli_fetch_array($resultado);
	if (!isset($_GET['idServidor'])) {
		header('location: menu_cliente.php');
	}
	$idServidor = $_GET['idServidor'];
	$sql1 = "SELECT * FROM login WHERE id = '$idServidor'";
	$resultado1 = mysqli_query($connect, $sql1);
	$dados1 = mysqli_fetch_array($resultado1);
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" sizes="16x16" href="img/favicon.png">
	<link rel="stylesheet" href="css/menu.css">
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,300&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=M+PLUS+1+Code&family=Montserrat:ital,wght@1,300&display=swap" rel="stylesheet">
	<title>Contato</title>
	<style>
		h2{
		font-family: 'Montserrat', sans-serif;
		margin-right: 1%;
		margin-top: 1%;
		color: white;
		}
	</style>
</head>
<body>
	<div class="container mb-3" id="nav-container"></div>
		<nav class="navbar navbar-expand-lg fixed-top">
			<a href="#" class="navbar-brand">
			<img id="logo" src="img/logo.png"></a>
			<button class="navbar-toggler" type="button" data-toggle="colapse" data-target="#navbar-links" aria-controls="navbar-links" aria-explanded="false" aria-label="toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="colappse navbar-collapse justify-content-end" id="navbar-links">
				<img src="img/pedecoin_v2.png" width="3%" id="img"><?php echo "<h2>".$dados['pedecoin']; ?>
			</h2>
				<div class="navbar-nav">
					<div class="btn-group" role="group" aria-label="Basic outlined example">
					<a href="menu_servico.php" style="text-decoration:none"><button type="button" class="btn btn-outline-light" class="nav-item nav-link" id="inicio-menu-cliente">Menu</button></a>
					<a href="perfil_servico.php" style="text-decoration:none"><button type="button" class="btn btn-outline-light" class="nav-item nav-link" id="inicio-perfil">Perfil</button></a>
					<a href="sac_servico.html" style="text-decoration:none"><button type="button" class="btn btn-outline-light" class="nav-item nav-link" id="inicio-menu-sac">SAC</button></a>
					<a href="sair.php"><button type="button" class="btn btn-outline-light" class="nav-item nav-link" id="inicio-sair">Sair</button></a>
					</div>
				</div>
			</div>
		</nav>
	</div>
	<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">

  <style>
  	#rodape{
  		margin-top: 44%;
  	}
  </style>
</div>
<br><br>
<?php
	echo '<center><a href = "https://api.whatsapp.com/send?phone=55'.$dados1['telefone'].'&text="><button type="button" class="btn btn-success"><img src="img/whatsapp.png" width="8%"> Entrar em Contato</button></a></center>';
?>
</body>
</html>