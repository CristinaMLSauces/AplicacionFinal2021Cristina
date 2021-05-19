<?php
if (isset($_REQUEST["cancelar"])){
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];                   //Si se pulsa cancelar guardo en pagina en curso la pagina anterior
    header('Location: index.php');
    exit;
}

$oDepartamento = DepartamentoPDO::buscaDepartamentoPorCod($_SESSION['codDepartamento']); //Llamo a la funcion de buscar departamento por cod y me devuelve un objeto departamento

$codDep = $_SESSION['codDepartamento'];
$descDep = $oDepartamento->descDepartamento;
$volumen = $oDepartamento->volumenDeNegocio;
$fechaCreacion = $oDepartamento->fechaCreacionDepartamento;


define("OBLIGATORIO", 1);
$entradaOK = true;
$aErrores = [
    'DescDepartamento' => null,
    'VolumenNegocio' => null
];


if (isset($_REQUEST["aceptar"])) {
    $aErrores['DescDepartamento'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescDepartamento'], 35, 3, OBLIGATORIO);
    $aErrores['VolumenNegocio'] = validacionFormularios::comprobarEntero($_REQUEST['VolumenNegocio'], PHP_INT_MAX, 1, OBLIGATORIO);

    foreach ($aErrores as $campo => $error) {
        if ($error != null) {
            $entradaOK = false;
            $_REQUEST[$campo] = "";
        }
    }
    
} else {
    $entradaOK = false;
}

if ($entradaOK) {
    DepartamentoPDO::modificaDepartamento($_REQUEST['VolumenNegocio'], $_REQUEST['DescDepartamento'], $_SESSION['codDepartamento']);
   $_SESSION['paginaEnCurso'] = $controladores['mtoDepartamentos'];
    header('Location: index.php');
    exit;
}

$vistaEnCurso = $vistas['modificarDepartamento']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];
?>


