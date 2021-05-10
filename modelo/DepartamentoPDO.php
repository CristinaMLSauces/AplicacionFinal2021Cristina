<?php

/**
 * Class DepartamentoPDO
 *
 * Clase cuyos metodos hacen consultas a la tabla T02_Departamento de la base de datos
 * 
 * @author Cristina Nuñez y Javier Nieto
 * @since 1.1
 * @copyright 2020-2021 Cristina Nuñez y Javier Nieto
 * @version 1.1
 * @package  Validacion
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
    public static function obtenerDatosDepartamento($codDepartamento){
        $oDepartamento = null;

        $sentenciaSQL = "Select * FROM T02_Departamento where T02_CodDepartamento=?";
        $resultadoConsulta = DBPDO::ejecutarConsulta($sentenciaSQL, [$codDepartamento]); // almacenamos en la variable $resultadoConsulta el departamento obtenidos en la consulta

        if($resultadoConsulta->rowCount() > 0) {
            $departamento = $resultadoConsulta->fetchObject();
            // Instanciamos un objeto Departamento con los datos devueltos por la consulta
            $oDepartamento = new Departamento($departamento->T02_CodDepartamento, $departamento->T02_DescDepartamento, $departamento->T02_FechaCreacionDepartamento, $departamento->T02_VolumenNegocio, $departamento->T02_FechaBajaDepartamento);
        }

        return $oDepartamento;
    }
    /**
     * Metodo buscaDepartamentosPorDescripcion()
     * 
     * Metodo que devuelve un array con los departamentos obtenidos en la busqueda de los departamentos por la descripcion y el criterio de búsqueda
     * y el numero de paginas totales para realizar la paginacion
     *
     * @param  string $descDepartamento descripcion del departamento
     * @param string $criterioBusqueda criterio de busqueda ('Todos', 'Baja', 'Alta')
     * @param  int $numPaginaActual numero de pagina actual
     * @param  int $numMaxDepartamentos numero de departamentos por pagina
     * @return mixed[] array con los departamentos y el numero de paginas totales para realizar la paginacion
     */
    public static function buscarDepartamentosPorDescripcion($descDepartamento){
        
        $sentenciaSQL = 'SELECT * FROM Departamento WHERE DescDepartamento LIKE "%":DescDepartamento"%"';
        $resultadoConsulta = DBPDO::ejecutarConsulta($sentenciaSQL, [$descDepartamento]); // almacenamos en la variable $resultadoConsulta los departamentos obtenidos en la consulta

        if($resultadoConsulta->rowCount() > 0) { // si la consulta devuelve algun departamento
            $departamento = $resultadoConsulta->fetchObject(); // obtenemos el primer departmento de la consulta, lo almacenamos en la variable $departamento y avanzamos el puntero al siguiente departamento
            $numDepartamento = 0; // declaramos e inicializamos el numero del departamento del array equivalente a la posicion del array

            while ($departamento) { // mientras haya algun departamento
                // Instanciamos un objeto Departamento con los datos devueltos por la consulta
                $oDepartamento = new Departamento($departamento->T02_CodDepartamento, $departamento->T02_DescDepartamento, $departamento->T02_FechaCreacionDepartamento, $departamento->T02_VolumenNegocio, $departamento->T02_FechaBajaDepartamento);
                $aDepartamentos[$numDepartamento] = $oDepartamento; // añadimos el objeto departamento en la posicion del array correspondiente
                $numDepartamento++; // incrementamos el numero del departamento equivalente a la posicion el array
                $departamento = $resultadoConsulta->fetchObject(); // almacenamos el siguiente departamento devuelto por la consulta y avanzamos el puntero al siguiente departamento
            }
        }

        return $aDepartamentos;
    }
    
}
