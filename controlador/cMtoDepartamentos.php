<?php
$oUsuarioActual = $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO']; // almacenamos en la variable el usuario actual
$_SESSION['paginaAnterior'] = $controladores['mtoDepartamentos'];

if (isset($_REQUEST["volver"])) {
    $_SESSION['paginaEnCurso'] = $controladores['inicio']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}

if(!isset($_REQUEST['buscar'])) {
    $descDepartamento = "";
}

if (isset($_REQUEST['modificarDepartamento'])) { // si se ha pulsado el botón de editar perfil
    $_SESSION['codDepartamento'] = $_REQUEST['modificarDepartamento'];
    $_SESSION['paginaEnCurso'] = $controladores['wip']; //guardamos en la sesión el controlador que debe ejecutarse
    header('Location: index.php'); //enviamos al usuario de vuelta al index
    exit;
}
if (isset($_REQUEST['eliminarDepartamento'])) { // si se ha pulsado el botón de editar perfil
    $_SESSION['codDepartamento'] = $_REQUEST['eliminarDepartamento'];
    $_SESSION['paginaEnCurso'] = $controladores['wip']; //guardamos en la sesión el controlador que debe ejecutarse
    header('Location: index.php'); //enviamos al usuario de vuelta al index
    exit;
}

$entradaOK = true;
define("OPCIONAL", 0);
$ErrorDesc = null;
$descDepartamento = "";
$aDepartamentos = DepartamentoPDO::buscaDepartamentoPorDesc($descDepartamento);

    if (isset($_REQUEST["buscar"])) {
        $descDepartamento = $_REQUEST['descDepartamento'];
        $ErrorDesc = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descDepartamento'], 10, 1, OPCIONAL);

        if ($ErrorDesc != null) { // compruebo si hay algun mensaje de error en algun campo
                $entradaOK = false; // le doy el valor false a $entradaOK
                $_REQUEST['descDepartamento'] = ""; // si hay algun campo que tenga mensaje de error pongo $_REQUEST a null
        }
        
    }else{
        $entradaOK = false;
    }
        
    if ($entradaOK){
       $consultaDepartamentos = DepartamentoPDO::buscaDepartamentoPorDesc($descDepartamento);
       if($consultaDepartamentos == null){  
           $ErrorDesc = "No hay ningun departamento con esa descripcion";
       }else{
           $aDepartamentos = DepartamentoPDO::buscaDepartamentoPorDesc($descDepartamento);
       }
    }
 
$vistaEnCurso = $vistas['mtoDepartamentos']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];
?>




