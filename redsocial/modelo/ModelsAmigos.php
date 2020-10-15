<?php


require_once('db_abstract_class.php');



class ModelsAmigos extends db_abstract_class
{
    private $my_friend_id;
    private $my_id;
    private $friends_id; 
    private $firstname;
    private $image; 
    private $lastname;
    private $work;
   
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
            $this->my_friend_id= "";
            $this->my_id= "";
            $this->friends_id= "";
            $this->firstname= "";
            $this->image= "";
            
         
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
        $tmp = new ModelsAmigos();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $blogs = new ModelsAmigos();
            $blogs->member_id = $valor['member_id'];
            $blogs->firstname = $valor['firstname']; 
            $blogs->image = $valor['image'];   
            $blogs->lastname = $valor['lastname']; 
            $blogs->work = $valor['work']; 
            array_push($arrayblog, $blogs);
          

        }
        $tmp->Disconnect();
        return $arrayblog;
    }

     static function getAll()
    {
        $id =$_SESSION['member_id'];
        return ModelsAmigos::buscar("select members.member_id , members.firstname , members.lastname , members.image , friends.friends_id ,members.work  from members  , friends
        where friends.my_friend_id = '$id' and members.member_id = friends.my_id
        OR friends.my_id = '$id' and members.member_id = friends.my_friend_id");
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
     * Get the value of my_friend_id
     */ 
    public function getMy_friend_id()
    {
        return $this->my_friend_id;
    }

    /**
     * Set the value of my_friend_id
     *
     * @return  self
     */ 
    public function setMy_friend_id($my_friend_id)
    {
        $this->my_friend_id = $my_friend_id;

        return $this;
    }

    /**
     * Get the value of my_id
     */ 
    public function getMy_id()
    {
        return $this->my_id;
    }

    /**
     * Set the value of my_id
     *
     * @return  self
     */ 
    public function setMy_id($my_id)
    {
        $this->my_id = $my_id;

        return $this;
    }

    /**
     * Get the value of friends_id
     */ 
    public function getFriends_id()
    {
        return $this->friends_id;
    }

    /**
     * Set the value of friends_id
     *
     * @return  self
     */ 
    public function setFriends_id($friends_id)
    {
        $this->friends_id = $friends_id;

        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

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


    public function getWork()
    {
       return $this->work;
    }
 
    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setWork($work)
    {
       $this->work = $work;
 
       return $this;
    }




}?>