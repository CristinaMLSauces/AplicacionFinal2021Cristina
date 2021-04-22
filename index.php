<?php 
    require_once 'config/config.php';        //Cargamos los arrays de vista y controlador

    session_start();                         //Iniciamos la sesion
    
    require_once 'config/configDBPDO.php';      //Cargamos la configuracion de la base de datos

    if(isset($_SESSION['paginaEnCurso']) && $_SESSION['paginaEnCurso']!==$controladores["login"]){      //Si existe en session pagina en curso y es distinta del login entonces 
        require_once $_SESSION['paginaEnCurso'];                                                        // cargamos el controlador que contenga pagina en curso
    } else {                                                                                            //Si es igual al login lo cargamos
        require_once $controladores["login"];                                                           // Incluyendo el controlador del login
    }
?>
