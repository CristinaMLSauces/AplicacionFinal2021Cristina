<?php
if (isset($_REQUEST['cancelar'])) {                                             // si se ha pulsado el boton de cancelar
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];                   //Cargamos PaginaAnterior de inicio en PaginaenCurso
    header('Location: index.php');
    exit;
}

$oUsuarioActual = $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'];              //almacenamiento de la variable se sesion en la variable
define("OBLIGATORIO", 1);                                                       //Define una variable que nos servira para validar con la libreria
$entradaOK = true;                                                              //Declaro una variable booleana para la validacion de datos

$codUsuario = $oUsuarioActual->getCodUsuario();
$descUsuario = $oUsuarioActual->getDescUsuario();
$numConexiones = $oUsuarioActual->getNumConexiones();

if(isset($_REQUEST['aceptar'])){
    UsuarioPDO::borrarUsuario($codUsuario);
    session_destroy();
    header('Location: index.php');
    exit;
}

$vistaEnCurso = $vistas['borrarcuenta']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];
?>