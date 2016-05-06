<?php
/**
* erro.php
*
* Página responsável por tratar os códigos de erro do sistema
*
* @author Thiago Serra F Carvalho <thiagoserra at protonmail.com>
* @version 1.0
*
*/
$tituloPagina = "Erro";
$tituloPaginaResumo = " - Informe o desenvolvedor!";

require_once 'config.inc.php';
function __autoload($class_name) {
    require_once 'Classes/' . $class_name . '.php';
}
?>
<!DOCTYPE HTML>
<html land="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title><?php echo SIS_NAME. " v. ". SIS_VERSION." - ".$tituloPagina;?></title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="css/master.css"/>
        <script src="js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">

<?php

//101 - Usuário ou Senha Inválidos
//102 - Sessão inválida, logar novamente

if ($_GET['err'] == 102) {
  echo "Usuário desconectado! (erro 102)";
}

?>
        </div>

</body>
</html>
