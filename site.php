<html>
    <head>
        <title>Sistema Bancário</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    
    <body>
        <?php
        session_start();

            if (empty($_SESSION['idGerente'])){
                // Logado??? Não?? Tchau, bb.
                header('Location: sair.php');
                exit();
            } else {
                echo '<div class="cabecalho">
                    <div class="container">
                        <center>
                        <span class="corBranca">Bem Vindo, '.$_SESSION['nome'].'</span>
                        </center>
                    </div>
                </div>';
            }
        $hostname = "127.0.0.1";
            $user = "root";
            $password = "";
            $database = "sistema_bancario";
        
            $conexao = new mysqli($hostname,$user,$password,$database);

            $sql="SELECT * FROM `sistema_bancario`.`cliente`
            Where `idGerente` = '".$_SESSION['idGerente']."';";

            $resultado = $conexao->query($sql);
                
            while($cliente = $resultado->fetch_assoc()) {
                echo '<div class="cliente-item">';
                echo '<div class="cliente-info">';
                echo '<span class="cliente-id">' . $cliente['idCliente'] . '</span>';
                echo '<span class="cliente-nome">' . $cliente['nome'] . '</span>';
                echo '</div>';
                echo '<div>';
                echo '<form method="POST" action="excluirasdasdas_cliente.php" style="display:inline;">';
                echo '<input type="hidden" name="idCliente" value="' . $cliente['idCliente'] . '">';
                echo '<button type="submit" class="excluir" onclick="return confirm(\"Tem certeza que deseja excluir este cliente?\")">
        			<img src="Imagens/lixeira.png" alt="Excluir" style="width: 38px; height: 38px;">
     				</button>';
				echo '<form method="POST" action="cadastrarASdasdasd_cliente.php" style="display:inline;">';
                echo '<input type="hidden" name="idCliente" value="' . $cliente['idCliente'] . '">';
                echo '<button type="submit" class="cartao" onclick="return confirm(\"Tem certeza que deseja cartao este cliente?\")">
        			<img src="Imagens/cartao.png" alt="cartao" style="width: 38px; height: 38px;">
     				</button>';
                echo '</div>';
                echo '</div>';
            }
            
            $conexao -> close();
        ?>
        
        <div class="links-principais">
            <a href="cadastrar_cliente.php" class="botao-principal">Cadastrar Cliente</a>
            <a href="cadastrar_cartao.php" class="botao-principal">Cadastrar Cartão</a>
        </div>
    </body>
</html>