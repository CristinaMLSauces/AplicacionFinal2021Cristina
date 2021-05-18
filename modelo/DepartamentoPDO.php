<?php
/**
 * Class DepartamentoPDO
 *
 * Clase cuyos metodos hacen consultas a la tabla T02_Departamento de la base de datos
 * 
 * @author Cristina Manjon y Beatriz Merino
 * @since 1.1
 * @copyright 2020-2021 Nerea Alvarez
 * @version 1.1
 */
class DepartamentoPDO{
    /**
     * Metodo obtenerDatosDepartamento()
     * 
     * Metodo que obtiene los datos de un departamento cuyo codigo es el pasado como parametro
     *
     * @param  string $codDepartamento codigo del departamento del que queremos obtener los datos
     * @return null|\Departamento devuelve un objeto de tipo Departamento con los datos guardados en la base de datos y null si no se ha podido encontrar
     */
    public static function buscaDepartamentoPorDesc($parametros) {
        $aDepartamentos = [];
        $consulta = "SELECT * FROM T02_Departamento WHERE T02_DescDepartamento LIKE CONCAT('%', ?, '%')";
        $resultado = DBPDO::ejecutarConsulta($consulta, [$parametros]);

        if ($resultado->rowCount() > 0) {
            for($i=0,$departamento = $resultado->fetchObject();$i<$resultado->rowCount();$i++,$departamento = $resultado->fetchObject()){
                $oDepartamento = new Departamento($departamento->T02_CodDepartamento, $departamento->T02_DescDepartamento, $departamento->T02_FechaCreacionDepartamento, $departamento->T02_VolumenNegocio, $departamento->T02_FechaBajaDepartamento);
                $aDepartamentos[$i] = $oDepartamento; // añadimos el objeto departamento en la posicion del array correspondiente 
            }
        }
        return $aDepartamentos;
    }
    
    /**
     * Método buscaDepartamentoPorCod()
     *
     * Método que obtiene todos los datos de un departamento de la base de datos
     * 
     * @param  string $codigo código del departamento del que queremos obtener los datos
     * @return null|\Departamento devuelve un objeto de tipo Departamento con los datos guardados en la base de datos y null si no se ha encontrado el departamento en la BBDD
     */
    public static function buscaDepartamentoPorCod($codigo) {
        //Inicializo la variable que tendrá el objeto de clase usuario en el caso de que se encuentre en la base de datos
        $oDepartamento = null; 
        
        $consulta = "SELECT * FROM T02_Departamento WHERE T02_CodDepartamento=?";
        $resultado = DBPDO::ejecutarConsulta($consulta, [$codigo]);

        //Si la consulta me devuelve algún resultado lo guardo en una variable para instanciar un nuevo objeto Departamento con esos datos
        if ($resultado->rowCount() > 0) {
            $oDepartamentoConsulta = $resultado->fetchObject();
            $oDepartamento = new Departamento($oDepartamentoConsulta->T02_CodDepartamento, $oDepartamentoConsulta->T02_DescDepartamento, $oDepartamentoConsulta->T02_FechaCreacionDepartamento, $oDepartamentoConsulta->T02_VolumenNegocio, $oDepartamentoConsulta->T02_FechaBajaDepartamento);
        }
        
        //Devuelvo el objeto
        return $oDepartamento;
    }
    
    /**
     * Método modificarDepartamento()
     *
     * Método que modifica el valor de la descripción y el volumen del departamento.
     * 
     * @param  int $volumen nuevo volumen de negocio
     * @param  string $descripcion nueva descripción del usuario
     * @param  string $codigo codigo del departamento que queremos modificar
     * @return boolean devuelve true si se ha podido modificar el departamento y false si no
     */
    public static function modificaDepartamento($volumen, $descripcion, $codigo) {
        //Variable booleana inicializada a false
        $departamentoModificado = false;

        //Modifica el departamento en la base de datos ejecutando un query
        $sentenciaSQL = "UPDATE T02_Departamento SET T02_DescDepartamento=?, T02_VolumenNegocio=? WHERE T02_CodDepartamento=?";
        $resultadoConsulta = DBPDO::ejecutarConsulta($sentenciaSQL, [$descripcion, $volumen, $codigo]);

        //Si la consulta me devuelve algún resultado cambiamos el valor de $departamentoModificado a true
        if ($resultadoConsulta) {
            $departamentoModificado = true;
        }
        
        //Devuelvo la variable
        return $departamentoModificado;
    }
    /**
     * Método bajaFisicaDepartamento()
     * 
     * Método que elimina un departamento de la base de datos
     *
     * @param  string $codigo código del usuario que queremos borrar
     * @return boolean true si se ha borrado el departamento y false en caso contrario
     */
    public static function bajaFisicaDepartamento($codDepartamento) {
        $borrar = false;
        
        $consulta = "DELETE FROM T02_Departamento WHERE T02_CodDepartamento=?";
        $resultadoConculta = DBPDO::ejecutarConsulta($consulta, [$codDepartamento]);

        if ($resultadoConculta) {
            $borrar = true;
        }
        
        return $borrar;
    }
    /**
     * Método altaDepartamentos()
     * 
     * Método que elimina un departamento de la base de datos
     *
     * @param  string $codigo código del usuario que queremos borrar
     * @return boolean true si se ha borrado el departamento y false en caso contrario
     */
    
    public static function altaDepartamentos($codDepartamento, $descDepartamento, $volDepartamento) {
        $altaDepartamento = false;

        $consulta = "Insert into T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_VolumenNegocio, T02_FechaCreacionDepartamento) values (?,?,?,?)";
        $resultadoConsulta = DBPDO::ejecutarConsulta($consulta, [$codDepartamento, $descDepartamento, $volDepartamento, time()]);

        if ($resultadoConsulta) {
            $altaDepartamento = true;
        }

        return $alta;
    }
    
    public static function validarCodNoExiste($codDepartamento) {
        $departamentoNoExiste = true; // inicializo la variable booleana a true
        // comprueba que el usuario introducido existen en la base de datos
        $consulta = "Select * from T02_Departamento where T02_CodDepartamento=?";
        $resultado = DBPDO::ejecutarConsulta($consulta, [$codDepartamento]); // guardo en la variabnle resultado el resultado que me devuelve la funcion que ejecuta la consulta con los paramtros pasados por parmetro

        if ($resultado->rowCount() > 0) { // si la consulta me devuleve algun resultado
            $departamentoNoExiste = false; // inicializo la variable booleana a false
        }

        return $departamentoNoExiste;
    }
 
    /**
     * Metodo bajaLogicaDepartamento()
     *
     * Metodo que da de baja logica un departamento cuyo codigo es pasado por parametro
     * 
     * @param  string $codDepartamento codigo del departamento que queremos dar de baja logica
     * @return boolean true si se ha dado de baja logica correctamente, false ne caso contrario
     */
    public static function bajaLogicaDepartamento($codDepartamento){
        $bajaLogica = false; // Inicializamos la variable bajaLogica a false
        
        $dateTimeBaja = new DateTime();
       
        $sentenciaSQL = "Update T02_Departamento set T02_FechaBajaDepartamento=? WHERE T02_CodDepartamento=?";
        $resultadoConsulta = DBPDO::ejecutarConsulta($sentenciaSQL, [$dateTimeBaja->getTimestamp(), $codDepartamento]); // Ejecutamos la consulta y almacenamos el resultado en la variable resultadoConsulta

        if ($resultadoConsulta) { // Si se ha realizado la consulta correctamente
            $bajaLogica = true; // Cambiamos el valor de la variable bajaLogica a true
        }

        return $bajaLogica;
    }
    /**
     * Metodo rehabilitacionDepartamento()
     *
     * Metodo que rehabilita un departamento poniendo su fehca de baja a null
     * 
     * @param  string $codDepartamento codigo del departamento que queremos rehabilitar
     * @return boolean true si se ha rehabilitado el departamento, false en caso contrario 
     */
    public static function rehabilitacionDepartamento($codDepartamento)
    {
        $rehabilitacion = false; // Inicializamos la variable rehabilitacion a false

        $sentenciaSQL = "Update T02_Departamento set T02_FechaBajaDepartamento=null WHERE T02_CodDepartamento=?";
        $resultadoConsulta = DBPDO::ejecutarConsulta($sentenciaSQL, [$codDepartamento]); // Ejecutamos la consulta y almacenamos el resultado en la variable resultadoConsulta

        if ($resultadoConsulta) { // Si se ha realizado la consulta correctamente
            $rehabilitacion = true; // Cambiamos el valor de la variable rehabilitacion a true
        }
        return $rehabilitacion;
    }
}