<header class="hinicio" style="justify-content: space-around;">
    <form  name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <button type="submit" name='volver' value="volver" class="volver">VOLVER</button>
    </form>
    <h1>Aplicacion Final Cristina 2021<br>Mto Departamentos</h1>
    <form class="finicio" name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" ">
        <input class="botones" type="submit" value="Añadir" name="altaDepartamento" id="detalles" style="width: 100px;font-size: 25px;">   
    </form>
</header>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="buscardepartamento">
        <label>Descripción: </label>
        <input type="search" name="descDepartamento" value="<?php if($descDepartamento != ""){echo $descDepartamento ;}?>"/>
        <input class="button" type="submit" name="buscar" value="Buscar">
        <?php if($ErrorDesc != null) { echo "<p>  ⚠️".$ErrorDesc."</p>"; } ?>    
    </div>
    <br><br>
    <table class="mostrardepartamento" style="text-align: center;">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Volumen de negocio</th>
                    <th>Fecha de creación</th>
                    <th>Fecha de baja</th>
                    <th colspan="2">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 if (count($aDepartamentos) > 0){ 
                    foreach ($aDepartamentos as $departamento => $oDepartamento) {
                    $codigoDep = $oDepartamento->codDepartamento;
                            
                    if (is_null($oDepartamento->fechaBajaDepartamento)) {
                        $fechaBaja = "────";
                    } else {
                        $fechaBaja = date('d/m/Y', $oDepartamento->fechaBaja);
                    }
                    ?>
                    <tr>
                        <td><?php echo $oDepartamento->codDepartamento; ?></td>
                        <td><?php echo $oDepartamento->descDepartamento; ?></td>
                        <td><?php echo $oDepartamento->volumenDeNegocio; ?></td>
                        <td><?php echo date('d/m/Y', $oDepartamento->fechaCreacionDepartamento); ?></td>
                        <td><?php echo $fechaBaja; ?></td>
                        <td>
                            <button name="bajaLogica" value="<?php echo $codigoDep ?>"><img src="webroot/images/flecharoja.png" width="30"></button>
                            <button name="rehabilitar" value="<?php echo $codigoDep ?>"><img src="webroot/images/flechaverde.png" width="30"></button>
                            <button name="modificarDepartamento" value="<?php echo $codigoDep ?>"><img src="webroot/images/consulta.png" alt="imagen editar consultar departamento" width="30"></button>
                            <button name="eliminarDepartamento" value="<?php echo $codigoDep ?>"><img src="webroot/images/eliminar.png" alt="imagen eliminar departamento" width="30"></button>                           
                        </td>
                    </tr>
                    <?php 
                    }
                    ?>
            </tbody>
             <?php 
               }
           
               ?>
        </table>
</form>

