<!DOCTYPE html>  
<html>      <!--  El layout sera como una plantilla para poder poner nuestro header o nuestro footer, que sera lo que salga en todas las paginas de la aplicacion-->
        <head>
            <meta charset="UTF-8">
            <title>LoginLogoffMulticapaPOO</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="Cristina Manjon Lacalle">
            <meta name="robots" content="index, follow">      
           
            <link href="./webroot/css/estilo.css" rel="stylesheet" type="text/css">
        </head>
        <body>

            <?php require_once $vistaEnCurso ?>                                     <!--Cargamos la vista en curso que contiene la pagina que se debe ver -->

        </body>
    
        <footer>                                                                <!--Le pongo mi footer que quiero que se vea en todas las paginas -->
            <p class="footer"> 2020-21 I.E.S. Los sauces. ©Todos los derechos reservados. <a href="https://daw207.ieslossauces.es/" target="_blank">Cristina Manjon Lacalle</a> <p> 
            <a href="https://github.com/CristinaMLSauces/LoginLogoffPOOMulticapa" target="_blank"> <img src="webroot/images/git.png" class="logogit" /> </a>
        </footer>
</html>