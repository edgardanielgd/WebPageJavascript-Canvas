<html>
    <head>
        <link rel="StyleSheet" media="screen" href="Estilo.css" type="text/css">
        <title>Foquita</title>
        <script src="fondoChange.js"></script>
    </head>
    <body>
        <div style="display:none;">
            <img id="NatyD" src="naty1.gif">
            <img id="NatyI" src="naty2.gif">
            <img id="muro" src="camino.png">
            <img id="piso" src="ladrillo.png">
            <img id="fresa" src="fresa.gif">
            <img id="Agujero" src="hueco.png">
        </div>
        <div align="center">
        <img src="natyUniversidad.gif" width=400 height=400 align=top>
        <canvas id="MiCanvas" style="background-color:white" width=800 height=600></canvas>
        </div>
        <p id="Puntaje" style="background-color:white;color:black;font-size:25px">0000000000</p>
        <script>
        var cambioY=40;
        var cambioX=20;
        function naty(x,y,l,natyD,natyI,vel=100){
                //ATRIBUTOS
                this.x=x;
                this.y=y;
                this.natyI=natyI;
                this.natyD=natyD;
                this.natyM=natyD;
                this.vel=vel;
                this.l=l;
                this.cayendo=false;
                this.subiendo=false;
                this.movi=false;
                this.tiempoY="";
                this.tiempo="";
                this.yInicial=this.y;
                //METODOS
                this.dibujar=function(){
                    ctx.drawImage(this.natyM,this.x,this.y,this.l,this.l);
                };
                this.Habilitar=function(){
                    this.movi=true;
                };
                this.moverY=function(){
                    if(this.subiendo){
                            if(this.y-cambioY<0){
                                    this.subiendo=false;
                                    this.cayendo=true;
                                }else this.y=this.y-cambioY;
                        }
                    if(this.cayendo){
                            if(this.y+cambioY>this.yInicial){
                                    this.cayendo=false;
                                    clearInterval(this.tiempoY);
                                }else this.y=this.y+cambioY;
                        }
                    mapear();
                };
                this.mover=function(direccion){
                        if(!this.movi)return;
                        switch(direccion.key){
                            case "w":{
                                if(!this.cayendo && !this.subiendo){
                                    this.subiendo=true;
                                    this.moverY();
                                    var esto=this;
                                    this.tiempoY=setInterval(function(){esto.moverY()},this.vel);
                                }
                                break;
                            }
                            case "d":{
                                //<>
                                if(this.x+cambioX<=canv.width){
                                    this.x=this.x+cambioX;
                                    this.natyM=this.natyD;
                                }
                                break;
                            }
                            case "a":{
                                if(this.x-cambioY>=0){
                                    this.x=this.x-cambioX;
                                    this.natyM=this.natyI;
                                }
                                break;
                            }
                            }
                        this.movi=false;
                        mapear();
                    };
                //FUNCTION
                var esto=this;
                this.Habilitar();
                this.tiempo=window.setInterval(function(){esto.Habilitar();},this.vel);
        }
        function comida(x,y,lado,imagen,tiempo_respawn=0){
            this.x=x;
            this.y=y;
            this.lado=lado;
            this.imagen=imagen;
            this.tiempo=tiempo_respawn;
            this.tim="";
            this.dibujar=function(){
                ctx.drawImage(this.imagen,this.x,this.y,this.lado,this.lado);
            }
            this.ran=function(){
                this.x=parseInt(Math.random()*(canv.width-this.lado));
                this.y=parseInt(Math.random()*(canv.height-2*this.lado));
                clearInterval(this.tim);
                mapear();
                this.tim=setInterval(function(){esto.ran()},this.tiempo);
            }
            if(this.tiempo!==0){
                var esto=this;
                this.tim=setInterval(function(){esto.ran()},this.tiempo);
            }
        }
        function comparar(x1,y1,x2,y2){
            //<>|
            let cor1=x1;
            let cor2=y1;
            let cor3=x2;
            let cor4=y2;
            let cor5=x1+lado;
            let cor6=y1+lado;
            let cor7=x2+lado;
            let cor8=y2+lado;
            //Tomando como referencia inmovil fig 1 (x1,y1)
            if(cor1===cor3 && cor2===cor4){
                return true;
            }else if(cor5>cor3 && cor6>cor4 && cor3>cor1 && cor4>cor2){ //Esquina inferior derecha
                return true;
            }else if(cor5>cor3 && cor2>cor8 && cor3>cor1 && cor8>cor6){ //Esquina superior derecha
                return true;
            }else if(cor1<cor7 && cor2<cor8 && cor7<cor5 && cor8<cor6){ //Esquina superior Izquierda
                return true;
            }else if(cor1<cor7 && cor6<cor4 && cor7<cor5 && cor4<cor2 ){ //Esquina inferior izquierda
                return true;
            }else return false;
        }
        function actPuntaje(puntos){
            cadena=puntos.toString();
            cadena2="";
            for(let y=0;y<10;y++){
                if(y<10-cadena.length){
                    cadena2=cadena2+"0";
                }else{
                    cadena2=cadena2+cadena[y-10+cadena.length];
                }
            }
            return cadena2;
        }
        function mapear(){
            var x_map=parseInt(canv.width/lado);
            var y_map=parseInt(canv.height/lado);
            for(let i=0;i<x_map;i++){
                for(let j=0;j<y_map;j++){
                    if(j===y_map-1){
                        ctx.drawImage(suelo,i*lado,j*lado,lado,lado);
                    }else
                    ctx.drawImage(ladrillo,i*lado,j*lado,lado,lado);
                    if(i%4===0 && j%4===0){
                        ctx.drawImage(hueco,i*lado,j*lado,lado,lado);
                    }
                }
            }
            for(let z=0;z<comidas.length;z++){
                comidas[z].dibujar();
            }
            for(let i=0;i<comidas.length;i++){
                if(comparar(Naty.x,Naty.y,comidas[i].x,comidas[i].y)){
                    puntos=puntos+1000;
                    Puntaje.innerHTML=actPuntaje(puntos);
                    comidas[i].ran();
                }
            }
            for(let j=0;j<12;j++){ //huecos
                let xh=j%4;
                let yh=parseInt(j/4);
                xh=(xh*4*lado);
                yh=(yh*4*lado);
                if(comparar(Naty.x,Naty.y,xh,yh)){
                    Naty.x=500;
                    Naty.y=500;
                    Puntaje.innerHTML=actPuntaje(0);
                    puntos=0;
                    alert("Te caiste en un hueco!");
                }
            }
            Naty.dibujar();
        }
        var canv=document.getElementById("MiCanvas");
        var ctx=canv.getContext("2d");
        var img=document.getElementById("Naty");
        var ladrillo=document.getElementById("muro");
        var suelo=document.getElementById("piso");
        var hueco=document.getElementById("Agujero");
        var lado=50;
        var puntos=0;
        Naty=new naty(500,500,lado,document.getElementById("NatyD"),document.getElementById("NatyI"));
        var comidas=[];
        let comidaAg=new comida(300,300,lado,document.getElementById("fresa"),5000);
        comidas.push(comidaAg);
        comidaAg=new comida(200,200,lado,document.getElementById("fresa"),4000);
        comidas.push(comidaAg);
        comidaAg=new comida(100,100,lado,document.getElementById("fresa"),3000);
        comidas.push(comidaAg);
        mapear();
        document.addEventListener("keypress",function(direccion){Naty.mover(direccion)});
        setInterval(CambiarFondo,5000);
        </script>
    </body>
</html>