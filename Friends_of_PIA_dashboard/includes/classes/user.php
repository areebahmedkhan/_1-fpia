<?php

class user{
	public function confirm_query($result_set){
		if(!$result_set){
		die("Database Query Failed" . mysql_error());
		}
	}


	public function mysql_prep($conn,$value){
		$value = mysqli_real_escape_string($conn,$value);
		return $value;
	}
 
	public function redirect_to($location = NULL){
		if($location != NULL){
		header("Location: {$location}");
		exit;
		}
	}

	public function logged_in(){
		return isset($_SESSION['username']);
	}

	public function confirm_logged_in(){
		if(!$this->logged_in()){
		$this->redirect_to("login.php");
		}
	}

	public function check_login($conn,$username,$password){
		$username = $this->mysql_prep($conn,$username);
		$password = $this->mysql_prep($conn,$password);
		$hashed_password = md5($password);
		$query = "SELECT * FROM admin WHERE username = '{$username}' and password = '{$hashed_password}'";
		$result_set = mysqli_query($conn,$query);
		$this->confirm_query($result_set);
		if(mysqli_num_rows($result_set) == 1){
			$found_user = mysqli_fetch_array($result_set,MYSQLI_ASSOC);
			$_SESSION['username'] = $found_user['username'];
			$user_session = $_SESSION['username'];
			$this->cookie($user_session);
			return true;
		}else{
			return false;
		}
	}


	public function session(){
		session_start();
	}

	public function cookie($username){
		if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),$username,time()+42000,'/');
		}
	}
 
	public function logout(){
		$_SESSION = array();
		if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),'',time()-42000,'/');
		}
		session_destroy();
		$this->redirect_to("index.php?logout=1");
	}
}

?>