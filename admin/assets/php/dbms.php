<?php
class DBMS{

	private $servername = "localhost";
  	private $usernamedb = "root";
  	private $passworddb = "";
  	private $dbname = "eventdotcom";
  	private $conn = null;

  	function __construct(){
    	global $servername, $usernamedb, $passworddb, $dbname;
    	try {
      	$this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->usernamedb, $this->passworddb);
      	$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	}
    	catch(PDOException $e) {
        	echo "Error: " . $e->getMessage();
    	}
  	}

  	private function addAccount($id, $type,$fname,$lanme,$addr,$phoneno,$email, $password){
    	// $password_encryp = password_hash($password, PASSWORD_DEFAULT);
   		 try {
        		$stmt = $this->conn->prepare("INSERT INTO users(userid, type,fname,lanme,address,phoneno,email ,pwd)
                VALUES (:userid, :type, :fname, :lanme, :address, :phoneno, :email ,:pwd)");
                $stmt->bindParam(':userid', $id);
                $stmt->bindParam(':type', $type);
                $stmt->bindParam(':fname', $fname);
                $stmt->bindParam(':lname', $lname);
               	$stmt->bindParam(':address', $addr);
				$stmt->bindParam(':phoneno', $phoneno);
				$stmt->bindParam(':email', $email);
				$stmt->bindParam(':pwd', $password);
        		$stmt->execute();
        		return $this->conn->lastInsertId();
        		//echo "New record created successfully";
    		}
    		catch(PDOException $e){
        	echo "<br>" . $e->getMessage();
    		}
  	}


  	function addUser($id, $type, $fname, $lanme, $addr, $phoneno, $email , $password){
    	return $this->addAccount($id, $type,$fname,$lanme,$addr,$phoneno,$email ,$password);
  	} 


  	function getLastID(){
  		try {
  			$stmt = $this->conn->prepare("SELECT max(userid)  FROM users");
  			$stmt->execute();
  			$row = $stmt->fetch();
  			// echo $row[0];
  			return $row['max(userid)'];
  			
  		} catch (Exception $e) {
  			echo "<br>" . $e->getMessage();
  		}
  	}

  	function getAllUser(){
  		try{
  			$stmt = $this->conn->prepare("SELECT *  FROM users");
  			$stmt->execute();
  			$result = $stmt->fetchAll();
  			foreach ($result as $row) {
  				# code...
  				echo $row['userid'];
  			}
      		return $result;
  		}catch (Exception $e) {
  			echo "<br>" . $e->getMessage();
  		}
  	}

}

$dbms = new DBMS();

?>