<?php
session_start();
require("../modelo/ModelsAmigos.php");
if (empty($_SESSION['firstname'])){
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>RED SOCIAL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/amigos.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.html">RED SOCIAL</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="home.html"><span class="glyphicon glyphicon-home"></span>&nbsp;Inicio</a></li>
      <li ><a href="perfil.html"><span class="glyphicon glyphicon-user"></span>&nbsp;Perfil</a></li>
      <li><a href="Photos.html"><span class="glyphicon glyphicon-picture"></span>&nbsp;Fotos</a></li>
      <li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;Amigos</a></li>
      <li><a href="chat.html"><span class="glyphicon glyphicon-envelope"></span>&nbsp;Mensaje</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Cerrar Sesion</a></li>
    </ul>
    <form class="navbar-form navbar-right"  >
      <div class="input-group" >
        <input type="text" class="form-control" placeholder="Search" name="search">
        
      </div>
    </form>
  </div>
</nav>


<div class="container">
    
	<div class="row">
  <?php                      
      $arrayUsuarios = ModelsAmigos::getAll();
      foreach ($arrayUsuarios as $Usuarios){
    ?>
        <div class="col-md-8">
            <div class="people-nearby">
              
              <div class="nearby-user">
                <div class="row">
                  <div class="col-md-2 col-sm-2">
                    <img src="upload/<?php echo $Usuarios->getimage()?>" alt="user" class="profile-photo-lg">
                  </div>
                  <div class="col-md-7 col-sm-7">
                    <h5><a href="#" class="profile-link"><?php echo $Usuarios->getFirstname()?></a></h5>
                    <p>Software Engineer</p>
                    <p class="text-muted">500m away</p>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <button class="btn btn-danger pull-right">Eliminar Amigo</button>
                  </div>
                </div>
              </div>
     
            </div>
      </div>
      <?php } ?>
	</div>
	
    
</div>

</body>
</html>

