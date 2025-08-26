<html>
    <head>
        <title>Sistema Bancário - Cadastrar Cliente</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    
    <body>
        <div class="container">
            <h1 class="page-title">Cadastrar Novo Cliente</h1>
            
            <div class="divCadastro">
                <h2>Dados do Cliente</h2>
                
                <form method="post" action="cadastrarBanco_cliente.php" id="formCadastro" name="formCadastro">
                    <div class="form-group">
                        <label for="cliente">Nome Completo:</label>
                        <input type="text" name="cliente" id="cliente" placeholder="Digite o nome completo do cliente" required>
                    </div>
                    
                    <button type="submit" class="btn-submit">Cadastrar Cliente</button>
                </form>
                
                <div class="container-center">
                    <a href="gerente.php" class="link-voltar">← Voltar ao Painel</a>
                </div>
            </div>
        </div>
    </body>
</html>