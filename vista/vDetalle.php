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
        <?php
            foreach ($_SESSION as $parametros => $parametro) {
                if($parametro == $_SESSION['fechaHoraUltimaConexionAnterior']) {
                    $parametro = date('d-m-Y',$parametro);
                }

                    if(is_object($parametro)){
                    echo "<b>".$parametros."</b>[ <br>";
                    $codUsuario = $parametro->getCodUsuario();
                    $password = $parametro->getPassword();
                    $descUsuario = $parametro->getDescUsuario();
                    $numConexiones = $parametro->getNumConexiones();
                    $fechaHoraUltimaConexion = $parametro->getFechaHoraUltimaConexion();
                    $perfil = $parametro->getPerfil();
                    $imagenPerfil = $parametro->getImagenPerfil();

                    $tabulador = "&nbsp;&nbsp;&nbsp;&nbsp;";
                    echo $tabulador."<b>codUsuario</b> -> ".$codUsuario."<br>";
                    echo $tabulador."<b>password </b>-> ".$password."<br>";
                    echo $tabulador."<b>descUsuario</b> -> ".$descUsuario."<br>";
                    echo $tabulador."<b>numConexiones</b> -> ".$numConexiones."<br>";
                    echo $tabulador."<b>fechaHoraUltimaConexion</b> -> ".date('d-m-Y',$fechaHoraUltimaConexion)."<br>";
                    echo $tabulador."<b>perfil </b>->".$perfil."<br>";
                    if($imagenPerfil==null){                                       //Si la imagende usuario en la tabla esta vacia le digo que me ponga una por defecto
                        echo $tabulador.'<b>Imagen Perfil</b> -> <img class="imgperfil" src = "./webroot/images/user.svg' . base64_encode($imagenPerfil) . '" width = "120px"/>';
                    }else{
                        echo $tabulador.'<b>Imagen Perfil</b> -> <img class="imgperfil" src = "data:image/png;base64,' . base64_encode($imagenPerfil) . '" width = "120px"/>'; 
                    }
                 
                    $parametro = "";
                    $parametros = "]";
                    }
                
                echo "<b>".$parametros."</b> ->";
                echo $parametro."<br>";
            }
        ?>
        </div>
               
        <h3 class="h3detalle">$_SERVER</h3>
        <div>     
            <?php foreach ($_SERVER as $parm => $value)  echo "<b>$parm </b> → '$value'<br>"; ?>
        </div>
        

      
        