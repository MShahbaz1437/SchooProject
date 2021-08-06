<?php
include("function1.php");
session_start();
$logid=$_SESSION["aid"];
$urlid=$_GET["id"];
if(!isset($_SESSION["aid"]))
{
	header("location:admin.php");
}
$status="";
$rollno="";
$class="";
$admityear="";
$medium="";
$board="";
$section="";

$con = new connectioninfo();
if(isset($_POST["btn1"]))
{
	extract($_POST);
	$qry="update studentclass set srollno='$rollno',classid='$class',admityear='$tadmityear',medium='$tmedium',boardname='$boardname',section='$tsection' where scid='$urlid'";
	echo $qry;
	$rs=$con->executequery($qry);
	if(!$rs)
	{
		$status="Record Insert";
		header("location:studentclassview.php");
	}
	else
	{
		$status="Record Not Insert";
	}
	
} 
/* $qry1="select * from studentclass";
 */ $qry1="Select studentclass.srollno,classinfo.classid,admityear,medium,boardinfo.boardname,section from studentclass inner join studentinfo on studentclass.srollno=studentinfo.srollno inner join classinfo on studentclass.classid=classinfo.classid inner join boardinfo on studentclass.boardname=boardinfo.boardname where scid='$urlid'"; 
	$rs1=$con->readrecord($qry1);
	while($row1=mysql_fetch_array($rs1))
	{
		$rollno=$row1[1];
		$class=$row1[1];
		$admityear=$row1[2];
		$medium=$row1[3];
		$board=$row1[4];
		$section=$row1[5];
	}
	

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <title>Vali Admin - Free Bootstrap 4 Admin Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
			<form class="login-form col-sm-5" id="frm" name="frm" method="post" action="" enctype="multipart/form-data">
			  <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>STUDENTINFO UPDATE</h3>
			  <div class="from-group ">
				<label class="control-label">ROLL NO.</label>
				<select name="rollno" class="form-control">
					<?php
						 $qry1="select sid,srollno from studentinfo";
						$rs1=$con->readrecord($qry1);
						while($r1=mysql_fetch_array($rs1))
						{ ?>
						 <option value='<?php echo $r1[1]?>'<?php if($r1[0]==$rollno){echo 'selected=selected';} ?>><?php echo $r1[1]?></option>
						<?php }
						?>
				</select>
			  </div>
			  <div class="from-group ">
				<label class="control-label pt-1">CLASS NAME</label>
				<select name="class" class="form-control">
					<?php
						 $qry1="select classid,classroman from classinfo";
						$rs1=$con->readrecord($qry1);
						while($r1=mysql_fetch_array($rs1))
						{ ?>
						 <option value='<?php echo $r1[0]?>'<?php if($r1[0]==$class){echo 'selected=selected';} ?>><?php echo $r1[1]?></option>
						<?php }
						?>
				</select>
			  </div>
			  <div class="from-group ">
				<label class="control-label pt-1">ADMIT YEAR</label>
								<input class="form-control"  type="text" id="tadmityear" name="tadmityear" value="<?php echo $admityear; ?>" >

			  </div>
			  <div class="form-group">
				<label class="control-label pt-1">MEDIUM</label>
				<input class="form-control"  type="text" id="tmedium" name="tmedium" value="<?php echo $medium; ?>" >
			  </div>
			  <div class="from-group ">
				<label class="control-label pt-1">BOARD NAME</label>
				<select name="boardname" class="form-control">
					<?php
						 $qry1="select boardid,boardname from boardinfo";
						$rs1=$con->readrecord($qry1);
						while($r1=mysql_fetch_array($rs1))
						{ ?>
						 <option value='<?php echo $r1[1]?>'<?php if($r1[0]==$board){echo 'selected=selected';} ?>><?php echo $r1[1]?></option>
						<?php }
						?>
				</select>
			  </div>
			  <div class="form-group">
				<label class="control-label pt-1">SECTION</label>
				<input class="form-control"  type="text" id="tsection" name="tsection" value="<?php echo $section; ?>">
			  </div>
			  
			  
			  <div class="form-group btn-container">
				<button class="btn btn-primary btn-block" id="btn1" name="btn1"><i class="fa fa-lg fa-sign-in"></i>UPDATE</button>
			  </div>
			</form>
			<b><?php echo $status; ?></b>
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