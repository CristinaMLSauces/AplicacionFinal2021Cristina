<?php
/**
 * Class Departamento
 *
 * Clase que se va a utilizar para ejecutar consultas contra la base de datos
 * 
 * @author Cristina Nuñez y Javier Nieto
 * @since 1.1
 * @copyright 2020-2021 Cristina Nuñez y Javier Nieto
 * @version 1.1
 */
class DBPDO {                                                                   //Nueva clase para lo conexion a la base de datos y ejecucion de consultas
    public static function ejecutarConsulta($sentenciaSQL, $parametros=null) {        //Creo un metodo que se llame ejecutar consulta y le pueda pasar una cosnulta y unos parametros
        try {                                                       
            $miDB = new PDO(HOST,USER,PASSWORD);                                //Establecer una conexión con la base de datos 
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     //La clase PDO permite definir la fórmula que usará cuando se produzca un error, utilizando el atributo PDO::ATTR_ERRMODE
            
            $consulta = $miDB->prepare($sentenciaSQL);                          //Preparamos la consulta que se le ha pasado
            $consulta->execute($parametros);                                    //Ejecutamos la consulta con los parametros pasados
            
        }catch(PDOException $e){
            $consulta = null;                                                   //Destruimos la consulta.
            $error = $e->getCode();                                             //guardamos en la variable error el error que salta
            $mensaje = $e->getMessage();                                        //guardamos en la variable mensaje el mensaje del error que salta

            echo "ERROR $error";                                                //Mostramos el error
            echo "<p style='background-color: coral>Se ha producido un error! .$mensaje</p>"; //Mostramos el mensaje de error
        } finally {
           unset($miDB);                                                        //cerramos la conexion con la base de datos
        }
        return $consulta;                                                       //Devolvemos la consulta
    }
}
?>