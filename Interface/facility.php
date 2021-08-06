<?php
include("function1.php");
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
		  			  <?php include("header.php");?>
<!-- #header -->
			  
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Events				
							</h1>	<p class="text-white link-nav"><a href="">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href=""> Facility</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
				
			<!-- Start events-list Area -->
			<section class="events-list-area section-gap event-page-lists">
				<div class="container">
					<div class="row align-items-center">
						<?php
						$event="";
						$qry="select * from facilities where facstatus='Active'";
						$rs=$con->readrecord($qry);
						while($row=mysql_fetch_array($rs))
						{
							$event.="<div class='col-lg-6 pb-30'>";			/* <!--col1--> */
								$event.="<div class='single-carusel row align-items-center'>";			/* <!--col1 2--> */
									$event.="<div class='col-12 col-md-6 thumb'>";			/* <!--col1 3--> */
										$event.="<img class='img-responsive ' src='../docs/$row[3]' style='height:250px;'  alt=''>";
									$event.="</div>";			/* <!--col1 3--> */
									$event.="<div class='detials col-12 col-md-6'>";				/* <!--col1 4--> */
										$event.="<a href='event-details.html'><h4>$row[1]</h4></a>";
										$event.="<p class='text-justify'>".substr($row[2],0,80)." "."<a href='facilityfullview.php?id=$row[0]' class='text-uppercase  mt-20'>Read More</a></p>";
									/* 	$event.="<p class='pt-20'>$row[4]</p>"; */
										

									$event.="</div>";/* <!--col1 4--> */
								$event.="</div>";/* <!--col1 2--> */
								
							$event.="</div>";
						}						/* <!-- col1 1 --> */
						?>	
						<?php echo $event; ?>
																							
							
					</div>
				</div>	
			</section>
			<!-- End events-list Area -->
				

									    			

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