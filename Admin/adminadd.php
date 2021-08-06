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
	$qry1="insert into admin (aname,email,mobile,username,password,secque,secans,usertypeid,joindate,actstatus,photo) values ('$tname','$temail','$tmobile','$tuser','$tpwd','$tsecque','$tsecans','$tusertype','$date','$actstatuss','$path')";
	$rs=$con->executequery($qry1);
	if(!$rs=="")
	{
		$status="Insert";
	}
	else
	{
		$status="Not Insert";
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
	<script>
	function myvalidation()
	{
		var Name=document.getElementById("tname").value;
		var Email=document.getElementById("temail").value;
		var Mobile=document.getElementById("tmobile").value;
		var Username=document.getElementById("tuser").value;
		var Password=document.getElementById("tpwd").value;
		var Secquestion=document.getElementById("tsecque").value;
		var Secanswer=document.getElementById("tsecans").value;
		var Photo=document.getElementById("timage").value;
		
		var reg_name=/^(([a-zA-Z ]{3,}))$/;
		var reg_email=/^(([a-zA-Z0-9 ]{1,})[@][a-zA-Z]{3,}[.][a-zA-Z]{1,})$/;
		var reg_mobile=/^[+91][0-9]{10,}$/;
		var reg_username=/^[a-zA-Z0-9]{2,}$/;
		var reg_password=/^(([a-zA-Z0-9]){4,})$/;
		var reg_sec=/^(([a-zA-Z0-9 ]{10,})[?]{1})$/;
		var reg_ans=/^(([a-zA-Z0-9]{5,}))$/;
		
		
		
		
		
		if(Name=="")
		{
			document.getElementById("sname").innerHTML="<b>Enter Your Name</b>";
			error=document.getElementById("sname").style.color=" red";
			return false;
		}
		else if(!reg_name.test(Name))
		{
			document.getElementById("sname").innerHTML="Check Your Name";
			error=document.getElementById("sname").style.color=" red";
			return false;
		}
		else
		{
			document.getElementById("sname").innerHTML="";
		}
		
		if(Email=="")
		{
			document.getElementById("semail").innerHTML="Enter Your Email</b>";
			error=document.getElementById("semail").style.color=" red";
			return false;
		}
		else if(!reg_email.test(Email))
		{
			document.getElementById("semail").innerHTML="Check Your Email";
			error=document.getElementById("semail").style.color=" red";
			return false;
		}
		else
		{
			document.getElementById("semail").innerHTML="";
		}
		if(Mobile=="")
		{
			document.getElementById("smobile").innerHTML="<b>Enter Your Mobile</b>";
			error=document.getElementById("smobile").style.color=" red";
			return false;
		}
		else if(!reg_mobile.test(Mobile))
		{
			document.getElementById("smobile").innerHTML="Check Your Mobile";
			error=document.getElementById("smobile").style.color=" red";
			return false;
		}
		else if(Mobile.length<11)
		{
			document.getElementById("smobile").innerHTML="Check Your Mobile";
			error=document.getElementById("smobile").style.color=" red";
			return false;
		}
		else
		{
			document.getElementById("smobile").innerHTML="";
		}
		if(Username=="")
		{
			document.getElementById("suser").innerHTML="<b>Enter Your Username</b>";
			error=document.getElementById("suser").style.color=" red";
			return false;
		}
		else if(!reg_username.test(Username))
		{
			document.getElementById("suser").innerHTML="<b>Check Your Username</b>";
			error=document.getElementById("suser").style.color=" red";
			return false;
		}
		else
		{
			document.getElementById("suser").innerHTML="";
		}
		if(Password=="")
		{
			document.getElementById("spwd").innerHTML="<b>Enter Your Password</b>";
			error=document.getElementById("spwd").style.color=" red";
			return false;
		}
		else if(!reg_password.test(Password))
		{
			document.getElementById("spwd").innerHTML="<b>Check Your Password</b>";
			error=document.getElementById("spwd").style.color=" red";
			return false;
		}
		else
		{
			document.getElementById("spwd").innerHTML="";
		}
		if(Secquestion=="")
		{
			document.getElementById("ssecque").innerHTML="<b>Enter Security Question";
			error=document.getElementById("ssecque").style.color=" red";
			return false;
		}
		else if(!reg_sec.test(Secquestion))
		{
			document.getElementById("ssecque").innerHTML="<b>Check Your Question</b>";
			error=document.getElementById("ssecque").style.color=" red";
			return false;
		}
		else
		{
			document.getElementById("ssecque").innerHTML="";
		}
		if(Secanswer=="")
		{
			document.getElementById("ssecans").innerHTML="<b>Enter Security Answer</b>";
			error=document.getElementById("ssecans").style.color=" red";
			return false;
		}
		else if(!reg_ans.test(Secanswer))
		{
			document.getElementById("ssecans").innerHTML="<b>Check Your Answer</b>";
			error=document.getElementById("ssecans").style.color=" red";
			return false;
		}
		else
		{
			document.getElementById("ssecans").innerHTML="";
		}
		if(Photo=="")
		{
			document.getElementById("simage").innerHTML="<b>Please Choose Image</b>";
			error=document.getElementById("simage").style.color=" red";
			return false;
		}
		else
		{
			document.getElementById("simage").innerHTML="";
		}
		return true;
	}
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
			  <h3 class="login-head"><i class="fa fa-lg  fa-userS"></i>ADMIN</h3>
			  <div class="form-group">
				<label class="control-label">NAME</label>
				<input class="form-control"  type="text" id="tname" name="tname" placeholder="Name" required autofocus><span id="sname"></span>
			  </div>
			  <div class="form-group">
				<label class="control-label">EMAIL</label>
				<input class="form-control"  type="text" id="temail" aut name="temail" placeholder="Email" required><span id="semail"></span>
			  </div>
			  <div class="form-group">
				<label class="control-label">MOBILE</label>
				<input class="form-control"  type="text" id="tmobile" name="tmobile" placeholder="Mobile" required><span id="smobile"></span>
			  </div>
			  <div class="form-group">
				<label class="control-label">USERNAME</label>
				<input class="form-control"  type="text" id="tuser" name="tuser" placeholder="Username" required><span id="suser"></span>
			  </div>
			   <div class="form-group">
				<label class="control-label">PASSWORD</label>
				<input class="form-control" id="tpwd" name="tpwd" fa-user-edit type="password" placeholder="Password" required><span id="spwd"></span>
			  </div>
			  <div class="form-group">
				<label class="control-label">SECURITY QUESTION</label>
				<input class="form-control"  type="text" id="tsecque" name="tsecque" placeholder="Security Question" required><span id="ssecque"></span>
			  </div>
			  <div class="form-group">
				<label class="control-label">SECURITY ANSWER</label>
				<input class="form-control"  type="text" id="tsecans" name="tsecans" placeholder="Security Answer" required><span id="ssecans"></span>
			  </div>
			
			 <div class="form-group" required>
				<label class="control-label">USER TYPE</label>
				<select name="tusertype" class="form-control" >
				<?php
			 $qry2="select usertypeid,name from usertype";
				$rs2=$con->readrecord($qry2);
				while($r2=mysql_fetch_array($rs2))
						{
						 echo "<option value='$r2[0]'>$r2[1]</option>";
						}
				 
				?>
					
				
				</select>
			  </div>
			 <div class="form-group">
				<label class="control-label" required>STATUS</label>
				<select name="actstatuss" class="form-control">
					<option value="Active" >Active</option>
					<option value="Deactive" >Deactive</option>
				</select>
			  </div>
			  <div class="form-group">
				<label class="control-label">PHOTO</label>
				<input class="form-control"  type="file" id="timage" name="timage"  required><span id="simage"></span>
			  </div>
			  <div class="form-group btn-container">
				<button class="btn btn-primary mt-2 btn-block"  id="btn1" name="btn1" onClick="return myvalidation();"><i class="fa fa-pencil-square-o fa-lg fa-fw"></i>INSERT</button>
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