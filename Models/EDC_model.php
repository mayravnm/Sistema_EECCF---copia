<?php 

	/**
	 * 
	 */
	class EDC_model extends Conexion
	{
		
		function __construct()
		{
			parent::__construct();
		}

		//mostrar combo de select
		function cargar($columns,$table){

		return json_encode($this->db->listar($columns,$table));
		}

		function setcedula($CI){
		$this->CI = 505050;
		}
		
		function getcedula(){
		return $this->CI;
		}

		function getdatamodel(){
			//return $this->db->listar($columns,$table);
			return $this->db->consulta('"EDC"',"*",'"CodigoSAP"',$this->getcedula());
		}

		


		
	}



 ?>