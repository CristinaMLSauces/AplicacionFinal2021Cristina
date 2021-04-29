<?php
require_once "core/210322ValidacionFormularios.php";                            //Incluimos la libreria de usuarios

require_once "modelo/Usuario.php";                                              //Incluimos la clase Usuario
require_once "modelo/UsuarioPDO.php";                                           //Incluimos la clase UsuarioPDO
require_once "modelo/DBPDO.php";                                                //Incluimos la clase DBPDO

$controladores = [                                                              //Creamos un array de controladores para cargarlos controladores mas adelante
    "login" => "controlador/cLogin.php",                                        //Le damos nombre y le marcamos la ruta
    "inicio" => "controlador/cInicio.php",
    "detalle" => "controlador/cDetalle.php",
    "registro" => "controlador/cRegistro.php",
    "wip" => "controlador/cWIP.php",
    "miCuenta" => "controlador/cMiCuenta.php",
    "mtoDepartamentos" => "controlador/cMtoDepartamentos.php"
];

$vistas = [                                                                     //Hacemos los mismo con las vistas
    "layout" => "vista/layout.php",
    "login" => "vista/vLogin.php",
    "inicio" => "vista/vInicio.php",
    "detalle" => "vista/vDetalle.php",
    "registro" => "vista/vRegistro.php",
    "wip" => "vista/vWIP.php",
    "miCuenta" => "vista/vMiCuenta.php",
    "mtoDepartamentos" => "vista/vMtoDepartamentos.php"
];
?>