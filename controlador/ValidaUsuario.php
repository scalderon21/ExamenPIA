<?php
include '../librerias.php';
$oUsu=new Usuario($_REQUEST["nombreUsuario"],$_REQUEST["password"]);

//Verifica que el usuario agregado no este en la base de datos
if ($oUsu->AgregarUsuario()) {
    echo "Usuario Agregado";
} else {
    echo "<b>Usuario ya existente</b>";
}
/*
if ($oUsu->VerificaLocal()) {
    echo "Todo bien";
} else {
    echo "<b>Todo mal</b>";
}
*/
