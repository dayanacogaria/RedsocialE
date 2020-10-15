<?php


require_once (__DIR__.'/../controlador/controladorPerfil.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>RED SOCIAL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/perfil.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<?php require("snippers/nav.php");?>


<div class="container">
<?php
    $DataEspecialidad = controladorPerfil::buscarID($_GET["id"]);
?>
	
	<div class="row">
		<div class="col-xs-12 col-md-4 col-lg-3">
			<div class="userProfileInfo">
				<div class="image text-center">
					<img src="upload/<?php echo $DataEspecialidad->getImage();?>" alt="#" class="img-responsive">
				
				</div>
				<div class="box" >
					<div class="name"><strong><?php echo $DataEspecialidad->getfirstname(); ?>&nbsp;<?php echo $DataEspecialidad->getlastname(); ?></strong></div>
                 <br>
                 
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    cambiar foto
                    </button>
                    <br>    <br>
                </div>
            
			</div>
		</div>
  
    <?php if(!empty($_GET["id"]) && isset($_GET["id"])){ ?>
    
		<div class="col-xs-12 col-md-8 col-lg-9">
			<div class="box">
				 <form class="form-horizontal" action="../controlador/controladorPerfil.php?action=editar" method="post" ></br>
                                       
                    <div class="form-group">
                        <label  class="col-lg-4 control-label">Usuario</label>
                        <div class="col-lg-6">
                          <input type="text" class="form-control" id="username" name="username" value="<?php echo $DataEspecialidad->getusername(); ?>"
                                 >
                        </div>
                      </div>
                    
                                       
                      <div class="form-group">
                        <label for="" class="col-lg-4 control-label">Contraseña</label>
                        <div class="col-lg-6">
                          <input type="password" class="form-control" id="password" name="password" value="<?php echo $DataEspecialidad->getpassword(); ?>"
                                 >
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-lg-4 control-label">Nombre</label>
                        <div class="col-lg-6">
                          <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $DataEspecialidad->getfirstname(); ?>"
                                 >
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-lg-4 control-label">Apellido</label>
                        <div class="col-lg-6">
                        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $DataEspecialidad->getlastname(); ?>"
                                 >
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-lg-4 control-label">Genero</label>
                        <div class="col-lg-6">
                        <select class="form-control" id="gender" name="gender">
                        <option value="<?php echo $DataEspecialidad->getgender(); ?>"><?php echo $DataEspecialidad->getgender(); ?> </option>
                        <option>Seleccione...</option>
                        </select>
                        
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-lg-4 control-label">Direccion</label>
                        <div class="col-lg-6">
                          <input type="text" class="form-control" id="address" name="address"  value="<?php echo $DataEspecialidad->getaddress(); ?>"
                                 >
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-lg-4 control-label">Fecha Nacimiento</label>
                        <div class="col-lg-6">
                          <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php echo date('Y-m-d', strtotime($DataEspecialidad->getbirthdate())) ?>"
                                 >
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-lg-4 control-label">Celular</label>
                        <div class="col-lg-6">
                          <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $DataEspecialidad->getmobile(); ?>"
                                 >
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="" class="col-lg-4 control-label">Trabajo</label>
                        <div class="col-lg-6">
                          <input type="text" class="form-control" id="work" name="work" value="<?php echo $DataEspecialidad->getwork(); ?>"
                                 >
                                 <input id="member_id" name="member_id" value="<?php echo $_SESSION['member_id'] ?>" hidden/>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <button class="btn btn-info btn-lg" type="submit">
                           Actualizar
                         </button> 
                      </div>
  </form>
    <?php }?>
    
							
			
		</div>
	</div>
    
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  method="post" enctype="multipart/form-data" action="../controlador/controladorRegistrar.php?action=iditarimagen">
      <div class="modal-body">
      <div class="form-group">
              <label for="prodfoto">Foto</label>
              <input type="file" class="form-control" id="fotousuario" name="fotousuario" lang="es" required>
            </div>
      </div>
      <div class="modal-footer">
      <input class="form-control form-control-sm" type="text" id="member_id" name="member_id" value="<?php echo $_SESSION['member_id'] ?>">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>

