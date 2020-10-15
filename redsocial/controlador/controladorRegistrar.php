<?php
session_start();
require_once('../modelo/ModelsRegistar.php');

if (!empty($_GET['action'])) {
    controladorRegistrar::main($_GET['action']);
} else {
    echo "No se encontro ninguna accion...";
}

class controladorRegistrar
{

    static function main($action)
    {
        if ($action == "crear") { //va a este menu 
            controladorRegistrar::crear();
        }else if($action=="inactivarUsuario"){
            controladorRegistrar::inactivarUsuario();
        }else if($action=="llenardatos"){
            controladorRegistrar::llenardatos();
        }else if($action=="Login"){
            controladorRegistrar::Login();
        }else if($action == "CerrarSession"){
            controladorRegistrar::CerrarSession();
        }else if($action == "editar"){
            controladorRegistrar::editar();
        }else if($action == "iditarimagen"){
            controladorRegistrar::iditarimagen();
        }
    }

    public function CerrarSession (){
      
        session_destroy();
        header("Location: ../vista/login.php");
    }


    public function Login (){
       
        try {
            $response = [];
            $User = $_POST['usuario'];
            $Password = $_POST['contrasena'];
            if(!empty($User) && !empty($Password)){
               
                $respuesta = ModelsRegistar::Login($User, $Password);
                if (is_array($respuesta)) {
                    $_SESSION['member_id'] = $respuesta['member_id'];
                    $_SESSION['firstname'] = $respuesta['firstname'];
                    $_SESSION['image'] = $respuesta['image'];
                    $_SESSION['lastname'] = $respuesta['lastname'];
                    $_SESSION['address'] = $respuesta['address'];
                    $_SESSION['mobile'] = $respuesta['mobile'];
                    $_SESSION['birthdate'] = $respuesta['birthdate'];
                    header("Location: ../vista/home.php");
                }else if($respuesta == "Password Incorrecto"){
                  //echo "incorrecta";
                  header("Location: ../vista/login.php");
                    
                }else if($respuesta == "No existe el usuario"){
                    //echo "usuario no existe";
                   header("Location: ../vista/login.php");
                }
            }else{
               //echo "datos vacios";
             header("Location: ../vista/login.php");
            }
            //echo json_encode($response);

        } catch (Exception $e) {
           header("Location: ../vista/index.php?respuesta=error");
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

    static public function iditarimagen()
    {
        
        try {
          
            $arrayUsuarios['member_id'] = $_POST['member_id'];
            $arrayUsuarios['image'] = $_FILES['fotousuario']["name"];
            $nombre_img = $_FILES['fotousuario']["tmp_name"];
            $destino=$_SERVER["DOCUMENT_ROOT"]."/redsocial-master/redsocial/Vista/upload/".$_FILES['fotousuario']["name"];
           
            copy($nombre_img, $destino);
            $Usuarios = new ModelsRegistar($arrayUsuarios);
            
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
            return Usuario::buscarForId($id);
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