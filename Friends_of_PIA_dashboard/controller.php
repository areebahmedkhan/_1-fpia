<?php
require_once("includes/classes/connection.php");
require_once("includes/classes/user.php");

$connection = new connection();
$connection->connect();
$user = new user();
$user->session();

$user->confirm_logged_in();


$action = $_POST["action"];
$content = $_POST["content"];
switch ($action) {
	case 'sub_category':
		# code...
		$sql = "select u.name,u.email,u.flight_no, f.fd_id , f.date_time , c.title , sc.title as 'sub_title' , f.comments , f.ratting , f.image from catagories c, sub_catagories sc, feedback f, user_table u where u.user_id = f.user_id AND f.sub_cat_id = sc.sub_cat AND c.cat_id = sc.cat_id AND sc.title = '$content' order by f.fd_id desc";
                          $result = mysqli_query($connection->my_connection,$sql);
                          if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td><a class = 'name'>".$row['name']."</a></td>";
                      echo "<td><a class = 'email'>".$row['email']."</a></td>";
                      echo "<td><a class = 'flight_no'>".$row['flight_no']."</a></td>";
              
                      echo "<td><a class = 'sub_title'>".$row['sub_title']."</a></td>";
                      echo "<td>".$row['comments']."</td>";
                      //ratting smile
                      if($row['ratting']=='10'){
                        echo "<td>".'<img src="images/happy.png" width="50" />'."</td>";
                      }
                      else if($row['ratting']=='5'){
                        echo "<td>".'<img src="images/average.png" width="50"/>'."</td>";
                      }
                      else if($row['ratting']=='1'){
                        echo "<td>".'<img src="images/sad.png" width="50" />'."</td>";
                      }else{
                        echo "<td>".'<img src="images/no-image.png" width="50" />'."</td>";
                      }
                                
                      if($row['image']){
                        echo "<td>".'<a href="data:image/jpeg;base64,'.$row['image'].' " width="500" height="500" target="_blank"><img width="120" height="150" src="data:image/jpeg;base64,'.$row['image'].'" /></a>'."</td>";
                      }else{
                        echo "<td>".'<img src="images/no-image.png" width="120" height="150" />'."</td>";
                      }
                      echo "<td>".$row['date_time']."</td>";
                      echo "</tr>";
                      }        
			}
		break;
	
	case 'name':
		# code...
		$sql = "select u.name,u.email,u.flight_no, f.fd_id , f.date_time , c.title , sc.title as 'sub_title' , f.comments , f.ratting , f.image from catagories c, sub_catagories sc, feedback f, user_table u where u.user_id = f.user_id AND f.sub_cat_id = sc.sub_cat AND c.cat_id = sc.cat_id AND u.name = '$content' order by f.fd_id desc";
                          $result = mysqli_query($connection->my_connection,$sql);
                          if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td><a class = 'name'>".$row['name']."</a></td>";
                      echo "<td><a class = 'email'>".$row['email']."</a></td>";
                      echo "<td><a class = 'flight_no'>".$row['flight_no']."</a></td>";
              
                      echo "<td><a class = 'sub_title'>".$row['sub_title']."</a></td>";
                      echo "<td>".$row['comments']."</td>";
                      //ratting smile
                      if($row['ratting']=='10'){
                        echo "<td>".'<img src="images/happy.png" width="50" />'."</td>";
                      }
                      else if($row['ratting']=='5'){
                        echo "<td>".'<img src="images/average.png" width="50"/>'."</td>";
                      }
                      else if($row['ratting']=='1'){
                        echo "<td>".'<img src="images/sad.png" width="50" />'."</td>";
                      }else{
                        echo "<td>".'<img src="images/no-image.png" width="50" />'."</td>";
                      }
                                
                      if($row['image']){
                        echo "<td>".'<a href="data:image/jpeg;base64,'.$row['image'].' " width="500" height="500" target="_blank"><img width="120" height="150" src="data:image/jpeg;base64,'.$row['image'].'" /></a>'."</td>";
                      }else{
                        echo "<td>".'<img src="images/no-image.png" width="120" height="150" />'."</td>";
                      }
                      echo "<td>".$row['date_time']."</td>";
                      echo "</tr>";
                      }        
			}
		break;

		case 'email':
		# code...
		$sql = "select u.name,u.email,u.flight_no, f.fd_id , f.date_time , c.title , sc.title as 'sub_title' , f.comments , f.ratting , f.image from catagories c, sub_catagories sc, feedback f, user_table u where u.user_id = f.user_id AND f.sub_cat_id = sc.sub_cat AND c.cat_id = sc.cat_id AND u.email = '$content' order by f.fd_id desc";
                          $result = mysqli_query($connection->my_connection,$sql);
                          if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td><a class = 'name'>".$row['name']."</a></td>";
                      echo "<td><a class = 'email'>".$row['email']."</a></td>";
                      echo "<td><a class = 'flight_no'>".$row['flight_no']."</a></td>";
              
                      echo "<td><a class = 'sub_title'>".$row['sub_title']."</a></td>";
                      echo "<td>".$row['comments']."</td>";
                      //ratting smile
                      if($row['ratting']=='10'){
                        echo "<td>".'<img src="images/happy.png" width="50" />'."</td>";
                      }
                      else if($row['ratting']=='5'){
                        echo "<td>".'<img src="images/average.png" width="50"/>'."</td>";
                      }
                      else if($row['ratting']=='1'){
                        echo "<td>".'<img src="images/sad.png" width="50" />'."</td>";
                      }else{
                        echo "<td>".'<img src="images/no-image.png" width="50" />'."</td>";
                      }
                                
                      if($row['image']){
                        echo "<td>".'<a href="data:image/jpeg;base64,'.$row['image'].' " width="500" height="500" target="_blank"><img width="120" height="150" src="data:image/jpeg;base64,'.$row['image'].'" /></a>'."</td>";
                      }else{
                        echo "<td>".'<img src="images/no-image.png" width="120" height="150" />'."</td>";
                      }
                      echo "<td>".$row['date_time']."</td>";
                      echo "</tr>";
                      }        
			}
		break;

		case 'flight_no':
		# code...
		$sql = "select u.name,u.email,u.flight_no, f.fd_id , f.date_time , c.title , sc.title as 'sub_title' , f.comments , f.ratting , f.image from catagories c, sub_catagories sc, feedback f, user_table u where u.user_id = f.user_id AND f.sub_cat_id = sc.sub_cat AND c.cat_id = sc.cat_id AND u.flight_no = '$content' order by f.fd_id desc";
                          $result = mysqli_query($connection->my_connection,$sql);
                          if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td><a class = 'name'>".$row['name']."</a></td>";
                      echo "<td><a class = 'email'>".$row['email']."</a></td>";
                      echo "<td><a class = 'flight_no'>".$row['flight_no']."</a></td>";
              
                      echo "<td><a class = 'sub_title'>".$row['sub_title']."</a></td>";
                      echo "<td>".$row['comments']."</td>";
                      //ratting smile
                      if($row['ratting']=='10'){
                        echo "<td>".'<img src="images/happy.png" width="50" />'."</td>";
                      }
                      else if($row['ratting']=='5'){
                        echo "<td>".'<img src="images/average.png" width="50"/>'."</td>";
                      }
                      else if($row['ratting']=='1'){
                        echo "<td>".'<img src="images/sad.png" width="50" />'."</td>";
                      }else{
                        echo "<td>".'<img src="images/no-image.png" width="50" />'."</td>";
                      }
                                
                      if($row['image']){
                        echo "<td>".'<a href="data:image/jpeg;base64,'.$row['image'].' " width="500" height="500" target="_blank"><img width="120" height="150" src="data:image/jpeg;base64,'.$row['image'].'" /></a>'."</td>";
                      }else{
                        echo "<td>".'<img src="images/no-image.png" width="120" height="150" />'."</td>";
                      }
                      echo "<td>".$row['date_time']."</td>";
                      echo "</tr>";
                      }        
			}
		break;

	default:
		# code...
		break;
}


?>

<script type="text/javascript">
$(document).ready(function(){
	$(".sub_title").click(function(){
		var data = $(this).text();
		$.ajax({
			type	: 	"POST",
			url 	: 	"controller.php",
			data 	: 	{action : 	"sub_category" , content 	: 	data}
		}).done(function(data){
			$("#tbody_query_data").html(data);
		});
	});

	$(".name").click(function(){
		var data = $(this).text();
		$.ajax({
			type	: 	"POST",
			url 	: 	"controller.php",
			data 	: 	{action : 	"name" , content 	: 	data}
		}).done(function(data){
			$("#tbody_query_data").html(data);
		});
	});

	$(".email").click(function(){
		var data = $(this).text();
		$.ajax({
			type	: 	"POST",
			url 	: 	"controller.php",
			data 	: 	{action : 	"email" , content 	: 	data}
		}).done(function(data){
			$("#tbody_query_data").html(data);
		});
	});

	$(".flight_no").click(function(){
		var data = $(this).text();
		$.ajax({
			type	: 	"POST",
			url 	: 	"controller.php",
			data 	: 	{action : 	"flight_no" , content 	: 	data}
		}).done(function(data){
			$("#tbody_query_data").html(data);
		});
	});
});
</script>
