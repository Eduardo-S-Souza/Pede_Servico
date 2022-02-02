<!DOCTYPE html>
<?php
	require_once 'bd_connect.php';

	session_start();

	if (isset($_SESSION['id_usuario'])) {
		if ($_SESSION['prestador']==1) {
			header("location: menu_servico.php");
		}else{
			header("location: menu_cliente.php");
		}
	}
	if (isset($_POST['btn-entrar'])) {
		$erros = array();
		$email = mysqli_escape_string($connect, $_POST['email']);
		$senha = mysqli_escape_string($connect, $_POST['senha']);

		if (empty($email) or empty($senha)) {
			$erros[] = "<h1> Algum Campo não foi preenchido</h1>";
		}else{
			$sql = "SELECT email FROM login WHERE email = '$email'";
			$resultado = mysqli_query($connect, $sql);

			if (mysqli_num_rows($resultado) > 0) {
				$senha = md5($senha);
				$sql = "SELECT * FROM login WHERE  email = '$email' AND senha = '$senha'";
				$resultado = mysqli_query($connect, $sql);

					if (mysqli_num_rows($resultado) == 1 ) {
						$dados = mysqli_fetch_array($resultado);
						$_SESSION['logado'] = true;
						$_SESSION['id_usuario'] = $dados['id'];
						$_SESSION['prestador'] = $dados['prestador'];
							if ($dados['prestador'] == 1) {
								header('Location: menu_servico.php');
							}else if ($dados['prestador'] == 0) {
								header('Location: menu_cliente.php');
							}else{
								header('Location: teste.php.php');
							}

					}else{
						$erros[] = "<h1>Erro : Usuario e senha não conferem</h1>";
					}
			}else{
				$erros[] = "Erro : Usuario não existente";
			}
		}
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" sizes="16x16" href="img/favicon.png">
	<link rel="stylesheet" href="css/login.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<title>Login</title>
</head>
<body>
	<center>

	<br><br><img src="img/login.png" width="150px"><br>

	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
	<div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">email</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="inputPassword" placeholder="exemplo@gmail.com" name="email">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Senha</label>
    <div class="col-sm-3">
      <input type="password" class="form-control" id="inputPassword" placeholder="Senha" name="senha">
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="btn-entrar">Entrar</button>
  </form>
  <a href="cadastro.php">ainda não tenho cadastro</a>
  <?php
  	if (!empty($erros)) {
  		foreach ($erros as $erro) {
  			echo "$erro";
  		}
  	}
	?>
	</center>


</body>
</html>