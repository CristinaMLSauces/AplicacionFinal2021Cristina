<?php

    if(!isset($_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'])){                // Si el usuario no se ha logueado
        header('Location: index.php');                                          //Recargamos el index
        exit;
    }

    if(isset($_REQUEST['volver'])){                                             //Si el usuario pulsa el boton de volver
        $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];               //Cargamos PaginaAnterior de inicio en PaginaenCurso
        header('Location: index.php');                                          //Redirigimos al usuario al programa de nuevo
        exit;
    }

  
$vistaEnCurso = $vistas['mtoDepartamentos'];                                    //Guardamos en la variable vistaEnCurso la vista de inicio por que es lo que quiero que se visualice
require_once $vistas['layout'];                                                 //Incluimos el layout
?>
