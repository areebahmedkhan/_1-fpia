<?php require_once("includes/classes/connection.php"); ?>
<?php require_once("includes/classes/user.php"); ?>
<?php require_once("includes/classes/queries.php"); ?>
<?php
$user = new user();
//$user->session();
$connection = new connection();
$connection->connect();
$user->confirm_logged_in();
$query = new query();
?>

<!DOCTYPE html>
<html lang="en">
  
 <head>
    <meta charset="utf-8">
    <title>Reports - Admin </title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
    
    <link href="css/pages/reports.css" rel="stylesheet">

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
				
				
				
				<li class="active">
					<a href="reports.php">
						<i class="icon-list-alt"></i>
						<span>Reports</span>
					</a>    				
				</li>
				
				<li>					
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
                <li>
                	<a href="feedback-view.php">
                		<i class="icon"></i><span>Feedback View</span> 
                	</a> 
                </li>
                
               <!-- <li>					
					<a href="shortcodes.php">
						<i class="icon-code"></i>
						<span>Shortcodes</span>
					</a>  									
				</li>
				
				<li class="dropdown">					
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-long-arrow-down"></i>
						<span>Drops</span>
						<b class="caret"></b>
					</a>	
				
					<ul class="dropdown-menu">
                    	<li><a href="icons.php">Icons</a></li>
						<li><a href="faq.php">FAQ</a></li>
                        <li><a href="pricing.php">Pricing Plans</a></li>
                        <li><a href="login.php">Login</a></li>
						<li><a href="signup.php">Signup</a></li>
						<li><a href="error.php">404</a></li>
                    </ul>    				
				</li>-->
			
			</ul>

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    

    
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	    	
	     <div class="row">
	      	
	      	<div class="span12">
	      
	      	<div class="info-box">
               <div class="row-fluid stats-box">
                  <div class="span4">
                  	<div class="stats-box-title">HAPPY</div>
                    <div class="stats-box-all-info"><img src="img/happy.png" /> <?php echo $query->happy($connection->my_connection); ?></div>
                    <div class="wrap-chart"><div id="visitor-stat" class="chart" style="padding: 0px; position: relative;"><canvas id="bar-chart1" class="chart-holder" height="150" width="325"></canvas></div></div>
                  </div>
                  
                  <div class="span4">
                    <div class="stats-box-title">AVERAGE</div>
                    <div class="stats-box-all-info"><img src="img/average.png" /> <?php echo $query->average($connection->my_connection); ?></div>
                    <div class="wrap-chart"><div id="order-stat" class="chart" style="padding: 0px; position: relative;"><canvas id="bar-chart2" class="chart-holder" height="150" width="325"></canvas></div></div>
                  </div>
                  
                  <div class="span4">
                    <div class="stats-box-title">SAD</div>
                    <div class="stats-box-all-info"><img src="img/sad.png" /> <?php echo $query->sad($connection->my_connection); ?></div>
                    <div class="wrap-chart">
                    
                    <div id="user-stat" class="chart" style="padding: 0px; position: relative;"><canvas id="bar-chart3" class="chart-holder" height="150" width="325"></canvas></div>
                    
                    </div>
                  </div>
               </div>
               
               
             </div>
               
               
         </div>
         </div>      
	      	
	  	  <!-- /row -->
	      <div class="row">
	      	
	      	<div class="span6">
	      		
	      		<div class="widget">
						
					<div class="widget-header">
						<i class="icon-star"></i>
						<h3>Rating %</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content"><ul><li style="color:#F38630; font-size: 20px;";><b>Happy</b></li><br><li style="color:#E0E4CC; font-size: 20px;";>Average</li><br><li style="color:#69D2E7; font-size: 20px;";>Sad</li></ul>
						<canvas id="pie-chart" class="chart-holder" height="250" width="538"></canvas>
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
				
	      		
	      		
	      		
		    </div> <!-- /span6 -->
	      	
	      	
	      	<div class="span6">
	      		
	      		<div class="widget">
							
					<div class="widget-header">
						<i class="icon-list-alt"></i>
						<h3>Total Monthly Feedbacks</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<canvas id="bar-chart" class="chart-holder" height="250" width="538"></canvas>
					</div> <!-- /widget-content -->
				
				</div> <!-- /widget -->
									
		      </div> <!-- /span6 -->
	      	
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
    			
    			</div>
    			<div style="float:right;" >
                      Developed by : <a href="http://www.spectrumyr.com/" target="_blank">Spectrum Y&amp;R</a>
                    </div> <!-- /span12 -->
    			
    		</div> <!-- /row -->
    		
		</div> <!-- /container -->
		
	</div> <!-- /footer-inner -->
	
</div> <!-- /footer -->
  



<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/excanvas.min.js"></script>
<script src="js/chart.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>
<script>

    var pieData = [
				{
				    value: <?php echo $query->happy($connection->my_connection); ?>,
				    color: "#F38630"
				},
				{
				    value: <?php echo $query->average($connection->my_connection); ?>,
				    color: "#E0E4CC"
				},
				{
				    value: <?php echo $query->sad($connection->my_connection); ?>,
				    color: "#69D2E7"
				}

			];

    var myPie = new Chart(document.getElementById("pie-chart").getContext("2d")).Pie(pieData);

    var barChartData = {
        labels: ["December","January"],
        datasets: [
				
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)",
				    data: [ <?php echo $query->total_bar_chart_dec($connection->my_connection); ?>, <?php echo $query->total_bar_chart_jan($connection->my_connection); ?>]
				}
			]

    }

    var barChartData1 = {
        labels: ["December","January"],
        datasets: [
				
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)", 
	 
				    data: [<?php echo $query->happy_bar_chart_dec($connection->my_connection); ?>, <?php echo $query->happy_bar_chart_jan($connection->my_connection); ?>]
				}
			]

    }
    var barChartData2 = {
        labels: ["December","January"],
        datasets: [
				
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)", 
				    data: [<?php echo $query->average_bar_chart_dec($connection->my_connection); ?>, <?php echo $query->average_bar_chart_jan($connection->my_connection); ?>]
				}
			]

    }
    var barChartData3 = {
        labels: ["December","January"],
        datasets: [
				
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)", 
				    data: [<?php echo $query->sad_bar_chart_dec($connection->my_connection); ?>, <?php echo $query->sad_bar_chart_jan($connection->my_connection); ?>]
				}
			]

    }

    var myLine = new Chart(document.getElementById("bar-chart").getContext("2d")).Bar(barChartData);
	var myLine = new Chart(document.getElementById("bar-chart1").getContext("2d")).Bar(barChartData1);
	var myLine = new Chart(document.getElementById("bar-chart2").getContext("2d")).Bar(barChartData2);
	var myLine = new Chart(document.getElementById("bar-chart3").getContext("2d")).Bar(barChartData3);
	
	</script>


  </body>

</html>
