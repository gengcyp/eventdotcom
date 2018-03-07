<?php
	 /**
	 *
	 */
	 class DBconnect
	 {

	 	var $connection;

	 	// make a connect
	 	function __construct($dbname, $user, $pwd)
	 	{
	 		# code...
			$this->connection = new PDO(
			   'mysql:host=localhost:3306;dbname='. $dbname.';charset=utf8mb4',
			   $user,
			   $pwd);

	 	}

	 	// select
	 	// form is (what u want to selected, from which table, in which condition)
	 	function select($selected, $table, $clause){
	 		$count = 0;
	 		$result= [];
			foreach($this->connection->query("SELECT ". $selected ." FROM " .$table. " " .$clause) as $row) {
		    	$result[$count]= $row;
		    	$count+=1;
			}
			return $result;
	 	}

	 	// insert
	 	// form is (insert to which table, which column, value as a ('...', '...') )
	 	function insert($table, $column, $values){
	 		$affectedRows = $this->connection->exec(
      			'INSERT INTO '. $table.' '. $column. ' VALUES '. $values );
	 		return $affectedRows;
	 	}

	 	// delete
	 	// form is (delete from which table, condition)
	 	function delete($table, $condition){
	 		if ($condition == '*'){
	 			$affectedRows = $this->connection->exec(
      			'DELETE * FROM '. $table);
	 		}
	 		else {
	 			$affectedRows = $this->connection->exec(
      			'DELETE FROM '. $table. ' '. $condition );
      		}
	 		return $affectedRows;
	 	}

	 	// update
	 	// form is (update to which table, the value need to set as column_name = ... , condition of setted row )
	 	function update($table, $values, $clause){
	 		$affectedRows = $this->connection->exec(
      			"UPDATE ". $table ." SET " .$values. " " .$clause );
	 		return $affectedRows;
	 	}
	 }
 ?>
