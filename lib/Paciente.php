<?php
class Paciente{
    
    var $rut;
    var $nombreCompleto;
    var $fechaNacimiento;
    var $sexo;
    var $direccion;
    var $telefono1;
    var $telefono2;
    var $digitoVerificador;
    
    function __construct($rut="",$nombreCompleto="",$fechaNacimiento="",$sexo="",$direccion="",$telefono1="",$telefono2="", $digitoVerificador=""){
        $this->rut=$rut;
        $this->nombreCompleto=$nombreCompleto;
        $this->fechaNacimiento=$fechaNacimiento;
        $this->sexo=$sexo;
        $this->direccion=$direccion;
        $this->telefono1=$telefono1;
        $this->telefono2=$telefono2;
        $this->digitoVerificador=$digitoVerificador;
    }
    
    function AgregarPaciente(){
        $oConn=new Conexion();
        
        if ($oConn->Conectar()) {
            $db = $oConn->objconn; 
        } else { 
            return false;
        }
        
        if ($this->VerificaPaciente()){
            return false;   
        }  
        $sql="INSERT INTO paciente (rut,nombreCompleto,fechaNacimiento,sexo,direccion,telefono1,telefono2,digitoVerificador) "
            . "VALUES ('$this->rut','$this->nombreCompleto','$this->fechaNacimiento','$this->sexo','$this->direccion',"
            . "'$this->telefono1','$this->telefono2','$this->digitoVerificador')";
        
        $db->query($sql);
        return true;
       
    }
    
    function VerificaPaciente(){
        $oConn=new Conexion();
        
        if ($oConn->Conectar()) {
            $db = $oConn->objconn;
        } else {
            return false;
        }
        $sql="SELECT * FROM paciente WHERE rut='$this->rut'";
        
        $resultado=$db->query($sql);
               
        if ($resultado->num_rows >= 1) {
            return true;
        } else {
            return false;
        }
    }
    
}
