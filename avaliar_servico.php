<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" sizes="16x16" href="img/favicon.png">
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<title>Perfil Servico</title>
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,300&display=swap" rel="stylesheet">
</head>
<body>
	<form method="POST">
		
		<br><br><div class="col-3 container">
  			<label for="exampleFormControlInput1" class="form-label">Nota</label>
  			<input type="number" class="form-control" id="exampleFormControlInput1" name="nota" min="1" max="5">
		</div><br>
		<center>
		<button type="submit" class="btn btn-primary" name="btn-avaliar">Avaliar</button><br>
		</center>
	</form>
	<?php

	require_once 'bd_connect.php';

	if (isset($_POST['btn-avaliar'])) {
		$id = $_GET['id'];
		$sql1 = "SELECT * FROM login WHERE id = '$id'";
		$resultado1 = mysqli_query($connect, $sql1);
		$dados1 = mysqli_fetch_array($resultado1);
		$media = ($_POST['nota'] + $dados1['mediaNota'])/2;
		$sql = "UPDATE login SET mediaNota = '$media' WHERE id = '$id'";

		if (mysqli_query($connect, $sql)) {
			header("Location:menu_cliente.php");

}
	}

	?>
</body>
</html>