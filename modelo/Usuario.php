<?php
/**
 * Class Departamento
 *
 * Clase que se va a utilizar para crear un objeto de la clase Usuario
 * 
 * @author Cristina Nuñez y Javier Nieto
 * @since 1.1
 * @copyright 2020-2021 Cristina Nuñez y Javier Nieto
 * @version 1.1
 * @package  Validacion
 */
class Usuario {

    private $codUsuario;

    private $password;
  
    private $descUsuario;

    private $numConexiones;
    
    private $fechaHoraUltimaConexion;
    
    private $perfil;
 
    private $imagenPerfil;

    function __construct($codUsuario, $password, $descUsuario, $numConexiones, $fechaHoraUltimaConexion, $perfil, $imagenPerfil) {
        $this->codUsuario = $codUsuario;
        $this->password = $password;
        $this->descUsuario = $descUsuario;
        $this->numConexiones = $numConexiones;
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
        $this->perfil = $perfil;
        $this->imagenPerfil = $imagenPerfil;
    }
    
    function getCodUsuario() {
        return $this->codUsuario;
    }

 
    function getPassword() {
        return $this->password;
    }

    function getDescUsuario() {
        return $this->descUsuario;
    }


    function getNumConexiones() {
        return $this->numConexiones;
    }


    function getFechaHoraUltimaConexion() {
        return $this->fechaHoraUltimaConexion;
    }


    function getPerfil() {
        return $this->perfil;
    }

    function getImagenPerfil() {
        return $this->imagenPerfil;
    }

    function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }


    function setPassword($password) {
        $this->password = $password;
    }


    function setDescUsuario($descUsuario) {
        $this->descUsuario = $descUsuario;
    }

    function setNumConexiones($numConexiones) {
        $this->numConexiones = $numConexiones;
    }

 
    function setFechaHoraUltimaConexion($fechaHoraUltimaConexion) {
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
    }


    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    function setImagenPerfil($imagenPerfil) {
        $this->imagenPerfil = $imagenPerfil;
    }
}
?>