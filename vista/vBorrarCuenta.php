<header class="hinicio">
    <h1>Aplicacion Final Cristina 2021</h1>
</header>
<div id="borrar">
<h3 class="h3borrar">¿Desea Borrar su cuenta?</h3>
  <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post"  enctype="multipart/form-data">        
        <input type="submit" value="Aceptar" name="aceptar" class="aceptar">
        <input type="submit" value="Cancelar" name="cancelar" class="cancelar">
  </form>
</div>