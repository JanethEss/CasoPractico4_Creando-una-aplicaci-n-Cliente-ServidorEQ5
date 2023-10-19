<?php
    class Restaurante{
        //CREATE
        public function Insertar($nombre,$telefono,$calle,$numero,$colonia,$cp,$ciudad,$calificacion){
            include 'conexion.php';
            $conectar = new Conexion();
            $consulta=$conectar->prepare("INSERT INTO restaurantes_tuxtla (nombre,telefono,calle,numero,colonia,cp,ciudad,calificacion) VALUES (:nombre,:telefono,:calle,:numero,:colonia,:cp,:ciudad,:calificacion)");
            $consulta->bindParam(":nombre",$nombre,PDO::PARAM_STR);
            $consulta->bindParam(":telefono",$telefono,PDO::PARAM_STR);
            $consulta->bindParam(":calle",$calle,PDO::PARAM_STR);
            $consulta->bindParam(":numero",$numero,PDO::PARAM_STR);
            $consulta->bindParam(":colonia",$colonia,PDO::PARAM_STR);
            $consulta->bindParam(":cp",$cp,PDO::PARAM_STR);
            $consulta->bindParam(":ciudad",$ciudad,PDO::PARAM_STR);
            $consulta->bindParam(":calificacion",$calificacion,PDO::PARAM_STR);
            $consulta->execute();
            return 1;
        }
        //READ
        public function Visualizar(){
            include 'conexion.php';
            $conectar = new Conexion();
            $consulta=$conectar->prepare("SELECT * FROM restaurantes_tuxtla");
            $consulta->execute();
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            return $consulta->fetchAll();
        }
        //UPDATE
        public function Modificar($id_restaurant,$nombre,$telefono,$calle,$numero,$colonia,$cp,$ciudad,$calificacion){
            include 'conexion.php';
            $conectar = new Conexion();
            $consulta=$conectar->prepare("UPDATE restaurantes_tuxtla SET 
                nombre=:nombre,
                telefono=:telefono,
                calle=:calle,
                numero=:numero,
                colonia=:colonia,
                cp=:cp,
                ciudad=:ciudad,
                calificacion=:calificacion WHERE id_restaurant=:id_restaurant");
            $consulta->bindParam(":id_restaurant",$id_restaurant,PDO::PARAM_STR);
            $consulta->bindParam(":nombre",$nombre,PDO::PARAM_STR);
            $consulta->bindParam(":telefono",$telefono,PDO::PARAM_STR);
            $consulta->bindParam(":calle",$calle,PDO::PARAM_STR);
            $consulta->bindParam(":numero",$numero,PDO::PARAM_STR);
            $consulta->bindParam(":colonia",$colonia,PDO::PARAM_STR);
            $consulta->bindParam(":cp",$cp,PDO::PARAM_STR);
            $consulta->bindParam(":ciudad",$ciudad,PDO::PARAM_STR);
            $consulta->bindParam(":calificacion",$calificacion,PDO::PARAM_STR);            
            $consulta->execute();
            return 1;
        }
         //DELETE
         public function Eliminar($id_restaurant){
            include 'conexion.php';
            $conectar = new Conexion();
            $consulta=$conectar->prepare("DELETE FROM restaurantes_tuxtla WHERE id_restaurant=:id_restaurant");
            $consulta->bindParam(":id_restaurant",$id_restaurant,PDO::PARAM_STR);
            $consulta->execute();        
            return 1;            
        }           
    }
    try {
        $server=new SoapServer(
            null,
            ['uri'=>'https://ws-restaurante.000webhostapp.com/WS-Restaurantes.php',]
        );
        $server->setClass('Restaurante');
        $server->handle();
        echo 'Servidor de restaurantes en linea ';
    } catch (SOAPFault $e) {
        echo 'Error: '.$e->getMessage();
        exit;
    }
?>