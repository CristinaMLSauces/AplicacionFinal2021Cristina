<header class="hdetalle">
        <form  name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <button type="submit" name='volver' value="volver" class="volver">VOLVER</button>
        </form>
    <h1 class="h1detalle">Aplicacion Final Cristina 2021</h1>
</header>
<div class="apisdescrip">
    <form name="formulario1" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" ">
        <fieldset class="starwars">
            <legend>Personajes de STAR WARS</legend>
            <label>Introduce numero de personaje</label>
            <input type="number" name="numero" value="<?php echo $numeropordefecto ?>"  min="1"/><br>
             <?php if ($error != null) { echo "<p>  ⚠️".$error."</p>"; } ?> <br>
            <input type="submit" value="Aceptar" name="personaje" >
            <p><b>Nombre:</b><?php if ($nombre != null) { echo $nombre; } ?></p>
            <p><b>Genero:</b><?php if ($genero != null) { echo $genero; } ?></p>
            <p><b>Altura:</b><?php if ($altura != null) { echo $altura; } ?>cm</p>
            <p><b>Planeta:</b><?php if ($nombrePlaneta != null) { echo $nombrePlaneta; } ?></p> 

         </fieldset>   
    </form>

    <form name="formulario1" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" ">
        <fieldset class="nasa">
            <legend>Foto del dia de la nasa</legend>
            <input type="date" name="fecha" max=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
            <input type="submit" value="Aceptar" name="nasa" >
            <p><b>Descripcion:</b> <?php echo $explicacion; ?></p>
            <p><b>Titulo de la Imagen:</b> <?php echo $title; ?></p>
            <img src="<?php echo $imagen; ?>" width="400px"/>
         </fieldset>   
    </form>
</div>      
       
      
            
       