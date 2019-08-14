<?php 

class EDC extends Controllers{

	function __construct(){
		parent::__construct();
	}
	//mostrar combo de select
	function listado(){
		
		echo $this->model->cargar("*",'"EDC"');

		
	}
	




	function listar(){
			
		//$response=$this->model->getdatamodel("*",'"EDC"');
		//$this->view->render($this,"EDC",$response);
	
	$this->model->setcedula($_REQUEST['']);
		$res = $this->model->getdatamodel();
		$res = $res[0];
		$cadena="";
		if($res!=NULL){

			$nombre = $res["CodigoSAP"];
			$cadena="#".$nombre."#".$res["NombreEDC"]."#".$res["DireccionEDC"]."#".$res["TelefonoEDC"]."#".$res["CorreoEDC"];
		

		}

		echo $cadena;
		
	}
	


}

?>