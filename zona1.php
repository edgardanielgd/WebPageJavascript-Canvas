<html>
<header>
<title>Naty</title>
<link rel="StyleSheet" href="Estilo.css" media="screen" type="text/css">
<link rel="icon" href="https://natygift.000webhostapp.com/naty1.ico" type="https://natygift.000webhostapp.com/naty1.ico">
<script src="fondoChange.js"></script>
</header>
<body>
<div align="center" style="display:block;">
<img src="naty0.gif"  style="display:in-line block;" width="400" height="400" align="top"> 
<canvas style="background-color:white" id="myCanvas" width="800" height="600" style="border:1px solid #000000"></canvas>
</div>
<p id="Puntaje" style="background-color:white;color:black;font-size:25px">0000000000</p>
<div style="display:None;">

    <img id="NatyDerecha" src="naty1.gif" width="50" height="50">
    <img id="NatyIzquierda" src="naty2.gif" width="50" height="50">
    <img id="Ladrillo" src="ladrillo.png" width="50" height="50">
    <img id="Camino" src="camino.png" width="50" height="50">
    <img id="Hueco" src="hueco.png" width="50" height="50">
    <img id="Hambur" src="anvorguesa.gif" width="50" height="50">
    <img id="Fresa" src="fresa.gif" width="50" height="50">
    <p id="Nivel1"><?php echo file_get_contents("https://natygift.000webhostapp.com/niveles/nivel1.txt")?></p>
    <p id="Nivel2"><?php echo file_get_contents("https://natygift.000webhostapp.com/niveles/nivel2.txt")?></p>
    <p id="Nivel3"><?php echo file_get_contents("https://natygift.000webhostapp.com/niveles/nivel3.txt")?></p>
</div>

<script>
alert("Hola Naty\nMuevete con W A S D\nCome anvorguesas\nY EVITA LOS HUECOS!!! (Asi como en 11 :'v)");
function EvaluarMovimiento(x,y){
    //Se invierten coordenadas graficas y en matriz (codigo)
    pos_y=parseInt(x/lado);
    pos_x=parseInt(y/lado);
    if(matriz[pos_x][pos_y]==1){
        return 1;
    }else if(matriz[pos_x][pos_y]==2 && x%lado===0 && y%lado===0){ //Coincide exactamente
        return 2;
    }else return 0;
}
function TeclaPresionada(tecla){
    if(mover){
        if(tecla.key==="w" && y-movimiento>=0 && EvaluarMovimiento(x,y-movimiento)!=1 && EvaluarMovimiento(x+lado-0.5,y-movimiento)!=1){
            ctx.fillStyle="white";
            ctx.clearRect(x,y,lado,lado);
            y=y-movimiento;
            Mapear(matriz);
            mover=false;
        }else if(tecla.key==="s" && y+lado+movimiento<=canvas.height && EvaluarMovimiento(x,y+lado)!=1 && EvaluarMovimiento(x+lado-0.5,y+lado)!=1){ //lado+movimiento-movimiento=lado
            ctx.fillStyle="white";
            ctx.clearRect(x,y,lado,lado);
            y=y+movimiento;
            Mapear(matriz);
            mover=false;
        }else if(tecla.key==="a" && x-movimiento>=0 && EvaluarMovimiento(x-movimiento,y)!=1 && EvaluarMovimiento(x-movimiento,y+lado-0.5)!=1){
            Naty=NatyI;
            ctx.fillStyle="white";
            ctx.clearRect(x,y,lado,lado);
            x=x-movimiento;
            Mapear(matriz);
            mover=false;
        }else if (tecla.key==="d" && x+lado+movimiento<=canvas.width && EvaluarMovimiento(x+lado,y)!=1 && EvaluarMovimiento(x+lado,y+lado-0.5)!=1){
            Naty=NatyD;
            ctx.fillStyle="white";
            ctx.clearRect(x,y,lado,lado);
            x=x+movimiento;
            Mapear(matriz);
            mover=false;
        }
    }
    var indices_borrar=[];
    for(var i=0;i<comidas.length;i++){
        //<>|
        x_alimento=comidas[i][1]*lado;
        y_alimento=comidas[i][0]*lado;
        //if((x_alimento+lado>x && x_alimento<=x && y_alimento+lado>y && y_alimento<y) || (x+lado>x_alimento && x<x_alimento && y+lado>y_alimento && y<y_alimento) || (x===x_alimento && y===y_alimento)){
        if(parseInt(x/lado)===comidas[i][1] && parseInt(y/lado)===comidas[i][0]){
            indices_borrar.push(i);
            CrearComida();
            actualizarPuntaje(puntos+1000);
        }
    }
    for(var j=0;j<indices_borrar.length;j++){
        comidas.splice(indices_borrar[j],1);
    }
    if(EvaluarMovimiento(x,y)===2){
        x=x_ini;
        y=y_ini;
        actualizarPuntaje(0);
        alert("Te caiste en un huecoooooooooooooooooooooooooooooooooo");
    }
    if(parseInt(x/lado)===comida_mov[1] && parseInt(y/lado)===comida_mov[0]){
        clearTimeout(tmComida);
        ResetearComidaMov();
        actualizarPuntaje(puntos+1500);
    }
    Mapear(matriz);
    ctx.drawImage(Naty,x,y,lado,lado);
}
function actualizarPuntaje(nuevo){
    largo=10;
    puntos=nuevo;
    var cadena=nuevo.toString();
    while(cadena.length<largo)cadena="0"+cadena;
    puntaje.innerHTML=cadena;
    if(puntos>=10000 && !pasa){
        matriz=LeerMapa(Nivel1.innerHTML);
        comidas=[];
        CrearComida();
        CrearComida();
        CrearComida();
        clearTimeout(tmComida);
        ResetearComidaMov();
        
        Mapear(matriz);
        ctx.drawImage(Naty,x,y,lado,lado);
        pasa=true;
    }
    if(puntos>=20000 && !pasa2){
        matriz=LeerMapa(Nivel3.innerHTML);
        comidas=[];
        CrearComida();
        CrearComida();
        CrearComida();
        clearTimeout(tmComida);
        ResetearComidaMov();
        Mapear(matriz);
        ctx.drawImage(Naty,x,y,lado,lado);
        pasa2=true;
    }
    if(puntos>=30000 && !pasa3){
        alert("Te adoro naty\nGracias por ser tan linda :)\n12/01/2021");
        window.location.replace("mensaje2.php")
    }
}
function Mapear(matriz){
    
    for(var i=0;i<matriz.length;i++){
        for(var j=0;j<matriz[i].length;j++){
            if(matriz[i][j]==0){
                ctx.drawImage(camino,(j)*lado,(i)*lado,lado,lado);
            }else if(matriz[i][j]==1){
                ctx.drawImage(ladrillo,(j)*lado,(i)*lado,lado,lado);
            }else if(matriz[i][j]==2){
                ctx.drawImage(hueco,(j)*lado,(i)*lado,lado,lado);
            }
        }
    }
    for(var k=0;k<comidas.length;k++){
        ctx.drawImage(hambur,comidas[k][1]*lado,comidas[k][0]*lado,lado,lado);
    }
    if(comida_mov.length!==0){
        ctx.drawImage(fresa,comida_mov[1]*lado,comida_mov[0]*lado,lado,lado);
    }
    ctx.drawImage(Naty,x,y,lado,lado);
}
function PermitirMovimiento(){
    mover=true;
}
function LeerMapa(texto){
    var arreglo_texto=texto.split("\n");
    y_ini=arreglo_texto[arreglo_texto.length-2]*lado;
    x_ini=arreglo_texto[arreglo_texto.length-1]*lado;
    x=x_ini;
    y=y_ini;
    arreglo_texto=arreglo_texto.slice(0,arreglo_texto.length-2);
    var arreglo=[];
    for(var i=0;i<arreglo_texto.length;i++){
        fila=[];
        for(var j=0;j<arreglo_texto[i].length;j++){
            fila.push(parseInt(arreglo_texto[i][j]));
        }
        arreglo.push(fila);
    }
    return arreglo;
}
function Posiciones(tipo){
    var arreglo=[];
    for(var i=0;i<matriz.length;i++){
        for(var j=0;j<matriz[i].length;j++){
            if(matriz[i][j]===tipo && !comidas.includes([i,j]))arreglo.push([i,j]);
        }   
    }
    return arreglo;
}
function CrearComida(){
    var posiciones=Posiciones(0);
    if(posiciones.length===0)return;
    indice=Math.floor(Math.random()*posiciones.length);//Math.random()=flotante entre 0 y 1 (excluido));
    ctx.drawImage(hambur,posiciones[indice][1]*lado,posiciones[indice][0]*lado,lado,lado);
    comidas.push(posiciones[indice]);
}
function ResetearComidaMov(){
    var posiciones=Posiciones(0);
    comida_mov=[];
    Mapear(matriz);
    if(posiciones.length===0)return;
    indice=Math.floor(Math.random()*posiciones.length);
    ctx.drawImage(fresa,posiciones[indice][1]*lado,posiciones[indice][0]*lado,lado,lado);
    comida_mov.push(posiciones[indice][0]);
    comida_mov.push(posiciones[indice][1]);
    tmComida=setTimeout(ResetearComidaMov,10000);
}
var nivel1=document.getElementById("Nivel1");
var canvas = document.getElementById("myCanvas");
var NatyD=document.getElementById("NatyDerecha");
var NatyI=document.getElementById("NatyIzquierda");
var camino=document.getElementById("Camino");
var ladrillo=document.getElementById("Ladrillo");
var hueco=document.getElementById("Hueco");
var hambur=document.getElementById("Hambur");
var fresa=document.getElementById("Fresa");
var puntaje=document.getElementById("Puntaje");
var puntos=0;
var ctx = canvas.getContext("2d");
document.addEventListener('keypress',TeclaPresionada);
var rapidez=50;
var movimiento=25;
var lado=50;
//IMPORTANTE (Tener en cuenta al crear el nivel!!!!)
var x_ini=0;
var y_ini=0;
//var x=(canvas.width/2)-(canvas.width%lado);
//var y=(canvas.height/2)-(canvas.height%lado);
var Naty=NatyD;
var mover=false;
var comidas=[];
var comida_mov=[];
var tmComida="";
var pasa=false;
var pasa2=false;
var pasa3=false;
matriz=LeerMapa(Nivel2.innerHTML);
CrearComida();
CrearComida();
CrearComida();
ResetearComidaMov();
Mapear(matriz);
ctx.drawImage(Naty,x,y,lado,lado);
setInterval(PermitirMovimiento,rapidez);

setInterval(CambiarFondo,5000);
</script>
</body>
</html>