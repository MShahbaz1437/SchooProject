<?php  include("function1.php");  
session_start();
$status="";
$con=new connectioninfo();
if(isset($_POST["btn1"]))
{
	extract($_POST);
	$qry="select * from admin where username='$tuser' and password='$tpwd' and usertypeid='Admin'";
	$rs=$con->readrecord($qry);
	if(mysql_num_rows($rs)>0)
	{
		$row=mysql_fetch_array($rs);
		$_SESSION["aid"]=$row[0];
		$_SESSION["username"]=$row[4];
		$_SESSION["useremail"]=$row[2];
		header("location:dashboard.php");
	}
	else
	{
		$status.="Check Your Email / Password";
	}
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Vali Admin</title>
	<script  type="text/javascript">
		function myvalid()
	{
		var Username=document.getElementById("tuser").value;
		var Password=document.getElementById("tpwd").value;
		
		//expression
		
		var reg_name=/^(([a-zA-Z0-9 ]{2,}))$/;
		var reg_password=/^(([a-zA-Z0-9]{5,}))$/;
		
		if(Username=="")
		{
			document.getElementById("sname").innerHTML="<b>Username</b>";
			error=document.getElementById("sname").style.color="red";
			return false;
		}
		else if(!reg_name.test(Username))
		{
			document.getElementById("sname").innerHTML="<b>Please Check Your Username</b>";
			error=document.getElementById("sname").style.color="red";
			return false;
		}
		else
		{
		document.getElementById("sname").innerHTML="  ";
		}
		if(Password=="")
		{
			document.getElementById("spwd").innerHTML="<b><i>Password</i></b>";
			error=document.getElementById("spwd").style.color="red";
			return false;
		}
		else if(!reg_password.test(Password))
		{
			document.getElementById("spwd").innerHTML="<b>Please Check Your Password!</b>";
			error=document.getElementById("spwd").style.color="red";
			return false;
		}
		else
		{
		document.getElementById("spwd").innerHTML="  ";
		}
		return true;
	}
	
	</script>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Admin</h1>
      </div>
      <div class="login-box">
	  
        <form class="login-form" id="frm" name="frm" method="post" action="">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>LOGIN IN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" id="tuser" name="tuser" type="text" placeholder="Email" autofocus><span id="sname"></span>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" id="tpwd" name="tpwd" type="password" placeholder="Password"><span id="spwd"></span>
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <!--<label>
                  <input type="checkbox"><span class="label-text">Stay Signed in</span>
                </label>-->
              </div>
             <!-- <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>-->
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" onClick="return myvalid();" id="btn1" name="btn1"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
		  
		  <b><center><?php echo $status; ?></center></b>
        </form>
        <!--<form class="forget-form" action="">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>-->
		
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
  
</html>