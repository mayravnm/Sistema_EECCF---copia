<?php 

/**
 * 
 */
class Usuario extends Controllers
{
	/*function __construct()
	{
		parent::__construct();
	}*/

	//ingresar sesion usuario
	function presenta(){
			
		$username = Session::getSession("User");

		if($username!=""){
			$this->view->render($this,'Usuario',"");
		}else{
			header("Location:".URL);
		}
	}

	//PDF
	function pdf(){
		$username = Session::getSession("User");
		if($username!=""){
			$this->view->render($this,'Usua_pdf',"");
		}else{
			header("Location:".URL);
			//echo("Usted no tiene autorizacion");
		}
	}

	//mostrar usuario
	function listado(){
		
		$json = $this->model->listadoModel();
		echo $json;
	}


	//consultar datos para editar
	public function consultedit(){
		$username = Session::getSession("User");
		if($username!=""){
			$res=NULL;
			$this->model->setcedula($_REQUEST['CI']);
			$res = $this->model->consultaModel();
			$res = $res[0];
			$cadena="";
			if($res!=NULL){
				$cadena="#".$res["CI"]."#".$res["Nombre"]."#".$res["Apellido"]."#".$res["CodigoSAP"]."#".$res["Usuario"]."#".$res["Password"];
			}
				echo $cadena;
		}else{
			header("Location:".URL);
			//echo("Usted no tiene autorizacion");
		}
	}


	//comparar usuario
	public function validarusuario(){
		$username = Session::getSession("User");
		if($username!=""){
			$res=NULL;
			$this->model->setusuario($_REQUEST['Usuario']);
			$res = $this->model->consultausuaModel();
			$res = $res[0];
			$cadena="";
			if($res!=NULL){
				$cadena=1;
			}else{
				$cadena=2;
			}
				echo $cadena;
	}else{
			header("Location:".URL);
			//echo("Usted no tiene autorizacion");
		}
	}

	//comparar cedula
	public function validarci(){
		$username = Session::getSession("User");
		if($username!=""){
			$res=NULL;
			$this->model->setcedula($_REQUEST['CI']);
			$res = $this->model->consultaciModel();
			$res = $res[0];
			$cadena="";
			if($res!=NULL){
				$cadena=1;
			}else{
				$cadena=2;
			}
				echo $cadena;
	}else{
			header("Location:".URL);
			//echo("Usted no tiene autorizacion");
		}
	}


	//actualizar datos
	public function actualizar(){
		$username = Session::getSession("User");
		if($username!=""){

			$this->model->setcedula($_REQUEST['CI']);
			$this->model->setnombre($_REQUEST['Nombre']);
			$this->model->setapellido($_REQUEST['Apellido']);
			$this->model->setusuario($_REQUEST['Usuario']);
			
			if($this->model->actualizar()){
				echo "1";
			}else{
				echo "2";
			}
	}else{
			header("Location:".URL);
			//echo("Usted no tiene autorizacion");
		}
	}

	//actualizar password
	public function actualizarpasswd(){
		$username = Session::getSession("User");
		if($username!=""){

			$this->model->setcedula($_REQUEST['CI']);
			$this->model->setpassword($_REQUEST['Password']);
			
			if($this->model->actualizarpasswd()){
				echo "1";
			}else{
				echo "2";
			}
	}else{
			header("Location:".URL);
			//echo("Usted no tiene autorizacion");
		}
	}


	//eliminar usuarios
	public function eliminar(){
		$username = Session::getSession("User");

		if (($username!="") ){

			$this->model->setcedula($_REQUEST['CI']);
			if($this->model->deletemodel()){
				echo "1";
			}else{
				echo "2";
			}
		}else{
			header("Location:".URL);
			//echo("Usted no tiene autorizacion");
		}
	

	}

}


?>
