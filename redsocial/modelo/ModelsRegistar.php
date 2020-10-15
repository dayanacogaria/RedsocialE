<?php


require_once('db_abstract_class.php');



class ModelsRegistar extends db_abstract_class
{
   private $member_id;
   private $firstname;
   private $lastname;
   private $image;
   private $username;
   private $password;
   private $gender;
   private $address;
   private $birthdate;
   private $mobile;
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
            $this->member_id= "";
            $this->firstname= "";
            $this->lastname= "";
            $this->image= "";
           
       }
    }

    public static function buscarForId($id)
    {
        $productosFotos = new ModelsRegistar();
        if ($id > 0){
           
            $getrow = $productosFotos->getRow("SELECT * FROM members WHERE member_id =?", array($id));
            $productosFotos->member_id = $id;
            
            $productosFotos->firstname = $getrow['firstname'];
            $productosFotos->lastname = $getrow['lastname'];
            $productosFotos->image = $getrow['image'];
            $productosFotos->username = $getrow['username'];
            $productosFotos->password = $getrow['password'];
            $productosFotos->gender = $getrow['gender'];
            $productosFotos->address = $getrow['address'];
            $productosFotos->birthdate = $getrow['birthdate'];
            $productosFotos->mobile = $getrow['mobile'];
            $productosFotos->work = $getrow['work'];
            $productosFotos->Disconnect();
            return $productosFotos;
        }else{
            return NULL;
        }
    }
    
   public static function buscar($query)
    {
        
        $arrayblog = array();
        $tmp = new blogs();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $blogs = new blogs();
            $blogs->blognume = $valor['blognume'];
            $blogs->blogcont = $valor['blogcont'];
           // $productosFotos->proddesc = $valor['proddesc'];
            
            $blogs->blogfoto = $valor['blogfoto'];
            $blogs->blogfech = $valor['blogfech'];
          

            array_push($arrayblog, $blogs);

        }
        $tmp->Disconnect();
        return $arrayblog;
    }

     static function getAll()
    {
        
        return Productos::buscar("SELECT * FROM Productos_fotos");
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
        $this->updateRow("UPDATE socialdb.members SET image = ?
         WHERE member_id = ?", array(
                $this->image,
                $this->member_id
        ));
        $this->Disconnect();
    }

    public function editarperfil()
    {
        $this->updateRow("UPDATE socialdb.members SET  firstname = ? , lastname =  ?
        ,address = ?, gender = ?, username = ?, password = ? , birthdate = ?, mobile = ?, work = ?
         WHERE member_id = ?", array(
                $this->firstname,
                $this->lastname,
                $this->address,
                $this->gender,
                $this->username,
                $this->password,
                $this->birthdate,
                $this->mobile,
                $this->work,
                $this->member_id
        ));
        $this->Disconnect();
    }

    protected function eliminar($id)
    {
      /*  return Clientes::buscar("delete from clientes where idCliente=?");*/
    }
    
  
    public static function Login($User, $Password){
       
        $arrUsuarios = array();
        $tmp = new ModelsRegistar();
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
    * Get the value of image
    */ 
    public function getUsername()
    {
       return $this->username;
    }
 
    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
       $this->username = $username;
 
       return $this;
    }

    /**
    * Get the value of image
    */ 
    public function getPassword()
    {
       return $this->password;
    }
 
    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
       $this->password = $password;
 
       return $this;
    }


 /**
    * Get the value of image
    */ 
    public function getGender()
    {
       return $this->gender;
    }
 
    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setGender($gender)
    {
       $this->gender = $gender;
 
       return $this;
    }


    /**
    * Get the value of image
    */ 
    public function getAddress()
    {
       return $this->address;
    }
 
    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
       $this->address = $address;
 
       return $this;
    }

    /**
    * Get the value of image
    */ 
    public function getBirthdate()
    {
       return $this->birthdate;
    }
 
    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setBirthdate($birthdate)
    {
       $this->birthdate = $birthdate;
 
       return $this;
    }

    /**
    * Get the value of image
    */ 
    public function getMobile()
    {
       return $this->mobile;
    }
 
    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setMobile($mobile)
    {
       $this->mobile = $mobile;
 
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