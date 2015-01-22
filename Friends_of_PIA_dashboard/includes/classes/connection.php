<?php

class connection{
	private $db_server = "localhost";
	private $db_name = "friend_of_pia";
	private $db_username = "root";
	private $db_password = "";
	public $my_connection;

	public function connect(){
		$conn = mysqli_connect($this->db_server,$this->db_username,$this->db_password,$this->db_name);
		if(!$conn){
			die("Database Connection Failed " . mysqli_connect_error());
		}else{
			$this->my_connection = $conn;
		}
		$selec_db = mysqli_select_db($conn,$this->db_name);
		if(!$selec_db){
			die("Database Selection Failed " . mysql_error());
		}
		mysqli_query($conn,"SET NAMES 'utf8'"); 
		return $this->my_connection;
	}

	public function close()
	{
		mysqli_close($my_connection);
	}
}

?>