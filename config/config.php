<?php

require_once "core/210322ValidacionFormularios.php";

require_once "modelo/Usuario.php";
require_once "modelo/UsuarioPDO.php";
require_once "modelo/DBPDO.php";

$controladores = [
    "login" => "controlador/cLogin.php",
    "inicio" => "controlador/cInicio.php"
];

$vistas = [
    "layout" => "vista/layout.php",
    "login" => "vista/vLogin.php",
    "inicio" => "vista/vInicio.php"
];
?>


