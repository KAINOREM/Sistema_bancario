		<?php
			session_start();
			
			$hostname = "127.0.0.1";
			$user = "root";
			$password = "";
			$database = "sistema_bancario";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

			if ($conexao -> connect_errno) {
				echo "Failed to connect to MySQL: " . $conexao -> connect_error;
				exit();
			} else {
				// Evita caracteres epsciais (SQL Inject)
				$email = $conexao -> real_escape_string($_POST['email']);
				$senha = $conexao -> real_escape_string($_POST['senha']);

				$sql="SELECT * FROM `sistema_bancario`.`gerente`
					WHERE `email` = '".$email."' And `senha` = '".$senha."';";

				$resultado = $conexao->query($sql);
				
				if($resultado->num_rows != 0)
				{
					$row = $resultado -> fetch_array();
					$_SESSION['idGerente'] = $row[0];
					$_SESSION['nome'] = $row[1];
					$conexao -> close();
					
					header('Location: site.php', true, 302);
					exit();
				} else {
					$conexao -> close();
					header('Location: index.php', true, 302);
					exit();
				}
			}
		?>