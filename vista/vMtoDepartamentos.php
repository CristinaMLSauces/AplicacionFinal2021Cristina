<header class="hinicio" >
    <form  name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" style="margin-right: 400px;">
        <button type="submit" name='volver' value="volver" class="volver">VOLVER</button>
    </form>
    <h1 >Aplicacion Final Cristina 2021</h1>
</header>
<form class="" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<!--    <button name="exportar">Exportar</button>
    <button name="importar">Importar</button>
    <button name="añadir">Añadir</button>-->
    <label for="Departamento" >Buscar Departamento: </label>
    <input type="text" id="Departamento" name="Departamento" value="<?php echo $busquedaDepartamento ?>">
    <input type="submit" value="Buscar" name="buscar">
</form>
   