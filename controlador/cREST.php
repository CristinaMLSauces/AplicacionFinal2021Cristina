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
    
    $error = null;
    $aError = null;
    $numeropordefecto = null;
    $Personaje = null;
    $Nasa = null;
    $nombre = null;
    $genero = null;
    $altura = null;
    $planeta = null;
    $explicacion = null;
    $imagen = null;
    $title = null;
    $nombrePlaneta = null;
    
    if(isset($_REQUEST['personaje'])){
        $numeropordefecto = $_REQUEST['numero'];
       
        define("OBLIGATORIO", 1); 
        $entradaOK = true;
        
        
        $error = validacionFormularios::comprobarEntero($_REQUEST['numero'],1000,1,OBLIGATORIO);            //He cambiado el numero max permitido por que el usuario enr ealidad no tiene por que saber cuntos personajes hay
        
        if($error==null){
            $aRepuesta = REST::starwars($_REQUEST['numero']);
            if($aRepuesta[0]==true){
                $nombre = $aRepuesta[1]['name'];
                $genero = $aRepuesta[1]['gender'];
                $altura = $aRepuesta[1]['height'];
                $planeta = $aRepuesta[1]['homeworld'];

                $buscarplaneta = file_get_contents($planeta, true);
                $Planeta = json_decode($buscarplaneta, true);
                $nombrePlaneta = $Planeta['name'];
            }else{
                $aError = $aRepuesta;
            }
        }else{
            $error = "El campo no es aceptado";
        }
       
        
    }
   
    if(isset($_REQUEST['nasa'])){
        if($_REQUEST['fecha']!=null){
           $Nasa = REST::nasaconfecha($_REQUEST['fecha']);
           $explicacion = $Nasa['explanation'];
           $imagen = $Nasa['hdurl'];
           $title  = $Nasa['title'];
        }else{
           $Nasa = REST::nasa();
           $explicacion = $Nasa['explanation'];
           $imagen = $Nasa['hdurl'];
           $title  = $Nasa['title']; 
        }
    }

$vistaEnCurso = $vistas['rest'];                                                //Guardamos en la variable vistaEnCurso la vista de inicio por que es lo que quiero que se visualice
require_once $vistas['layout'];                                                 //Incluimos el layout
?>

