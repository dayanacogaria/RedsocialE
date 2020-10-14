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
    <link href="css/register.css" rel="stylesheet">
    

</head>
<body>
<div class="container bootstrap snippets bootdey">
    <div class="row login-page"> 
        <div class="col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4"> 
    		<img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="user-avatar img-thumbnail"> 
    		<h1>RED SOCIAL</h1> 
    		<form class="form-horizontal" action="../controlador/controladorRegistrar.php?action=crear" method="post"></br>
           
                
             
                <div class="form-group">
                    <label  class="col-lg-4 control-label">Usuario</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" id="usuario" name="usuario"
                             >
                    </div>
                  </div>
                
                
                
                  <div class="form-group">
                    <label for="" class="col-lg-4 control-label">Contraseña</label>
                    <div class="col-lg-6">
                      <input type="password" class="form-control" id="contrasena" name="contrasena"
                             >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-lg-4 control-label">Nombre</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" id="nombre" name="nombre"
                             >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-lg-4 control-label">Apellido</label>
                    <div class="col-lg-6">
                    <input type="text" class="form-control" id="apellido" name="apellido"
                             >sss
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-lg-4 control-label">Genero</label>
                    <div class="col-lg-6">
                    <select class="form-control" id="genero" name="genero">
                    <option>Seleccione...</option>
                    <option>Masculino</option>
                    <option>Femenino</option>
                    </select>
                    
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-lg-4 control-label">Direccion</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" id="direccion" name="direccion"
                             >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-lg-4 control-label">Fecha Nacimiento</label>
                    <div class="col-lg-6">
                      <input type="date" class="form-control" id="fechan" name="fechan"
                             >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-lg-4 control-label">Celular</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" id="cel" name="cel"
                             >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-lg-4 control-label">Trabajo</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" id="trabajo" name="trabajo"
                             >
                    </div>
                  </div>
                  

                                       
										<button class="btn btn-info btn-lg"  type="submit">
                   REGISTRAR
    			</button> &nbsp; 
    			<a type="button" class="btn btn-info btn-lg" href="login.html">INICIAR SESION</a>
									</form>
    	</div> 
    </div>
</div>



</body>
</html>