<?php

include '../librerias.php';

//Conversion date to mysql date
$phpdate = strtotime((string)$_REQUEST["fecha"] );
$fecha = date( 'd-m-Y', $phpdate );


//Verificacion y obtencion del digito verificador
    $rut = $_REQUEST["rut"];
    $digitoVerificador = substr($rut, -1);  
    $rutSin = substr($rut, 0 ,8);
    $nfactor = 2;
    $nsuma = 0;
    $ndigito;
    $temp;
    $i = strlen($rutSin);

    for ($i; $i >= 0; $i--) {
        $nsuma = $nsuma + (int)($rutSin[$i-2]) * $nfactor;
        $nfactor++;
    if ($nfactor > 7) {$nfactor = 2;}
    }

    $ndigito = 11-($nsuma % 11);
    if ($ndigito == 11) {
        $temp=0;
    }
    else if ($ndigito == 10)
    {
        $temp="k";
    }
    else
    {
        $temp = $ndigito;
    }
    
    if(($digitoVerificador == $temp) || ((int)$digitoVerificador == (int)$temp)){
        $oPac=new Paciente($_REQUEST["rut"],$_REQUEST["nombre"]." ".$_REQUEST["apPaterno"]." ".$_REQUEST["apMaterno"],$fecha,$_REQUEST["sexo"]
        ,$_REQUEST["direccion"],$_REQUEST["telefono1"],$_REQUEST["telefono2"], $digitoVerificador);
        
        if ($oPac->AgregarPaciente()) {
        echo "Paciente Agregado";
        } else {
            echo "<b>Paciente ya existente</b>";
        }
    }
    else {
        echo 'Rut erroneo';
        
    }



