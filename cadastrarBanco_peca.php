<html>	
    <body>
		<?php
			$hostname = "127.0.0.1";
			$user = "root";
			$password = "";
			$database = "mecanica";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

			if ($conexao -> connect_errno) {
				echo "Failed to connect to MySQL: " . $conexao -> connect_error;
				exit();
			} else {
				// Evita caracteres especiais (SQL Inject)
				$peca = $conexao -> real_escape_string($_POST['peca']);
				$quantidade = $conexao -> real_escape_string($_POST['quantidade']);
                $preco = $conexao -> real_escape_string($_POST['preco']);

				$sql = "INSERT INTO `mecanica`.`pecas`
							(`peca`, `preco`, `quantidade`)
						VALUES
							('".$peca."', '".$preco."', '".$quantidade."');";

				$resultado = $conexao->query($sql);
				
				$conexao -> close();
				header('Location: site.php', true, 301);
			}
		?>
	</body>
</html>