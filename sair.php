<?php
/**
* sair.php
*
* Finaliza a sessão corretamente e direciona para a página de login.
*
* @author Thiago Serra F Carvalho <thiagoserra at protonmail.com>
* @version 1.0
*
*/
session_start();
unset($_SESSION);
session_destroy();
session_regenerate_id();
header("Location: index.php");
