<?php
    
//    Duda: No habria que cargar el config con los arrays??Los coge del index?
    
//    if(isset($_REQUEST['registrarse'])){                                        //Si el usuario ha pulsado el boton de registrarse
//        $_SESSION['paginaEnCurso'] = $controladores['registro'];                // Pagina en curso guardada en session, obtiene el valor del controlador de registro (cRigistro.php)
//        header('Location: index.php');                                          //Cargamos el index que contiene la pagina en curso y a su vez me cargara la pagina de registro
//        exit;
//    }
   
    require_once '../core/210322ValidacionFormularios.php';                     //Incluimos la librería de validación para comprobar los campos del formulario
    require_once "../config/configDBPDO.php";                                   //Incluimos la conexion a la base de datos 

    define("OBLIGATORIO", 1);                                                   //Declaramos una constante para hacer la validacion de campos en un futuro


    $aErrores = ['CodUsuario' => null,                                          //Creamos el array de errores
                 'Password' => null];                                           //Lo inicializamos a null

    if(isset($_REQUEST['aceptar'])){                                            //Si el usuario le ha dado al boton de iniciar sesion  entonces hace lo siguiente
        
        $aErrores['CodUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['CodUsuario'], 15, 3, OBLIGATORIO);  //Validamos que los campos sean correctos con al libreria de validacion, si no lo me guarda el error en el array
        $aErrores['Password'] = validacionFormularios::validarPassword($_REQUEST['Password'], 8, 3, 1, OBLIGATORIO);
        
        $oUsuario = UsuarioPDO::validarUsuario($_REQUEST['CodUsuario'], $_REQUEST['Password']); // guardamos en la variable el resultado de la funcion que valida si existe un usuario de la clase UsuarioPDO, con el codigo y password introducido

        if(!isset($oUsuario)){                                                  // Si el objeto devuelto de validar el usuario es null entonces 
            $aErrores['CodUsuario'] = "El codigo de usuario no se encuentra en la base de datos"; //Guardo en el array de errores el error
        }
       
        if ($aErrores['CodUsuario'] != null || $aErrores['Password']!=null) {   // Si hay algun error en el array de errores
            $_SESSION['paginaEnCurso'] = $controladores['login']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del inicio
            header('Location: index.php'); // redirige al index.php
                                                                               
            unset($_REQUEST);
        }
        
        if ($aErrores['CodUsuario'] == null || $aErrores['Password']==null) {   // Si no hay errores
            $_SESSION['DAW207DBLoginLogoffPOOMulticapa'] = $oUsuario; // guarda en la session el objeto usuario
            $_SESSION['paginaEnCurso'] = $controladores['inicio']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del inicio

            header('Location: index.php'); // redirige al index.php
            exit;
        }
        
    }  

   require_once $vistas['layout'];
?> 