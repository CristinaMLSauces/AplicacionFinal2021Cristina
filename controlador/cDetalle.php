<?php
     



    if(isset($_REQUEST['volver'])){  
        $_SESSION['paginaEnCurso'] = $controladores['inicio'];
        header('Location: index.php');                                          //Redirigimos al usuario al programa de nuevo
        exit;
    }
  
    $vistaEnCurso = $vistas['detalle'];
    
    require_once $vistas['layout']; 
?>