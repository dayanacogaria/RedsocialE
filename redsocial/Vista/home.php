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
					<a href="#" title="#" class="editImage">
						<i class="fa fa-camera"></i>
					</a>
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
                                        $arrEspecialidades = ModelsHome::getAll();
                                        foreach ($arrEspecialidades as $post){​​
              ?>
                         <?php echo $post->getcontent() ?>
          <!-- <div class="stream-post">
                <div class="sp-author">
                    <a href="#" class="sp-author-avatar"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt=""></a>
                    <h6 class="sp-author-name">Palmira Guthridge</h6></div>
                <div class="sp-content">
                <h6 class="sp-author-name">Palmira Guthridge</h6></div>
                    <div class="sp-info">posted 1h ago</div>
                    <p class="sp-paragraph mb-0">Auk Soldanella plainscraft acetonylidene wolfishness irrecognizant Candolleaceae provision Marsipobranchii arpen Paleoanthropus supersecular inidoneous autoplagiarism palmcrist occamy equestrianism periodontoclasia mucedin overchannel goelism decapsulation pourer zira</p>
                </div>
               
            </div>-->
       <?php }​​ ?>		
         

            
							
			
		</div>
	</div>
    
</div>

</body>
</html>

