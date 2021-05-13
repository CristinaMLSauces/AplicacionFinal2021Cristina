<?php
class REST {
    /**
     * Llama al servicio API REST, que nos devuelve la información de un personaje
     * de la serie Rick and Morty.
     * 
     * @param type $number nos devolverá la información de un personaje.
     * @return type array que contiene información sobre el personaje. 
     */
    public static function starwars($number){    
//        try{
//          error_reporting(0);                                                 La manera facil hubiera sido desactivando el warning
        $url = "https://swapi.dev/api/people/".$number."/";                     //Guardo en la variable $url la url que voy a la que le voy a ahacer la peticion
        if(self::get_http_response_code($url) != "200"){                        //llamo a la funcion que me devuelve el codigo de respuesta http, si este es difrenete a 200
           $Respuesta[0] = false;                                               //Significa que no ha podido hacer la peticion y guardo y devuelvo el error
           $Respuesta[1] = "Error de peticion al servidor";
           return $Respuesta; // devolvemos el array con el mensaje de error
        
        }else{    
            $resultado = file_get_contents("https://swapi.dev/api/people/".$number."/", true); // obtenemos el resultado del servidor del api rest
                               // Almacenamos el array devuelto por json_decode    

           if($resultado == false || $number == null){                         // si no obtenemos el resultado esperado
               throw new Exception("Error en la introduccion de datos");       //Lanzamos una excepcion
            }else{
                $Personaje = json_decode($resultado, true);  
                $Respuesta[0] = true;
                $Respuesta[1] = $Personaje;
               return $Respuesta;                                               //devolvemos un array con los datos que queremos devolver
           }
        }
    
//        }catch(Exception $excepcion){
//            $Respuesta[0] = 'excepcion';
//            $Respuesta[1]['code'] =$excepcion -> getCode();
//            $Respuesta[1]['message'] = $excepcion -> getMessage(); //Asignamos a un array el mensaje de error de la excepcion
//            return $Respuesta; // devolvemos el array con el mensaje de error
//        }      
    }
    
    public static function get_http_response_code($url) {                       //Declaro una funcion para recoger el error de respuesta de http
        $aHeaders = get_headers($url);                                          //get_header devuelve un array con las respuestas a una petición HTTP.Lo guardo en la variable headers
        return substr($aHeaders[0], 9, 3);                                      //substr devuelve una cadena, entonces quiero que recorra la posicion 0 del array aheaders 
    }                                                                           //el primer parametro es para decirle la posicion y el segundo la longitud


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

