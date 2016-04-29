<?php
/**
* checaSessao.php
*
* Verificar se o usuário ainda está logado no sistema
*
* @author Thiago Serra F Carvalho <thiagoserra at protonmail.com>
* @version 1.0
*
*/
if (session_id() != $_SESSION['idSessao'] || ! isset($_SESSION['usuario'])) {
    header("Location: erro.php?err=102");
}
