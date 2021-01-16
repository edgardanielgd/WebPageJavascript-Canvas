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
        </div>
        <div align="center">
        <canvas id="MiCanvas" style="background-color:white" width=800 height=600></canvas>
        </div>
        <script>
        var cambioY=40;
        var cambioX=20;
        function naty(x,y,l,natyI,natyD,vel=100){
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
                //METODOS
                this.dibujar=function(){
                    ctx.drawImage(this.natyM,x,y,l,l);
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
                            if(this.y+cambioY>canv.height){
                                    this.cayendo=false;
                                    clearInterval(tiempoY);
                                }else this.y=this.y+cambioY;
                        }
                    this.dibujar();
                };
                this.mover=function(direccion){
                        if(this.movi)return;
                        switch(direccion.key){
                            case "w":{
                                if(!cayendo && !subiendo){
                                    this.subiendo=true;
                                    this.moverY();
                                    tiempoY=setInterval(this.moverY,vel);
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
                        this.dibujar();
                    };
                //FUNCTION
                this.Habilitar();
                this.tiempo=setInterval(this.Habilitar,vel);
                this.dibujar();
        }
        var canv=document.getElementById("MiCanvas");
        var ctx=canv.getContext("2d");
        var img=document.getElementById("Naty");
        var Naty=new naty(100,100,50,document.getElementById("NatyD"),document.getElementById("NatyI"));
        document.addEventListener("keypress",Naty.mover);
        alert("Naty");
        </script>
    </body>
</html>