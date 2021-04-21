<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>loginlogoffMultiacapa</title>
        <link rel="icon" href="webroot/images/favicon-16x16.png" type="image/x-icon">
        <link href="./webroot/css/estilo.css" rel="stylesheet" type="text/css">
 
    </head>
    <body>
        <h1>LoginLogoffPOOMulticapa</h1>
        <h2>Cristina Manjon Lacalle</h2>
        <?php 
        require_once 'config/configDBPDO.php';
            //Establecer una conexión con la base de datos 
            $miDB = new PDO(HOST,USER,PASSWORD);
            //La clase PDO permite definir la fórmula que usará cuando se produzca un error, utilizando el atributo PDO::ATTR_ERRMODE
            //Le ponemos de parametro - > PDO::ERRMODE_EXCEPTION. Cuando se produce un error lanza una excepción utilizando el manejador propio PDOException.
            //https://www.php.net/manual/es/pdo.error-handling.php
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //https://www.php.net/manual/es/pdo.constants.php
       try {
        $aAtributos=[
            "AUTOCOMMIT",
            "CASE",
            "CLIENT_VERSION",
            "CONNECTION_STATUS",
            "DRIVER_NAME",
            "ERRMODE",
            "ORACLE_NULLS",
            "PERSISTENT",
            "SERVER_INFO",
            "SERVER_VERSION",
            "CLIENT_VERSION",
            "ERRMODE",
         
           
        ];
        
            foreach( $aAtributos as $resultado){                                //Recorremos el array de atributos
                echo "<strong> PDO::ATTR_$resultado </strong>";                 //Enucuiamos el atributo que vamos a mostrar
                echo $miDB->getAttribute(constant("PDO::ATTR_$resultado"))."<br>";  //Lo mostramos
            }
        
            echo "<p style='background-color: lightgreen;'> SE HA ESTABLECIDO LA CONEXION </p><br>";  //Si no ha habido ningun error se muestra la conexion establecida
        
        
       } 
       catch (PDOException $e) {     //Pero se no se ha podido ejecutar saltara la excepcion
        $error = $e->getCode();      //guardamos en la variable error el error que salta
        $mensaje = $e->getMessage(); //guardamos en la variable mensaje el mensaje del error que salta

        echo "ERROR $error";        //Mostramos el error
        echo "<p style='background-color: coral>Se ha producido un error! $mensaje</p>"; //Mostramos el mensaje de error
        
        }finally{           //Para finalizar cerramos la base de datos
            unset($miDB);
        }
        ?>
    </body>    
    <footer>
        <p class="footer"> 2020-21 I.E.S. Los sauces. ©Todos los derechos reservados. Cristina Manjon Lacalle <p> 
        <a href="https://github.com/CristinaMLSauces/LoginLogoffPOOMulticapa" target="_blank"> <img src="webroot/images/git.png" class="logogit" /> </a>
    </footer>
    
</html>
