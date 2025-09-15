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
            Where `idGerente` = '".$_SESSION['idGerente']."' And `ativo` = 'S';";

            $resultado = $conexao->query($sql);
                
            while($cliente = $resultado->fetch_assoc()) {
     
            $cartao="SELECT COALESCE(`ENDERECO`, '') as endereco, 
            COALESCE(`numero_cartao`, '') as numero_cartao 
            FROM `sistema_bancario`.`cartao`  WHERE `idCliente` = '".$cliente['idCliente']."';";
            $visualizar = $conexao->query($cartao);

            echo '<div class="cliente-item">';
            echo '<div class="cliente-info">';
            echo '<div class="cliente-info-linha">';
            echo '<span class="cliente-id">' . $cliente['idCliente'] . '</span>';
            echo '<span class="cliente-nome">'  . $cliente['nome'] . '</span>';
            echo '</div>';

            while($row2 = mysqli_fetch_array($visualizar)) {
                echo '<div class="cliente-dados">Endereço: ' 
                    . $row2[0] . ' | Número do cartão: ' 
                    . $row2[1] . '</div>';
            }

            echo '</div>';
            echo '<div class="cliente-botoes">';
            echo '<form method="POST" action="cadastrar_cartao.php" style="display:inline;">';
            echo '<input type="hidden" name="idCliente_cartao" value="' . $cliente['idCliente'] . '">';
            echo '<button type="submit" class="cartao" onclick="return confirm(\"Tem certeza que deseja cartao este cliente?\")">
                <img src="Imagens/cartao.png" alt="cartao" style="width: 38px; height: 38px;">
                </button></form>';

            echo '<form method="POST" action="apagarBanco.php" style="display:inline;">';
            echo '<input type="hidden" name="idCliente_apagar" value="' . $cliente['idCliente'] . '">';
            echo '<button type="submit" class="excluir" onclick="return confirm(\"Tem certeza que deseja excluir este cliente?\")">
                <img src="Imagens/lixeira.png" alt="Excluir" style="width: 38px; height: 38px;">
                </button> </form>';
            echo '</div>';
            echo '</div>';
        }
            
            $conexao -> close();
        ?>
        
        <div class="links-principais">
            <a href="cadastrar_cliente.php" class="botao-principal">Cadastrar Cliente</a>
        </div>
        <div class="links-principais">
            <a href="index.php" class="botao-principal">Retornar</a>
        </div>
    </body>
</html>