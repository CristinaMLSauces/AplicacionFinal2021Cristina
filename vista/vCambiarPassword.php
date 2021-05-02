<header>
    <h1>Login Logoff Tema 5</h1>
</header>
        <div class="box">
            <form name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="formularioAlta">
                <h3 class="h3registro">Cambiar<br>password</h3>
                <br>
                <div>
                    <div class="input-container">
                         <label>Password actual</label>
                            <input type = "password"  name = "PasswordActual" value=
                            "<?php if($aErrores['PasswordActual'] == NULL && isset($_REQUEST['PasswordActual'])){ echo $_REQUEST['PasswordActual'];}?>">
                            <?php if ($aErrores['PasswordActual'] != null) { echo "   ⚠️".$aErrores['PasswordActual']."<br>"; } ?> <br>
                    </div>
                    <br><br>
                    <div class="input-container">
                         <label>Password nueva</label>
                            <input type = "password"  name = "PasswordNueva" value=
                            "<?php if($aErrores['PasswordNueva'] == NULL && isset($_REQUEST['PasswordNueva'])){ echo $_REQUEST['PasswordNueva'];}?>">
                            <?php if ($aErrores['PasswordNueva'] != null) { echo "   ⚠️".$aErrores['PasswordNueva']."<br>"; } ?> <br>
                    </div>  
                    <br><br>
                    <div class="input-container">
                         <label>Password nueva</label>
                            <input type = "password"  name = "PasswordRepetida" value=
                            "<?php if($aErrores['PasswordRepetida'] == NULL && isset($_REQUEST['PasswordRepetida'])){ echo $_REQUEST['PasswordRepetida'];}?>">
                            <?php if ($aErrores['PasswordRepetida'] != null) { echo "   ⚠️".$aErrores['PasswordRepetida']."<br>"; } ?> <br>
                    </div> 

                    <br><br>
                </div>
                <div>
                    <input type="submit" value="Aceptar" name="aceptar" class="aceptar">
                    <input type="submit" value="Cancelar" name="cancelar" class="cancelar">
                </div>
            </form>
        </div>
