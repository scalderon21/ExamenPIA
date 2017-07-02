<!DOCTYPE html>
<?php
define("PATH",$_SERVER['DOCUMENT_ROOT']."/Examen");
include PATH.'/lib/Usuario.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="paginas/IngresoUsuario.php">Ingreso Usuarios</a>
        <?php
        $usu= new Usuario("scalderon","12345");
        $usu->AgregarUsuario();
        ?>
    </body>
</html>
