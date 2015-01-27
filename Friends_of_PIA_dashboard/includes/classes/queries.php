<?php require_once("connection.php"); ?>
<?php require_once("user.php"); ?>
<?php
$user = new user();
$user->session();
$connection = new connection();
$connection->connect();
$user->confirm_logged_in();
?>
<?php

class query{
	
	public function airport_service($conn){
		$query_string = "SELECT COUNT(*) as 'count' FROM feedback WHERE sub_cat_id = 1";
		
		$result_set = mysqli_query($conn,$query_string);
		//$user->confirm_query($result_set);
		$result = mysqli_fetch_array($result_set,MYSQLI_ASSOC);
		$count = $result['count'];
		return $count;		
	}	
	public function chekIn($conn){
		$query_string = "SELECT COUNT(*) as 'count' FROM feedback WHERE sub_cat_id = 2";
		
		$result_set = mysqli_query($conn,$query_string);
		//$user->confirm_query($result_set);
		$result = mysqli_fetch_array($result_set,MYSQLI_ASSOC);
		$count = $result['count'];
		return $count;		
	}	
	public function Lounge_Services($conn){
		$query_string = "SELECT COUNT(*) as 'count' FROM feedback WHERE sub_cat_id = 3";
		
		$result_set = mysqli_query($conn,$query_string);
		//$user->confirm_query($result_set);
		$result = mysqli_fetch_array($result_set,MYSQLI_ASSOC);
		$count = $result['count'];
		return $count;		
	}	
	public function Boarding_Gate($conn){
		$query_string = "SELECT COUNT(*) as 'count' FROM feedback WHERE sub_cat_id = 4";
		
		$result_set = mysqli_query($conn,$query_string);
		//$user->confirm_query($result_set);
		$result = mysqli_fetch_array($result_set,MYSQLI_ASSOC);
		$count = $result['count'];
		return $count;		
	}	
	public function Punctuality($conn){
		$query_string = "SELECT COUNT(*) as 'count' FROM feedback WHERE sub_cat_id = 5";
		
		$result_set = mysqli_query($conn,$query_string);
		//$user->confirm_query($result_set);
		$result = mysqli_fetch_array($result_set,MYSQLI_ASSOC);
		$count = $result['count'];
		return $count;		
	}	
	public function IN_Flight_Services($conn){
		$query_string = "SELECT COUNT(*) as 'count' FROM feedback WHERE sub_cat_id = 6";
		
		$result_set = mysqli_query($conn,$query_string);
		//$user->confirm_query($result_set);
		$result = mysqli_fetch_array($result_set,MYSQLI_ASSOC);
		$count = $result['count'];
		return $count;		
	}	
	public function Cabin_Crew($conn){
		$query_string = "SELECT COUNT(*) as 'count' FROM feedback WHERE sub_cat_id = 7";
		
		$result_set = mysqli_query($conn,$query_string);
		//$user->confirm_query($result_set);
		$result = mysqli_fetch_array($result_set,MYSQLI_ASSOC);
		$count = $result['count'];
		return $count;		
	}	
	public function Meals($conn){
		$query_string = "SELECT COUNT(*) as 'count' FROM feedback WHERE sub_cat_id = 8";
		
		$result_set = mysqli_query($conn,$query_string);
		//$user->confirm_query($result_set);
		$result = mysqli_fetch_array($result_set,MYSQLI_ASSOC);
		$count = $result['count'];
		return $count;		
	}	
	public function Entertainment($conn){
		$query_string = "SELECT COUNT(*) as 'count' FROM feedback WHERE sub_cat_id = 9";
		
		$result_set = mysqli_query($conn,$query_string);
		//$user->confirm_query($result_set);
		$result = mysqli_fetch_array($result_set,MYSQLI_ASSOC);
		$count = $result['count'];
		return $count;		
	}	
	public function Cabin_Conditions($conn){
		$query_string = "SELECT COUNT(*) as 'count' FROM feedback WHERE sub_cat_id = 10";
		
		$result_set = mysqli_query($conn,$query_string);
		//$user->confirm_query($result_set);
		$result = mysqli_fetch_array($result_set,MYSQLI_ASSOC);
		$count = $result['count'];
		return $count;		
	}	
	public function happy($conn){
		$query_string = "SELECT COUNT(*) as 'count' FROM feedback WHERE ratting = 10";
		
		$result_set = mysqli_query($conn,$query_string);
		//$user->confirm_query($result_set);
		$result = mysqli_fetch_array($result_set,MYSQLI_ASSOC);
		$count = $result['count'];
		return $count;		
	}
	public function average($conn){
		$query_string = "SELECT COUNT(*) as 'count' FROM feedback WHERE ratting = 5";
		
		$result_set = mysqli_query($conn,$query_string);
		//$user->confirm_query($result_set);
		$result = mysqli_fetch_array($result_set,MYSQLI_ASSOC);
		$count = $result['count'];
		return $count;		
	}
	public function sad($conn){
		$query_string = "SELECT COUNT(*) as 'count' FROM feedback WHERE ratting = 1";
		
		$result_set = mysqli_query($conn,$query_string);
		//$user->confirm_query($result_set);
		$result = mysqli_fetch_array($result_set,MYSQLI_ASSOC);
		$count = $result['count'];
		return $count;		
	}
	public function total_bar_chart_dec($conn){
		$query_string = "SELECT COUNT(*) as 'count' from feedback WHERE `date_time` BETWEEN '2014-12-01' AND '2014-12-31 23:59:59' ";
		
		$result_set = mysqli_query($conn,$query_string);
		//$user->confirm_query($result_set);
		$result = mysqli_fetch_array($result_set,MYSQLI_ASSOC);
		$count = $result['count'];
		return $count;		
	}
	public function total_bar_chart_jan($conn){
		$query_string = "SELECT COUNT(*) as 'count' from feedback WHERE `date_time` BETWEEN '2015-01-01' AND '2015-01-31 23:59:59' ";
		
		$result_set = mysqli_query($conn,$query_string);
		//$user->confirm_query($result_set);
		$result = mysqli_fetch_array($result_set,MYSQLI_ASSOC);
		$count = $result['count'];
		return $count;		
	}
	public function happy_bar_chart_dec($conn){
		$query_string = "SELECT COUNT(*) as 'count' from feedback WHERE `date_time` BETWEEN '2014-12-01' AND '2014-12-31 23:59:59' AND ratting = 10";
		
		$result_set = mysqli_query($conn,$query_string);
		//$user->confirm_query($result_set);
		$result = mysqli_fetch_array($result_set,MYSQLI_ASSOC);
		$count = $result['count'];
		return $count;		
	}
	public function happy_bar_chart_jan($conn){
		$query_string = "SELECT COUNT(*) as 'count' from feedback WHERE `date_time` BETWEEN '2015-01-01' AND '2015-01-31 23:59:59' AND ratting = 10";
		
		$result_set = mysqli_query($conn,$query_string);
		//$user->confirm_query($result_set);
		$result = mysqli_fetch_array($result_set,MYSQLI_ASSOC);
		$count = $result['count'];
		return $count;		
	}
	public function average_bar_chart_dec($conn){
		$query_string = "SELECT COUNT(*) as 'count' from feedback WHERE `date_time` BETWEEN '2014-12-01' AND '2014-12-31 23:59:59' AND ratting = 5";
		
		$result_set = mysqli_query($conn,$query_string);
		//$user->confirm_query($result_set);
		$result = mysqli_fetch_array($result_set,MYSQLI_ASSOC);
		$count = $result['count'];
		return $count;		
	}
	public function average_bar_chart_jan($conn){
		$query_string = "SELECT COUNT(*) as 'count' from feedback WHERE `date_time` BETWEEN '2015-01-01' AND '2015-01-31 23:59:59' AND ratting = 5";
		
		$result_set = mysqli_query($conn,$query_string);
		//$user->confirm_query($result_set);
		$result = mysqli_fetch_array($result_set,MYSQLI_ASSOC);
		$count = $result['count'];
		return $count;		
	}
	public function sad_bar_chart_dec($conn){
		$query_string = "SELECT COUNT(*) as 'count' from feedback WHERE `date_time` BETWEEN '2014-12-01' AND '2014-12-31 23:59:59' AND ratting = 1";
		
		$result_set = mysqli_query($conn,$query_string);
		//$user->confirm_query($result_set);
		$result = mysqli_fetch_array($result_set,MYSQLI_ASSOC);
		$count = $result['count'];
		return $count;		
	}
	public function sad_bar_chart_jan($conn){
		$query_string = "SELECT COUNT(*) as 'count' from feedback WHERE `date_time` BETWEEN '2015-01-01' AND '2015-01-31 23:59:59' AND ratting = 1";
		
		$result_set = mysqli_query($conn,$query_string);
		//$user->confirm_query($result_set);
		$result = mysqli_fetch_array($result_set,MYSQLI_ASSOC);
		$count = $result['count'];
		return $count;		
	}

	




}


?>