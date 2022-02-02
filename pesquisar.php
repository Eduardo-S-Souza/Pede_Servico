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
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=M+PLUS+1+Code&family=Montserrat:ital,wght@1,300&display=swap" rel="stylesheet">
	<title>Pesquisar</title>
	<style>
		.foto{
			width: 100px;
			height: 100px;
			border-radius: 50%;
		}	
		h5{
			font-family: 'Montserrat', sans-serif;
			margin-left: 13%;
			margin-top: -12%;
			color: black;
		}
		a{
			text-decoration:none;
		}
	</style>
</head>
<body>
	<header>
		<div class="container" id="nav-container"></div>
			<nav class="navbar navbar-expand-lg fixed-top">
				<a href="#" class="navbar-brand">
					<img id="logo" src="img/logo.png"></a>
				
				<div class="colappse navbar-collapse justify-content-end" id="navbar-links">
				<div class="navbar-nav">
			<form class="d-flex" method="POST">
				<button class="btn btn-outline-light" type="submit" name="btn-pesquisar">Pesquisar</button>
        <input class="form-control me-2" type="search"  aria-label="Search" name="campo_pesquisar">
        
      </form>
					<div class="btn-group" role="group" aria-label="Basic outlined example">
						<a href="menu_cliente.php"><button type="button" class="btn btn-outline-light" class="nav-item nav-link" id="inicio-menu">Menu</button></a>
						<a href="perfil_cliente.php"><button type="button" class="btn btn-outline-light" class="nav-item nav-link" id="inicio-perfil">Perfil</button></a>
						<a href="sac_cliente.html"><button type="button" class="btn btn-outline-light" class="nav-item nav-link" id="inicio-menu-sac">SAC</button></a>
					</div>
				</div>
			</div>
		</nav>
	</header>
	<br><br><br><br>	
	<?php
if (isset($_POST['btn-pesquisar'])) {
		$prestador = mysqli_escape_string($connect, $dados['prestador']);
		$profissao = mysqli_escape_string($connect, $dados['profissao']);
		$campo_pesquisar =$_POST['campo_pesquisar'];
	
		$sql2 = "SELECT * FROM login WHERE nome LIKE '$campo_pesquisar%' OR profissao LIKE '$campo_pesquisar%' AND prestador = 1 ORDER BY mediaNota DESC";
		$i=1;
		$resultado2 = mysqli_query($connect, $sql2);
		while ($dados = mysqli_fetch_array($resultado2)) {
			if ($i==3) {
				echo "<br>";
				$i=1;
			}
				?>
				<a href="contatar.php?idServidor=<?php echo $dados['id'];?>">
				<div class="container alert alert-primary col-8" role="alert">
				<?php
					echo '<img src="fotos/'.md5($dados['id']).'.jpg" class="foto"><br><br>';
					echo "<h5><b>Nome:</b> ".$dados['nome']."<br>";
					echo "<b>Profissão:</b> ".$dados['profissao']."<br>";
					echo "<b>Nota:</b> ".$dados['mediaNota']."</h5";
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