<?php
session_start();
require_once 'checaSessao.php';
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
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Navegar</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><?php echo SIS_NAME ?></a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="principal.php">Principal</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Opções <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Opção 1</a></li>
                                    <li><a href="#">Opção 2</a></li>
                                    <li><a href="#">Opção 3</a></li>
                                    <li role="separator" class="divider"></li>
                                    <?php
                                      if($_SESSION["idGrupo"] == 98) {
                                          echo "<li><a href=\"listaUsuarios.php\">Troca Senha</a></li>";
                                      } else {
                                          echo "<li><a href=\"listaUsuarios.php\">Gerenciar Usuários</a></li>";
                                      }
                                    ?>

                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Opção 5</a></li>
                                </ul>
                            </li>
                            <li><a href="sair.php">Sair</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <div class="container tituloPagina">
                <h3><?php echo $tituloPagina . "<small>".$tituloPaginaResumo."</small>";?></h3>
            </div>
