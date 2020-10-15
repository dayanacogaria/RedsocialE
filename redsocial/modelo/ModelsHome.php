<?php


require_once('db_abstract_class.php');



class ModelsHome extends db_abstract_class
{
    private $content;
    private $date_posted;
    private $post_id; 
    private $member_id;    
    private $image;
    private $firstname;
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
            $this->content= "";
            $this->date_posted= "";
            $this->post_id= "";
            $this->member_id= "";
            $this->image= "";
            $this->firstname= "";
            $this->lastname= "";
         
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
        $tmp = new ModelsHome();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $blogs = new ModelsHome();
            $blogs->content = $valor['content'];
            $blogs->firstname = $valor['firstname']; 
            $blogs->image = $valor['image']; 
            $blogs->lastname = $valor['lastname']; 
            $blogs->date_posted = $valor['date_posted'];

            /*$blogs->date_posted = $valor['date_posted']; 
            $blogs->post_id = $valor['post_id'];
            $blogs->member_id = $valor['members.member_id'];
            
           
            $blogs->lastname = $valor['lastname']; */
            
            

            array_push($arrayblog, $blogs);
          

        }
        $tmp->Disconnect();
        return $arrayblog;
    }

     static function getAll()
    {
        return ModelsHome::buscar("select content,firstname,image,lastname,date_posted from post LEFT JOIN members on members.member_id = post.member_id order by post_id DESC");
    }
    static function getAllblog()
    {
        
        return blogs::buscar("SELECT * FROM blog order by 1 desc");
    }

    public function insertar()
    {
        
        $this->insertRow("INSERT INTO socialdb.post VALUES (NULL, ?, ?,null)", array(
                    
            $this->member_id,
            $this->content
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
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }
    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
    /**
     * Get the value of date_posted
     */ 
    public function getDate_posted()
    {
        return $this->date_posted;
    }
    /**
     * Set the value of date_posted
     *
     * @return  self
     */ 
    public function setDate_posted($date_posted)
    {
        $this->date_posted = $date_posted;
        return $this;
    }
    /**
     * Get the value of post_id
     */ 
    public function getPost_id()
    {
        return $this->post_id;
    }
    /**
     * Set the value of post_id
     *
     * @return  self
     */ 
    public function setPost_id($post_id)
    {
        $this->post_id = $post_id;
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