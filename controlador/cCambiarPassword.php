<?php
if (isset($_REQUEST['cancelar'])) {                                             // si se ha pulsado el boton de cancelar
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];                   //Cargamos PaginaAnterior de inicio en PaginaenCurso
    header('Location: index.php');
    exit;
}

$oUsuarioActual = $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'];              //almacenamiento de la variable se sesion en la variable
define("OBLIGATORIO", 1);                                                       //Define una variable que nos servira para validar con la libreria
$entradaOK = true;                                                              //Declaro una variable booleana para la validacion de datos

$aErrores = [                                                                   //Declaro e inicializo el array de errores
    'PasswordActual' => null,
    'PasswordNueva' => null,
    'PasswordRepetida' => null
];

$codUsuario = $oUsuarioActual->getCodUsuario();
$password = $oUsuarioActual ->getPassword();

if (isset($_REQUEST["aceptar"])) { // comprueba que el usuario le ha dado a al boton de IniciarSesion y valida la entrada de todos los campos

    $aErrores['PasswordActual'] = validacionFormularios::validarPassword($_REQUEST['PasswordActual'], 8, 1, 1, OBLIGATORIO);// comprueba que la entrada del password es correcta
    $aErrores['PasswordNueva'] = validacionFormularios::validarPassword($_REQUEST['PasswordNueva'], 8, 1, 1, OBLIGATORIO);// comprueba que la entrada del password es correcta
    $aErrores['PasswordRepetida'] = validacionFormularios::validarPassword($_REQUEST['PasswordRepetida'], 8, 1, 1, OBLIGATORIO);// comprueba que la entrada del password es correcta
    
    if($_REQUEST['PasswordNueva'] != $_REQUEST['PasswordRepetida']){            //Si la contraseña nueva no coincide al repetirla guardaremos un error en el array
        $aErrores['PasswordRepetida'] = "Las contraseñas no coinciden";
    }
    
    foreach ($aErrores as $campo => $error) {                                   // recorro el array de errores
        if ($error != null) {                                                   // compruebo si hay algun mensaje de error en algun campo
            $entradaOK = false;                                                 // le doy el valor false a $entradaOK
            $_REQUEST[$campo] = "";                                             // si hay algun campo que tenga mensaje de error pongo $_REQUEST a null
        }
    }

    if($entradaOK){                                                             //Si no ha habido errores
        $passwordEncriptada = hash("sha256", $codUsuario . $_REQUEST['PasswordActual']);
        if($password != $passwordEncriptada){
            $entradaOK = false;
            $_REQUEST['PasswordActual'] = "";
        }
    }

}else {                                                                         // si el usuario no le ha dado al boton de enviar
    $entradaOK = false;                                                         // le doy el valor false a $entradaOK
}

if ($entradaOK) {                                                               // si la entrada esta bien recojo los valores introducidos y hago su tratamiento
    $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'] = UsuarioPDO::cambiarPassword($codUsuario,$_REQUEST['PasswordNueva']); // guardamos en la variable de sesion el objeto usuario de la funcion
    $_SESSION['paginaEnCurso'] = $controladores['miCuenta'];                    //Cargamos mi cuenta
    header('Location: index.php');                                              //redirige al index.php
    exit;
}

$vistaEnCurso = $vistas['password']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];
?>