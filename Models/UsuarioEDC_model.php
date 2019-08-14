<?php 

/**
 * 
 */
class UsuarioEDC_model extends Conexion
{
	//constructor de clase conexion
	function __construct()
	{
		parent::__construct();
	}

	function userlogin($fields,$where){
		return $this->db->select1($fields,'"UsuarioEDC"',$where);
	}

	function agregaM($array){
		sleep(1);
		$columns='("CI","Nombre","Apellido","CodigoSAP","Usuario","Password","Privilegio")';
		$encry= password_hash($_POST['Password'], PASSWORD_DEFAULT);
		$valores = "('".$_POST['CI']."','".$_POST['Nombre']."','".$_POST['Apellido']."','".$_POST['CodigoSAP']."','".$_POST['Usuario']."','".$encry."','".$_POST['Privilegio']."');";
		return $this->db->agrega('"UsuarioEDC"',$columns,$valores);
	}
	


}



 ?>