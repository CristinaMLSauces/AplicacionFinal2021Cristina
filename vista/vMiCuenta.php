<header class="hinicio">
    <h1>Login Logoff POO Multicapa</h1>
    <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post"  enctype="multipart/form-data">        
        <input type="submit" value="ELIMINAR CUENTA" name="eliminarCuenta" class="eliminar">
    </form>
</header>
        <h3 class="h3registro">Editar perfil</h3>
        <div class="box">
            <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post"  enctype="multipart/form-data">        
                
                <div class="input-container">   
                    <label>Usuario 🔒</label>	
                    <input  type="text" name="CodUsuario" value="<?php echo $codUsuario; ?>" style="background: #D3CAC4;" readonly>
                    <br><br>
                </div>
                
                <div class="input-container">           
                    <label>Descripción del usuario</label>   
                    <input type="text" name="DescUsuario" value="<?php echo $descUsuario; ?>">
                     <?php echo ($aErrores['DescUsuario']!=null) ? "<span class='error'>".$aErrores['DescUsuario']."</span>" : null; ?>     
                    <br><br>
                </div>
                
                <div class="input-container">   
                    <label>Numero de conexiones 🔒</label>	
                        <input type="text" name="NumConexiones" value="<?php echo $numConexiones; ?>" style="background: #D3CAC4;" readonly>
                    <br><br>
                </div>   
                <?php
                    if($numConexiones>1){
                ?>
                    <div class="input-container">   
                        <label>Ultima fecha de conexion 🔒</label>	
                            <input type="text" name="FechaHoraUltimaConexion" value="<?php echo (date('d/m/Y H:i:s')); ?>" style="background: #D3CAC4;" readonly>
                    <br><br>
                    </div> 
                <?php
                    }
                ?>
                <div class="imagen">           
                    <label for="imagen">Imagen de perfil</label>   
                    <input type="file" id="imagen" name="imagen">
                    <?php echo ($aErrores['ImagenUsuario']!=null) ? "<span class='error'>".$aErrores['ImagenUsuario']."</span>" : null; ?>
                    <br><br>
                </div>
                
                    <input type="submit"  value="CAMBIAR CONTRASEÑA" name="cambiarPassword" class="contraseña">
                   
                    <br>
        
                <div>
                    <input type="submit" value="Aceptar" name="aceptar" class="aceptar">
                    <input type="submit" value="Cancelar" name="cancelar" class="cancelar">
                </div>
                 
                   
            </form>
</div>