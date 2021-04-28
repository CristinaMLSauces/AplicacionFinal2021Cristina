<?php

/**
 * Class UsuarioPDO
 *
 * Clase cuyos metodos hacen consultas a la tabla T_01Usuario de la base de datos
 * 
 * @author Cristina Nuñez, Javier Nieto, Beatriz Merino y Cristina Manjon
 *  
 * @since 1.0
 * @copyright 16-01-2021
 * @version 1.0
 */
class UsuarioPDO{
    
    /**
     * Metodo validarUsuario()
     * 
     * Metodo que valida si existe un determinado usuario y password en la base de datos.
     * Si no existe el usuario devuelve null.
     * 
     * @param string $codUsuario codigo del usuario
     * @param string $password password del usuario
     * @return null|\Usuario Si existe,un objeto de tipo Usuario con los datos de la base de datos. Si no existe null.
     */
    public static function validarUsuario($codUsuario, $password){
        $oUsuario = null; // inicializo la variable que tendrá el objeto de clase usuario en el caso de que se encuentre en la base de datos

        
        $sentenciaSQL = "Select * from T01_Usuario where T01_CodUsuario=? and T01_Password=?";
        $passwordEncriptado=hash("sha256", ($codUsuario.$password)); // enctripta el password pasado como parametro
        $resultadoConsulta = DBPDO::ejecutarConsulta($sentenciaSQL, [$codUsuario,$passwordEncriptado]); // guardo en la variable resultado el resultado que me devuelve la funcion que ejecuta la consulta con los paramtros pasados por parmetro
        
        if($resultadoConsulta->rowCount()>0){ // si la consulta me devuleve algun resultado
            $oRegistroUsuario = $resultadoConsulta->fetchObject(); // guardo en la variable el resultado de la consulta en forma de objeto
            $oUsuario = new Usuario($oRegistroUsuario->T01_CodUsuario, $oRegistroUsuario->T01_Password, $oRegistroUsuario->T01_DescUsuario, $oRegistroUsuario->T01_NumConexiones, $oRegistroUsuario->T01_FechaHoraUltimaConexion, $oRegistroUsuario->T01_Perfil, $oRegistroUsuario->T01_ImagenUsuario); 
        }
        
        return $oUsuario;
    }
    
    /**
     * Metodo registrarUltimaConexion()
     * 
     * Metodo que registra la fecha y hora d eultima conexion del usuario
     * 
     * @param string $codUsuario codigo del usuario
     * @return null|\Usuario con los campos actualizados.
     */
    
    public static function registrarUltimaConexion($codUsuario){
        $oUsuario = null;                                                       // inicializo la variable que tendrá el objeto de clase usuario en el caso de que se encuentre en la base de datos

        $sentenciaSQLActualizacionFechaConexion = "Update T01_Usuario set T01_NumConexiones = T01_NumConexiones+1, T01_FechaHoraUltimaConexion=? where T01_CodUsuario=?";
        $resultadoActualizacionFechaConexion = DBPDO::ejecutarConsulta($sentenciaSQLActualizacionFechaConexion, [time(),$codUsuario]);
        
        if($resultadoActualizacionFechaConexion){
            $oUsuario = self::buscarUsuarioPorCod($codUsuario);
        }

        return $oUsuario;
    }
    
    /**
     * Metodo buscarUsuarioPorCod()
     * 
     * Metodo que busca con el codigo en la base de datos un usuario 
     * Si existe devuleve el usuario completo
     * 
     * @param string $codUsuario codigo del usuario
     * @return null|\Usuario que existe en la base de datos.
     */
    
    public static function buscarUsuarioPorCod($codUsuario){
        $oUsuario = null; // inicializo la variable que tendrá el objeto de clase usuario en el caso de que se encuentre en la base de datos

        $sentenciaSQLDatosUsuario = "Select * from T01_Usuario where T01_CodUsuario=?";
        $resultadoDatosUsuario = DBPDO::ejecutarConsulta($sentenciaSQLDatosUsuario, [$codUsuario]); // guardo en la variabnle resultado el resultado que me devuelve la funcion que ejecuta la consulta con los paramtros pasados por parmetro
        
        if($resultadoDatosUsuario->rowCount()>0){ // si la consulta me devuelve algun resultado
            $oRegistroUsuario = $resultadoDatosUsuario->fetchObject(); // guardo en la variable el resultado de la consulta en forma de objeto
            // instanciacion de un objeto Usuario con los datos del usuario
            $oUsuario = new Usuario($oRegistroUsuario->T01_CodUsuario, $oRegistroUsuario->T01_Password, $oRegistroUsuario->T01_DescUsuario, $oRegistroUsuario->T01_NumConexiones, $oRegistroUsuario->T01_FechaHoraUltimaConexion, $oRegistroUsuario->T01_Perfil, $oRegistroUsuario->T01_ImagenUsuario);
        }

        return $oUsuario;

    }
 
    /**
     * Metodo altaUsuario()
     * 
     * Metodo que da de alta en la base de datos a un nuevo usuario
     * 
     * @param string $codUsuario codigo del usuario
     * @param string $password password del usuario
     * @param string $descripcion descripcion del usuario
     * @return null|\Usuario devuelve un objeto de tipo Usuario con los datos guardados en la base de datos y null si no se ha podido dar de alta
     */
    public static function altaUsuario($codUsuario, $password, $descripcion){
        $oUsuario = null;

        $consulta = "Insert into T01_Usuario (T01_CodUsuario, T01_DescUsuario, T01_Password , T01_NumConexiones, T01_FechaHoraUltimaConexion) values (?,?,?,1,?)";
        $passwordEncriptado=hash("sha256", ($codUsuario.$password)); // enctripta el password pasado como parametro
        $resultado = DBPDO::ejecutarConsulta($consulta, [$codUsuario, $descripcion, $passwordEncriptado,  time()]);

   
       $oUsuario = self::buscarUsuarioPorCod($codUsuario);

        return $oUsuario;
    }

    /**
     * Metodo validarCodNoExiste()
     * 
     * Metodo que comprueba si un usuario existe o no en la base de datos 
     * 
     * @param string $codUsuario codigo de usuario que queremos comprobar
     * @return boolean devuelve true si no existe y false en caso contrario
     */
    public static function validarCodNoExiste($codUsuario){
        $usuarioNoExiste = true; // inicializo la variable booleana a true
        
        // comprueba que el usuario introducido existen en la base de datos
        $consulta = "Select * from T01_Usuario where T01_CodUsuario=?";
        $resultado = DBPDO::ejecutarConsulta($consulta, [$codUsuario]); // guardo en la variabnle resultado el resultado que me devuelve la funcion que ejecuta la consulta con los paramtros pasados por parmetro
        
        if($resultado->rowCount()>0){ // si la consulta me devuleve algun resultado
            $usuarioNoExiste = false; // inicializo la variable booleana a false
        }
        
        return $usuarioNoExiste;
    }
}
?>

   