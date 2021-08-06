<?php
include("function1.php");
session_start();
$con=new connectioninfo();


?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Education</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">							
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">			
			<link rel="stylesheet" href="css/jquery-ui.css">			
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>	
		  <?php include("header.php");	?><!-- #header -->
	  
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Contact Us				
							</h1>	<p class="text-white link-nav"><a href="">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href=""> Contact Us</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->				  

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap">
				<div class="container">
					<div class="row pb-5">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14671.35943302027!2d75.7884014!3d23.1760442!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbc27867d3929d6e5!2sAds+Software!5e0!3m2!1sen!2sin!4v1565086480628!5m2!1sen!2sin" width="100%" height="400" frameborder="0" style="border:0 " allowfullscreen></iframe>
					</div>
					</div>
				
					<div class="row">
						<div class="col-lg-4 d-flex flex-column address-wrap">
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-home"></span>
								</div>
								<div class="contact-details">
									<h5><?php
									$address="";
									$qry="select taddress   from  titlesetup";
									$rs=$con->readrecord($qry);
									while($row=mysql_fetch_array($rs))
									{
										echo $row[0];
									}
									
									
									?>
									</h5>
									<p>
										Teen Batti
									</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-phone-handset"></span>
								</div>
								<div class="contact-details">
									<h5>
									<?php
									$contact="";
									$qry="select tcontact  from  titlesetup";
									$rs=$con->readrecord($qry);
									while($row=mysql_fetch_array($rs))
									{
										echo $row[0];
									}
									
									
									?></h5>
									<p>Mon to Fri 9am to 6 pm</p>
								</div>
							</div>
							<div class="single-contact-address d-flex flex-row">
								<div class="icon">
									<span class="lnr lnr-envelope"></span>
								</div>
								<div class="contact-details">
									<h5>
									<?php
									$temail="";
									$qry="select temail  from  titlesetup";
									$rs=$con->readrecord($qry);
									while($row=mysql_fetch_array($rs))
									{
										$temail=$row[0];
									}
									
									
									?>
									<?php echo $temail;?>
									</h5>
									<p>Send us your query anytime!</p>
								</div>
							</div>														
						</div>
						<div class="col-lg-8">
						<?php
						$status="";
							if(isset($_POST["btn1"]))
							{
								extract($_POST);
								$date=date("y-m-d");
								$qry="insert into feedback (fname,femail,fsubject,fmessage,date) value('$fname','$femail','$fsubject','$fmessage','$date')";
								$rs=$con->executequery($qry);
								if(!$rs)
								{
									$status="Feedback Sent";
								}
								else
								{
									$status="Feedback Not Send";
								}
							}
						?>
							<form class="form-area contact-form text-right" id="frm" name="frm" action="" method="post">
								<div class="row">	
									<div class="col-lg-6 form-group">
										<input type="text" name="fname" id="fname" placeholder="Enter your name"  class="common-input mb-20 form-control" required=""><span id="sname">	</span>
									
										<input  type="email" name="femail" id="femail" placeholder="Enter email address"  class="common-input mb-20 form-control" required=""><span id="semail">	</span>

										<input type="text" name="fsubject" id="fsubject" placeholder="Enter subject" class="common-input mb-20 form-control" required=""  ><span id="ssubject">	</span>
									</div>
									<div class="col-lg-6 form-group">
										<textarea class="common-textarea form-control" id="fmessage" name="fmessage" placeholder="Enter Messege" required="" ></textarea><span id="smessage">	</span>				
									</div>
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<button class="genric-btn primary" id="btn1" name="btn1" style="float: right;">Send Message</button>											
									</div>
								</div>
							
							</form>	
								<h4><b><?php echo $status; ?></b></h4>
						</div>
					</div>
				</div>	
			</section>
			<!-- End contact-page Area -->

			<!-- start footer Area -->		
			<?php include("footer.php")?>
			<!-- End footer Area -->	


			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
    		<script src="js/jquery.tabs.min.js"></script>						
			<script src="js/jquery.nice-select.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>									
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
		</body>
	</html>