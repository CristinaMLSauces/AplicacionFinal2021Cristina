<?php
    if(!isset($_SESSION['usuarioDAW207DBLoginLogoff'])){                            // si no se ha logueado le usuario
        header('Location: index.php');                                              // redirige al login
        exit;
    }

    if(isset($_REQUEST['volver'])){  
        $_SESSION['paginaEnCurso'] = $controladores['inicio'];
        header('Location: index.php');                                          //Redirigimos al usuario al programa de nuevo
        exit;
    }
  
    $vistaEnCurso = $vistas['detalle'];
    
    require_once $vistas['layout']; 
?>