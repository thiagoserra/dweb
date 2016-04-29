<?php
/**
* processaLogin.php
*
* Página responsável por validar as informações do formulário de login
* da página index.php
*
* @author Thiago Serra F Carvalho <thiagoserra at protonmail.com>
* @version 1.0
*
*/

session_start();
require_once 'config.inc.php';
function __autoload($class_name) {
    require_once 'Classes/' . $class_name . '.php';
}

if(isset($_POST['enviar'])) {

    $user = substr(trim($_POST['usuario']), 0, 20);
    $senha = substr(trim($_POST['senha']), 0, 8);
    $usuario = new Usuarios();

    $usuario->setUsuario($user);
    $usuario->setSenha($senha);
    $usuario->encriptarSenha();
    $dado = $usuario->selecionarUsuario();

    if($dado) {
        $_SESSION['usuario'] = $dado->usuario;
        $_SESSION['nome'] = $dado->nome;
        $_SESSION['dataHoraLogin'] = date("d-m-Y H:i");
        $_SESSION['idGrupo'] = $dado->idgrupo;
        $_SESSION['idUsuario'] = $dado->id;
        $_SESSION['idSessao'] = session_id();
        header("Location: principal.php");
    } else {
        header("Location:erro.php?err=101");
    }
}
