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

$service = new serverfile();
$servicio=new Servicio();

   $transferlist = $service->Getlista();

if(!empty($transferlist)){

if(isset($_GET['idtransacciones'])){

$transferlist = $servicio->buscar($transferlist,'idtransacciones',$_GET['idtransacciones']);


}

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/framework/bootstrap.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen">    
    <title>Inicio</title>
</head>
<body>
    


 <header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">Inicio</h4>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Follow on Twitter</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="index.php" class="navbar-brand d-flex align-items-center">
        <strong>Inicio</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main role="main">

  <section class="jumbotron text-center">
    <div class="col-4 container">
      <h1>Transaction System</h1>
      <br>
      <p>
        <a href="add.php" class="btn btn-block btn-lg btn-outline-success my-2">New Transaction&nbsp;&nbsp;&nbsp;  <i class="fas fa-paper-plane"></i></a>
      </p>
    </div>
  </section>

  <div class="album bg-light container">
    <div class="row">
      
      <?php if (empty($transferlist)) : ?>

                  <?php else : ?>

                  <?php foreach ($transferlist as $transaction) : ?>
                    <div class="card-body">
                    <div class="row">

                  <div class="col ">
                      <div class="card border-success mb-4 letra" style="width: 18rem;">

                          <div class="card-body text-center">

                          <div class="card-header">
                          <p class="card-text ">
                                <i class="fas fa-id-card"></i> &nbsp;&nbsp;&nbsp;&nbsp;ID:<?php echo $transaction->id;?>
                              </p>
                          </div>
                              <br>
                              <p class="card-text ">
                                <i class="fas fa-money-check"></i>&nbsp;&nbsp;&nbsp;&nbsp; Amount:&nbsp;<?php echo $transaction->monto;?>
                              </p>

                              <p class="card-text">
                                <i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp; Date:&nbsp;<?php echo $transaction->fecha?>
                              </p>

                              <p class="card-text">
                                <i class="fas fa-pen-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp; Description:&nbsp;<?php echo $transaction->descripcion;?>
                              </p>
                              <br>
                              <center>
                              <div class="btn-group">
                             
                                <a class="btn btn-sm btn-outline-primary" href="update.php?id=<?php echo $transaction->id; ?>">
                                       &nbsp;&nbsp;    Edit&nbsp;&nbsp; <i class="  far
                                      fa-edit"></i> </a>
                             
                              <a class="btn btn-sm btn-outline-danger" href="delete.php?id=<?php echo $transaction->id; ?>" onclick="return confirmar()">&nbsp;&nbsp;  Delete&nbsp;&nbsp; <i class="far fa-trash-alt"></i></a>
                           
                              </div>
                                
                            </center>

                          </div>
                      </div>
                  </div>
                  </div>
                  </div>

                  <?php endforeach; ?>
                  <?php endif; ?>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="assets/js/libreria/bootstrap.min.js"></script>
<script src="assets/js/index.js"></script>
<script src="assets/js/sweetalert.js"></script>
</html>