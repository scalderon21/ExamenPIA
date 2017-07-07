<!DOCTYPE html>

<html>
    <head>
        <script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form id="frmusuario" action="/controlador/ValidaPaciente.php" method="post">
            <div><label>Rut (1111111-1):</label><input id="rut" type="text" name="rut" ></div>
            <div><label>Nombre:</label><input id="nombre" type="text" name="nombre" ></div>
            <div><label>Apellido Paterno:</label><input id="apPaterno" type="text" name="apPaterno" ></div>
            <div><label>Apellido Matero:</label><input id="apMaterno" type="text" name="apMaterno" ></div>
            <div><label>Fecha Nacimiento:</label><input id="fecha" type="date" name="fecha">
            <div><label>Sexo: </label><select id="sexo" name="sexo">
                    <option value="m">Hombre</option>
                    <option value="f">Mujer</option>
                </select>  
            </div>
            <div><label>Direccion: </label><input id="direccion" type="text" name="direccion" ></div>
            <div><label>Telefono 1:</label><input id="telefono1" type="text" name="telefono1" ></div>
            <div><label>Telefono 2:</label><input id="telefono2" type="text" name="telefono2" ></div>
            <input id="enviar" type="button" onclick="" value="Enviar"> 
            <div id="mensaje"></div>
        </form>

    </body>
    <script>
    $(document).ready(function(){
            $("#enviar").click(function(){
        
                if ($("#rut").val()!=="" && $("#nombre").val()!=="" && $("#apPaterno").val()!==""
                        && $("#apMaterno").val()!=="" && $("#sexo").val()!==""
                        && $("#direccion").val()!=="" && $("#telefono1").val()!==""
                        && $("#telefono2").val()!=="" && $("#fecha").val()!==""){
                        $.ajax({url:"../controlador/ValidaPaciente.php"
                            ,type:'post'
                            ,data:{'rut':$("#rut").val(),
                                'nombre':$("#nombre").val(),
                                'apPaterno':$("#apPaterno").val(),
                                'apMaterno':$("#apMaterno").val(),
                                'sexo':$("#sexo").val(),
                                'direccion':$("#direccion").val(),
                                'telefono1':$("#telefono1").val(),
                                'telefono2':$("#telefono2").val(),
                                'fecha':$("#fecha").val()                                  
                                }
                            ,success:function(resultado){
                                $("#mensaje").html(resultado);
                            }
                        });
                    }
                else
                    alert("Ingrese todos los datos necesarios");
            });
     });
     </script>
</html>
