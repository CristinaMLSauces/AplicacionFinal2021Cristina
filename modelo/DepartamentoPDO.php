<?php
/**
 * Class DepartamentoPDO
 *
 * Clase cuyos metodos hacen consultas a la tabla T02_Departamento de la base de datos
 * 
 * @author Cristina Manjon
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
}