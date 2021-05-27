<!DOCTYPE html>  
<html>      <!--  El layout sera como una plantilla para poder poner nuestro header o nuestro footer, que sera lo que salga en todas las paginas de la aplicacion-->
        <head>
            <meta charset="UTF-8">
            <title>Aplicacion Final Cristina 2021</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="Cristina Manjon Lacalle">
            <meta name="robots" content="index, follow"> 
           <link href="./webroot/css/estilo.css" rel="stylesheet" type="text/css">
           <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
           <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        </head>
        <body>

            <?php require_once $vistaEnCurso ?>                                     <!--Cargamos la vista en curso que contiene la pagina que se debe ver -->

        </body>
     <footer  class="footer">
         <table>
             <tr>
                <td colspan="2"> 2020-21 ©Todos los derechos reservados</td>
                <td><a href="core/2.pdf" target="_blank">Curriculum del autor</a></td>
                <td><input type="submit" class="botonesWIP" value="Tecnologías Usadas" name="Tecnologias"></td>
                <td><a href="https://github.com/CristinaMLSauces/AplicacionFinal2021Cristina" target="_blank"> <img src="webroot/images/git.png" class="logo" /> </a></td>
                <td><a href="doc/phpdocumentor/index.html" target="_blank"><img src="webroot/images/phpdoc.png" class="logo" /> </a></td>
                <td><a href="doc/doxygen/html/index.html" target="_blank"><img src="webroot/images/doxygen.png" class="logo" /> </a></td>
                <td><a href="https://daw207.ieslossauces.es/" target="_blank"><img src="webroot/images/1and1.png" class="logo" /> </a></td>
                <td><a href="webroot/rss/rss.xml" target="_blank"><img src="webroot/images/rss.png" class="logo" /> </a></td>
             </tr>
       
         </table>
     </footer>
</html>

 

        