<!DOCTYPE html>
<?php
	require_once 'db_connect.php';
	require_once 'acao/pedecoin.php';

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
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,300&display=swap" rel="stylesheet">
	<title>Principal</title>
</head>
<body>
	<style>
		h2{
		font-family: 'Montserrat', sans-serif;
		margin-right: 1%;
		margin-top: 1%;
		color: white;
		}

	</style>
	<header>
		<div class="container" id="nav-container"></div>
		<nav class="navbar navbar-expand-lg fixed-top">
			<a href="#" class="navbar-brand">
			<img id="logo" src="img/logo.png"></a>
			<button class="navbar-toggler" type="button" data-toggle="colapse" data-target="#navbar-links" aria-controls="navbar-links" aria-explanded="false" aria-label="toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="colappse navbar-collapse justify-content-end" id="navbar-links">
				<img src="img/pedecoin_v2.png" width="3%" id="img"><?php echo "<h2>".$dados['pedecoin']; ?></h2>
				<div class="navbar-nav">
					<div class="btn-group" role="group" aria-label="Basic outlined example">
					<a href="menu_servico.php"><button type="button" class="btn btn-outline-light" class="nav-item nav-link" id="inicio-menu">Menu</button></a>
					<a href="sac_servico.html"><button type="button" class="btn btn-outline-light" class="nav-item nav-link" id="inicio-menu-sac">SAC</button>
					<a href="perfil_servico.php"><button type="button" class="btn btn-outline-light" class="nav-item nav-link" id="inicio-perfil">Perfil</button></a>
					</div>
				</div>
			</div>
		</nav>
	</header>
	<form method="post" action="acao/criar.php">
	<br><br><br><br><br><br><div class="card text-white bg-primary mb-3 mx-auto p-4" style="max-width: 18rem;">
  		<center><div class="card-header">Comprar Pede Coin</div></center>
  		<div class="card-body">
    <p class="card-text">
    	<center>
    	<div class="form-group col-md-4">
      <label for="inputCEP">PedeCoin</label>
      	<input type="number" class="form-control" id="inputCEP" name="pedecoin" min="1">
    </div></p>
    	<button type="submit" class="btn btn-light" name="btn_comprar">Comprar</button>
    	</center>
  	</div>
	</div>
</div>
</form>
</body>
</html>