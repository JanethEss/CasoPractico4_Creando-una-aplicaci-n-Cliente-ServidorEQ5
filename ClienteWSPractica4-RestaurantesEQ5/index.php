<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="home.css">
    <link rel="shortcut icon" href="WSR.ico" type="image/x-icon">

    <title>Cliente Web Service de Restaurantes</title>
</head>
<body>
<div class="container mt-3">
  <div class="row justify-content-md-center">
    <div class="col-md-12">
      <h1 class="text-center mt-3">Caso practico 4. Creando una aplicación cliente-servidor</h1>
      <p class="text-center">Web service Restaurantes EQ5</p>
        
        <hr class="mb-3">
    </div>


    <div class="col-md-3 mb-2">
      <h3 class="text-center">Datos del restaurant</h3>
      <form action="p_guardarnuevo.php" method="post">
        
        <div class="mb-3">
          <label class="form-label">Nombre</label>
          <input type="text" class="form-control" name="nombre" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Telefono</label>
          <input type="text" name="telefono" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Calle</label>
          <input type="text" name="calle" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Numero</label>
          <input type="text" name="numero" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Colonia</label>
          <input type="text" name="colonia" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">CP</label>
          <input type="text" name="cp" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Ciudad</label>
          <input type="text" name="ciudad" class="form-control" required>
        </div>    
        <div class="mb-3">
          <label>Calificaci&oacute;n</label>
          <select class="form-select" name="calificacion" type="text" id="section" required>
            <option value="0">Asigne una puntuaci&oacute;n ⭐</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
        

        <div class="d-grid gap-2 col-12 mx-auto">
        <input type="submit" value="Agregar restaurant" class="btn btn-primary mt-3 mb-2">              
        </div>
        
      </form>
    </div>
    <?php
    //web service
    $restaurante=new SoapClient(
        null, array(
            'location'=>'https://ws-restaurante.000webhostapp.com/WS-Restaurantes.php',
            'uri'=>'https://ws-restaurante.000webhostapp.com/WS-Restaurantes.php',
            'trace'=>1
        )            
    );
    ?>
    <div class="col-md-9">
    <h3 class="text-center">Lista de Alumnos</h3>
      <div class="row">
        <div class="col-md-12 p-2">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  
                  <th scope="col">Id</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Telefono</th>
                  <th scope="col">Calle</th>
                  <th scope="col">Numero</th>
                  <th scope="col">Colonia</th>
                  <th scope="col">CP</th>
                  <th scope="col">Ciudad</th>
                  <th scope="col text-center">⭐</th>
                </tr>
              </thead>
              <tbody>
                
              <?php

                try {
                    $respuesta=$restaurante-> __soapCall("Visualizar",[]);
                    $result=json_encode($respuesta,true);
                    $datos=json_decode($result,true);
                    echo '<tr>';
                    foreach ($datos as $item) {
                        echo '<tr>';
                        echo '<td>'.$item['id_restaurant'].'</td>';
                        echo '<td>'.$item['nombre'].'</td>';
                        echo '<td>'.$item['telefono'].'</td>';
                        echo '<td>'.$item['calle'].'</td>';
                        echo '<td>'.$item['numero'].'</td>';
                        echo '<td>'.$item['colonia'].'</td>';
                        echo '<td>'.$item['cp'].'</td>';
                        echo '<td>'.$item['ciudad'].'</td>';
                        echo '<td class="text-center">'.$item['calificacion'].'</td>';
                        ?>
                        <td>                                                                            
                             <form action="modificar.php?id_restaurant=10" method="post">                              
                                <!--Poner la informacion de la fila del registro en inputs para enviarlos a modificar.php--> 
                                <input type="text" name="id_restaurant"  value="<?php echo $item['id_restaurant']?>" hidden>
                                <input type="text" name="nombre"  value="<?php echo $item['nombre']?>" hidden> 
                                <input type="text" name="telefono"  value="<?php echo $item['telefono']?>" hidden> 
                                <input type="text" name="calle"  value="<?php echo $item['calle']?>" hidden>         
                                <input type="text" name="numero"  value="<?php echo $item['numero']?>" hidden> 
                                <input type="text" name="colonia"  value="<?php echo $item['colonia']?>" hidden> 
                                <input type="text" name="cp"  value="<?php echo $item['cp']?>" hidden> 
                                <input type="text" name="ciudad"  value="<?php echo $item['ciudad']?>" hidden>
                                <input type="text" name="calificacion"  value="<?php echo $item['calificacion']?>" hidden> 
                              <input type="submit" value="✎ Modificar" class="btn btn-info mb-2">
                          </form>

                          <form action="p_eliminarregistro.php" method="post">                              
                              <input type="text" name="id_restaurant"  value="<?php echo $item['id_restaurant']?>" hidden>        
                              <input type="submit" value="🗑️ Eliminar" class="btn btn-danger mb-2">
                          </form>
                        </td>
                        <?php
                        echo '</tr>';
                    }
                    echo '</tr>';
                } catch (\Throwable $th) {
                    echo "error";
                }
                ?>              
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!--
    <?php
    include('mensajes.php'); 
    ?>
-->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
    $(function(){
    $('.toast').toast('show');
    });
    </script>

</body>
</html>