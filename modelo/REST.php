<?php
class REST {
    /**
     * Llama al servicio API REST, que nos devuelve la información de un personaje
     * de la serie Rick and Morty.
     * 
     * @param type $number nos devolverá la información de un personaje.
     * @return type array que contiene información sobre el personaje. 
     */
//    public static function starwars($number) {    
//    
//        try{
//        $resultado = file_get_contents("https://swapi.dev/api/people/".$number."/", true); // obtenemos el resultado del servidor del api rest
//            
//            if($resultado == false || $number == null){ // si no obtenemos el resultado esperado
//                throw new Exception("Error en la introduccion de datos"); //Lanzamos una excepcion
//            }else{
//               $aPersonaje = json_decode($resultado, true); // Almacenamos el array devuelto por json_decode
//               return $aPersonaje; //devolvemos un array con los datos que queremos devolver
//            }
//  
//        }catch(Exception $excepcion){
//            $Respuesta = $excepcion -> getMessage(); //Asignamos a un array el mensaje de error de la excepcion
//            return $Respuesta; // devolvemos el array con el mensaje de error
//        }       
//    }

    public static function starwars($number){    
        
    try{
        $resultado = file_get_contents("https://swapi.dev/api/people/".$number."/", true); // obtenemos el resultado del servidor del api rest
        $Personaje = json_decode($resultado, true);                      // Almacenamos el array devuelto por json_decode    
            
        if($Personaje == null || $number == null){                         // si no obtenemos el resultado esperado
                throw new Exception("Error en la introduccion de datos");       //Lanzamos una excepcion
            }else{
               $Respuesta[0] = true;
               $Respuesta[1] = $Personaje;
               return $Respuesta;                                               //devolvemos un array con los datos que queremos devolver
            }
        }catch(Exception $excepcion){
            $Respuesta[0] = false;
            $Respuesta[1]['code'] =$excepcion -> getCode();
            $Respuesta[1]['message'] = $excepcion -> getMessage(); //Asignamos a un array el mensaje de error de la excepcion
            return $Respuesta; // devolvemos el array con el mensaje de error
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

