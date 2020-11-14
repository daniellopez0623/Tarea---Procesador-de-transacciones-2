<?php

require_once 'services.php';
require_once 'class.php';
require_once 'Iserviceprim.php';
require_once 'servercookie.php';
require_once 'IfileHandler.php';
require_once 'JsonFile.php';
require_once 'serverfile.php';
require_once 'serializationFile.php';
require_once 'JsonFilecsv.php';
include 'log.php'; 

$service = new serverfile();
$servicio=new Servicio();
 
 if(isset($_GET['id'])){

$idtransacciones=$_GET['id'];
$elemento=$service->GetByid($idtransacciones);


if (isset($_POST['monto']) && isset($_POST['fecha']) && isset($_POST['descripcion'])) {
$log="Trasaccion editada del ID($idtransacciones) ";
logger($log);
  $actualizar=new transacciones();
  $actualizar->iniciodatos($idtransacciones, $_POST['monto'], $_POST['fecha'], $_POST['descripcion']);
   
 $service->editar($idtransacciones,$actualizar);

   header("location: index.php");
   exit();

 }
 }else{


header("location: index.php");
   exit();

 }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/framework/bootstrap.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen">    
    <title> Update  </title>
</head>
<body>
    


 <header>
 
  <div class="navbar navbar-dark bg-primary shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="index.php" class="navbar-brand d-flex align-items-center">
        
        <strong><i class="fas fa-home"></i>  &nbsp;Inicio</strong>
      </a>
    </div>
  </div>
</header>

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1>Editar Transacion</h1>
    </div>
  </section>
  <div class="row ">
  <div class="container">
  <div class="album py-5 bg-light">

  <div class="row"></div>
        <div class="col-md-6"></div>
        <div class="col-md-12 form">


        <div class="card">
               
                <div class="card-body">

                    <form action="update.php?id=<?php echo $elemento->id; ?>"
                        method="post">
                        <div class="form-group text-center ">
                            <label for="id">ID:</label>
                            <input type="text" value=<?php echo $elemento->id; ?> class="form-control " id="id" name="id"
                                placeholder="" disabled>
                        </div>
                        <div class="form-group">
                            <label for="monto">Amount:</label>
                            <input type="text" value=<?php echo $elemento->monto; ?> class="form-control" id="monto"
                                name="monto" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="fecha">Date:</label>
                            <input type="text" value=<?php echo $elemento->fecha; ?> class="form-control" id="fecha"
                                name="fecha" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Description:</label>
                            <input type="text" value=<?php echo $elemento->descripcion; ?> class="form-control" id="descripcion"
                                name="descripcion" placeholder="">
                        </div>


                        <br>
                        <center>
                          <div class="btn-group">
                            <a href="index.php" class="btn btn-outline-secondary">Go back&nbsp;&nbsp; <i
                                    class="fas fa-reply-all"></i></a>
                            <button type="submit" class="btn btn-outline-success">Edit Transaction &nbsp;&nbsp; <i
                                    class="fas fa-paper-plane"></i></button>
                                    </div>
                        </center>

                </div>
                </form>
            </div>


        </div>
    
<div class="row"></div>
        <div class="col-md-6"></div>

     
    </div>
    </div>
    </div>

</main>

<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
    <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p>New to Bootstrap? <a href="https://getbootstrap.com/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer>


</body>
<script src="https://kit.fontawesome.com/96e239109c.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</html>