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
<title>Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
<link href="css/jquery.dataTables.css" rel="stylesheet">

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.php">Friends of PIA Admin Panel	 </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
         <!-- <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Account <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Settings</a></li>
              <li><a href="javascript:;">Help</a></li>
            </ul>
          </li>-->
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> Admin <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Profile</a></li>
              <li><a href="javascript:;"><?php if($user->logged_in()){ echo '<a href="logout.php">Logout</a>'; }?></a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Search">
        </form>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class="active"><a href="index.php"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
        <li><a href="reports.php"><i class="icon-list-alt"></i><span>Reports</span> </a> </li>
        <li><a href="guidely.php"><i class="icon-facetime-video"></i><span>App Tour</span> </a></li>
        <li><a href="charts.php"><i class="icon-bar-chart"></i><span>Charts</span> </a> </li>
        <li><a href="feedback-view.php"><i class="icon"></i><span>Feedback View</span> </a> </li>
        
        <!--<li><a href="shortcodes.html"><i class="icon-code"></i><span>Shortcodes</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Drops</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="icons.html">Icons</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="pricing.html">Pricing Plans</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="signup.html">Signup</a></li>
            <li><a href="error.html">404</a></li>
          </ul>
        </li>-->
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span6">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3>Feedback Menus</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <h6 class="bigstats">Friends of PIA Feedback Menu</h6>
                  <div id="big_stats" class="cf">
                    <div class="stat"><i class="icon"><img src="img/airportservices-transparent.png" alt="Airport Services" width = 50 onmouseover="nhpup.popup('click to see all administration options');"></i> <span class="value"><?php echo $query->airport_service($connection->my_connection); ?></span> </div>
                    <!-- .stat -->
                    
                    <div class="stat"> <i class="icon"><img src="img/checkin-transparent.png" width = 50 alt="Check In"></i> <span class="value"><?php echo $query->chekIn($connection->my_connection); ?></span> </div>
                    <!-- .stat -->
                    
                    <div class="stat"> <i class="icon"><img src="img/lounge-transparent.png" width = 50 alt="Lounge Services"></i> <span class="value"><?php echo $query->Lounge_Services($connection->my_connection); ?></span> </div>
                    <!-- .stat -->
                    
                    <div class="stat"> <i class="icon"><img src="img/boardinggate-transparent.png" width = 50 alt="Boarding Gate"></i> <span class="value"><?php echo $query->Boarding_Gate($connection->my_connection); ?></span> </div>
                    <!-- .stat -->
 
                  </div>
				  <div id="big_stats" class="cf">
                    <div class="stat"> <i class="icon"><img src="img/punctuality-transparent.png" width = 50 alt="Punctuality"></i> <span class="value"><?php echo $query->Punctuality($connection->my_connection); ?></span> </div>
                    <!-- .stat -->
                    
                    <div class="stat"> <i class="icon"><img src="img/inflightservices-transparent.png" width = 50 alt="In Flight Services"></i> <span class="value"><?php echo $query->IN_Flight_Services($connection->my_connection); ?></span> </div>
                    <!-- .stat -->
                    
                    <div class="stat"> <i class="icon"><img src="img/cabincrew-transparent.png" width = 50 alt="Cabin Crew"></i><span class="value"><?php echo $query->Cabin_Crew($connection->my_connection); ?></span> </div>
                    <!-- .stat -->
                    
                    <div class="stat"> <i class="icon"><img src="img/meals-transparent.png" width = 50 alt="Meals"></i> <span class="value"><?php echo $query->Meals($connection->my_connection); ?></span> </div>
                    <!-- .stat -->
 
                  </div>
				  <div id="big_stats" class="cf">
                    <div class="stat"> <i class="icon"><img src="img/entertainment-transparent.png" width = 50 alt="Entertainment"></i> <span class="value"><?php echo $query->Entertainment($connection->my_connection); ?></span> </div>
                    <!-- .stat -->
                    
                    <div class="stat"> <i class="icon"><img src="img/cabincondition-transparent.png" width = 50 alt="Cabin Condition"></i> <span class="value"><?php echo $query->Cabin_Conditions($connection->my_connection); ?></span> </div>
                    <!-- .stat -->
                    
                    <div class="stat"> </div>
                    <!-- .stat -->
                    
                    <div class="stat"> </div>
                    <!-- .stat -->
 
                  </div>
                </div>
                <!-- /widget-content --> 
                
              </div>
            </div>
          </div>
          <!-- /widget 
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Recent News</h3>
            </div>
            <!-- /widget-header 
            <div class="widget-content">
              <div id='calendar'>
              </div>
            </div>-->
            <!-- /widget-content 
          </div>-->
          <!-- /widget -->
          
          <!-- /widget --> 
        </div>
        <!-- /span6 -->
        <div class="span6">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Shortcuts</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts"> <a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-list-alt"></i><span
                                        class="shortcut-label">Apps</span> </a><a href="javascript:;" class="shortcut"><i
                                            class="shortcut-icon icon-bookmark"></i><span class="shortcut-label">Bookmarks</span> </a><a href="reports.php" class="shortcut"><i class="shortcut-icon icon-signal"></i> <span class="shortcut-label">Reports</span> </a><a href="javascript:;" class="shortcut"> <i class="shortcut-icon icon-comment"></i><span class="shortcut-label">Comments</span> </a><a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-user"></i><span
                                                class="shortcut-label">Users</span> </a><a href="javascript:;" class="shortcut"><i
                                                    class="shortcut-icon icon-file"></i><span class="shortcut-label">Notes</span> </a><a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-picture"></i> <span class="shortcut-label">Photos</span> </a><a href="javascript:;" class="shortcut"> <i class="shortcut-icon icon-tag"></i><span class="shortcut-label">Tags</span> </a> </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
          <div class="widget">
            <div class="widget-header"> <i class="icon-signal"></i>
              <h3> Monthly Feedback Flow Chart</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <canvas id="area-chart" class="chart-holder" height="250" width="538"> </canvas>
              <!-- /area-chart --> 
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
          
          <!-- /widget --> 
         
          <!-- /widget -->
        </div>
        <!-- /span6 --> 
      </div>
      <div class="widget widget-table action-table" >
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

                <tbody>
                    <?php $sql = "select u.name,u.email,u.flight_no, f.fd_id , f.date_time , c.title , sc.title as 'sub_title' , f.comments , f.ratting , f.image from catagories c, sub_catagories sc, feedback f, user_table u where u.user_id = f.user_id AND f.sub_cat_id = sc.sub_cat AND c.cat_id = sc.cat_id order by f.fd_id desc";
                          $result = mysqli_query($connection->my_connection,$sql);
                          if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td>".$row['name']."</td>";
                      echo "<td>".$row['email']."</td>";
                      echo "<td>".$row['flight_no']."</td>";
              
                      echo "<td>".$row['sub_title']."</td>";
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
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
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
    <!-- /container --> 
  </div>
  <!-- /extra-inner --> 
</div>
<!-- /extra -->
<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; 2015 <a href="http://www.piac.com.pk/" target="_blank">Pakistan International Airline</a>. </div>
        <div style="float:right;" >
                      Developed by : <a href="http://www.spectrumyr.com/" target="_blank">Spectrum Y&amp;R</a>
                    </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="js/jquery-1.7.2.min.js"></script> 
<script src="js/excanvas.min.js"></script> 
<script src="js/chart.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="js/full-calendar/fullcalendar.min.js"></script>
<script language="javascript" type="text/javascript" src="js/jquery.dataTables.min.js"></script>
 
<script src="js/base.js"></script> 

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

<script>     

        var lineChartData = {
            labels: ["December","January"],
            datasets: [
				
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)",
				    pointColor: "rgba(151,187,205,1)",
				    pointStrokeColor: "#fff",
				    data: [<?php echo $query->total_bar_chart_dec($connection->my_connection); ?>, <?php echo $query->total_bar_chart_jan($connection->my_connection); ?>]
				}
			]

        }

        var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);


        var barChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
				{
				    fillColor: "rgba(220,220,220,0.5)",
				    strokeColor: "rgba(220,220,220,1)",
				    data: [65, 59, 90, 81, 56, 55, 40]
				},
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)",
				    data: [28, 48, 40, 19, 96, 27, 100]
				}
			]

        }    

        $(document).ready(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var calendar = $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          selectable: true,
          selectHelper: true,
          select: function(start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
              calendar.fullCalendar('renderEvent',
                {
                  title: title,
                  start: start,
                  end: end,
                  allDay: allDay
                },
                true // make the event "stick"
              );
            }
            calendar.fullCalendar('unselect');
          },
          editable: true,
          events: [
            {
              title: 'All Day Event',
              start: new Date(y, m, 1)
            },
            {
              title: 'Long Event',
              start: new Date(y, m, d+5),
              end: new Date(y, m, d+7)
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: new Date(y, m, d-3, 16, 0),
              allDay: false
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: new Date(y, m, d+4, 16, 0),
              allDay: false
            },
            {
              title: 'Meeting',
              start: new Date(y, m, d, 10, 30),
              allDay: false
            },
            {
              title: 'Lunch',
              start: new Date(y, m, d, 12, 0),
              end: new Date(y, m, d, 14, 0),
              allDay: false
            },
            {
              title: 'Birthday Party',
              start: new Date(y, m, d+1, 19, 0),
              end: new Date(y, m, d+1, 22, 30),
              allDay: false
            },
            {
              title: 'EGrappler.com',
              start: new Date(y, m, 28),
              end: new Date(y, m, 29),
              url: 'http://EGrappler.com/'
            }
          ]
        });
      });
    </script><!-- /Calendar -->
</body>
</html>
