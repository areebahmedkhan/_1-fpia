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
    <link href="js/guidely/guidely.css" rel="stylesheet"> 

    <link href="css/jquery.dataTables.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <style type="text/css">
    .name,.email,.flight_no,.sub_title{
    	cursor: pointer;
    }
    </style>

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
					<?php $total=$query->total_feedback($connection->my_connection);?>

					<?php $happy=$query->happy($connection->my_connection);?>
					<?php $average=$query->average($connection->my_connection);?>
					<?php $sad=$query->sad($connection->my_connection);?>

					<?php $percentage_happy=($happy/$total)*100;?>
					<?php $percentage_average=($average/$total)*100;?>
					<?php $percentage_sad=($sad/$total)*100;?>

					<div class="widget-content"><ul><li style="color:#F38630; font-size: 20px;";><b>Happy  : <?php echo round($percentage_happy)."%";?></b></li><br><li style="color:#E0E4CC; font-size: 20px;";>Average  : <?php echo round($percentage_average)."%";?></li><br><li style="color:#69D2E7; font-size: 20px;";>Sad  : <?php echo round($percentage_sad)."%";?></li></ul>
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
	      
	     <div class="row">	      	      		 	
	      <div class="widget widget-table action-table" style="margin-left: 30px;">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>All Feedback Records</h3><a style="float:right; margin-right:5px;" href="#" class="export"><input type="button" value="Export data in CSV"></a>
            </div>
            
            <!-- /widget-header -->
            <div class="widget-content">
              <div id="dvData">
              <table class="table table-striped table-bordered display" id="example"  cellspacing="0" width="100%">
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

                <tbody style='text-align:center;' id ="tbody_query_data">

                <?php $sql = "select u.name,u.email,u.flight_no, f.fd_id , f.date_time , c.title , sc.title as 'sub_title' , f.comments , f.ratting , f.image from catagories c, sub_catagories sc, feedback f, user_table u where u.user_id = f.user_id AND f.sub_cat_id = sc.sub_cat AND c.cat_id = sc.cat_id order by f.fd_id desc";
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
                    ?>
                </tbody>
              </table>
            </div>
            </div>
            <!-- /widget-content --> 
          </div>
      <!-- /row --> 
    </div>
	      
	      
			
	      
	      
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->
    
   
    
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
<script language="javascript" type="text/javascript" src="js/jquery.dataTables.min.js"></script>
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
        labels: ["December","January","February"],
        datasets: [
				
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)",
				    data: [ <?php echo $query->total_bar_chart_dec($connection->my_connection); ?>, <?php echo $query->total_bar_chart_jan($connection->my_connection); ?>,<?php echo $query->total_bar_chart_feb($connection->my_connection); ?>]
				}
			]

    }

    var barChartData1 = {
        labels: ["December","January","February"],
        datasets: [
				
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)", 
	 
				    data: [<?php echo $query->happy_bar_chart_dec($connection->my_connection); ?>, <?php echo $query->happy_bar_chart_jan($connection->my_connection); ?>,<?php echo $query->happy_bar_chart_feb($connection->my_connection); ?>]
				}
			]

    }
    var barChartData2 = {
        labels: ["December","January","February"],
        datasets: [
				
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)", 
				    data: [<?php echo $query->average_bar_chart_dec($connection->my_connection); ?>, <?php echo $query->average_bar_chart_jan($connection->my_connection); ?>,<?php echo $query->average_bar_chart_feb($connection->my_connection); ?>]
				}
			]

    }
    var barChartData3 = {
        labels: ["December","January","February"],
        datasets: [
				
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)", 
				    data: [<?php echo $query->sad_bar_chart_dec($connection->my_connection); ?>, <?php echo $query->sad_bar_chart_jan($connection->my_connection); ?>,<?php echo $query->sad_bar_chart_feb($connection->my_connection); ?>]
				}
			]

    }

    var myLine = new Chart(document.getElementById("bar-chart").getContext("2d")).Bar(barChartData);
	var myLine = new Chart(document.getElementById("bar-chart1").getContext("2d")).Bar(barChartData1);
	var myLine = new Chart(document.getElementById("bar-chart2").getContext("2d")).Bar(barChartData2);
	var myLine = new Chart(document.getElementById("bar-chart3").getContext("2d")).Bar(barChartData3);
	
	</script>

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


<script type="text/javascript">

$(document).ready(function() {
    $('#example').dataTable( {
        "pagingType": "full_numbers"
    } );
} );
</script>
<script type="text/javascript">

$(document).ready(function () {

    function exportTableToCSV($table, filename) {

        var $rows = $table.find('tr:has(td)'),

            // Temporary delimiter characters unlikely to be typed by keyboard
            // This is to avoid accidentally splitting the actual contents
            tmpColDelim = String.fromCharCode(11), // vertical tab character
            tmpRowDelim = String.fromCharCode(0), // null character

            // actual delimiter characters for CSV format
            colDelim = '","',
            rowDelim = '"\r\n"',

            // Grab text from table into CSV formatted string
            csv = '"' + $rows.map(function (i, row) {
                var $row = $(row),
                    $cols = $row.find('td');

                return $cols.map(function (j, col) {
                    var $col = $(col),
                        text = $col.text();

                    return text.replace('"', '""'); // escape double quotes

                }).get().join(tmpColDelim);

            }).get().join(tmpRowDelim)
                .split(tmpRowDelim).join(rowDelim)
                .split(tmpColDelim).join(colDelim) + '"',

            // Data URI
            csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

        $(this)
            .attr({
            'download': filename,
                'href': csvData,
                'target': '_blank'
        });
    }

    // This must be a hyperlink
    $(".export").on('click', function (event) {
        // CSV
        exportTableToCSV.apply(this, [$('#dvData'), 'PIA_Report.csv']);
        
        // IF CSV, don't do event.preventDefault() or return false
        // We actually need this to be a typical hyperlink
    });
});

</script>
  </body>

</html>
