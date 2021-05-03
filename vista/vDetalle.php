<header class="hdetalle">
        <form  name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <button type="submit" name='volver' value="volver" class="volver">VOLVER</button>
        </form>
    <h1 class="h1detalle">Aplicacion Final Cristina 2021</h1>

</header>
        <h2 class="h2detalle">Estas viendo las variables superglobales.</h2>
        <h3 class="h3detalle">$_COOKIE</h3>
        <div>  
        <?php foreach ($_COOKIE as $parm => $value)  echo "<b>$parm </b> → '$value'<br>"; ?>
        </div>
       
        <h3 class="h3detalle">$_SESSION</h3>
        <div>    
        <pre>
            <?php print_r($_SESSION);?>
        </pre>
        </div>
        
        <h3 class="h3detalle">$_SERVER</h3>
        <div>     
            <?php foreach ($_SERVER as $parm => $value)  echo "<b>$parm </b> → '$value'<br>"; ?>
        </div>
        <h3 class="h3detalle">$_FILES</h3>
        <div>   
         <?php print_r($_FILES);?>
        </div>