<html>
    <head>
        <title>Site</title>

    </head>

	<link rel="stylesheet" type="text/css" href="estilo.css">
	
    <body>
		<?php
		session_start();

			if (empty($_SESSION['idGerente'])){
				// Logado??? Não?? Tchau, bb.
				header('Location: sair.php');
				exit();
			} else {
				echo '<table>
					<tr>
						<td width=50%>
							<center>
							<span class="corBranca">Bem vindo, '.$_SESSION['nome'].'</span>
							<br>
							</center>
						</td>
					</tr>
				</table>';
			}
        $hostname = "127.0.0.1";
			$user = "root";
			$password = "";
			$database = "sistema_bancario";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

			$sql="SELECT * FROM `sistema_bancario`.`cliente`
			Where `idGerente` = '".$_SESSION['idGerente']."';";

			$resultado = $conexao->query($sql);
			
			echo '<hr>';
				
			while($cliente = mysqli_fetch_array($resultado)){
				echo "$cliente[0]";
                echo " $cliente[1]";
                echo "<br>";
				echo '<button>';
			}
			echo '<hr>';
			$conexao -> close();
		?>
		<center>
		<a href="cadastrar_cliente.php">Cadastrar Cliente</a>
	    </center>
        <center>
		<a href="buscar.php">Buscar Peça</a>
	    </center>
    </body>
</html>