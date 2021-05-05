<?php
if(isset($_REQUEST['cancelar'])) {                                             // si se ha pulsado el boton de cancelar
    $_SESSION['paginaAnterior'] = $controladores['inicio'];                     //??????????????????????????? Si no no me funciona
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];                   //Cargamos PaginaAnterior de inicio en PaginaenCurso
    header('Location: index.php');
    exit;
}

if(isset($_REQUEST['cambiarPassword'])) { 
    $_SESSION['paginaAnterior'] = $controladores['miCuenta'];                       //Ponerlo despues de camcelar por que si no te coge la misma ruta// si se ha pulsado el boton de canelar
    $_SESSION['paginaEnCurso'] = $controladores['password'];             // guardamos en la variable de sesion 'pagina' la ruta del controlador del inicio
    header('Location: index.php');
    exit;
}

if(isset($_REQUEST['eliminarCuenta'])) { 
    $_SESSION['paginaAnterior'] = $controladores['miCuenta'];                       //Ponerlo despues de camcelar por que si no te coge la misma ruta// si se ha pulsado el boton de canelar
    $_SESSION['paginaEnCurso'] = $controladores['borrarcuenta'];             // guardamos en la variable de sesion 'pagina' la ruta del controlador del inicio
    header('Location: index.php');
    exit;
}



define("OBLIGATORIO", 1);                                                       //Define una variable que nos servira para validar con la libreria
$entradaOK = true;                                                              //Declaro una variable booleana para la validacion de datos

$aErrores = [                                                                   //declaro e inicializo el array de errores
    'DescUsuario' => null,
    'ImagenUsuario' => null
];

$oUsuarioActual = $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'];              //almacenamiento de la variable se sesion en la variable
$imagenUsuario = $oUsuarioActual->getImagenPerfil();
$codUsuario = $oUsuarioActual->getCodUsuario();
$numConexiones = $oUsuarioActual->getNumConexiones();
$descUsuario = $oUsuarioActual->getDescUsuario();

if(isset($_REQUEST["aceptar"])) { // comprueba que el usuario le ha dado a al boton de aceptar
    $aErrores['DescUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescUsuario'], 255, 3, OBLIGATORIO); // comprueba que la entrada del codigo de usuario es correcta

    if($_FILES['imagen']['tmp_name']!=null){//Si el usuario ha introducido una imagen
        $imagenUsuario = file_get_contents($_FILES['imagen']['tmp_name']);//Almacenamos el archivo convertido en una cadena 
    }
        
    if ($aErrores['DescUsuario']!=null) { // compruebo si hay algun mensaje de error en la descripcion
        $entradaOK = false; // le doy el valor false a $entradaOK
        $_REQUEST['DescUsuario'] = ""; // si hay algun campo que tenga mensaje de error pongo $_REQUEST a null
    }
    
} else { // si el usuario no le ha dado al boton de enviar
    $entradaOK = false; // le doy el valor false a $entradaOK
}


if($entradaOK){
  
    $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'] = UsuarioPDO::modificarUsuario($codUsuario,$_REQUEST['DescUsuario'],$imagenUsuario);
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('Location: index.php');
    exit;
}

$vistaEnCurso = $vistas['miCuenta']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];
?>