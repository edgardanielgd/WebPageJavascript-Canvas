var fondoID=1;
var nFondoIds=5;
function CambiarFondo(){
    if(fondoID===nFondoIds){
        fondoID=1;
    }else fondoID=fondoID+1;
    switch(fondoID){
        case 1:{
            document.body.style.background="url('manati.jpg') no-repeat";
            break;
        }
        case 2:{
            document.body.style.background="url('frida.jpg') no-repeat";
            break;
        }
        case 3:{
            document.body.style.background="url('curie.jpg') no-repeat";
            break;
        }
        case 4:{
            document.body.style.background="url('arduino.jpg') no-repeat";
            break;
        }
        case 5:{
            document.body.style.background="url('noche.jpg') no-repeat";
            break;
        }
    }
    document.body.style.backgroundSize="cover";
}