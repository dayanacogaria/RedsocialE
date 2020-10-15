<?php
session_start();
require_once('../modelo/ModelsHome.php');

if (!empty($_GET['action'])) {
    controladorHome::main($_GET['action']);
} else {
    echo "No se encontro ninguna accion...";
}

class controladorHome
{

    static function main($action)
    {
        if ($action == "crear") { //va a este menu 
            controladorHome::crear();
        }
    }
      
    static public function crear()
    {
       
        try {
            $arrayUsuarios = array();
            $arrayUsuarios['member_id'] = $_POST['member_id'];
            $arrayUsuarios['content'] = $_POST['content'];            
            $ModelsRegistar = new ModelsHome( $arrayUsuarios);

            $ModelsRegistar->insertar();
            header("Location: ../Vista/home.php");
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