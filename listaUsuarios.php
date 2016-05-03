<?php
/**
* listaUsuarios.php
*
* Gerenciamento de usuários do sistema
* (Cadastro, Edição, Exclusão e Lista)
*
* @author Thiago Serra F Carvalho <thiagoserra at protonmail.com>
* @version 1.0
*
*/
$tituloPagina = "Gerenciar Usuários";
$tituloPaginaResumo = " - Criar/Editar/Excluir";
require_once 'topo.php';

if ($_SESSION['idGrupo'] == 98) {
  $_GET['acao'] = "editar";
  $_GET['id'] = $_SESSION['idUsuario'];
}

$usuario = new Usuarios();

//inserindo usuário
if (isset($_POST['cadastrar']) && $_SESSION['idGrupo'] = 99) {
    $user = $_POST['user'];
    $senha = $_POST['senha'];
    $idGrupo = $_POST['idgrupo'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $usuario->setUsuario($user);
    $usuario->setSenha($senha);
    $usuario->setIdGrupo($idGrupo);
    $usuario->encriptarSenha();
    $usuario->setNome($nome);
    $usuario->setEmail($email);

    if ($usuario->inserir()) {
        echo "Inserido com sucesso!";
    }
}

//atualizando usuário
if (isset($_POST['atualizar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $idGrupo = $_POST['idgrupo'];
    $email = $_POST['email'];
    $usuario->setNome($nome);
    $usuario->setSenha($senha);
    $usuario->setIdGrupo($idGrupo);
    $usuario->encriptarSenha();
    $usuario->setEmail($email);
    if ($usuario->atualizar($id)) {
        echo "Atualizado com sucesso!";
    }
}

//deletando usuário
if (isset($_GET['acao']) && $_GET['acao'] == 'deletar' && $_SESSION['idGrupo'] == 99) {
    $id = (int) substr($_GET['id'], 0, 5);
    if ($usuario->deletar($id)) {
        echo "Deletado com sucesso!";
    }
}


//selecionando usuários
//montando o formulário com dados para edição
if (isset($_GET['acao']) && $_GET['acao'] == 'editar') {
    $id = (int) substr($_GET['id'], 0, 5);
    $resultado = $usuario->selecionar($id);
?>

    <form method="post" action="" class="form-horizontal">
        <div class="form-group">
            <label for="user">Usuário:</label>
            <input type="text" name="user" value="<?php echo $resultado->usuario; ?>"class="form-control" readonly/>
        </div>

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $resultado->nome; ?>" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="text" name="email" value="<?php echo $resultado->email; ?>" class="form-control" required/>
        </div>

        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" value="" placeholder="Senha:" class="form-control" required/>
        </div>

        <div class="form-group">
            <label for="idgrupo">Grupo:</label>
            <?php
            $grupoSelect = new GruposUsuarios();
            echo $grupoSelect->montaSelectGrupo($resultado->idgrupo, "readonly");
            ?>
        </div>

        <input type="hidden" name="id" value="<?php echo $resultado->id; ?>">
        <input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar dados">
    </form>

<?php
  } else {
?>

  <form method="post" action="" class="form-horizontal">
      <div class="form-group">
          <label for="user">Usuário:</label>
          <input type="text" name="user" value=""class="form-control" required/>
      </div>

      <div class="form-group">
          <label for="nome">Nome:</label>
          <input type="text" name="nome" value="" class="form-control" required>
      </div>

      <div class="form-group">
          <label for="email">E-mail:</label>
          <input type="text" name="email" value="" class="form-control" required/>
      </div>

      <div class="form-group">
          <label for="senha">Senha:</label>
          <input type="password" name="senha" value="" placeholder="Senha:" class="form-control" required/>
      </div>

      <div class="form-group">
          <label for="idgrupo">Grupo:</label>
          <?php
          $grupoSelect = new GruposUsuarios();
          echo $grupoSelect->montaSelectGrupo();
          ?>
      </div>
      <input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar dados">
  </form>
<?php
  }

  if($_SESSION['idGrupo'] == 99) {
?>

<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome:</th>
            <th>Ações:</th>
        </tr>
    </thead>
<?php
      foreach ($usuario->selecionarTudo() as $key => $value) {
?>
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
<?php
      }
    }
?>
</table>



</div>

</body>
</html>
