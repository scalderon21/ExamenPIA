<?php

include '../librerias.php';

echo 'asdasdasd';
//Conversion date to mysql date
$phpdate = strtotime((string)$_REQUEST["fecha"] );
$fecha = date( 'd-m-Y H:i:s', $phpdate );


//Verificacion y obtencion del digito verificador
    $rut = $_REQUEST["rut"];
    $digitoVerificador = substr($rut, -1);  
    $rutSin = substr($rut, -2 ,$start);
    $nfactor = 2;
    $nsuma = 0;
    $ndigito;
    $temp;
    $i = (int)strlen($rutSin);

    for ($i; $i >= 0; $i--) {
        (int)$nsuma = (int)$nsuma + (int)$rutSin[$i] * $nfactor;
        $nfactor++;
    if ($nfactor > 7) {$nfactor = 2;}
    }
    echo 'paso for';

    (float)$ndigito = 11-($nsuma % 11);
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
    
    echo $rut;
    echo $digitoVerificador;
    echo $temp;
    
    if(($digitoVerificador == (string)$temp) || ((int)$digitoVerificador == (int)$temp)){
        $oPac=new Paciente($_REQUEST["rut"],$_REQUEST["nombre"]." ".$_REQUEST["apPaterno"]." ".$_REQUEST["apMaterno"],$fecha,$_REQUEST["sexo"]
        ,$_REQUEST["direccion"],$_REQUEST["telefono1"],$_REQUEST["telefono2"], $digitoVerificador);
        
        if ($oPac->VerificaPaciente()) {
        echo "Paciente Agregado";
        } else {
            echo "<b>Paciente ya existente</b>";
        }
    }
    else {
        echo 'Rut erroneo';
        
    }



