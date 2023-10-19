<?php
    $id_restaurant=$_POST['id_restaurant'];
    
    $restaurante=new SoapClient(
        null, array(
            'location'=>'https://ws-restaurante.000webhostapp.com/WS-Restaurantes.php',
            'uri'=>'https://ws-restaurante.000webhostapp.com/WS-Restaurantes.php',
            'trace'=>1
        )            
    );
    try {
        $respuesta=$restaurante-> __soapCall("Eliminar",[$id_restaurant]);
        if($respuesta==1){
            header("Location: http://localhost/ClienteWSPractica4-RestaurantesEQ5/index.php");
            die();
        }else{
            //echo 'No se pudo eliminar el registro';
        }
    } catch (SoapFault $e) {
        echo $e->getMessage();
    }

?>