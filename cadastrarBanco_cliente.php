<html>	
    <body>
		<?php
			$hostname = "127.0.0.1";
			$user = "root";
			$password = "";
			$database = "sistema_bancario";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

			if ($conexao -> connect_errno) {
				echo "Failed to connect to MySQL: " . $conexao -> connect_error;
				exit();
			} else {
				// Evita caracteres especiais (SQL Inject)
				$cliente = $conexao -> real_escape_string($_POST['cliente']);

				$sql = "INSERT INTO `sistema_bancario`.`cliente`
							(`nome`, `idGerente`)
						VALUES
							('".$cliente."', '".$_SESSION['idGerente']."');";

				$resultado = $conexao->query($sql);
				
				$conexao -> close();
				header('Location: index.php', true, 301);
			}
		?>
	</body>
</html>