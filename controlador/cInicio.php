<?php
$_SESSION['paginaAnterior'] = $controladores['inicio'];
    if(!isset($_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'])){                //Si el usuario no se ha logeado
        header('Location: index.php');                                          //Recarga el index
        exit;
    }

    if(isset($_REQUEST['detalles'])){                                           //Si se ha pulsado el boton de datalles
        $_SESSION['paginaEnCurso'] = $controladores['detalle'];                 //Pagina en curso cargara el controlador de detalle
        header('Location: index.php');
        exit;
    }

    if(isset($_REQUEST['editarPerfil'])){                                           //Si se ha pulsado el boton de datalles
        $_SESSION['paginaEnCurso'] = $controladores['miCuenta'];                 //Pagina en curso cargara el controlador de detalle
        header('Location: index.php');
        exit;
    }
    
    if(isset($_REQUEST['salir'])) {                                            //Si se ha pulsado el boton de Cerrar Sesion
        session_destroy();                                                      //Destruye todos los datos asociados a la sesion
        header("Location: index.php");                                          //Redirige al login
        exit;
    }
    
    if(isset($_REQUEST['eliminarCuenta'])) { 
    $_SESSION['paginaAnterior'] = $controladores['miCuenta'];                       //Ponerlo despues de camcelar por que si no te coge la misma ruta// si se ha pulsado el boton de canelar
    $_SESSION['paginaEnCurso'] = $controladores['borrarcuenta'];             // guardamos en la variable de sesion 'pagina' la ruta del controlador del inicio
    header('Location: index.php');
    exit;
}
    
    if(isset($_REQUEST['MtoDepartamentos'])) {                                            //Si se ha pulsado el boton de Cerrar Sesion
        $_SESSION['paginaEnCurso'] = $controladores['wip'];                                                //Destruye todos los datos asociados a la sesion
        header("Location: index.php");                                          //Redirige al login
        exit;
    }
    
$oUsuarioActual = $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'];              //Cargo en la variable $oUsuarioActual el usuario que tenia en $_SESSION

$numConexiones = $oUsuarioActual->getNumConexiones();                           //Guardo en la variable el numero de conexiones sacado del usuario de la base de datos
$descUsuario = $oUsuarioActual->getDescUsuario();                               //Guardo en la variable la decripcion del usuario sacada de la base de datos
$ultimaConexionAnterior = $_SESSION['fechaHoraUltimaConexionAnterior'];         //Guardo en la variable la fecha de conexion del usuario viejo
$imagenUsuario = $oUsuarioActual->getImagenPerfil();                            //Guardo en la variable la imagen de perfil sacada de la base de datos

$vistaEnCurso = $vistas['inicio'];                                             //Guardamos en la variable vistaEnCurso la vista de inicio por que es lo que quiero que se visualice
require_once $vistas['layout'];                                                //Incluimos el layout
?>