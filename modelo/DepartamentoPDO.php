<?php
/**
 * Class DepartamentoPDO
 *
 * Clase cuyos metodos hacen consultas a la tabla T02_Departamento de la base de datos
 * 
 * @author Cristina Manjon
 * @since 1.1
 * @copyright 2020-2021 Cristina Nuñez y Javier Nieto
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
    public static function obtenerTodosLosDepartamentos(){
        $oDepartamento = null;
//      $codDepartamento = null;
       
        $consulta = "SELECT * FROM T02_Departamento";
        $resultadoConsulta = DBPDO::ejecutarConsulta($consulta); // almacenamos en la variable $resultadoConsulta el departamento obtenidos en la consulta
        
        $numDepartamentos = $resultadoConsulta->rowCount();
        $departamento = $resultadoConsulta->fetchObject(); 
        for($i = 1; $i <= $numDepartamentos; $i++){
            $oDepartamento = new Departamento($departamento->T02_CodDepartamento, $departamento->T02_DescDepartamento, $departamento->T02_FechaCreacionDepartamento, $departamento->T02_VolumenNegocio, $departamento->T02_FechaBajaDepartamento);
            $aDepartamentos[$i] =  $oDepartamento;
            $departamento = $resultadoConsulta->fetchObject();
        }
        return $aDepartamentos;
        
    }

}