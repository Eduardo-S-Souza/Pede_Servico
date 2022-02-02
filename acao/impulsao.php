<?php
require_once '../bd_connect.php';
		$sqli = "SELECT * FROM login WHERE prestador = 1 ORDER BY pedecoin DESC";
		$resultado = mysqli_query($connect, $sqli);
		while($dados =  mysqli_fetch_array($resultado)){
		?>
		<a href="../contatar.php?idServidor=<?php echo $dados['id'];?>">
<?php
		echo $dados['nome'].",".$dados['pedecoin']."<hr>"; 
}
?>