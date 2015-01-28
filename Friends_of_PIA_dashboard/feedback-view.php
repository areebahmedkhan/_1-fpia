<?php require_once("includes/classes/connection.php"); ?>
<?php require_once("includes/classes/user.php"); ?>
<?php
$user = new user();
$user->session();
$connection = new connection();
$connection->connect();
$user->confirm_logged_in();

?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>All Feedback</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
    
    
    <link href="js/guidely/guidely.css" rel="stylesheet"> 

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

<body>

<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="index.php">
				Friends of PIA Admin Panel				
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					<!--<li class="dropdown">						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog"></i>
							Account
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="javascript:;">Settings</a></li>
							<li><a href="javascript:;">Help</a></li>
						</ul>						
					</li>-->
			
					<li class="dropdown">						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i> 
							Admin
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="javascript:;">Profile</a></li>
							<li><a href="javascript:;"><?php if($user->logged_in()){ echo '<a href="logout.php">Logout</a>'; }?></a></li>
						</ul>						
					</li>
				</ul>
			
				<form class="navbar-search pull-right">
					<input type="text" class="search-query" placeholder="Search">
				</form>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->
    



    
<div class="subnavbar">

	<div class="subnavbar-inner">
	
		<div class="container">

			<ul class="mainnav">
			
				<li>
					<a href="index.php">
						<i class="icon-dashboard"></i>
						<span>Dashboard</span>
					</a>	    				
				</li>
				
				
				
				<li>
					<a href="reports.php">
						<i class="icon-list-alt"></i>
						<span>Reports</span>
					</a>    				
				</li>
				
				<li >					
					<a href="guidely.php">
						<i class="icon-facetime-video"></i>
						<span>App Tour</span>
					</a>  									
				</li>
                
                
                <li>					
					<a href="charts.php">
						<i class="icon-bar-chart"></i>
						<span>Charts</span>
					</a>  									
				</li>
                <li class="active">
                	<a href="feedback-view.php">
                		<i class="icon"></i><span>Feedback View</span>
                	 </a>
                 </li>
			
			</ul>

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    
    
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	
	      <div class="row">	      	      		 	
	      <div class="widget widget-table action-table" >
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>All Feedback Records</h3>
            </div>
            
            <!-- /widget-header -->
            <div class="widget-content">
              <div id="dvData">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Name </th>
                    <th> Email </th>
                    <th> Flight No </th>
                    <th> Menu </th>
                    <th> Comments </th>
                    <th> Rating </th>
                    <th> Image </th>
                    <th> Date And Time </th>
                  </tr>
                </thead>

                <tbody>
                    
                <?php /////////// MAIN QUERY //////////
                //select u.name,u.email,u.flight_no, f.fd_id , f.date_time , c.title , sc.title as 'sub_title' , f.comments , f.ratting , f.image from catagories c, sub_catagories sc, feedback f, user_table u where u.user_id = f.user_id AND f.sub_cat_id = sc.sub_cat AND c.cat_id = sc.cat_id AND sc.title = 'Meals' order by f.fd_id desc ?>


                <?php $sql = "select u.name,u.email,u.flight_no, f.fd_id , f.date_time , c.title , sc.title as 'sub_title' , f.comments , f.ratting , f.image from catagories c, sub_catagories sc, feedback f, user_table u where u.user_id = f.user_id AND f.sub_cat_id = sc.sub_cat AND c.cat_id = sc.cat_id order by f.fd_id desc";
                          $result = mysqli_query($connection->my_connection,$sql);
                          if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td><a href='#' value = '".$row['name']."'>".$row['name']."</a></td>";
                      echo "<td><a href='#' value = '".$row['email']."'>".$row['email']."</a></td>";
                      echo "<td><a href='#' value = '".$row['flight_no']."'>".$row['flight_no']."</a></td>";
              
                      echo "<td><a href='#' id = 'sub_title' value = '".$row['sub_title']."'>".$row['sub_title']."</a></td>";
                      echo "<td>".$row['comments']."</td>";
                      //ratting smile
                      if($row['ratting']=='10'){
                        echo "<td>".'<img src="images/happy.png" width="50" height="50" />'."</td>";
                      }
                      else if($row['ratting']=='5'){
                        echo "<td>".'<img src="images/average.png" width="50" height="50" />'."</td>";
                      }
                      else if($row['ratting']=='1'){
                        echo "<td>".'<img src="images/sad.png" width="50" height="50" />'."</td>";
                      }else{
                        echo "<td>".'<img src="images/no-image.png" width="50" height="50" />'."</td>";
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
                    ?>
                </tbody>
              </table>
            </div>
            </div>
            <!-- /widget-content --> 
          </div>
      <!-- /row --> 
    </div>
	      </div> <!-- /row -->
	
	    </div> <!-- /container -->
    
	</div> <!-- /main-inner -->
	    
</div> <!-- /main -->
    


<div class="extra">

	<div class="extra-inner">

		<!--<div class="container">
      <div class="row">
                    <div class="span3">
                        <h4>
                            About Free Admin Template</h4>
                        <ul>
                            <li><a href="javascript:;">EGrappler.com</a></li>
                            <li><a href="javascript:;">Web Development Resources</a></li>
                            <li><a href="javascript:;">Responsive HTML5 Portfolio Templates</a></li>
                            <li><a href="javascript:;">Free Resources and Scripts</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                   <!--<div class="span3">
                        <h4>
                            Support</h4>
                        <ul>
                            <li><a href="javascript:;">Frequently Asked Questions</a></li>
                            <li><a href="javascript:;">Ask a Question</a></li>
                            <li><a href="javascript:;">Video Tutorial</a></li>
                            <li><a href="javascript:;">Feedback</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                    <!--<div class="span3">
                        <h4>
                            Something Legal</h4>
                        <ul>
                            <li><a href="javascript:;">Read License</a></li>
                            <li><a href="javascript:;">Terms of Use</a></li>
                            <li><a href="javascript:;">Privacy Policy</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
                    <!--<div class="span3">
                        <h4>
                            Open Source jQuery Plugins</h4>
                        <ul>
                            <li><a href="http://www.egrappler.com">Open Source jQuery Plugins</a></li>
                            <li><a href="http://www.egrappler.com;">HTML5 Responsive Tempaltes</a></li>
                            <li><a href="http://www.egrappler.com;">Free Contact Form Plugin</a></li>
                            <li><a href="http://www.egrappler.com;">Flat UI PSD</a></li>
                        </ul>
                    </div>
                    <!-- /span3 -->
               <!-- </div>
      <!-- /row --> 
    <!--</div>-->

	</div> <!-- /extra-inner -->

</div> <!-- /extra -->


    
    
<div class="footer">
	
	<div class="footer-inner">
		
		<div class="container">
			
			<div class="row">
				
    			<div class="span12">
    				&copy; 2015 <a href="http://www.piac.com.pk/" target="_blank">Pakistan International Airline</a>.
    			</div> <!-- /span12 -->
    			<div style="float:right;" >
                      Developed by : <a href="http://www.spectrumyr.com/" target="_blank">Spectrum Y&amp;R</a>
                    </div>
    		</div> <!-- /row -->
    		
		</div> <!-- /container -->
		
	</div> <!-- /footer-inner -->
	
</div> <!-- /footer -->
    

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.7.2.min.js"></script>

<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>

<script src="js/guidely/guidely.min.js"></script>

<script>

$(function () {
	
	guidely.add ({
		attachTo: '#target-1'
		, anchor: 'top-left'
		, title: 'Guide Title'
		, text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.'
	});
	
	guidely.add ({
		attachTo: '#target-2'
		, anchor: 'top-right'
		, title: 'Guide Title'
		, text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.'
	});
	
	guidely.add ({
		attachTo: '#target-3'
		, anchor: 'middle-middle'
		, title: 'Guide Title'
		, text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.'
	});
	
	guidely.add ({
		attachTo: '#target-4'
		, anchor: 'top-right'
		, title: 'Guide Title'
		, text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.'
	});
	
	guidely.init ({ welcome: true, startTrigger: false });


});

</script>
  </body>

</html>
