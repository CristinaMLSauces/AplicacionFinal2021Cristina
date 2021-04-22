<?php

class Usuario{                                  //Creo una clase nueva que se llame Usuario

    private $codUsuario;                        //Creo sus atributos con visibilidad private , que significa que sus atributos solo pueden accedidos y modificados desde los emtodos de la clase, no desde sus objetos
    private $password;
    private $descUsuario;
    private $numConexiones;
    private $fechaHoraUltimaConexion;
    private $perfil;
    private $imagenPerfil;
    
    function _construct($codUsuario, $password, $descUsuario, $numConexiones, $fechaHoraUltimaConexion, $perfil, $imagenPerfil) {           //Con el metodo magico contruct le doy valor a los atributos
       $this->codUsuario = $codUsuario;
       $this->Password = $password;
       $this->descUsuario = $descUsuario;
       $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
       $this->perfil = $perfil;
       $this->imagenPerfil = $imagenPerfil;
   }
    
    function _set($atributos){                                      //Usamos el metodo magico _set
       return $this->$atributos;
    }
   
    function _get($atributos){                                      //Usamos el metofo magico _get
       return $this->$atributos;
    }
    
    
    
}