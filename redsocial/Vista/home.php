<?php
session_start();
require("../modelo/ModelsHome.php");
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
  <link href="css/home.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<?php require("snippers/nav.php");?>


<div class="container">
    
	
	<div class="row">
		<div class="col-xs-12 col-md-4 col-lg-3">
			<div class="userProfileInfo">
				<div class="image text-center">
					<img src="upload/<?php echo $_SESSION['image'] ?>" alt="#" class="img-responsive">
					
                    <button type="button" class="editImage" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-camera"></i>
                    </button>
				</div>
				<div class="box">
					<div class="name"><strong><?php echo $_SESSION['firstname'] ?></strong></div>
					<div class="info">
						<span><i class="fa fa-fw fa-mobile"></i> <a href="tel:+4210555888777" title="#">(1)577235 </a></span>
						<span><i class="fa fa-fw fa-calendar"></i> <a href="#" title="#">27/05/1995</a></span>
						<span><i class="fa fa-fw fa-home"></i> calle x 54-9</span>
					</div>
				
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-md-8 col-lg-9">
			<div class="box">
				
					<div class="post-editor">

                        <textarea name="post-field" id="post-field" class="post-field" placeholder="¿que estas pensando?"></textarea> 
                        <div class="d-flex">
                        <button class="btn btn-info px-4 py-1">Compartir</button>
                   </div>
             </div>

             <?php                      
                    $arrayUsuarios = ModelsHome::getAll();
                    foreach ($arrayUsuarios as $Usuarios){
              ?>
          <div class="stream-post">
                <div class="sp-author">
                    <a href="#" class="sp-author-avatar"><img src="upload/<?php echo $Usuarios->getImage () ?>" alt=""></a>
                    <h6 class="sp-author-name"><?php echo $Usuarios->getfirstname() ?></h6></div>
                <div class="sp-content">
                    <div class="sp-info"><h6><?php echo $Usuarios->getfirstname() ?></h6></div>
                    <p class="sp-paragraph mb-0"><?php echo $Usuarios->getcontent() ?></p>
                </div>
               
            </div>
        	<?php } ?>
         

            
							
			
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

