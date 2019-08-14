<?php 

/**
 * 
 */
class Session 
{
	
	static function start()
	{
		@session_start();
	}
	static function getsession($name){
		return $_SESSION[$name];
		

	}
	static function getrol($rol){
		return $_SESSION[$rol];
		

	}
	static function setsession($name,$data){
		$_SESSION[$name]=$data;

	}
	static function setrol($rol,$data){
		$_SESSION[$rol]=$data;

	}
	static function destroy(){
		@session_destroy();
	}
}


 ?>