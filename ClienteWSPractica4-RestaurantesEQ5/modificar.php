<?php
//RECIBIR LOS DATOS DEL REGISTRO EN LA TABLA DEL INDEX
    $id_restaurant=$_REQUEST['id_restaurant'];
    $nombre=$_REQUEST['nombre'];
    $telefono=$_REQUEST['telefono'];
    $calle=$_REQUEST['calle'];
    $numero=$_REQUEST['numero'];
    $colonia=$_REQUEST['colonia'];
    $cp=$_REQUEST['cp'];
    $ciudad=$_REQUEST['ciudad'];
    $calificacion=$_REQUEST['calificacion'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="home.css">
    <link rel="shortcut icon" href="WSR.ico" type="image/x-icon">

    <title>Modificar - Cliente Web Service de Restaurantes</title>
</head>
<body>    
<!--Tabla con diseño-->      
    
<div class="container mt-3">
  <div class="row justify-content-md-center">
    <div class="col-md-12">
      <h1 class="text-center mt-3">
        <a href="./">
          <i class="bi bi-arrow-left-circle"></i>
        </a>
        Actualizar Datos del Restaurante 
      </h1>
      <hr class="mb-3">
    </div>
    
    <div class="col-md-6 mb-2">
      <h3 class="text-center">Datos del Restaurant</h3>
      <form method="post" action="p_modificarregistro.php">
      <input type="text" name="id_restaurant" value="<?php echo $id_restaurant?>" hidden>
      <!--Modificar nombre-->      
      <div class="mb-3 alado">
        <label for="" >Nombre&nbsp&nbsp</label>
        <input type="text" name="nombre" value="<?php echo $nombre?>" class="form-control">
      </div>
      <!--Modificar nombre-->      
      <div class="mb-3 alado">
        <label for="" >Telefono&nbsp&nbsp</label>
        <input type="text" name="telefono" value="<?php echo $telefono?>" class="form-control">
      </div>
      <!--Modificar calle-->      
      <div class="mb-3 alado">
        <label for="" >Calle&nbsp&nbsp</label>
        <input type="text" name="calle" value="<?php echo $calle?>" class="form-control">
      </div>
      <!--Modificar numero-->      
      <div class="mb-3 alado">
        <label for="" >Numero&nbsp&nbsp</label>
        <input type="text" name="numero" value="<?php echo $numero?>" class="form-control">
      </div>
      <!--Modificar colonia-->      
      <div class="mb-3 alado">
        <label for="" >Colonia&nbsp&nbsp</label>
        <input type="text" name="colonia" value="<?php echo $colonia?>" class="form-control">
      </div>
      <!--Modificar colonia-->      
      <div class="mb-3 alado">
        <label for="" >CP&nbsp&nbsp</label>
        <input type="text" name="cp" value="<?php echo $cp?>" class="form-control">
      </div>
      <!--Modificar ciudad-->      
      <div class="mb-3 alado">
        <label for="" >Ciudad&nbsp&nbsp</label>
        <input type="text" name="ciudad" value="<?php echo $ciudad?>" class="form-control">
      </div>
      <!--Modificar calificacion -->  
      <div class="mb-3 alado">
        <label for="">Calificaci&oacute;n&nbsp&nbsp</label>
        <select class="form-select" name="calificacion" type="text" id="section">
          <?php  
          if($calificacion =="1"){
            echo '<option value="1" selected>1</option>';
            echo '<option value="2">2</option>';
            echo '<option value="3">3</option>';
            echo '<option value="4">4</option>';
            echo '<option value="5">5</option>';
          }elseif($calificacion =="2"){
            echo '<option value="2" selected>2</option>';
            echo '<option value="1">1</option>';
            echo '<option value="3">3</option>';
            echo '<option value="4">4</option>';
            echo '<option value="5">5</option>';
          }elseif($calificacion =="3"){
            echo '<option value="3" selected>3</option>';
            echo '<option value="1">1</option>';
            echo '<option value="2">2</option>';
            echo '<option value="4">4</option>';
            echo '<option value="5">5</option>';
          }elseif($calificacion =="4"){
            echo '<option value="4" selected>4</option>';
            echo '<option value="1">1</option>';
            echo '<option value="2">2</option>';
            echo '<option value="3">3</option>';
            echo '<option value="5">5</option>';
          }else{
            echo '<option value="5" selected>5</option>';
            echo '<option value="1">1</option>';
            echo '<option value="2">2</option>';
            echo '<option value="3">3</option>';
            echo '<option value="4">4</option>';
          }
          ?>
          </select>
        </div>     

        <div class="d-grid gap-2 col-12 mx-auto">
          <button type="submit" class="btn  btn btn-primary mt-3 mb-2">
            Actualizar datos del restaurante
            <i class="bi bi-arrow-right-circle"></i>
          </button>
        </div>      
      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>