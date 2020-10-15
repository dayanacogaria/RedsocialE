
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">RED SOCIAL</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Inicio</a></li>
      <li><a href="perfil.php?id=<?php echo $_SESSION['member_id'];?>"><span class="glyphicon glyphicon-user"></span>&nbsp;Perfil</a></li>
      <li><a href="Photos.php"><span class="glyphicon glyphicon-picture"></span>&nbsp;Fotos</a></li>
      <li><a href="amigos.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Amigos</a></li>
      <li><a href="chat.html"><span class="glyphicon glyphicon-envelope"></span>&nbsp;Mensaje</a></li>
      <li><a href="../Controlador/controladorRegistrar.php?action=CerrarSession" ><span class="glyphicon glyphicon-log-out"></span>&nbsp;Cerrar Sesion</a></li>
    </ul>
    <form class="navbar-form navbar-right"  >
      <div class="input-group" >
        <input type="text" class="form-control" placeholder="Search" name="search">
        
      </div>
    </form>
  </div>
</nav>