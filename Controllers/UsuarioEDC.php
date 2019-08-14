<?php 

/**
 * 
 */
class UsuarioEDC extends Controllers
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function userlogin(){
		if (isset($_POST["Usuario"]) && isset($_POST["Password"])) {
											// * -> todos los campos de la tabla user1, luego compara el usuario
			$response = $this->model->userlogin("*",'"Usuario"'."= '".$_POST['Usuario']."' ");
			$response = $response[0];
			//if($_POST["Password"]==$response["Password"]){
			if(password_verify($_POST["Password"], $response["Password"])){
					
					$this->createsession($response["Usuario"]);
					$this->createrol($response["Privilegio"]);
					$rol= $response["Privilegio"];
					if ($rol=="ADMINISTRADOR") {
						//$_session["rol"]= "Administrador";
						echo 1;
					}else if ($rol=="USUARIO") {
						//$_session["rol"]= "Usuario";
						echo 2;
					}
					//echo 1;

			}
			
		}

	}


	//Agregar usuarios
	public function signIn(){
		if (isset($_POST["CI"]) && isset($_POST["Nombre"]) && isset($_POST["Apellido"]) && isset($_POST["CodigoSAP"]) && isset($_POST["Usuario"]) && isset($_POST["Password"]) && isset($_POST["Privilegio"])) {
			$response = $this->model->userlogin('*','"CI"'."= '".$_POST['CI']."' " );
			$response = $response[0];
			if ($response == NULL) {
				$array["CI"]= $_POST['CI'];
				$array["Nombre"]= $_POST['Nombre'];
				$array["Apellido"]= $_POST['Apellido'];
				$array["CodigoSAP"]= $_POST['CodigoSAP'];
				$array["Usuario"]= $_POST['Usuario'];
				$array["Password"]=$_POST['Password'];
				$array["Privilegio"]=$_POST['Privilegio'];
				$this->model->agregaM($array);
				echo 1;
			}
		}
	}


	function createsession($user){
		Session::setsession('User',$user);

	}
	function createrol($rol){
		Session::setrol('rol',$rol);
		
	}
	function destroysession(){
		Session::destroy();
		header("Location:".URL);
	}
}



 ?>