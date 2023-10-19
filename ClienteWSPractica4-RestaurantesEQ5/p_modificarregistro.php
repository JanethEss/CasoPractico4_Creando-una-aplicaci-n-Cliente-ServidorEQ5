<?php
    $id_restaurant=$_REQUEST['id_restaurant'];
    $nombre=$_REQUEST['nombre'];
    $telefono=$_REQUEST['telefono'];
    $calle=$_REQUEST['calle'];
    $numero=$_REQUEST['numero'];
    $colonia=$_REQUEST['colonia'];
    $cp=$_REQUEST['cp'];
    $ciudad=$_REQUEST['ciudad'];
    $calificacion=$_REQUEST['calificacion'];
    
    $restaurante=new SoapClient(
        null, array(
            'location'=>'https://ws-restaurante.000webhostapp.com/WS-Restaurantes.php',
            'uri'=>'https://ws-restaurante.000webhostapp.com/WS-Restaurantes.php',
            'trace'=>1
        )            
    );
    try {
        $respuesta=$restaurante-> __soapCall("Modificar",[$id_restaurant,$nombre,$telefono,$calle,$numero,$colonia,$cp,$ciudad,$calificacion]);
        if($respuesta==1){
            header("Location: http://localhost/ClienteWSPractica4-RestaurantesEQ5/index.php");
            die();
            //echo 'Se ha modificado el registro: '.$id_restaurant;
        }else{
            echo 'No se pudo modificar el registro, intentelo mas tarde.';
        }
    } catch (SoapFault $e) {
        echo $e->getMessage();
    }

?>