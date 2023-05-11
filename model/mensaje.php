<?php
class Mensaje
{
	private $id;
	private $texto;
	private $creador;
	private $conection;
	private array $mensajes = array();

	// Métodos
	public function __construct( $texto, $creador,$id=null)
	{
		$this->id = $id;
		$this->texto = $texto;
        $this->creador = $creador;
        $this->getConection();
	}


	// Getters
	public function getTexto()
	{
		return $this->texto;
	}
	public function getId()
	{
		return $this->id;
	}
	public function getCreador()
	{
        $this->getConection();
        $sql="SELECT u.usuario FROM usuario u JOIN mensaje m ON m.usuario=u.id WHERE m.id='$this->id'";
        $result=$this->conection->query($sql);
        $row = $result->fetch_assoc();
		return $row['usuario'];
	}
    public function getConection()
	{
		$dbObj = new Db();
		$this->conection = $dbObj->conection;
	}
	public function getMensajes(){
        $this->getConection();
        $sql="SELECT * FROM mensaje WHERE pregunta='$this->id'";
        $result=$this->conection->query($sql);
        if ($result->num_rows > 0) {
			$i = 0;
			while ($row = $result->fetch_assoc()) {
				$this->mensajes[$i] = new Mensaje($row['id'], $row['texto'], $row['usuario']);
				$i++;
			}
			return $this->mensajes;
		}
	}
    public function crearMensaje($foro)
    {
        $this->getConection();
		$sql = "INSERT INTO mensaje(`texto`,'foro','usuario') VALUES('$this->texto','$foro','$this->creador')";
		$this->conection->query($sql);
        $sql="SELECT id FROM mensaje WHERE MAX(id)";
        $result=$this->conection->query($sql);
        $row = $result->fetch_assoc();
        $this->id=$row['id'];
    }
    public function crearContestacion($foro, $mensaje){
        $this->getConection();
        $sql="INSERT INTO mensaje('texto','pregunta','foro','usuario')VALUES('$this->texto','$mensaje','$foro','$this->creador')";
        $this->conection->query($sql);
        $sql="SELECT id FROM mensaje WHERE MAX(id)";
        $result=$this->conection->query($sql);
        $row = $result->fetch_assoc();
        $this->id=$row['id'];
    }
}