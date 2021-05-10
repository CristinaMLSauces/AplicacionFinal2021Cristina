<?php
class REST {
    /**
     * Llama al servicio API REST, que nos devuelve la información de un personaje
     * de la serie Rick and Morty.
     * 
     * @param type $number nos devolverá la información de un personaje.
     * @return type array que contiene información sobre el personaje. 
     */
    public static function starwars($number) {    
    
        try{
        $resultado = file_get_contents("https://swapi.dev/api/people/".$number."/", true); // obtenemos el resultado del servidor del api rest
            
            if($resultado == false){ // si no obtenemos el resultado esperado
                throw new Exception("Error en la conexión con el servidor, vuelva a intentarlo mas tarde"); //Lanzamos una excepcion
            }

            $aPersonaje = json_decode($resultado, true); // Almacenamos el array devuelto por json_decode
            return $aPersonaje; //devolvemos un array con los datos que queremos devolver
            
        }catch(Exception $excepcion){
            $aRespuesta [0] = $excepcion -> getMessage(); //Asignamos a un array el mensaje de error de la excepcion
            return $aRespuesta; // devolvemos el array con el mensaje de error
        }       
    }

   
    public static function nasa() {    
        try{
            $resultado = file_get_contents("https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY", true); // obtenemos el resultado del servidor del api rest
            
            if($resultado == false){ // si no obtenemos el resultado esperado
                throw new Exception("Error en la conexión con el servidor, vuelva a intentarlo mas tarde"); //Lanzamos una excepcion
            }

            $aNasa = json_decode($resultado, true); // Almacenamos el array devuelto por json_decode
            return $aNasa; //devolvemos un array con los datos que queremos devolver
            
        }catch(Exception $excepcion){
            $aRespuesta [0] = $excepcion -> getMessage(); //Asignamos a un array el mensaje de error de la excepcion
            return $aRespuesta; // devolvemos el array con el mensaje de error
        }       
    }

    public static function nasaconfecha($fecha) {    
        try{
            $resultado = file_get_contents("https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY&date=$fecha", true); // obtenemos el resultado del servidor del api rest
            
            if($resultado == false){ // si no obtenemos el resultado esperado
                throw new Exception("Error en la conexión con el servidor, vuelva a intentarlo mas tarde"); //Lanzamos una excepcion
            }

            $aNasa = json_decode($resultado, true); // Almacenamos el array devuelto por json_decode
            return $aNasa; //devolvemos un array con los datos que queremos devolver
            
        }catch(Exception $excepcion){
            $aRespuesta [0] = $excepcion -> getMessage(); //Asignamos a un array el mensaje de error de la excepcion
            return $aRespuesta; // devolvemos el array con el mensaje de error
        }       
    }
    
}

