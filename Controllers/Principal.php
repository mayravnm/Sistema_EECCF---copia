<?php 

/**
 * 
 */
class Principal extends Controllers
{
	
	function __construct()
	{
		parent::__construct();
	}
	function principal(){
		$username=Session::getsession("User");
		if ($username!="") {
		//	$response=$this->model->getdatamodel('*','user1');
			$this->view->renderprinc($this,"Principal","");
			
		}else{
			header("location:".URL);
		}
		
	}

	function usuario(){
		$username=Session::getsession("User");
		if ($username!="") {
		//	$response=$this->model->getdatamodel('*','user1');
			$this->view->renderusua($this,"Principal","");
		}else{
			header("location:".URL);
		}
		
	}
}

