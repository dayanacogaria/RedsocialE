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
            $arrayUsuarios['ide_usua'] = $_POST['documento'];
            $arrayUsuarios['nombUsua'] = $_POST['nombUsua'];
            $arrayUsuarios['apeUsua'] = $_POST['apeUsua'];
            $arrayUsuarios['direccion'] = $_POST['direccion'];
            $arrayUsuarios['telefono'] = $_POST['telefono'];
            $arrayUsuarios['telFamiliar'] = $_POST['telFamiliar'];
            $arrayUsuarios['nomFamiliar'] = $_POST['nomFamiliar'];
            $arrayUsuarios['riesgos'] = $_POST['riesgos'];
            $arrayUsuarios['eps'] = $_POST['eps'];
            $arrayUsuarios['pension'] = $_POST['pension'];
            $arrayUsuarios['rh'] = $_POST['rh'];
            $arrayUsuarios['rol'] = $_POST['rol'];
            $arrayUsuarios['usuario'] = $_POST['usuario'];
            $arrayUsuarios['contrasena'] = $_POST['contrasena'];
            $arrayUsuarios['estado'] = $_POST['estado'];
            $arrayUsuarios['documentowhere'] = $_POST['documentowhere'];
            $Usuarios = new Usuario($arrayUsuarios);
            
            $Usuarios->editar();
            header("Location: ../vista/gestionarUsuario.php");
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