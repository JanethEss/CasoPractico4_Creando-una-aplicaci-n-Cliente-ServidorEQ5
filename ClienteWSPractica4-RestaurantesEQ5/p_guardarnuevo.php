<?php
    $nombre=$_POST['nombre'];
    $telefono=$_POST['telefono'];
    $calle=$_POST['calle'];
    $numero=$_POST['numero'];
    $colonia=$_POST['colonia'];
    $cp=$_POST['cp'];
    $ciudad=$_POST['ciudad'];
    $calificacion=$_POST['calificacion'];
    
    $restaurante=new SoapClient(
        null, array(
            'location'=>'https://ws-restaurante.000webhostapp.com/WS-Restaurantes.php',
            'uri'=>'https://ws-restaurante.000webhostapp.com/WS-Restaurantes.php',
            'trace'=>1
        )            
    );
    try {
        $respuesta=$restaurante-> __soapCall("Insertar",[$nombre,$telefono,$calle,$numero,$colonia,$cp,$ciudad,$calificacion]);
        if($respuesta==1){
            header("Location: http://localhost/ClienteWSPractica4-RestaurantesEQ5/index.php");
            die();            
        }else{
            //echo 'No se pudo registrar el restaurante';
        }
    } catch (SoapFault $e) {
        echo $e->getMessage();
    }

?>