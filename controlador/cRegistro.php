<?php

if(isset($_REQUEST['cancelar'])){                                               //Si el usuario pulsa cancelar
    $_SESSION['paginaEnCurso'] = $controladores['login'];                       //La pagina en curso de session sera el login
    header('Location: index.php');                                              //Volvemos a cargar el index
    exit;
}

define("OBLIGATORIO", 1);                                                       //Define una variable que nos servira para validar con la libreria
$entradaOK = true;                                                              //Declaro una variable booleana para la validacion de datos

$aErrores = [                                                                   //Declaro un array de errores, para almacenar los posibles errores
    'CodUsuario' => null,
    'DescUsuario' => null,
    'Password' => null,
    'PasswordConfirmacion' => null
];


if (isset($_REQUEST["aceptar"])) {                                              //Si el usuario le ah dado a aceptar
    $aErrores['CodUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['CodUsuario'], 15, 3, OBLIGATORIO);    //Valido que el CodUsuario esta bien escrito con la libreria, si da fallo se guarda en el array de errores
    $aErrores['DescUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescUsuario'], 255, 3, OBLIGATORIO); //Valido que la Descripcion esta bien con la libreria, si da fallo se guarda en el array de errores
    $aErrores['Password'] = validacionFormularios::validarPassword($_REQUEST['Password'], 8, 1, 1, OBLIGATORIO);            //Valido que el Password esta bien escrito con la libreria, si da fallo se guarda en el array de errores
    $aErrores['PasswordConfirmacion'] = validacionFormularios::validarPassword($_REQUEST['PasswordConfirmacion'], 8, 1, 1, OBLIGATORIO);    //Valido que la segunda Password este bien con la libreria 
    
    if($aErrores['CodUsuario']==null && UsuarioPDO::validarCodNoExiste($_REQUEST['CodUsuario'])==false){    // Si no ha habido ningun error al validarlo con la libreria , pero compruebo en la tabla que el usuario ya existe con la funcion validarCodNoExiste 
        $aErrores['CodUsuario']="El nombre de usuario ya existe";               //Guardo el mensaje de error de que ese usuario ya existe
    }
    
    if($_REQUEST['Password'] != $_REQUEST['PasswordConfirmacion']){             //Si las contraseñas no son iguales
        $aErrores['PasswordConfirmacion'] = "Las contraseñas no coinciden";     //Guardamos en el array de errores el mensaje de error
    }
    
    foreach ($aErrores as $campo => $error) {                                   //Recorro el array de errores
        if ($error != null) {                                                   //Compruebo si hay algun mensaje
            $entradaOK = false;                                                 //Si habia mensajes, le soy valor false a entrdadaOk para que el usuario no pueda entrar
            $_REQUEST[$campo] = "";                                             //Si hay algun campo que tenga mensaje de error pongo $_REQUEST a null
        }
    }
} else {                                                                        //Si el usuario no le ha dado a acepatr
    $entradaOK = false;                                                         //$entradaOK sera false , para no dejarlo entrar
}

if ($entradaOK) {                                                               //Si en las validaciones no ha habido errores entradaOk seguira en true y dejaremos entrar al usaurio
    
    $oUsuario = UsuarioPDO::altaUsuario($_REQUEST['CodUsuario'],$_REQUEST['Password'],$_REQUEST['DescUsuario']); //Guardo en $oUsuario el nuevo usuario que me devuelve la funcion altaUsuario
    $_SESSION['fechaHoraUltimaConexionAnterior'] = null;
    $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'] = $oUsuario;                // Guarda el nuevo $oUsuario en $_SESSION
    $_SESSION['paginaEnCurso'] = $controladores['inicio'];                      // Guardamos en la variable de sesion pagina en curso el controlador de inicio

    header('Location: index.php');                                              //Recargamso el index
    exit;

}

$vistaEnCurso = $vistas['registro'];                                            //Cargamos la vista de registro

require_once $vistas['layout'];                                                 //Cargamos el layout

?> 