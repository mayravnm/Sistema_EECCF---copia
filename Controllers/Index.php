<?php 

	/**
	 * 
	 */
	class Index extends Controllers
	{
		
		function __construct()
		{
			
			parent::__construct();
		}

		public function index(){
			$this->view->renderindex($this,'Index',"");
			
			
			//require VIEWS."Index.php";
		}
		public function signIn(){
			$this->view->render($this,'signIn',"");
		}

	}



 ?>