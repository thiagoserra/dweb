<!DOCTYPE HTML>
<html land="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Lista Usuários</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="css/master.css"/>
        <script src="js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">

            <div class="container tituloPagina">
                <h3>Seu Sistema - Entrar</h3>
            </div>
            <form action="processaLogin.php" class="form-inline" method="post">
                <label for="usuario">Usuário</label>
                <input type="text" name='usuario' class="form-control" value="" placeholder="Digite seu usuário" required>
                <label for="senha">Senha</label>
                <input type="password" name='senha'class="form-control" value=""  placeholder="Digite sua senha" required>
                <input type="submit" name="enviar" value="Entrar" class="btn btn-primary">
            </form>
        </div>
        <div class="container indexTexto">
          <?php echo date("d-m-Y H:i");?>
        </div>
    </body>
</html>
