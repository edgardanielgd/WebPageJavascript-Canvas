<html>
    <header>
        <title>Hola corazon...</title>
        <link rel="StyleSheet" href="Estilo.css" type="text/css" media=screen>
        <link rel="icon" href="https://natygift.000webhostapp.com/naty1.ico" type="https://natygift.000webhostapp.com/naty1.ico">
    </header>
    
    <body>
        <center><div id="Dev">
        </div></center>
        <script>
        var dev=document.getElementById("Dev");
        var nuevoP=document.createElement("p","style='background-color:black'");
        nuevoP.innerHTML="No te olvides de que en este momento 10% de mi cerebro piensa en ti.\nEl otro porcentaje no lo puedo usar para nada ;/";
        dev.appendChild(nuevoP);
        setTimeout(Uno,3000);
        function Uno(){
            var nuevoP=document.createElement("p","style='background-color:black;color:white;font-size:30px;align=center'");
            nuevoP.innerHTML="Gracias por dejarme conocerte corazon";
            dev.appendChild(nuevoP);
            setTimeout(Dos,3000);
        }
        function Dos(){
            var nuevoP=document.createElement("p","style='background-color:black;color:white;font-size:30px;align=center'");
            nuevoP.innerHTML="Cuando estes triste abre esta pagina :)";
            dev.appendChild(nuevoP);
            setTimeout(Tres,3000);
        }
        function Tres(){
            var nuevoP=document.createElement("p","style='background-color:black;color:white;font-size:30px;align=center'");
            nuevoP.innerHTML="Tal vez te recuerde porque tu sonrisa es tan importante";
            dev.appendChild(nuevoP);
            setTimeout(Cuatro,3000);
        }
        function Cuatro(){
            window.location.replace("zona2.php");
        }
    </script>
    </body>
</html>