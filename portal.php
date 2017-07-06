<!DOCTYPE html>
<?php
    include 'constantes.php';
    include PATH.'/lib/Conexion.php';
    include PATH.'/lib/Usuario.php';
?>
<html>
    <head>
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
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
        ?>  
        
        <?php
        
        
        if($usr->pefil == 'Administrador'){
            ?>
                <div><label></label>Seleccione:<select id="pcm" name="pcm">
                    <option value="Paciente">Paciente</option>
                    <option value="Usuario">Usuario</option>
                    <option value="Medico">Medico</option>
                </select>  
                </div>
                <div class="menu">
                <a href="#" class="active">Home</a>
                <a href="#">Listar</a>
                <a href="formularios/insertarPaciente.php">Registrar</a>
                <a href="#">Eliminar</a>
                </div>
            <?php
        }
        
        
        ?>

    </body>
</html>