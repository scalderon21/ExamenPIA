<!DOCTYPE html>
<html>
    <head>
        <script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form id="frmusuario" action="/controlador/ValidaUsuario.php" method="post">
            <div><label>Usuario:</label><input id="nombreUsuario" type="text" name="nombreUsuario" ></div>
            <div><label>Clave:</label><input id="password" type="password" name="password" ></div>
            <input id="enviar" type="button" onclick="" value="Enviar"> 
            <div id="mensaje"></div>
        </form>
        <?php         
        ?>
        
    </body>
    <script>
    $(document).ready(function(){
            $("#enviar").click(function(){
        
                if ($("#nombreUsuario").val()!=="" && $("#password").val()!==""){
                        $.ajax({url:"/controlador/ValidaUsuario.php"
                            ,type:'post'
                            ,data:{'nombreUsuario':$("#nombreUsuario").val(),
                                'password':$("#password").val()
                                }
                            ,success:function(resultado){
                                $("#mensaje").html(resultado);
                            }
                        });
                    }
                else
                    alert("Debe Agregar el usuario y clave");
            });
     });
     </script>
</html>