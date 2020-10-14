<?php
session_start();
require("../modelo/ModelsRegistar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
 
    <title>RED SOCIAL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    

</head>
<body>
<div class="container bootstrap snippets bootdey">
    <div class="row login-page"> 
        <div class="col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4"> 
    		<img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="user-avatar img-thumbnail"> 
    		<h1>RED SOCIAL</h1> 
    		<form role="form" class="ng-pristine ng-valid" action="../controlador/controladorRegistrar.php?action=Login" method="post"> 
    			<div class="form-content"> 
    				<div class="form-group"> 
    					<input type="text" class="form-control input-underline input-lg" placeholder="Usuario" id= "usuario" name="usuario"> 
    				</div> 
    				<div class="form-group"> 
    					<input type="password" class="form-control input-underline input-lg" placeholder="Contraseña" id="contrasena" name="contrasena"> 
    				</div> 
    			</div> 
    			<button  class="btn btn-info btn-lg" type="submit">
                  INICIAR SESION
</button> &nbsp; 
    			<a type="button" href="registrar.php" class="btn btn-info btn-lg">REGISTRARSE</a>
    		</form> 
    	</div> 
    </div>
</div>
<script src="js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>