<?php

if (isset($_REQUEST["registrarse"])) {                                          //Si el usuario ha pulsado registrarse
    $_SESSION["paginaEnCurso"] = $controladores['registro'];                    //Se carga en paginaEnCurso el controlador de registro
    header('Location: index.php');                                              //Recargamos el index
    exit();
}

define("OBLIGATORIO", 1);                                                       //Define una variable que nos servira para validar con la libreria

$entradaOK = true;                                                              //Declaro una variable booleana para la validacion de datos

$aErrores = [                                                                   //Declaro un array de errores, para almacenar los posibles errores
    'CodUsuario' => null,
    'Password' => null
];

if (isset($_REQUEST["IniciarSesion"])) {                                        //Si el usuario le ha dado a aceptar para iniciar sesion entonces
    
    $aErrores['CodUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['CodUsuario'], 15, 3, OBLIGATORIO); //Valido que el CodUsuario esta bien escrito con la libreria, si da fallo se guarda en el array de errores
    $aErrores['Password'] = validacionFormularios::validarPassword($_REQUEST['Password'], 8, 1, 1, OBLIGATORIO);        //Valido que el Password esta bien escrito con la libreria, si da fallo se guarda en el array de errores
    //Validamos si el usuario existe en la base , para ello le pasamos a la funcion validar usuario el CodUsuario y el Password y lo guardamos en la variable $oUsuario
    $oUsuario = UsuarioPDO::validarUsuario($_REQUEST['CodUsuario'], $_REQUEST['Password']); 

    if(!isset($oUsuario)){                                                      //Si la funcion de antes nos devolvio un null, significa que ese usuario no existe en la base
        $aErrores['CodUsuario'] = "El codigo de usuario no se encuentra en la base de datos"; //Entonces guardamos un mensaje en el array de errores
    }
    
    if ($aErrores['CodUsuario'] != null || $aErrores['Password']!=null) {       //Si el array de errores contiene algun mensaje, ya sea de el CodUsuario o de la password
        $entradaOK = false;                                                     // entradaOk sera false para no permitir al usuario entrar
        unset($_REQUEST);                                                       //Vacio los campos 
    }
}else {                                                                        //Mientras el usuario no le haya dado al boton de enviar
    $entradaOK = false;                                                         // entradaOk sera false para no permitir al usuario entrar
}

if ($entradaOK) {                                                               //Si pasa todas las validaciones sin ningun error entradaOk seguira en true
   
    $_SESSION['fechaHoraUltimaConexionAnterior'] = $oUsuario -> T01_FechaHoraUltimaConexion;    //Guardo en $_SESSION la fecha de ultima conexion del $oUsuario viejo
    $oUsuario = UsuarioPDO::registrarUltimaConexion($oUsuario -> T01_CodUsuario);               //Llamo a la funcion registrarUltimaConexion para actualizar el usuario, y los guardo en $oUsuario que sera el nuevo con los datos actualizados
    
    $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'] = $oUsuario;                //Cargo el nuevo $oUsuario en $_SESSION
    
    $_SESSION['paginaEnCurso'] = $controladores['inicio'];                      //Cambio PaginaEnCurso a Incio para poder entrar
    header('Location: index.php');                                              //Recargo el index
    exit;

}

$vistaEnCurso = $vistas['login'];                                               //Mientras el usuario no s ehaya validad VistaenCurso dera el login

require_once $vistas['layout'];                                                 //Cargo el layout
?> 