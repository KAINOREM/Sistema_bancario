<html>
    <head>
        <title>Sistema Bancário - Cadastrar Cartão</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    
    <body>
        <div class="container">
            <h1 class="page-title">Cadastrar Cartão</h1>
            
            <div class="divCadastro">
                <h2>Dados do Cliente</h2>
                
                <form method="post" action="cadastrarBanco_cartao.php" id="formCadastro" name="formCadastro"> 
                <div class="form-group">
                        <label for="cliente">Endereço:</label>
                        <input type="text" name="endereco" id="endereco" placeholder="Digite o endereço do cliente" required>
                    </div>
					<div class="form-group">
                        <label for="cliente">Número do Cartão:</label>
                        <input type="text" name="numero" id="numero" placeholder="Digite o número do cartão" required>
                    </div>
                    <?php 
                        $cliente = $_POST['idCliente_cartao'];
                        echo '<input type="hidden" name="idCliente" id="idCliente" value="' . $cliente .'">'
					?>
                    <button type="submit" class="btn-submit">Cadastrar Cartão</button>
                </form>
                
                <div class="container-center">
                    <a href="site.php" class="link-voltar">← Voltar ao Painel</a>
                </div>
            </div>
        </div>
    </body>
</html>