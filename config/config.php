<?php
require_once "core/210322ValidacionFormularios.php";                            //Incluimos la libreria de usuarios
require_once "modelo/REST.php";                                                 //Inluyo el modelo de la clase 
require_once "modelo/Usuario.php";                                              //Incluimos la clase Usuario

$controladores = [                                                              //Creamos un array de controladores para cargarlos controladores mas adelante
    "principal" => "controlador/cPrincipal.php",
    "login" => "controlador/cLogin.php",                                        //Le damos nombre y le marcamos la ruta
    "inicio" => "controlador/cInicio.php",
    "detalle" => "controlador/cDetalle.php",
    "registro" => "controlador/cRegistro.php",
    "wip" => "controlador/cWIP.php",
    "miCuenta" => "controlador/cMiCuenta.php",
    "password" => "controlador/cCambiarPassword.php",
    "borrarcuenta" => "controlador/cBorrarCuenta.php",
    "rest" => "controlador/cREST.php",
    "error" => "controlador/cError.php",
    "mtoDepartamentos" => "controlador/cMtoDepartamentos.php"
];

$vistas = [                                                                     //Hacemos los mismo con las vistas
    "principal" => "vista/vPrincipal.php",
    "layout" => "vista/layout.php",
    "login" => "vista/vLogin.php",
    "inicio" => "vista/vInicio.php",
    "detalle" => "vista/vDetalle.php",
    "registro" => "vista/vRegistro.php",
    "wip" => "vista/vWIP.php",
    "miCuenta" => "vista/vMiCuenta.php",
    "password" => "vista/vCambiarPassword.php",
    "borrarcuenta" => "vista/vBorrarCuenta.php",
    "rest" => "vista/vREST.php",
    "error" => "vista/vError.php",
    "mtoDepartamentos" => "vista/vMtoDepartamentos.php"
];
?>