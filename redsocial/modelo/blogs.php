<?php


require_once('db_abstract_class.php');



class blogs extends db_abstract_class
{
    private $blognume;
    private $blogcont;
    private $blogfoto;
    private $blogfech;
    
    

    /**
     * Especialidad constructor.
     * @param $idEspacialidad
     * @param $Nombre
     * @param $Estado
     */
    public function __construct($blogs_data = array())
    {
        
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($blogs_data)>1){ //
            
            foreach ($blogs_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->blognume = "";
            $this->blogcont = "";
            $this->blogfoto = "";
            $this->blogfech = "";
           
           
           
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
      
        $this->insertRow("INSERT INTO suana.blog VALUES (NULL, ?, ?, ?)", array(
           
              
                $this->blogcont,
                $this->blogfoto,
                $this->blogfech,
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
    


    /**
     * Get the value of blognume
     */ 
    public function getBlognume()
    {
        return $this->blognume;
    }

    /**
     * Set the value of blognume
     *
     * @return  self
     */ 
    public function setBlognume($blognume)
    {
        $this->blognume = $blognume;

        return $this;
    }

    /**
     * Get the value of blogcont
     */ 
    public function getBlogcont()
    {
        return $this->blogcont;
    }

    /**
     * Set the value of blogcont
     *
     * @return  self
     */ 
    public function setBlogcont($blogcont)
    {
        $this->blogcont = $blogcont;

        return $this;
    }

    /**
     * Get the value of blogfoto
     */ 
    public function getBlogfoto()
    {
        return $this->blogfoto;
    }

    /**
     * Set the value of blogfoto
     *
     * @return  self
     */ 
    public function setBlogfoto($blogfoto)
    {
        $this->blogfoto = $blogfoto;

        return $this;
    }

    /**
     * Get the value of blogfech
     */ 
    public function getBlogfech()
    {
        return $this->blogfech;
    }

    /**
     * Set the value of blogfech
     *
     * @return  self
     */ 
    public function setBlogfech($blogfech)
    {
        $this->blogfech = $blogfech;

        return $this;
    }
}?>