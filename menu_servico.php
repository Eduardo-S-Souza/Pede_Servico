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
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,300&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=M+PLUS+1+Code&family=Montserrat:ital,wght@1,300&display=swap" rel="stylesheet">
	<title>Principal</title>
	<style>
		h2{
		font-family: 'Montserrat', sans-serif;
		margin-right: 1%;
		margin-top: 1%;
		color: white;
		}
		h3{
		font-family: 'Montserrat', sans-serif;
		margin-left: 42%;
		margin-top: 10%;
		}
		h5{
			font-family: 'Montserrat', sans-serif;
			margin-left: 13%;
			margin-top: -8%;
			margin-bottom: 3%;
			color: black;
		}
		.foto{
			width:100px;
			height: 100px;
			border-radius: 50%;
		}	
		a{
			text-decoration:none;
		}
		#lista{
			background-color: lightblue;
			color: black;
		}
		.font{
			font-family: 'M PLUS 1 Code', sans-serif;
			font-family: 'Montserrat', sans-serif;
			font-size: 200%;
		}
		
	</style>
</head>
<body>
	<header>
		<div class="container" id="nav-container"></div>
		<nav class="navbar navbar-expand-lg fixed-top">
			<a href="#" class="navbar-brand font link-light">
			<img id="logo" src="img/logo1.png">ede Serviço</a>
			<button class="navbar-toggler" type="button" data-toggle="colapse" data-target="#navbar-links" aria-controls="navbar-links" aria-explanded="false" aria-label="toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="colappse navbar-collapse justify-content-end" id="navbar-links navbarSupportedContent">
				<img src="img/pedecoin_v2.png" width="3%" id="img"><?php echo "<h2>".$dados['pedecoin']; ?>
			</h2>
				<div class="navbar-nav">	
					<a href="sac_servico.html" style="text-decoration:none"><button type="button" class="btn btn-outline-light" class="nav-item nav-link" id="inicio-menu-sac">SAC</button></a>
					<a href="perfil_servico.php" style="text-decoration:none"><button type="button" class="btn btn-outline-light" class="nav-item nav-link" id="inicio-perfil">Perfil</button></a>
						<a href="comprar.php" style="text-decoration:none"><button type="button" class="btn btn-outline-light" class="nav-item nav-link" id="inicio-impulsionar">Impulsionar</button></a>
					<a href="sair.php"><button type="button" class="btn btn-outline-light" class="nav-item nav-link" id="inicio-pedecoin">Sair</button></a>
					</div>
				</div>
			</div>
		</nav>
	</header>
						
	<h3>Seus Serviços</h3>

			
				<?php
	$i=1;
    $sqli = "SELECT login.* FROM login, servico WHERE servico.id_cliente = login.id AND servico.id_prestador = '$id' AND login.prestador = 0 AND servico.finalizado = 0 ";
	$resultado = mysqli_query($connect, $sqli);
	if ($resultado) {
		while($dados =  mysqli_fetch_array($resultado)){
			if ($i==3) {
				echo "<br>";
				$i=1;
			}
			?><a href="contatar2.php?idServidor=<?php echo $dados['id'];?>">
				<div class="container alert alert-primary col-md-8" role="alert" id="alert">
					<?php
	
					echo '<img src="fotos/'.md5($dados['id']).'.jpg" class="foto">';
					echo "<h5><b>Nome:</b> ".$dados['nome']."<br>";
					echo "<b>Profissão:</b> ".$dados['profissao']."<br>";
				?>
				</div>
				</div></a>
				<?php
				$i++;
		}
	}
	?>
	
</body>
</html>