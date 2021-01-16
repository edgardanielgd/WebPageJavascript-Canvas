<html>
    <header><title>Manati</title><link rel="StyleSheet" type="text/css" href="Estilo.css" media=screen>
    <link rel="icon" href="https://natygift.000webhostapp.com/naty1.ico" type="https://natygift.000webhostapp.com/naty1.ico">
    </header>
    <body>
        <center>
        <form method="post" action=<?php $_SERVER["PHP_SELF"]?>>
            Awantaaaaaaa.... Esta en desarrollo <br><br>
            Super Contraseña: <input type="text" name="Password">            
        </form>
        </center>
    </body>
    <?php
    function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
    $IP_user=get_client_ip();
    $tiempo=new DateTime();
    file_put_contents("registro.txt",$IP_user." --- ".$tiempo->format('Y-m-d H:i:s')."\n",FILE_APPEND);
    if($_SERVER["REQUEST_METHOD"]==="POST")
    {
        if($_POST["Password"]==="chica feliz"){
            echo "<script>window.location.replace('mensaje1.php'); </script>";
        }
    }
    

    ?>
</html>