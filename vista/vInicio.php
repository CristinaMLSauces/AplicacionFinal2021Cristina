<header class="hinicio">
            <?php
                if($imagenUsuario!=null){
                echo '<img src = "data:image/png;base64,' . base64_encode($imagenUsuario) . '" width = "180px"/>';
                }
                ?>
    <h1>¡Estas dentro. Bienvenido/a!</h1>
        <form class="ficinio" name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" ">  
            <input type="submit" value="CERRAR SESION" name="salir" class="cerrarSesion">
        </form>
</header>
        <div class="info">
            <br><br>
                <h3><?php echo "Hola ".$descUsuario;?></h3>                     
                    <?php
                        if($numConexiones==1){                                    //Si es la primera vez que inicia sesion
                    ?>
                            <h3><?php echo "Bienvenido! Es tu primera vez por aqui." ?></h3>
                    <?php
                        }else{                                                  //Si no es la prinera vez que inicias sesion
                    ?>
                            <h3><?php echo "Te has conectado ".$numConexiones." veces" ?></h3>
                            <h3><?php echo "Tu ultima visita ha sido el ".date('d/m/Y H:i:s',$ultimaConexion);?> </h3>
                    <?php   
                        }
                    ?> 
        </div>