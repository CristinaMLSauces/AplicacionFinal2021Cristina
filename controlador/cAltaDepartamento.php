<?php
$oUsuarioActual = $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO']; // almacenamos en la variable el usuario actual

if (isset($_REQUEST["cancelar"])){
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];                   //Si se pulsa cancelar guardo en pagina en curso la pagina anterior
    header('Location: index.php');
    exit;
}

$entradaOK = true;
define("OBLIGATORIO", 1); // defino e inicializo la constante a 1 para los campos que son obligatorios
$aErrores = [                                                                   //declaro e inicializo el array de errores
    'CodDepartamento' => null,
    'DescDepartamento' => null,
    'VolumenNegocio' => null
];

if (isset($_REQUEST["aceptar"])) { 
    $aErrores['CodDepartamento'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['codDepartamento'], 3, 3, OBLIGATORIO);
    $aErrores['DescDepartamento'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descDepartamento'], 35, 1, OBLIGATORIO); 
    $aErrores['VolumenNegocio'] = validacionFormularios::comprobarEntero($_REQUEST['volumenNegocio'], PHP_INT_MAX, 1, OBLIGATORIO);

    if ($aErrores['CodDepartamento'] == null && !DepartamentoPDO::validarCodNoExiste($_REQUEST['codDepartamento'])) { 
        $aErrores['CodDepartamento'] = "El código del departamento ya existe"; 
    }

    foreach ($aErrores as $campo => $error) { // recorro el array de errores
        if ($error != null) { // compruebo si hay algun mensaje de error en algun campo
            $entradaOK = false; // le doy el valor false a $entradaOK
            $_REQUEST[$campo] = ""; // si hay algun campo que tenga mensaje de error pongo $_REQUEST a null
        }
    }
} else { 
    $entradaOK = false; 
}

if ($entradaOK) { 
    DepartamentoPDO::altaDepartamentos($_REQUEST['codDepartamento'], $_REQUEST['descDepartamento'], $_REQUEST['volumenNegocio']);
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];  
    header('Location: index.php'); 
    exit;
}


$vistaEnCurso = $vistas['altaDepartamento']; 
require_once $vistas['layout'];
?>

