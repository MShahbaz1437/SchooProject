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
if(isset($_POST["btn1"]))
{
	extract($_POST);
	$path="";
	if($_FILES["timage"]["error"]==0)
	{
	$path="studentpic/".$_FILES["timage"]["name"];	
	move_uploaded_file($_FILES["timage"]["tmp_name"],$path);
	}
	$qry="insert into studentinfo (sname,srollno,dob,gender,fathername,mothername,occupation,userid,address,postcode,mobile,email,category,religion,caste,admitdate,classid,username,password,photo) values ('$tname','$troll','$tdob','$tgender','$tfname','$tmname','$toccupation','$logid','$taddress','$tpostcode','$tmobile','$temail','$tcategory','$treligion','$tcaste','$tadmitdate','$class','$tuser','$tpwd','$path')";
	$rs=$con->executequery($qry);
	if(!$rs)
	{
		$status="Record Insert";
	}
	else
	{
		$status="Record Not Insert";
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
	function myvalidation()
	{
		var Name=document.getElementById("tname").value;
		var Roll=document.getElementById("troll").value;
		var Username=document.getElementById("tuser").value;
		var Password=document.getElementById("tpwd").value;
		var Photo=document.getElementById("timage").value;
		var Dob=document.getElementById("tdob").value;
		var Gender=document.getElementById("tgender");
		var Father=document.getElementById("tfname").value;
		var Mother=document.getElementById("tmname").value;
		var Occupation=document.getElementById("toccupation").value;
		var Address=document.getElementById("taddress").value;
		var Postcode=document.getElementById("tpostcode").value;
		var Mobile=document.getElementById("tmobile").value;
		var Email=document.getElementById("temail").value;
		var Category=document.getElementById("tcategory").value;
		var Religion=document.getElementById("treligion").value;
		var Caste=document.getElementById("tcaste").value;
		var Admitdate=document.getElementById("tadmitdate").value;
		
		//regression expression
		var reg_name=/^(([a-zA-Z ]{3,}))$/;
		var reg_roll=/^(([a-zA-Z0-9]{3,}))$/;
		var reg_username=/^[a-zA-Z0-9]{2,}$/;
		var reg_password=/^(([a-zA-Z0-9]){4,})$/;
		var reg_dob=/^([0-9\-.,]{1})([0-9\-,.]{1,})([0-9]{4})$/;
		var reg_father=/^(([a-zA-Z ]{3,}))$/;
		var reg_mother=/^(([a-zA-Z ]{3,}))$/;
		var reg_occupation=/^([a-zA-Z ]{3,})$/;
		var reg_address=/^(([a-zA-Z0-9-,\ ]{3,}))$/;
		var reg_postcode=/^(([0-9]{6}))$/;
		var reg_mobile=/^[+91][0-9]{10,}$/;
		var reg_email=/^(([a-zA-Z0-9 ]{1,})[@][a-zA-Z]{3,}[.][a-zA-Z]{1,})$/;
		var reg_category=/^(([a-zA-Z ]{3,}))$/;
		var reg_religion=/^([a-zA-Z ]{3,})$/;
		var reg_caste=/^(([a-zA-Z ]{2,}))$/;
		var reg_admitdate=/^([0-9\-.,]{1})([0-9\-,.]{1,})([0-9]{4})$/;

		
		
		
		if(Name=="")
		{
			document.getElementById("sname").innerHTML="<b>Enter Name</b>";
			error=document.getElementById("sname").style.color="red";
			return false;
		}
		else if(!reg_name.test(Name))
		{
			document.getElementById("sname").innerHTML="<b>Check Name</b>";
			error=document.getElementById("sname").style.color="red";
			return false;
		}
		else
		{
			document.getElementById("sname").innerHTML="";
		}
		if(Roll=="")
		{
			document.getElementById("sroll").innerHTML="<b>Enter Roll Number</b>";
			error=document.getElementById("sroll").style.color="red";
			return false;
		}
		else if(!reg_roll.test(Roll))
		{
			document.getElementById("sroll").innerHTML="<b>Check Roll Number</b>";
			error=document.getElementById("sroll").style.color="red";
			return false;
			
		}
		else
		{
			document.getElementById("sroll").innerHTML="";
		}
		if(Username=="")
		{
			document.getElementById("suser").innerHTML="<b>Enter Username</b>";
			error=document.getElementById("suser").style.color="red";
			return false;
		}
		else if(!reg_username.test(Username))
		{
			document.getElementById("suser").innerHTML="<b>Check Username</b>";
			error=document.getElementById("suser").style.color="red";
			return false;
		}
		else
		{
			document.getElementById("suser").innerHTML="";
		}
		if(Password=="")
		{
			document.getElementById("spwd").innerHTML="<b>Enter Password</b>";
			error=document.getElementById("spwd").style.color="red";
			return false;
		}
		else if(!reg_password.test(Password))
		{
			document.getElementById("spwd").innerHTML="<b>Check Password</b>";
			error=document.getElementById("spwd").style.color="red";
			return false;
		}
		else
		{
			document.getElementById("spwd").innerHTML="";
		}
		if(Photo=="")
		{
			document.getElementById("simage").innerHTML="<b>Please Choose  Image</b>";
			error=document.getElementById("simage").style.color="red";
			return false;
		}
		else
		{
			document.getElementById("simage").innerHTML="";
		}
		if(Dob=="")
		{
			document.getElementById("sdob").innerHTML="<b>Enter Date Of Birth</b>";
			error=document.getElementById("sdob").style.color="red";
			return false;
		}
		else if(!reg_dob.test(Dob))
		{
			document.getElementById("sdob").innerHTML="<b>Check Date Of Birth</b>";
			error=document.getElementById("sdob").style.color="red";
			return false;
		}
		else
		{
			document.getElementById("sdob").innerHTML="";
		}
		if(Gender.checked==false )
		{
			document.getElementById("sgender").innerHTML="<b>Please Choose Gender</b>";
			error=document.getElementById("sgender").style.color="red";
			return false;
		}
		else
		{
			document.getElementById("sgender").innerHTML="";
		}
		if(Father=="")
		{
			document.getElementById("sfname").innerHTML="<b>Enter Father Name</b>";
			error=document.getElementById("sfname").style.color="red";
			return false;
		}
		else if(!reg_father.test(Father))
		{
			document.getElementById("sfname").innerHTML="<b>Check Father Name</b>";
			error=document.getElementById("sfname").style.color="red";
			return false;
		}
		else
		{
			document.getElementById("sfname").innerHTML="";
		}
		if(Mother=="")
		{
			document.getElementById("smname").innerHTML="<b>Enter Mother Name</b>";
			error=document.getElementById("smname").style.color="red";
			return false;
		}
		else if(!reg_mother.test(Mother))
		{
			document.getElementById("smname").innerHTML="<b>Check Mother Name</b>";
			error=document.getElementById("smname").style.color="red";
			return false;
		}
		else
		{
			document.getElementById("smname").innerHTML="";
		}
		if(Occupation=="")
		{
			document.getElementById("soccupation").innerHTML="<b>Enter Occupation</b>";
			error=document.getElementById("soccupation").style.color="red";
			return false;
		}
		else if(!reg_occupation.test(Occupation))
		{
			document.getElementById("soccupation").innerHTML="<b>Check Occupation</b>";
			error=document.getElementById("soccupation").style.color="red";
			return false;
		}
		else
		{
			document.getElementById("soccupation").innerHTML="";
		}
		if(Address=="")
		{
			document.getElementById("saddress").innerHTML="<b>Enter Address</b>";
			error=document.getElementById("saddress").style.color="red";
			return false;
		}
		else if(!reg_address.test(Address))
		{
			document.getElementById("saddress").innerHTML="<b>Check Address</b>";
			error=document.getElementById("saddress").style.color="red";
			return false;
		}
		else
		{
			document.getElementById("saddress").innerHTML="";
		}
		if(Postcode=="")
		{
			document.getElementById("spostcode").innerHTML="<b>Enter Postcode</b>";
			error=document.getElementById("spostcode").style.color="red";
			return false;
		}
		else if(!reg_postcode.test(Postcode))
		{
			document.getElementById("spostcode").innerHTML="<b>Check Postcode</b>";
			error=document.getElementById("spostcode").style.color="red";
			return false;
		}
		else
		{
			document.getElementById("spostcode").innerHTML="";
		}
		if(Mobile=="")
		{
			document.getElementById("smobile").innerHTML="<b>Enter Mobile</b>";
			error=document.getElementById("smobile").style.color="red";
			return false;
		}
		else if(!reg_mobile.test(Mobile))
		{
			document.getElementById("smobile").innerHTML="<b>Check Mobile</b>";
			error=document.getElementById("smobile").style.color="red";
			return false;
		}
		else if(Mobile.length<11)
		{
			document.getElementById("smobile").innerHTML="<b>Again Check Mobile</b>";
			error=document.getElementById("smobile").style.color="red";
			return false;
		}
		else
		{
			document.getElementById("smobile").innerHTML="";
		}
		if(Email=="")
		{
			document.getElementById("semail").innerHTML="<b>Enter Email</b>";
			error=document.getElementById("semail").style.color="red";
			return false;
		}
		else if(!reg_email.test(Email))
		{
			document.getElementById("semail").innerHTML="<b>Check Email</b>";
			error=document.getElementById("semail").style.color="red";
			return false;
		}
		else
		{
			document.getElementById("semail").innerHTML="";
		}
		if(Religion=="")
		{
			document.getElementById("sreligion").innerHTML="<b>Enter Religion</b>";
			error=document.getElementById("sreligion").style.color="red";
			return false;
		}
		else
		{
			document.getElementById("sreligion").innerHTML="";
		}
		if(Category=="")
		{
			document.getElementById("scategory").innerHTML="<b>Enter Category</b>";
			error=document.getElementById("scategory").style.color="red";
			return false;
		}
		else if(!reg_category.test(Category))
		{
			document.getElementById("scategory").innerHTML="<b>Check Category</b>";
			error=document.getElementById("scategory").style.color="red";
			return false;
		}
		else
		{
			document.getElementById("scategory").innerHTML="";
		}
		if(Caste=="")
		{
			document.getElementById("scast").innerHTML="<b>Enter Cast</b>";
			error=document.getElementById("scast").style.color="red";
			return false;
		}
		else if(!reg_caste.test(Caste))
		{
			document.getElementById("scast").innerHTML="<b>Check Cast</b>";
			error=document.getElementById("scast").style.color="red";
			return false;
			
		}
		else
		{
			document.getElementById("scast").innerHTML="";
		}
		if(Admitdate=="")
		{
			document.getElementById("sadmitdate").innerHTML="<b>Enter Admitdate</b>";
			error=document.getElementById("sadmitdate").style.color="red";
			return false;
		}
		else if(!reg_admitdate.test(Admitdate))
		{
			document.getElementById("sadmitdate").innerHTML="<b>Check Admitdate</b>";
			error=document.getElementById("sadmitdate").style.color="red";
			return false;
			
		}
		else
		{
			document.getElementById("sadmitdate").innerHTML="";
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
			  <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>STUDENTINFO ADD</h3>
			  <div class="form-group">
				<label class="control-label">NAME</label>
				<input class="form-control"  type="text" id="tname" name="tname" placeholder="Name" autofocus required><span id="sname"></span>
			  </div>
			  <div class="form-group">
				<label class="control-label">ROLL NO.</label>
				<input class="form-control"  type="text" id="troll" name="troll" placeholder="Roll Number" required><span id="sroll"></span>
			  </div>
			  <div class="form-group">
				<label class="control-label">USERNAME</label>
				<input class="form-control"  type="text" id="tuser" name="tuser" placeholder="User Name" required><span id="suser"></span>
			  </div>
			  <div class="form-group">
				<label class="control-label">PASSWORD</label>
				<input class="form-control"  type="password" id="tpwd" name="tpwd" placeholder="Password" required><span id="spwd"></span>
			  </div>
			  <div class="form-group">
				<label  class="control-label mb-1">PHOTO </label><br>
				<input class="form-control" id="timage" name="timage" type="file"><span id="simage"></span>
			</div>	
			  <div class="form-group">
				<label class="control-label">DATE OF BIRTH</label>
				<input class="form-control"  type="text" id="tdob" name="tdob" placeholder="Date of Birth" required><span id="sdob"></span>
			  </div>
			   <div class="form-group" >
                  <label class="control-label">GENDER</label>
				
                  <div class="form-check" id="gender">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" id="tgender"  value="Male" name="tgender" >Male
                    </label>
                  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" id="tgender"  value="Female" name="tgender" >Female
                    </label>
                  </div><span id="sgender"></span>
                </div>
				   <div class="form-group">
				<label class="control-label">FATHER NAME</label>
				<input class="form-control"  type="text" id="tfname" name="tfname" placeholder="Father Name" required><span id="sfname"></span>
			  </div>
			   <div class="form-group">
				<label class="control-label">MOTHER NAME</label>
				<input class="form-control"  type="text" id="tmname" name="tmname" placeholder="Mother Name" required><span id="smname"></span>
			  </div>
			   <div class="form-group">
				<label class="control-label">OCCUPATION</label>
				<input class="form-control"  type="text" id="toccupation" name="toccupation" placeholder="Occupation" required><span id="soccupation"></span>
			  </div>
			   <div class="form-group">
				<label class="control-label">ADDRESS</label>
				<input class="form-control"  type="text" id="taddress" name="taddress" placeholder="Address" required><span id="saddress"></span>
			  </div>
			   <div class="form-group">
				<label class="control-label">POSTCODE</label>
				<input class="form-control"  type="text" id="tpostcode" name="tpostcode" placeholder="Postcode" required><span id="spostcode"></span>
			  </div>
			  <div class="form-group">
				<label class="control-label">MOBILE</label>
				<input class="form-control"  type="text" id="tmobile" name="tmobile" placeholder="Mobile" required><span id="smobile"></span>
			  </div>
			   <div class="form-group">
				<label class="control-label">EMAIL</label>
				<input class="form-control"  type="text" id="temail" name="temail" placeholder="Email" required><span id="semail"></span>
			  </div>
			   <div class="form-group">
				<label class="control-label">CATEGORY</label>
				<input class="form-control"  type="text" id="tcategory" name="tcategory" placeholder="Category" required><span id="scategory"></span>
			  </div>
			  <div class="form-group">
				<label class="control-label">RELIGION</label>
				<input class="form-control"  type="text" id="treligion" name="treligion" placeholder="Religion" required><span id="sreligion"></span>
			  </div>
			  <div class="form-group">
				<label class="control-label">CAST</label>
				<input class="form-control"  type="text" id="tcaste" name="tcaste" placeholder="Caste" required><span id="scast"></span>
			  </div>
			  <div class="form-group">
				<label class="control-label">ADMIT DATE</label>
				<input class="form-control"  type="text" id="tadmitdate" name="tadmitdate" placeholder="Admission Date" required><span id="sadmitdate"></span>
			  </div>
			  <div class="from-group ">
				<label class="control-label">Class</label>
				<select name="class" class="form-control">
					<?php
						 $qry1="select classid,classroman from classinfo";
						$rs1=$con->readrecord($qry1);
						while($r1=mysql_fetch_array($rs1))
						{
						 echo "<option value='$r1[0]'>$r1[1]</option>";
						}
					?>
				</select>
			  </div>
			   
			  
			  <div class="form-group btn-container">
				<button class="btn btn-primary mt-2 btn-block" onClick="return myvalidation();" id="btn1" name="btn1"><i class="fa fa-pencil-square-o fa-lg fa-fw"></i>INSERT</button>
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