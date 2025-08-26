<html>
    <head>
        <title>Sistema Bancário - Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    
    <body>
        <div class="container">
            <h1 class="page-title">Sistema Bancário</h1>
            
            <div class="divLogin">
                <h2>Login do Gerente</h2>
                
                <form method="post" action="verificaLogin.php" id="formlogin" name="formlogin">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" placeholder="Digite seu email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
                    </div>
                    
                    <button type="submit" class="btn-submit">Entrar</button>
                </form>
            </div>
        </div>
    </body>
</html>