<?php


require_once('db_abstract_class.php');



class ModelsRegistar extends db_abstract_class
{
   private $usuario;
   private $contrasena;
   private $nombre;
   private $apellido;
   private $genero;
   private $direccion;
   private $fechan;
   private $cel;
   private $trabajo;



	
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
            $this -> $usuario= "";
            $this -> $contrasena= "";
            $this -> $nombre= "";
            $this -> $apellido= "";
            $this -> $genero= "";
            $this -> $direccion= "";
            $this -> $fechan= "";
            $this -> $cel= "";
            $this -> $trabajo= "";
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

	 

	

	function getPrivateusuario() { 
 		return $this->privateusuario; 
	} 

	function setPrivateusuario($privateusuario) {  
		$this->privateusuario = $privateusuario; 
	} 

	function getPrivatecontrasena() { 
 		return $this->privatecontrasena; 
	} 

	function setPrivatecontrasena($privatecontrasena) {  
		$this->privatecontrasena = $privatecontrasena; 
	} 

	function getPrivatenombre() { 
 		return $this->privatenombre; 
	} 

	function setPrivatenombre($privatenombre) {  
		$this->privatenombre = $privatenombre; 
	} 

	function getPrivateapellido() { 
 		return $this->privateapellido; 
	} 

	function setPrivateapellido($privateapellido) {  
		$this->privateapellido = $privateapellido; 
	} 

	function getPrivategenero() { 
 		return $this->privategenero; 
	} 

	function setPrivategenero($privategenero) {  
		$this->privategenero = $privategenero; 
	} 

	function getPrivatedireccion() { 
 		return $this->privatedireccion; 
	} 

	function setPrivatedireccion($privatedireccion) {  
		$this->privatedireccion = $privatedireccion; 
	} 

	function getPrivatefechan() { 
 		return $this->privatefechan; 
	} 

	function setPrivatefechan($privatefechan) {  
		$this->privatefechan = $privatefechan; 
	} 

	function getPrivatecel() { 
 		return $this->privatecel; 
	} 

	function setPrivatecel($privatecel) {  
		$this->privatecel = $privatecel; 
	} 

	function getPrivatetrabajo() { 
 		return $this->privatetrabajo; 
	} 

	function setPrivatetrabajo($privatetrabajo) {  
		$this->privatetrabajo = $privatetrabajo; 
	} 
}?>