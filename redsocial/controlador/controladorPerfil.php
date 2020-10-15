 <?php
session_start();
require_once('../modelo/ModelsRegistar.php');

if (!empty($_GET['action'])) {
    controladorPerfil::main($_GET['action']);
} else {
    echo "";
}

class controladorPerfil
{
    static function main($action)
    {
        if ($action == "crear") { //va a este menu 
            controladorPerfil::crear();
        }else if ($action == "buscarID") {
            controladorPerfil::buscarID();
        }else if ($action == "editar") {
            controladorPerfil::editar();
        }         

    }
      
    static public function crear()
    {
       
        try {
            $arrayUsuarios = array();
            $arrayUsuarios['usuario'] = $_POST['usuario'];
            $arrayUsuarios['contrasena'] = $_POST['contrasena'];
            $arrayUsuarios['nombre'] = $_POST['nombre'];
            $arrayUsuarios['apellido'] = $_POST['apellido'];
            $arrayUsuarios['genero'] = $_POST['genero'];
            $arrayUsuarios['direccion'] = $_POST['direccion'];
            $arrayUsuarios['fechan'] = $_POST['fechan'];
            $arrayUsuarios['cel'] = $_POST['cel'];
            $arrayUsuarios['trabajo'] = $_POST['trabajo'];
            
           // $arrayUsuarios['blogfoto'] = $_FILES['blogfoto']["name"];
           // $nombre_img = $_FILES['blogfoto']["tmp_name"];
           // $destino=$_SERVER["DOCUMENT_ROOT"]."/suana/Vista/img/blogs/".$_FILES['blogfoto']["name"];
           
           //copy($nombre_img, $destino);
           
            $ModelsRegistar = new ModelsRegistar( $arrayUsuarios);

            $ModelsRegistar->insertar();
            header("Location: ../Vista/login.html");
        } catch (Exception $e) {
            echo $e;
        }
    }

    static public function editar()
    {
        try {
            $arrayUsuarios['firstname'] = $_POST['firstname'];
            $arrayUsuarios['lastname'] = $_POST['lastname'];
            $arrayUsuarios['address'] = $_POST['address'];
            $arrayUsuarios['gender'] = $_POST['gender'];
            $arrayUsuarios['username'] = $_POST['username'];
            $arrayUsuarios['password'] = $_POST['password'];
            $arrayUsuarios['birthdate'] = $_POST['birthdate'];
            $arrayUsuarios['mobile'] = $_POST['mobile'];
            $arrayUsuarios['work'] = $_POST['work'];
            $arrayUsuarios['member_id'] = $_POST['member_id'];
            
            $Usuarios = new ModelsRegistar($arrayUsuarios);
            
            $Usuarios->editarperfil();
            header("Location: ../vista/home.php");
        } catch (Exception $e) {
            echo $e;
            //header("Location: ../Vista/editarArena.php?respuesta=errorr");
        }
       
    }


 


    static public function buscarID($id)
    {
        try {
            return ModelsRegistar::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../gestionarArena.php?respuesta=error");
        }
    }

    public function buscarAll()
    {
        try {
            return Pedidos::getAll();
        } catch (Exception $e) {
            header("Location: ../gestionarPedidos.php?respuesta=error");
        }
    }

    public function buscar($Query)
    {
        try {
            return Especialidad::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../gestionarPedidos.php?respuesta=error");
        }
    }
}