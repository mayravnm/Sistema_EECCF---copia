
<?php 
class Conexion extends Controllers
{
	function __construct()
	{
		$this->db = new QueryManager("localhost", "postgres", "123456", "SistemaEECC");
	}
}


?>