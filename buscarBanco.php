<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Buscar</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<?php
        $hostname = "127.0.0.1";
			$user = "root";
			$password = "";
			$database = "mecanica";
		
			$conexao = new mysqli($hostname,$user,$password,$database);

            $peca = $conexao -> real_escape_string($_POST['peca']);

			$sql="SELECT * FROM `mecanica`.`pecas`
                    WHERE `peca` LIKE '%".$peca."%';";

			$resultado = $conexao->query($sql);
			
			echo '<hr>';
				
			while($row = mysqli_fetch_array($resultado)){
				echo "Peça: $row[1]";
                echo "<br>Quantidade: $row[2]";
                echo "<br>Valor Unitário: R$$row[3],00";
                echo "<br>";
			}
			$conexao -> close();
		?>

        <center>
		<a href="site.php">Voltar</a>
	    </center>
</body>
</html>