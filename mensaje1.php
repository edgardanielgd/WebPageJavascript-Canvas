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
        nuevoP.innerHTML="Bienvenida a Naty 2.0.";
        dev.appendChild(nuevoP);
        setTimeout(Uno,3000);
        function Uno(){
            var nuevoP=document.createElement("p","style='background-color:black;color:white;font-size:30px;align=center'");
            nuevoP.innerHTML="Disfruta tu estancia";
            dev.appendChild(nuevoP);
            setTimeout(Dos,3000);
        }
        function Dos(){
            var nuevoP=document.createElement("p","style='background-color:black;color:white;font-size:30px;align=center'");
            nuevoP.innerHTML="Espero sonrias al verlo";
            dev.appendChild(nuevoP);
            setTimeout(Tres,3000);
        }
        function Tres(){
            var nuevoP=document.createElement("p","style='background-color:black;color:white;font-size:30px;align=center'");
            nuevoP.innerHTML="Y aqui va.....";
            dev.appendChild(nuevoP);
            setTimeout(Cuatro,1000);
        }
        function Cuatro(){
            window.location.replace("zona1.php");
        }
    </script>
    </body>
</html>