<?php
$_SESSION['paginaAnterior'] = $controladores['mtoDepartamentos'];

if (isset($_REQUEST["volver"])){
    $_SESSION['paginaEnCurso'] = $controladores['inicio']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['modificarDepartamento'])) { // si se ha pulsado el botón de editar perfil
    $_SESSION['codDepartamento'] = $_REQUEST['modificarDepartamento'];
    $_SESSION['paginaEnCurso'] = $controladores['modificarDepartamento']; //guardamos en la sesión el controlador que debe ejecutarse
    header('Location: index.php'); //enviamos al usuario de vuelta al index
    exit;
}
if (isset($_REQUEST['eliminarDepartamento'])) { // si se ha pulsado el botón de editar perfil
    $_SESSION['codDepartamento'] = $_REQUEST['eliminarDepartamento'];
    $_SESSION['paginaEnCurso'] = $controladores['borrarDepartamento']; //guardamos en la sesión el controlador que debe ejecutarse
    header('Location: index.php'); //enviamos al usuario de vuelta al index
    exit;
}

if (isset($_REQUEST['altaDepartamento'])) { // si se ha pulsado el botón de editar perfil
    $_SESSION['codDepartamento'] = $_REQUEST['eliminarDepartamento'];
    $_SESSION['paginaEnCurso'] = $controladores['altaDepartamento']; //guardamos en la sesión el controlador que debe ejecutarse
    header('Location: index.php'); //enviamos al usuario de vuelta al index
    exit;
}

if(isset($_REQUEST['bajaLogica'])){                                            // Baja Logica del Departamernto
    $_SESSION['codDepartamento'] = $_REQUEST['bajaLogica'];
    DepartamentoPDO::bajaLogicaDepartamento($_SESSION['codDepartamento']);

}

if(isset($_REQUEST['rehabilitar'])){                                            //Rehabilitar Departamento
    $_SESSION['codDepartamento'] = $_REQUEST['rehabilitar'];
    DepartamentoPDO::rehabilitacionDepartamento($_SESSION['codDepartamento']); 
}

if (!isset($_SESSION['PaginaActual'])) {
    $_SESSION['PaginaActual'] = 1;
}

//Botones para navegar entre las páginas
if (isset($_REQUEST['avanzarPagina'])) {
    $_SESSION['PaginaActual'] = $_REQUEST['avanzarPagina'];
} else if (isset($_REQUEST['retrocederPagina'])) {
    $_SESSION['PaginaActual'] = $_REQUEST['retrocederPagina'];
} else if (isset($_REQUEST['paginaInicial'])) {
    $_SESSION['PaginaActual'] = $_REQUEST['paginaInicial'];
} else if (isset($_REQUEST['paginaFinal'])) {
    $_SESSION['PaginaActual'] = $_REQUEST['paginaFinal'];
}


$entradaOK = true;
define("OPCIONAL", 0);
$ErrorDesc = null;
$ErrorCriterio = null;
$_SESSION['criteriodebusqueda'] = "todos";

    if(isset($_REQUEST['buscar'])) {
        $ErrorDesc = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descDepartamento'], 10, 1, OPCIONAL);
        $ErrorCriterio = validacionFormularios::validarElementoEnLista($_REQUEST['criteriodebusqueda'], ['todos', 'baja', 'alta']);
        
        if ($ErrorDesc != null) { // compruebo si hay algun mensaje de error en algun campo
                $entradaOK = false; // le doy el valor false a $entradaOK
                $_REQUEST['descDepartamento'] = ""; // si hay algun campo que tenga mensaje de error pongo $_REQUEST a null
        }
    }else{
        $entradaOK = false;
    }
        
    if($entradaOK){
       $_SESSION['descDepartamento'] = $_REQUEST['descDepartamento'];
       $_SESSION['criteriodebusqueda'] = $_REQUEST['criteriodebusqueda'];
       $_SESSION['PaginaActual'] = 1;
    }

$aResultadoBusqueda = DepartamentoPDO::buscaDepartamentosPorDescEstadoYPagina($_SESSION['descDepartamento'],$_SESSION['criteriodebusqueda'],$_SESSION['PaginaActual'], 5);
$descDepartamento = $_SESSION['descDepartamento'];
$criterioBusqueda = $_SESSION['criteriodebusqueda'];
$paginaActual = $_SESSION['PaginaActual'];


$aDepartamentos = $aResultadoBusqueda[0];
$paginasTotales = $aResultadoBusqueda[1];

$vistaEnCurso = $vistas['mtoDepartamentos']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];
?>




