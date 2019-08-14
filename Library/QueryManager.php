<?php 
Class QueryManager{
	function __construct($HOST,$USER,$PASS,$NAME){
		 $this->link = pg_connect("host=$HOST dbname=$NAME password=$PASS user=$USER");
		if(!$this->link){
			printf("Fallo de Conexión: %s\n".pg_last_error());
			exit();
		}
	}
	function select1($attr,$table,$where){
		$query= "SELECT ".$attr." FROM ".$table." WHERE ".$where.";";
		$result = pg_query($query);
		if(pg_num_rows($result) > 0){
			while($row = pg_fetch_assoc($result)){
				$response[] = $row;
			}
			return $response;
		}
	}
	// mostrar datos
	function listar($attr,$table){
		$query= "SELECT ".$attr." FROM ".$table.";";
		$result = pg_query($query);
		if(pg_num_rows($result) > 0){
			while($row = pg_fetch_assoc($result)){
				$response[] = $row;
			}
			return $response;
		}
	}



	//para insertar registros
	function agrega($table,$columns,$valores){
		$sql="insert into ".$table." ".$columns." values ".$valores;
		if(pg_query($sql)){
			return "1";
		}else{
			return "0";
		}
	
	}



	function buscar($query){
		$result=pg_query($query);
		
		echo "<table>
					<thead>
                      <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Estacion</th>
                        <th>Usuario</th>
                        <th>Contraseña</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>";

		if(pg_num_rows($result) > 0){
			while($row = pg_fetch_assoc($result)){

				//$response[] = $row;
				echo "<tr>
                            <td> ". $row["CI"]."</td>
                            <td> ". $row["Nombre"]."</td>
                            <td> ". $row["Apellido"]."</td>
                            <td> ". $row["NombreEDC"]."</td>
                            <td> ". $row["Usuario"]."</td>
                            <td> ". $row["Password"]."</td>
                            <td>
                              <button  class='btn btn-primary'  title='Editar'  onclick='javascript:verventanamodalEditar(".$row["CI"].")'> <span class='fas fa-fw fa-edit'></span> </button>   
                              <button class='btn btn-primary' title='Eliminar'  onclick='javascript:preguntar(".$row["CI"].")'> <span class='fas fa-fw fa-trash'></span> </button>      
                            </td>
                            </tr>";

			}
			//return $response;	
		}

		echo "</table>";
	}

	function ejecutaSQL($query){
		$result = pg_query($query);
		if(pg_num_rows($result) > 0){
			while($row = pg_fetch_assoc($result)){
				$response[] = $row;
			}
			return $response;	
		}
	}



	function ejecutaSQL1($query){
		if(pg_query($query)){
			return true;
		}else{
			return false;
		}
	}








}



 ?>