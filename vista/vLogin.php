<header>
    <h1>Login Logoff Tema 5</h1>
</header>
    <a class="home" href="../../proyectoDWES/index.php"><img src="../images/casa.png"/></a>
        <div class="box">   
            <form name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
                <div class="input-container">   
                    <label>Usuario</label>	
                    <input type="text" name="CodUsuario" value=
                        "<?php if($aErrores['CodUsuario'] == NULL && isset($_REQUEST['CodUsuario'])){ echo $_REQUEST['CodUsuario'];}?>">
                        <?php if ($aErrores['CodUsuario'] != null) { echo "  ⚠️".$aErrores['CodUsuario']."<br>"; } ?> <br>
                </div>    
                <br><br>
                <div class="input-container">
                         <label>Password</label>
                            <input type = "Password"  name = "Password" value=
                            "<?php if($aErrores['Password'] == NULL && isset($_REQUEST['Password'])){ echo $_REQUEST['Password'];}?>">
                            <?php if ($aErrores['Password'] != null) { echo "   ⚠️".$aErrores['Password']."<br>"; } ?> <br>
                       
                </div> 
                <br><br>
                <input type="submit" value="INICIAR SESION" name="aceptar" class="enviar"> <br><br>
                <input type="submit" value="REGISTRATE" name="registrarse" class="registro">
                    
            </form>
        </div>


