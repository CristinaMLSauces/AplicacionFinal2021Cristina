<header class="h1login">
    <h1>Aplicacion Final Cristina 2021</h1>
</header>
<div id="borrar">
<h3 class="h3borrar">¿Desea Borrar El Departamento?</h3>
<h4 style="margin-left: 22%;font-size: 30px;">Con Código de departamento: <a style="background-color: skyblue;"> <?php echo $_SESSION['codDepartamento']; ?></a></h4>
<br>
  <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post"  enctype="multipart/form-data">        
        <input type="submit" value="Aceptar" name="aceptar" class="aceptar">
        <input type="submit" value="Cancelar" name="cancelar" class="cancelar">
  </form>
</div>