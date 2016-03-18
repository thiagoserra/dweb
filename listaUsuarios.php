<?php
require_once "Classes/Usuarios.php";

$u = new Usuarios();

foreach($u->selecionarTudo() as $key => $value):
  echo $value->usuario;
  echo "<br/>";
endforeach;
?>
