<?php
include '../librerias.php';

$oUsu=new Usuario($_REQUEST["nombreUsuario"],$_REQUEST["password"]);

if ($oUsu->VerificarUsuarioContrasena()) {
    
    echo "Login...";
    if($oUsu->AsiganrPerfil()){
        session_start();
        $_SESSION['Usuario']=$oUsu;
        echo'<script> window.location="portal.php"; </script> ';
        exit;   
    }else{
            echo'Error al verificar';
        }
    
} else {
    echo "<b>Usuario o Clave invalidas</b>";
}

