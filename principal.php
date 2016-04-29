<?php
/**
* principal.php
*
* Página para qual o usuário é direcionado quando faz o login.
* (personalize.... coloaque as informações que achar necessárias)
*
* @author Thiago Serra F Carvalho <thiagoserra at protonmail.com>
* @version 1.0
*
*/

$tituloPagina = "Página principal";
$tituloPaginaResumo = "";
require_once 'topo.php';

echo "Olá, ".$_SESSION['nome']. ", bem vindo(a) ao sistema! ";
echo "São ".date("H:i")."h, hoje é dia ".date("d-m-Y");
?>


</div>

</body>
</html>
