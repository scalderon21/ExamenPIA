<?php
include '../librerias.php';

$oUsu=new Usuario($_REQUEST["nombreUsuario"],$_REQUEST["password"]);

if ($oUsu->AgregarUsuario()) {
    echo "Usuario Agregado";
} else {
    echo "<b>Usuario ya existente</b>";
}


