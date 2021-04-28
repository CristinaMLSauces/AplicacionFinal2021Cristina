 <header>
        <h1>Login Logoff Tema 5</h1>
    </header>
    <h3 class="h3registro">¡Registrate<br> ahora!</h3>
        <div class="box">
             <form name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
  
                <br>
                <div class="input-container">   
                    <label>Usuario</label>	
                        <input type="text" name="CodUsuario" value=
                        "<?php if($aErrores['CodUsuario'] == NULL && isset($_REQUEST['CodUsuario'])){ echo $_REQUEST['CodUsuario'];}?>">
                         <?php if ($aErrores['CodUsuario'] != null) { echo "  ⚠️".$aErrores['CodUsuario']."<br>"; } ?> <br>
                    
                        <br><br>
                </div>
                <div class="input-container">           
                    <label>Descripción del usuario</label>   
                    <input type="text" name="DescUsuario" value=
                        "<?php if($aErrores['DescUsuario'] == NULL && isset($_REQUEST['DescUsuario'])){ echo $_REQUEST['DescUsuario'];}?>">
                         <?php if ($aErrores['DescUsuario'] != null) { echo "  ⚠️".$aErrores['DescUsuario']."<br>"; } ?> <br>
                    
                        <br><br>
                </div>
                <div class="input-container">          
                    <label>Contraseña</label>   
                    <input type="Password" name="Password" value=
                        "<?php if($aErrores['Password'] == NULL && isset($_REQUEST['Password'])){ echo $_REQUEST['Password'];}?>">
                         <?php if ($aErrores['Password'] != null) { echo "  ⚠️".$aErrores['Password']."<br>"; } ?> <br>
                    
                        <br><br> 
                </div>
                <div class="input-container">     
                    <label>Repite la contraseña</label>   
                    <input type="Password" name="PasswordConfirmacion" value=
                        "<?php if($aErrores['PasswordConfirmacion'] == NULL && isset($_REQUEST['PasswordConfirmacion'])){ echo $_REQUEST['PasswordConfirmacion'];}?>">
                         <?php if ($aErrores['PasswordConfirmacion'] != null) { echo "  ⚠️".$aErrores['PasswordConfirmacion']."<br>"; } ?> <br>
                    
                        <br><br> 
                </div>
                
                <div>
                    <input type="submit" value="Aceptar" name="aceptar" class="aceptar">
                    <input type="submit" value="Cancelar" name="cancelar" class="cancelar">
                </div>
            </form>
        </div>