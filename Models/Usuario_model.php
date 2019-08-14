<?php 

	/**
	 * 
	 */
	class Usuario_model extends Conexion
	{
		
		/*function __construct()
		{
			parent::__construct();
		}*/


		function setcedula($CI){ $this->CI = $CI; }
		function getcedula(){ return $this->CI; }
		function setdato($dato){$this->dato = $dato;}
		function getdato(){ return $this->dato; }
		function setnombre($Nombre){ $this->Nombre = $Nombre; }
		function getnombre(){ return $this->Nombre; }
		function setapellido($Apellido){ $this->Apellido = $Apellido; }
		function getapellido(){ return $this->Apellido; }
		function setcodigosap($CodigoSAP){ $this->CodigoSAP=$CodigoSAP; }
		function getcodigosap(){ return $this->CodigoSAP; }
		function setusuario($Usuario){ $this->Usuario=$Usuario; }
		function getusuario(){ return $this->Usuario; }
		function setpassword($Password){ $this->Password=$Password; }
		function getpassword(){ return $this->Usuario; 	}
		function setpartida($partida){$this->partida = $partida;}
		function getpartida(){ return $this->partida; }

		//mostrar usuarios
		function listadoModel(){
			$query='SELECT usua."CI",usua."Nombre",usua."Apellido",edc."NombreEDC",usua."Usuario",usua."Password",usua."Privilegio"
					FROM "UsuarioEDC" AS usua
					LEFT JOIN "EDC" AS edc
					ON usua."CodigoSAP"=edc."CodigoSAP"; ' ;
			return json_encode($this->db->ejecutaSQL($query));
		}



		//consultar datos para editar
		function consultaModel(){
			$query= "SELECT *
					FROM" .'"UsuarioEDC"'."   
					WHERE".'"CI"'."="." $this->CI" ;
			return $this->db->ejecutaSQL($query);
		}
		//comparar usuario
		function consultausuaModel(){
			$query= "SELECT *
					FROM" .'"UsuarioEDC"'."   
					WHERE".'"Usuario"'."="." '$this->Usuario' " ;
			return $this->db->ejecutaSQL($query);
		}

		//comparar cedula
		function consultaciModel(){
			$query= "SELECT *
					FROM" .'"UsuarioEDC"'."   
					WHERE".'"CI"'."="." $this->CI " ;
			return $this->db->ejecutaSQL($query);
		}

		// consulta cantidad de registros paginacion
		function paginarModel(){
			//$lotes=	5;
			$query= 'SELECT * FROM  "UsuarioEDC"' ;
			$paginactual= $this->getpartida();
			return json_encode($this->db->ejecutaSQLp($query,$paginactual));
			//$to=($total/2);
			//return $to;
		}

		//consultar dato para mostrar
		function consultadatoModel(){
			$query='SELECT usua."CI",usua."Nombre",usua."Apellido",edc."NombreEDC",usua."Usuario",usua."Password" 
					FROM "UsuarioEDC" AS usua
					LEFT JOIN "EDC" AS edc
					ON usua."CodigoSAP"=edc."CodigoSAP" 
					WHERE (usua."Usuario" LIKE '."'%".$this->getdato()."%'".' OR edc."NombreEDC" LIKE '."'%".$this->getdato()."%'".')';
		return $this->db->buscar($query);
		}
			

		//funcion para editar datos
		function actualizar(){
			sleep(1);
			$query="update ".'"UsuarioEDC"'." set ".'"Nombre"'."='".$this->Nombre."', ".'"Apellido"'."='".$this->Apellido."', ".'"Usuario"'."='".$this->Usuario."' where ".'"CI"'."=".$this->CI;
		return $this->db->ejecutaSQL1($query);
		}

		//funcion para actualizar password
		function actualizarpasswd(){
			sleep(1);
			$encry= password_hash($_POST['Password'], PASSWORD_DEFAULT);
			$query="update ".'"UsuarioEDC"'." set ".'"Password"'."='".$encry."' where ".'"CI"'."=".$this->CI;
		return $this->db->ejecutaSQL1($query);
		}

		//eliminar
		function deletemodel(){
		$query="Delete from ".'"UsuarioEDC"'." where ". '"CI"'. " = ".$this->CI;
		return $this->db->ejecutaSQL1($query);
		}


	

}

 ?>