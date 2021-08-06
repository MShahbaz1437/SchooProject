<?php
include("function1.php");
session_start();
$logid=$_SESSION["aid"];
if(!isset($_SESSION["aid"]))
{
	header("location:admin.php");
}
$status="";
$con = new connectioninfo();
	$qry="select * from  facultyinfo";
	$rs=$con->readrecord($qry);
	$status.="<table class='table table-responsive table-striped table-bordered mt-4' >";
		$status.="<thead class='thead-dark '>";
			$status.="<tr>";
				$status.="<th scope='col'>Id</th>";
				$status.="<th scope='col'>Faculty Name</th>";
				$status.="<th scope='col'>Gender</th>";
				$status.="<th scope='col'>Dob</th>";
				$status.="<th scope='col'>Photo</th>";
				$status.="<th scope='col' style='width:200px;'>Description</th>";
				$status.="<th scope='col'>Address</th>";
				$status.="<th scope='col'>Mobile</th>";
				$status.="<th scope='col'>Email</th>";
				$status.="<th scope='col'>Username</th>";
				$status.="<th scope='col'>Password</th>";
				$status.="<th scope='col'>Question</th>";
				$status.="<th scope='col'>Answer</th>";
				$status.="<th scope='col'>Joindate</th>";
				$status.="<th scope='col'>Status</th>";
				$status.="<th scope='col'>Edit</th>";
			$status.="</tr>";
			while($row=mysql_fetch_array($rs))
			{
			$status.="<tr>";
				$status.="<td>$row[0]</td>";
				$status.="<td>$row[1]</td>";
				$status.="<td>$row[2]</td>";
				$status.="<td>$row[3]</td>";
				$status.="<td><img src='$row[4]' style='height:100px; width:120px;' /></td>";
				$status.="<td class='text-justify' >$row[5]</td>";
				$status.="<td>$row[6]</td>";
				$status.="<td>$row[7]</td>";
				$status.="<td>$row[8]</td>";
				$status.="<td>$row[9]</td>";
				$status.="<td>$row[10]</td>";
				$status.="<td>$row[11]</td>";
				$status.="<td>$row[12]</td>";
				$status.="<td>$row[13]</td>";
				$status.="<td >$row[14]</td>";
				
				$status.="<td><a href='facultyupdate.php?id=$row[0]'><i class='fa fa-pencil' aria-hidden='true'></i>/ <a href='facultydelete.php?id=$row[0]'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>";
				
			$status.="</tr>";
			}
		$status.="</thead>";	
		
	$status.="</table>";
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Faculty view</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
	td
	{
		width:200px;
	}
	</style>
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
     <header class="app-header"><a class="app-header__logo" href="dashboard.php">Admin</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
       <!-- <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>

        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
           <!-- <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>-->
            <li><a class="dropdown-item" href="dashboard.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php include("menu.php");?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          <p>Admin Panel</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
        </ul>
      </div>
		<center> 
					  <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>VIEW FACULTY</h3>
			<?php echo $status; ?>
		</center>	
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript">
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>