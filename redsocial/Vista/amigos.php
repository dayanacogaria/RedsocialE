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

<?php require("snippers/nav.php");?>

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
                    <h5><a href="#" class="profile-link"><?php echo $Usuarios->getFirstname()?>&nbsp;<?php echo $Usuarios->getLastname()?></a></h5>
                    <p><?php echo $Usuarios->getWork()?></p>
                    
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

