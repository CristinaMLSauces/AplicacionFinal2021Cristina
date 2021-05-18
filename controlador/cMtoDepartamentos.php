<?php
$oUsuarioActual = $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO']; // almacenamos en la variable el usuario actual
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

$entradaOK = true;
define("OPCIONAL", 0);
$ErrorDesc = null;

    if(isset($_REQUEST['buscar'])) {
        $ErrorDesc = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descDepartamento'], 10, 1, OPCIONAL);

        if ($ErrorDesc != null) { // compruebo si hay algun mensaje de error en algun campo
                $entradaOK = false; // le doy el valor false a $entradaOK
                $_REQUEST['descDepartamento'] = ""; // si hay algun campo que tenga mensaje de error pongo $_REQUEST a null
        }
    }else{
        $entradaOK = false;
    }
        
    if($entradaOK){
       $_SESSION['descDepartamento'] = $_REQUEST['descDepartamento'];
    }

$aDepartamentos = DepartamentoPDO::buscaDepartamentoPorDesc($_SESSION['descDepartamento']);
$descDepartamento = $_SESSION['descDepartamento'];

$vistaEnCurso = $vistas['mtoDepartamentos']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];
?>




