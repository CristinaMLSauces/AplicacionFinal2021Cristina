<header class="h1micuenta">
    <h1 style="margin-left: 40%;">Aplicacion Final Cristina 2021</h1>
</header>
<h3 class="h3registro">Modificar/Consultar<br>Departamento</h3>
    <div class="box">
        <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post" >        
            <div class="input-container">   
                <label>Codigo usuario </label>	
                <input  type="text" name="codDep" value="<?php echo $codDep; ?>" style="background: #D3CAC4;" readonly>
                <br><br>
            </div>
                
            <div class="input-container">           
                <label>Descripción del Departamento</label>   
                <input type="text" name="DescDepartamento" value="<?php echo $descDep; ?>">
                     <?php echo ($aErrores['DescDepartamento']!=null) ? "<span>  ⚠️".$aErrores['DescDepartamento']."</span>" : null; ?>     
                <br><br>
            </div>
                
            <div class="input-container">   
                <label>Volumen de negocio</label>	
                    <input type="text" name="VolumenNegocio" value="<?php echo $volumen; ?>" >
                    <?php echo ($aErrores['VolumenNegocio']!=null) ? "<span>  ⚠️".$aErrores['VolumenNegocio']."</span>" : null; ?>  
                <br><br>
            </div>
            
             <div class="input-container">   
                <label>Fecha Creacion Departamento</label>	
                    <input type="text" name="fechaCreacion" value="<?php echo date('d/m/Y', $fechaCreacion); ?>" style="background: #D3CAC4;" readonly>
            <br><br>
            </div> 

                <div>
                    <input type="submit" value="Aceptar" name="aceptar" class="aceptar">
                    <input type="submit" value="Cancelar" name="cancelar" class="cancelar">
                </div>

            </form>
</div>