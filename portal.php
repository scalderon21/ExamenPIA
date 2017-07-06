<!DOCTYPE html>
<?php
    include 'constantes.php';
    include PATH.'/lib/Conexion.php';
    include PATH.'/lib/Usuario.php';
?>
<html>
    <head>
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        $usr=new Usuario;
        $usr = $_SESSION['Usuario'];
        echo "Usuario: ".$usr->nombreUsuario . "     Perfil: ". $usr->pefil;
        session_destroy();
        
        if($usr->pefil == 'Administrador'){
            ?>
                echo'<script> window.location="formularios/insertarUsuario.php"; </script> ';
            <?php
        }
        
        
        ?>

    </body>
</html>