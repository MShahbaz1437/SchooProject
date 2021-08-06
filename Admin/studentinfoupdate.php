<?php
include("function1.php");
session_start();
$name="";
$roll="";
$dob="";
$gender="";
$fathername="";
$mothername="";
$occupation="";
$address="";
$postcode="";
$mobile="";
$email="";
$category="";
$religion="";
$caste="";
$admitdate="";
$classno="";
$user="";
$password="";
$photo="";
$status="";
$urlid=$_GET["url"];
$logid=$_SESSION["aid"];
if(!isset($_SESSION["aid"]))
{
	header("location:admin.php");
}
$con = new connectioninfo();
	if(isset($_POST["btn1"]))
	{
		extract($_POST);
		$path="";
	if($_FILES["timage"]["error"]==0)
	{
	$path="studentpic/".$_FILES["timage"]["name"];	
	move_uploaded_file($_FILES["timage"]["tmp_name"],$path);
	}
	$image=$_FILES["timage"]["name"];
	if($image)
		{
			$qry="update studentinfo set sname='$tname',srollno='$troll',dob='$tdob',gender='$tgender',fathername='$tfname',mothername='$tmname',occupation='$toccupation',address='$taddress',postcode='$tpostcode',mobile='$tmobile',email='$temail',category='$tcategory',religion='$treligion',caste='$tcaste',admitdate='$tadmitdate',classid='$classname',username='$tuser',password='$tpwd', photo='$path' where sid='$urlid'";
		}
		else
		{
			$qry="update studentinfo set sname='$tname',srollno='$troll',dob='$tdob',gender='$tgender',fathername='$tfname',mothername='$tmname',occupation='$toccupation',address='$taddress',postcode='$tpostcode',mobile='$tmobile',email='$temail',category='$tcategory',religion='$treligion',caste='$tcaste',admitdate='$tadmitdate',classid='$classname',username='$tuser',password='$tpwd' where sid='$urlid'";
		}
		$rs1=$con-> executequery($qry);
		if(!$rs1)
		{
			$status="Record Update";
			header("location:studentinfoview.php");
		}
		else
		{
			$status="Record Not Update";
		}
	}
	

	$qry1="select * from studentinfo inner join classinfo on studentinfo.classid=classinfo.classid where sid='$urlid'";
	$rs=$con->readrecord($qry1);
	if(mysql_num_rows($rs)>0)
	{
		$row1=mysql_fetch_array($rs);
		$name=$row1[1];
		$roll=$row1[2];
		$dob=$row1[3];
		$gender=$row1[4];
		$fathername=$row1[5];
		$mothername=$row1[6];
		$occupation=$row1[7];
		$address=$row1[9];
		$postcode=$row1[10];
		$mobile=$row1[11];
		$email=$row1[12];
		$category=$row1[13];
		$religion=$row1[14];
		$caste=$row1[15];
		$admitdate=$row1[16];
		$classno=$row1[17];
		$user=$row1[18];
		$password=$row1[19];
		$photo=$row1[20];
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
			  <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>STUDENT INFO UPDATE</h3>
			  <div class="col-sm-2 col-md-10">
					<?php
						echo "<img src='$photo' style='height:150px; width:200px; margin-top:5px;'>  ";
					?>
				</div>
			  <div class="form-group">
				<label class="control-label">NAME</label>
				<input class="form-control"  type="text" id="tname" name="tname" placeholder="Name" value="<?php echo $name; ?>" autofocus>
			  </div>
			  <div class="form-group">
				<label class="control-label">ROLL NO.</label>
				<input class="form-control"  type="text" id="troll" name="troll" value="<?php echo $roll; ?>" placeholder="Roll Number">
			  </div>
			  <div class="form-group">
				<label class="control-label">USER NAME</label>
				<input class="form-control"  type="text" id="tuser" name="tuser" value="<?php echo $user; ?>" placeholder="User Name">
			  </div>
			  <div class="form-group">
				<label class="control-label">PASSWORD</label>
				<input class="form-control"  type="text" id="tpwd" name="tpwd" value="<?php echo $password; ?>" placeholder="Password">
			  </div>
			  <div class="form-group">
				<label  class="control-label mb-1">PHOTO </label><br>
				<input class="form-control" id="timage" name="timage" type="file">
			</div>	
			  <div class="form-group">
				<label class="control-label">DATE OF BIRTH</label>
				<input class="form-control"  type="text" id="tdob" name="tdob" value="<?php echo $dob; ?>" placeholder="Date of Birth">
			  </div>
			   <div class="form-group">
                  <label class="control-label">GENDER</label>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" value="Male" name="tgender" value="<?php echo $gender; ?>" <?php if($gender=='Male'){echo "checked=checked";}?>>Male
                    </label>
                 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" value="Female" name="tgender" value="<?php echo $gender; ?>" <?php if($gender=='Female'){echo "checked==checked";}?>>Female
                    </label>
                  </div>
                </div>
				   <div class="form-group">
				<label class="control-label">FATHER NAME</label>
				<input class="form-control"  type="text" id="tfname" name="tfname" value="<?php echo $fathername; ?>" placeholder="Father Name">
			  </div>
			   <div class="form-group">
				<label class="control-label">MOTHER NAME</label>
				<input class="form-control"  type="text" id="tmname" name="tmname" value="<?php echo $mothername; ?>" placeholder="Mother Name">
			  </div>
			   <div class="form-group">
				<label class="control-label">OCCUPATION</label>
				<input class="form-control"  type="text" id="toccupation" name="toccupation" value="<?php echo $occupation; ?>" placeholder="Occupation">
			  </div>
			   <div class="form-group">
				<label class="control-label">ADDRESS</label>
				<input class="form-control"  type="text" id="taddress" name="taddress" value="<?php echo $address; ?>" placeholder="Address">
			  </div>
			   <div class="form-group">
				<label class="control-label">POSTCODE</label>
				<input class="form-control"  type="text" id="tpostcode" name="tpostcode" value="<?php echo $postcode; ?>" placeholder="Postcode">
			  </div>
			  <div class="form-group">
				<label class="control-label">MOBILE</label>
				<input class="form-control"  type="text" id="tmobile" name="tmobile" value="<?php echo $mobile; ?>" placeholder="Mobile">
			  </div>
			   <div class="form-group">
				<label class="control-label">EMAIL</label>
				<input class="form-control"  type="text" id="temail" name="temail" value="<?php echo $email; ?>" placeholder="Email">
			  </div>
			   <div class="form-group">
				<label class="control-label">CATEGORY</label>
				<input class="form-control"  type="text" id="tcategory" name="tcategory" value="<?php echo $category; ?>" placeholder="Category">
			  </div>
			  <div class="form-group">
				<label class="control-label">RELIGION</label>
				<input class="form-control"  type="text" id="treligion" name="treligion" value="<?php echo $religion; ?>" placeholder="Religion">
			  </div>
			  <div class="form-group">
				<label class="control-label">CASTE</label>
				<input class="form-control"  type="text" id="tcaste" name="tcaste" value="<?php echo $caste; ?>" placeholder="Caste">
			  </div>
			  <div class="form-group">
				<label class="control-label">ADMIT DATE</label>
				<input class="form-control"  type="text" id="tadmitdate" name="tadmitdate" value="<?php echo $admitdate; ?>" placeholder="Admission Date">
			  </div>
			   <div class="from-group ">
				<label class="control-label">Class</label>
				<select name="classname" id="classname" class="form-control">
					<?php
						 $qry1="select classid,classroman from classinfo";
						$rs1=$con->readrecord($qry1);
						 while($row=mysql_fetch_array($rs1)){ ?><option value='<?php echo $row[0]?>'<?php if($row[0]==$classno){ echo 'selected=selected';} ?>><?php echo $row[1] ?></option> <?php } ?>
				</select>
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