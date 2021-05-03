<header class="hinicio">
<?php
    if($imagenUsuario==null){                                       //Si la imagende usuario en la tabla esta vacia le digo que me ponga una por defecto
        echo '<img src = "./webroot/images/user.svg' . base64_encode($imagenUsuario) . '" width = "140px"/>';
    }else{
        echo '<img src = "data:image/png;base64,' . base64_encode($imagenUsuario) . '" width = "140px"/>'; 
    }
?>
    <h1>Aplicacion Final Cristina 2021</h1>
        <form class="finicio" name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" ">
            <input class="botones" type="submit" value="DETALLES" name="detalles" id="detalles">
            <input class="botones" type="submit" value="EDITAR PERFIL" name="editarPerfil" id="editarPerfil">
            <input class="botones" type="submit" value="CERRAR SESION" name="salir" id="cerrarSesion">
        </form>
</header>
<div class="caja">
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
                            <h3><?php echo "Tu ultima visita ha sido el ".date('d/m/Y H:i:s',$ultimaConexionAnterior);?> </h3>
                    <?php   
                        }
                    ?> 
        </div>
    <div class="departamentos">
            <form name="formulario1" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" ">
                <fieldset>
                <legend>MTO. Departamentos</legend>
                <input class="departamento" type="submit" value="DEPARTAMENTOS" name="MtoDepartamentos" id="detalles">
                <img class="bdd" src="webroot/images/bdd.png" alt=""/>
                </fieldset>
            </form>
        </div>
</div>