<?php
session_start();
require("../modelo/Modelsfotos.php");
if (empty($_SESSION['firstname'])){
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/Photos.css">
    <title>Photos</title>
</head>

<body class="body_format">
    

<?php require("snippers/nav.php");?>



    <div class="container container_format">
        <div class="row">
            <div class="col-md-6">
                <span>Mis Fotos</span>
            </div>
            <div class="col-md-6">
                <i class="fa fa-cloud-upload fa-3x"  data-toggle="modal" data-target="#exampleModal" data-toggle="tooltip" data-placement="top" title="Cargar Fotografia"></i>
            </div>
          </div>
    </div>

    <div class="container container_format">
      
        <div class="row">
            <div class="col-md-12">
              <div id="sc_photo">
                <span>Seccion Fotografica</span>
              </div>
            </div>
          </div>

          <div id="__alert" class="alert alert-success" role="alert" style="display: none;">Registro Eliminado</div>
          
    </div>
    <div class="container container_format">
    <div class="row">
    <?php                      
      $arrayUsuarios = Modelsfotos::getAll();
      foreach ($arrayUsuarios as $Usuarios){
    ?>
  <div class="col-md-4">
    <div class="thumbnail">
      <a href="/w3images/lights.jpg">
        <img src="upload/<?php echo $Usuarios->getLocation() ?>" alt="Lights" style="width:100%">
        <div class="caption">
          <p>Lorem ipsum...</p>
        </div>
      </a>
    </div>
  </div>
      <?php } ?>
  
  
</div>
</div>


    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header modal-header-format">
          <h5 class="modal-title" id="exampleModalLabel">Carga de Fotografias</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="file-loading">
            <input id="input-b9" name="input-b9[]" multiple type="file"'>
          </div>
          <div id="kartik-file-errors"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary btn_format" title="Your custom upload logic">Cargar</button>
        </div>
      </div>
    </div>
  </div>

 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/Photo.js"></script>

</body>

</html>