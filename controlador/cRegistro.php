<?php

if(isset($_REQUEST['cancelar'])){                                               //Si el usuario pulsa cancelar
    $_SESSION['paginaEnCurso'] = $controladores['login'];                       //La pagina en curso de session sera el login
    header('Location: index.php');                                              //Volvemos a cargar el index
    exit;
}

define("OBLIGATORIO", 1); // defino e inicializo la constante a 1 para los campos que son obligatorios

$entradaOK = true;

$aErrores = [ //declaro e inicializo el array de errores
    'CodUsuario' => null,
    'DescUsuario' => null,
    'Password' => null,
    'PasswordConfirmacion' => null
];


if (isset($_REQUEST["aceptar"])) {                                              //Si el usuario ya le ha dado a aceptar comprobaremos que todos los campos esten bien
    $aErrores['CodUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['CodUsuario'], 15, 3, OBLIGATORIO);   //Valido con la libreria que el CodUsuario sea correcto

    if($aErrores['CodUsuario']==null && UsuarioPDO::validarCodNoExiste($_REQUEST['CodUsuario'])==false){    // Si no ha habido ningun error al validarlo con la libreria , pero compruebo en la tabla que el usuario ya existe
        $aErrores['CodUsuario']="El nombre de usuario ya existe";               //Guardo el mensaje de error de que ese usuario ya existe
    }

    $aErrores['DescUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescUsuario'], 255, 3, OBLIGATORIO); //Compruebo que la descripcion de usuario sea correcta con la libreria
    
    $aErrores['Password'] = validacionFormularios::validarPassword($_REQUEST['Password'], 8, 1, 1, OBLIGATORIO);            // Compruebo que la password sea correcta con la libreria
    $aErrores['PasswordConfirmacion'] = validacionFormularios::validarPassword($_REQUEST['PasswordConfirmacion'], 8, 1, 1, OBLIGATORIO);    //Compruebo que la segunda password sea correcta 
    
    if($_REQUEST['Password'] != $_REQUEST['PasswordConfirmacion']){             //Si las contraseñas no son iguales
        $aErrores['PasswordConfirmacion'] = "Las contraseñas no coinciden";     //Guardamos en el array de errores el mensaje de error
    }
    
    foreach ($aErrores as $campo => $error) {                                   // recorro el array de errores
        if ($error != null) {                                                   // compruebo si hay algun mensaje de error en algun campo
            $entradaOK = false;                                                 // le doy el valor false a $entradaOK
            $_REQUEST[$campo] = "";                                             // si hay algun campo que tenga mensaje de error pongo $_REQUEST a null
        }
    }
} else {                                                                        //Si el usuario no le ha dado a enviar
    $entradaOK = false;                                                         //$entradaOK sera false
}

if ($entradaOK) {                                                               // Si todo estaba bien hemos llegado con entradaOK en true por lo que ya podremos entrar
    
    $oUsuario = UsuarioPDO::altaUsuario($_REQUEST['CodUsuario'],$_REQUEST['Password'],$_REQUEST['DescUsuario']); // guardamos en la variable el resultado de la funcion de dar de alta a un usuario
    $_SESSION['usuarioDAW207DBLoginLogoff'] = $oUsuario;                        // Guarda en la session el objeto usuario
    $_SESSION['paginaEnCurso'] = $controladores['inicio'];                      // Guardamos en la variable de sesion pagina en curso el controlador de inicio

    header('Location: index.php');                                              // redirige al index.php
    exit;

}

$vistaEnCurso = $vistas['registro'];                                            // Asignamos a vista en curso el registro que es donde estamos

require_once $vistas['layout'];

?> 