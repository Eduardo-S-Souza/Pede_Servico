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
			$erros[] = '<div class="alert alert-danger" role="alert"> Erro : Algum campo não foi preenchido</div>';
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
								header('Location: login.php');
							}

					}else{
						$erros[] = '<div class="alert alert-danger" role="alert"> Erro : Usuario e senha não conferem</div>';
					}
			}else{
				$erros[] = '<div class="alert alert-danger" role="alert"> Erro : Usuario não existente</div>';
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
<style>
	body{
		background-color: #152F70;
	}
</style>

<section class="vh-100" style="background-color: #152F70;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img
                src="https://br.vazlon.com/static/pics/2017/08/09/Prestador-de-servios-em-geral-20170809040708.jpg"
                alt="login form"
                class="img-fluid" style="border-radius: 1rem 0 0 1rem; width: 100%;"
              />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #152F70;"></i>
                    <span class="h1 fw-bold mb-0"><img src="img/favicon.png" width="50%"></span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Vamos ao trabalho</h5>

                  <div class="form-outline mb-4">
                    <input type="email" id="form2Example17" class="form-control form-control-lg" placeholder="exemplo@gmail.com" name="email" />
                    <label class="form-label" for="form2Example17">Email </label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example27" class="form-control form-control-lg" name="senha" />
                    <label class="form-label" for="form2Example27">Senha</label>
                  </div>
                  <?php
  										if (!empty($erros)) {
  											foreach ($erros as $erro) {
  											echo "$erro";
  						}
  			}
	?>
                  <div class="pt-1 mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="btn-entrar">Login</button>
                  </div>

                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Não possui conta? <a href="cadastro.php" style="color: #393f81;">Cadastrar-se</a></p>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>