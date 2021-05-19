<?php
if (isset($_REQUEST['cancelar'])) {                                             // si se ha pulsado el boton de cancelar
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];                   //Si se pulsa cancelar guardo en pagina en curso la pagina anterior
    header('Location: index.php');
    exit;
}

$oDepartamento = DepartamentoPDO::buscaDepartamentoPorCod($_SESSION['codDepartamento']);

if (isset($_REQUEST["aceptar"])) {
    DepartamentoPDO::bajaFisicaDepartamento($_SESSION['codDepartamento']);
    $_SESSION['paginaEnCurso'] = $controladores['mtoDepartamentos'];
    header('Location: index.php');
    exit; 
}

$vistaEnCurso = $vistas['borrarDepartamento']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];
?>

