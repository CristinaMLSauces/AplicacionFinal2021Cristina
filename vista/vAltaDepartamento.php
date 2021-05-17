<header class="h1micuenta">
    <h1 style="margin-left: 40%;">Aplicacion Final Cristina 2021</h1>
</header>
<h3 class="h3registro">Añadir<br>Departamento</h3>
    <div class="box">
        <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post" >     
            <div class="input-container">   
                <label>Codigo usuario </label>	
                <input  type="text" name="codDepartamento" value="" >
                 <?php echo ($aErrores['CodDepartamento']!=null) ? "<span>  ⚠️".$aErrores['CodDepartamento']."</span>" : null; ?>     
                <br><br>
            </div>
                
            <div class="input-container">           
                <label>Descripción del Departamento</label>   
                <input type="text" name="descDepartamento" value="">
                     <?php echo ($aErrores['DescDepartamento']!=null) ? "<span>  ⚠️".$aErrores['DescDepartamento']."</span>" : null; ?>     
                <br><br>
            </div>
                
            <div class="input-container">   
                <label>Volumen de negocio</label>	
                    <input type="text" name="volumenNegocio" value="" >
                    <?php echo ($aErrores['VolumenNegocio']!=null) ? "<span>  ⚠️".$aErrores['VolumenNegocio']."</span>" : null; ?>  
                <br><br>
            </div>
            
            <div>
                <input type="submit" value="Aceptar" name="aceptar" class="aceptar">
                <input type="submit" value="Cancelar" name="cancelar" class="cancelar">
            </div>   
        </form> 
    </div> 
</div>

