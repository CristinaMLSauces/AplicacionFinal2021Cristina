<header class="h1login">
    <h1>Aplicacion Final Cristina 2021</h1>
</header>
<div id="borrar">
<h3 class="h3borrar">¿Desea Borrar El Departamento?</h3>
<h4 style="margin-left: 22%;font-size: 25px;">Con Código de departamento: <a style="background-color: skyblue;"> <?php echo $_SESSION['codDepartamento']; ?></a></h4>
<h4 style="margin-left: 22%;font-size: 25px;">Con Descripcion de departamento: <a style="background-color: skyblue;"> <?php echo $oDepartamento->descDepartamento; ?></a></h4>
<h4 style="margin-left: 22%;font-size: 25px;">Con Volumen de negocio: <a style="background-color: skyblue;"> <?php echo $oDepartamento->volumenDeNegocio; ?></a></h4>
<h4 style="margin-left: 22%;font-size: 25px;">Con Fecha de creacion: <a style="background-color: skyblue;"> <?php echo date('d/m/Y', $oDepartamento->fechaCreacionDepartamento) ?></a></h4>
<br>
  <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post"  enctype="multipart/form-data">        
        <input type="submit" value="Aceptar" name="aceptar" class="aceptar">
        <input type="submit" value="Cancelar" name="cancelar" class="cancelar">
  </form>
</div>