<?php
include("function1.php");
session_start();
$logid=$_SESSION["aid"];
if(!isset($_SESSION["aid"]))
{
	header("location:admin.php");
}
$con = new connectioninfo();
$status="";
$name="";
$email="";
$mobile="";
$username="";
$password="";
$question="";
$answer="";
$usertype="";
$actstatus="";
$image="";
		$qry="select * from admin where usertypeid='Admin'";
		$rs=$con->readrecord($qry);
		while($row=mysql_fetch_array($rs))
		{
			$name=$row[1];
			$email=$row[2];
			$mobile=$row[3];
			$username=$row[4];
			$password=$row[5];
			$question=$row[6];
			$answer=$row[7];
			$actstatus=$row[10];
			$image=$row[11];
		}
if(isset($_POST["btn1"]))
{
	extract($_POST);
	$date=date("y-m-d");		

	$path="";
	if($_FILES["timage"]["error"]==0)
	{
		$path="adminimage/".$_FILES["timage"]["name"];
		move_uploaded_file($_FILES["timage"]["tmp_name"],$path);
	}
	$imagepath=$_FILES["timage"]["name"];
	if($imagepath)
	{
		$qry1="update admin set aname='$tname',email='$temail',mobile='$tmobile',username='$tuser',password='$tpwd',secque='$tsecque',secans='$tsecans',joindate='$date',photo='$path'";
	}
	else
	{
		$qry1="update admin set aname='$tname',email='$temail',mobile='$tmobile',username='$tuser',password='$tpwd',secque='$tsecque',secans='$tsecans',joindate='$date'";
	}
		$rs=$con->executequery($qry1);
	if($rs)
	{
		$status="Update";
	}
	else
	{
		$status="Not Update";
	}
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
	<script type="text/javascript">
	
	
	
	</script>
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
			  <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>UPDATE</h3>
			  <div class="form-group">
				<label class="control-label">NAME</label>
				<input class="form-control"  type="text" id="tname" name="tname" placeholder="Name" value="<?php echo $name; ?>" autofocus>
			  </div>
			  <div class="form-group">
				<label class="control-label">EMAIL</label>
				<input class="form-control"  type="text" id="temail" name="temail" value="<?php echo $email; ?>">
			  </div>
			  <div class="form-group">
				<label class="control-label">MOBILE</label>
				<input class="form-control"  type="text" id="tmobile" name="tmobile" value="<?php echo $mobile; ?>">
			  </div>
			  <div class="form-group">
				<label class="control-label">USERNAME</label>
				<input class="form-control"  type="text" id="tuser" name="tuser" value="<?php echo $username; ?>">
			  </div>
			   <div class="form-group">
				<label class="control-label">PASSWORD</label>
				<input class="form-control" id="tpwd" name="tpwd" fa-user-edit type="password" value="<?php echo $password; ?>">
			  </div>
			  <div class="form-group">
				<label class="control-label">SECURITY QUESTION</label>
				<input class="form-control"  type="text" id="tsecque" name="tsecque" value="<?php echo $question; ?>">
			  </div>
			  <div class="form-group">
				<label class="control-label">SECURITY ANSWER</label>
				<input class="form-control"  type="text" id="tsecans" name="tsecans" value="<?php echo $answer; ?>">
			  </div>
			 
			  <div class="form-group">
				<label class="control-label">PHOTO</label>
				<input class="form-control"  type="file" id="timage" name="timage" >
			  </div>
			  <div class="form-group btn-container">
				<button class="btn btn-primary btn-block" id="btn1" name="btn1"><i class="fa fa-pencil-square-o fa-lg fa-fw"></i>UPDATE</button>
			  </div>
			</form>
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