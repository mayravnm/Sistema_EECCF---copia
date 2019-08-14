<?php 

/**
 * 
 */
class Views 
{
	
	function __construct()
	{
		# code...
	}
	//funcion que ejecuta la vista index
	function renderindex($controller,$view,$array){
		$controllers=get_class($controller);
		require VIEWS.DFT."Head.php";
		require VIEWS.$controllers.'/'.$view.'.php';
		require VIEWS.DFT."Footer.php";
	}
	//funcion que ejecuta la vistas con menu
	function renderprinc($controller,$view,$array){
		$controllers=get_class($controller);
		require VIEWS.DFT."Head.php";
		require VIEWS.DFT."Menu.php";
		require VIEWS.$controllers.'/'.$view.'.php';
		require VIEWS.DFT."Footer.php";
	}

	function renderusua($controller,$view,$array){
		$controllers=get_class($controller);
		require VIEWS.DFT."Head.php";
		require VIEWS.DFT."Menuusua.php";
		require VIEWS.$controllers.'/'.$view.'.php';
		require VIEWS.DFT."Footer.php";
	}

	//funcion que ejecuta la vistas con menu
	function render($controller,$view,$array){
		require VIEWS.DFT."/fpdf/fpdf.php";
		$controllers=get_class($controller);
		require VIEWS.$controllers.'/'.$view.'.php';
		
	}

}




 ?>