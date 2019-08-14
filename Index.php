<?php 

require 'Config.php';

$url= isset($_GET["url"]) ?$_GET["url"]:"Index/index";
$url= explode("/", $url); //eliminar la /


$controller= "";
$metodo= "";

if (isset($url[0])) {
	$controller = $url[0];
}

if (isset($url[1])) {
	if ($url[1] != "") { 
		$metodo = $url[1];
	}
}

if (isset($url[2])) {
	if ($url[1] != "") { 
		$parametro = $url[2];
	}
}

spl_autoload_register(function($class){
	if (file_exists(LBS.$class.".php")) {
		require LBS.$class.".php";
	}
});

$controllersPath = './Controllers/'.$controller.".php";
// verificar si el archivo existe
if (file_exists($controllersPath)) {
	require $controllersPath;

	$controller= new $controller();//instanciamos el controlador
	if (isset($metodo)) {
		
		if (method_exists($controller, $metodo)) {

			if (isset($parametro)) {
				$controller->{$metodo}($parametro);

			}else{
				$controller->{$metodo}();
			}
		}
		
	}else{
			echo "Error no existe el metodo";
	}
	
}else{
	echo "Error en la direccion, no existe controlador";
}

 ?>