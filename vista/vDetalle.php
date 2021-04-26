<header class="hdetalle">
        <form  name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <button type="submit" name='volver' value="volver" class="volver">VOLVER</button>
        </form>
    <h1 class="h1detalle">Estas viendo las variables superglobales.</h1>

</header>
        
        <h3 class="h3detalle">$_COOKIE</h3>
        <div>  
        <?php
            foreach ($_COOKIE as $key => $value) {
                    echo $key."  ";
                    echo $value."<br>";
            }
        ?>
        </div>
        <h3 class="h3detalle">$_SESSION</h3>
        <div>     
        <?php
            if(isset($_SESSION)){
                foreach ($_SESSION as $key => $value) {
                    echo $key." ";
                    echo $value."<br>";
                }
            }
        ?>
        </div>
        <h3 class="h3detalle">$_SERVER</h3>
        <div>    
        <?php
            if(isset($_SERVER)){
                foreach ($_SERVER as $key => $value) {
                    echo $key." ";
                    echo $value."<br>";
                }
            }
        ?>
        </div>
        <h3 class="h3detalle">$_GET</h3>
        <div> 
        <?php
            foreach ($_GET as $key => $value) {
                echo $key." ";
                echo $value."<br>";
            }
        ?>
        </div >
        <h3 class="h3detalle">$_POST</h3>
        <div>
        <?php
            foreach ($_POST as $key => $value) {
                echo $key." ";
                echo $value."<br>";
            }
        ?>
        </div>
        <h3 class="h3detalle">$_FILES</h3>
        <div>   
        <?php
            foreach ($_FILES as $key => $value) {
                echo $key." ";
                echo $value."<br>";
            }
        ?>
        </div>
        <h3>$_REQUEST</h3>
        <div class="h3detalle">    
        <?php
            foreach ($_REQUEST as $key => $value) {
                echo $key." ";
                echo $value."<br>";
            }
        ?>
        </div>
        <h3 class="h3detalle">$_ENV</h3>
        <div> 
        <?php
            foreach ($_ENV as $key => $value) {
                echo $key." ";
                echo $value."<br>";
            }
        ?>
        </div>