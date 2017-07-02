<?php
class Usuario{
    
    var $nombreUsuario;
    var $clave;
    var $pefil;
    
    function __construct($nomUsu="",$clave=""){
        $this->nombreUsuario=$nomUsu;
        $this->clave=$clave;
    }
    
    function VerificarPerfil(){
        
        $sql="";
        
    }
    
    function AgregarUsuario(){
        $oConn=new Conexion();
        
        if ($oConn->Conectar()) {
            $db = $oConn->objconn; 
        } else { 
            return false;
        }
        
        if ($this->VerificaUsuario()){
            return false;   
        }  
        $sql="INSERT INTO usuario (nombreUsuario,password,perfil) VALUES ('$this->nombreUsuario','$this->clave','Paciente')";
        $db->query($sql);
        return true;
        
 
    }
    
    function VerificaUsuario(){
        $oConn=new Conexion();
        
        if ($oConn->Conectar()) {
            $db = $oConn->objconn;
        } else {
            return false;
        }
        $sql="SELECT * FROM usuario WHERE nombreUsuario='$this->nombreUsuario'";
        
        $resultado=$db->query($sql);
               
        if ($resultado->num_rows >= 1) {
            return true;
        } else {
            return false;
        }
    }
    
    function VerificarUsuarioContrasena(){
        $oConn=new Conexion();
        
        if ($oConn->Conectar()) {
            $db = $oConn->objconn;
        } else {
            return false;
        }
        $sql="SELECT * FROM usuario WHERE nombreUsuario='$this->nombreUsuario' and password='$this->clave'";
        
        $resultado=$db->query($sql);
               
        if ($resultado->num_rows >= 1) {
            return true;
        } else {
            return false;
        }
        
    }
    
}