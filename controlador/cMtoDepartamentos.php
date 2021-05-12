<?php
$oUsuarioActual = $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO']; // almacenamos en la variable el usuario actual

if (isset($_REQUEST["volver"])) {
    $_SESSION['paginaEnCurso'] = $controladores['inicio']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}

$aDepartamento = DepartamentoPDO::obtenerTodosLosDepartamentos();

$vistaEnCurso = $vistas['mtoDepartamentos']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];
?>