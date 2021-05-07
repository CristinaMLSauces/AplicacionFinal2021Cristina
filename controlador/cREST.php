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
    
    $Personaje = null;
    $Nasa = null;
   
    if(isset($_REQUEST['personaje'])){
        $Personaje = REST::starwars($_REQUEST['numero']);
    
        if(is_null($Personaje)) {
            $nombre = null;
            $genero = null;
            $altura = null;
            $planeta = null;
        }else{
            $nombre = $Personaje['name'];
            $genero = $Personaje['gender'];
            $altura = $Personaje['height'];
            $planeta = $Personaje['homeworld'];
            
            $buscarplaneta = file_get_contents($planeta, true);
            $Planeta = json_decode($buscarplaneta, true);
            $nombrePlaneta = $Planeta['name'];
        }
    }
   
    if(isset($_REQUEST['nasa'])){
           $Nasa = REST::nasa();
    
            if(is_null($Nasa)) {
                $explicacion = null;
                $imagen = null;
                $title = null;
            }else{
                $explicacion = $Nasa['explanation'];
                $imagen = $Nasa['hdurl'];
                $title  = $Nasa['title'];
            }
            
       }


$vistaEnCurso = $vistas['rest'];                                                //Guardamos en la variable vistaEnCurso la vista de inicio por que es lo que quiero que se visualice
require_once $vistas['layout'];                                                 //Incluimos el layout
?>

