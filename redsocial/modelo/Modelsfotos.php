<?php


require_once('db_abstract_class.php');



class Modelsfotos extends db_abstract_class
{
    private $photos_id ;
    private $location;
    private $member_id; 
    private $lastname;
   
    /**
     * Especialidad constructor.
     * @param $idEspacialidad
     * @param $Nombre
     * @param $Estado
     */
    public function __construct($registar_data = array())
    {
        
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($registar_data)>1){ //
            
            foreach ($registar_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->photos_id= "";
            $this->location= "";
            $this->member_id= "";
            
         
       }
    }

    public static function buscarForId($id)
    {
        $productosFotos = new blogs();
        if ($id > 0){
           
            $getrow = $actividades->getRow("SELECT * FROM actividades WHERE cod_act =?", array($id));
            $productosFotos->prodnume = $id;
            $productosFotos->prodprec = $getrow['prodprec'];
            $productosFotos->proddesc = $getrow['proddesc'];
            
            $productosFotos->prodnomb = $getrow['prodnomb'];
            $productosFotos->prodfoto = $getrow['prodfoto'];
            $productosFotos->catenume = $getrow['catenume'];
            
            $productosFotos->Disconnect();
            return $productosFotos;
        }else{
            return NULL;
        }
    }
    
   public static function buscar($query)
    {
       
        $arrayblog = array();
        $tmp = new Modelsfotos();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $blogs = new Modelsfotos();
            $blogs->photos_id = $valor['photos_id'];
            $blogs->location = $valor['location']; 
            $blogs->member_id = $valor['member_id'];   
          
            array_push($arrayblog, $blogs);
          

        }
        $tmp->Disconnect();
        return $arrayblog;
    }

     static function getAll()
    {
        $id =$_SESSION['member_id'];
        return Modelsfotos::buscar("select * from photos where member_id=$id");
    }
    static function getAllblog()
    {
        
        return blogs::buscar("SELECT * FROM blog order by 1 desc");
    }

    public function insertar()
    {
        
        $this->insertRow("INSERT INTO socialdb.members VALUES (NULL, ?, ?, ?,?,?,?,?,?,?, ?, ?,?,?,?,?,?)", array(
           
            
            $this->nombre,
            $this->apellido,
            $this->middlename='',
            $this->direccion,
            $this->email='',
            $this->contact_no='',
            $this->age=0,
            $this->genero,
            $this->usuario,
            $this->contrasena,
            $this->image='avatar.jpg', 
            $this->fechan,
            $this->cel,
            $this->status='Activo',
            $this->trabajo,
            $this->religion=''
              
               
            )
        );
        $this->Disconnect();
    }

    public function editar()
    {
       
        $time = time();
        $this->updateRow("UPDATE sgc_minera.actividades SET ide_usua = ?, actividad = ?,
         pago = ?, fecha = ?, desde = ?, hasta = ?, estado = ?
         WHERE cod_act = ?", array(
                $this->ide_usua,
                $this->actividad,
                $this->pago,
                $this->fecha=date("Y-m-d ", $time),
                $this->desde,
                $this->hasta,
                $this->estado,
                $this->cod_act,
              
        ));
        $this->Disconnect();
    }

    protected function eliminar($id)
    {
      /*  return Clientes::buscar("delete from clientes where idCliente=?");*/
    }
    
  
    public static function Login($User, $Password){
       
        $arrUsuarios = array();
        $tmp = new ModelsHome();
        $getTempUser = $tmp->getRows("SELECT * FROM members WHERE username = '$User'" );
        if(count($getTempUser) >= 1){
         $getrows = $tmp->getRows("SELECT * FROM members WHERE  username = '$User' and password = '$Password'");
            if(count($getrows) >= 1){
                foreach ($getrows as $valor) {
                  
                    return $valor;
                }
            }else{
                return "Password Incorrecto";
            }
        }else{
            return "No existe el usuario";
        }
        $tmp->Disconnect();
        return $arrUsuarios;
    }

	 
  

	

    /**
     * Get the value of photos_id
     */ 
    public function getPhotos_id()
    {
        return $this->photos_id;
    }

    /**
     * Set the value of photos_id
     *
     * @return  self
     */ 
    public function setPhotos_id($photos_id)
    {
        $this->photos_id = $photos_id;

        return $this;
    }

    /**
     * Get the value of location
     */ 
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set the value of location
     *
     * @return  self
     */ 
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get the value of member_id
     */ 
    public function getMember_id()
    {
        return $this->member_id;
    }

    /**
     * Set the value of member_id
     *
     * @return  self
     */ 
    public function setMember_id($member_id)
    {
        $this->member_id = $member_id;

        return $this;
    }

/**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }
    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

}?>