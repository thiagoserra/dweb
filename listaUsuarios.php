<?php
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
        <title>Lista Usuários</title>
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
                        <a class="navbar-brand" href="#">sis.protocolo</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="#">Página Principal</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Opções <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Opção 1</a></li>
                                    <li><a href="#">Opção 2</a></li>
                                    <li><a href="#">Opção 3</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="listaUsuarios.php">Gerenciar Usuários</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Opção 5</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <div class="container" id="tituloPagina">
                <h3>Gerenciar Usuários <small>Criar/Editar/Apagar</small></h3>
            </div>
            <?php
            $usuario = new Usuarios();

            if (isset($_POST['cadastrar'])):
                //-------------
                //inserir dados
                //-------------
                $nome = $_POST['nome'];
                $senha = $_POST['senha'];
                $idGrupo = $_POST['idgrupo'];
                $usuario->setUsuario($nome);
                $usuario->setSenha($senha);
                $usuario->setIdGrupo($idGrupo);
                $usuario->encriptarSenha();
                if ($usuario->inserir()) {
                    echo "Inserido com sucesso!";
                }
            endif;

            //---------------
            //atualizar dados
            //---------------
            if (isset($_POST['atualizar'])):
                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $senha = $_POST['senha'];
                $idGrupo = $_POST['idgrupo'];
                $usuario->setUsuario($nome);
                $usuario->setSenha($senha);
                $usuario->setIdGrupo($idGrupo);
                $usuario->encriptarSenha();
                if ($usuario->atualizar($id)) {
                    echo "Atualizado com sucesso!";
                }
            endif;

            //-------------
            //deletar dados
            //-------------
            if (isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
                $id = (int) $_GET['id'];
                if ($usuario->deletar($id)) {
                    echo "Deletado com sucesso!";
                }
            endif;

            //-----------------
            //selecionando dado
            //-----------------
            if (isset($_GET['acao']) && $_GET['acao'] == 'editar') {
                $id = (int) $_GET['id'];
                $resultado = $usuario->selecionar($id);
                ?>

                <form method="post" action="" class="form-inline">
                    <div class="form-group">
                        <span class="glyphicon glyphicon-user"></span>
                        <input type="text" name="nome" value="<?php echo $resultado->usuario; ?>" placeholder="Nome:" class="form-control" readonly/>
                    </div>
                    <div class="form-group">
                        <span class="glyphicon glyphicon-lock"></span>
                        <input type="password" name="senha" value="" placeholder="Senha:" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <span class="glyphicon glyphicon-link"></span>
                        <?php
                        $grupoSelect = new GrupoUsuario();
                        echo $grupoSelect->montaSelectGrupo($resultado->idgrupo);
                        ?>

                    </div>
                    <input type="hidden" name="id" value="<?php echo $resultado->id; ?>">
                    <input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar dados">
                </form>

<?php } else { ?>

                <form method="post" action="" class="form-inline">
                    <div class="form-group">
                        <span class="glyphicon glyphicon-user"></span>
                        <input type="text" name="nome" value="" placeholder="Nome:" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <span class="glyphicon glyphicon-lock"></span>
                        <input type="password" name="senha" value="" placeholder="Senha:" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <span class="glyphicon glyphicon-link"></span>
                        <?php
                        $grupoSelect = new GrupoUsuario();
                        echo $grupoSelect->montaSelectGrupo();
                        ?>

                    </div>
                    <input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar dados">
                </form>

<?php } ?>

            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome:</th>
                        <th>Ações:</th>
                    </tr>
                </thead>
<?php foreach ($usuario->selecionarTudo() as $key => $value): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $value->id; ?></td>
                            <td><?php echo $value->usuario; ?></td>
                            <td>
                                <?php echo "<a href='?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
    <?php echo "<a href='?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
                            </td>
                        </tr>
                    </tbody>
<?php endforeach; ?>
            </table>
        </div>

    </body>
</html>
