<?php include("function1.php");
$con = new connectioninfo();

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
		<!-- start header Area -->
			<?php include("homeheader.php"); ?>
		<!-- end header Area -->
		 

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-between">
						<div class="banner-content col-lg-9 col-md-12">
							<h1 class="text-uppercase">
								We Ensure better education
								for a better world			
							</h1>
							<p class="pt-10 pb-10">
								In the history of modern astronomy, there is probably no one greater leap forward than the building and launch of the space telescope known as the Hubble.
							</p>
							<a href="#" class="primary-btn text-uppercase">Get Started</a>
						</div>										
					</div>
				</div>					
			</section>
			<!-- End banner Area -->

			
			<!-- Start popular-course Area -->
			<section class="popular-course-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Our Facility</h1>
								<p>There is a moment in the life of any aspiring.</p>
							</div>
						</div>
					</div>
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
						<div class="active-popular-carusel">
							<?php
								$qry="select * from facilities where facstatus='Active'";
								$rs=$con->readrecord($qry);
								while($row=mysql_fetch_array($rs))
								{
									
										echo "<div class='single-popular-carusel'>";
											echo "<div class='thumb-wrap relative'>";
												echo "<div class='thumb relative'>";
													echo "<div class='overlay overlay-bg'></div>";	
													echo "<img class='img-fluid img-responsive' style='height:200px;' src='../docs/$row[3]' alt=''>";
												echo "</div>";
												echo "<div class='meta d-flex justify-content-between'>";
													
												echo "</div>	";								
											echo "</div>";
											echo "<div class='details'>";
												echo "<a href='#'>";
													echo "<h4 class='pt-4'>$row[1]</h4>";
												echo "</a>";
												echo "<p class='text-justify'>".substr($row[2],0,100)."<a href='facilityfullview.php?id=$row[0]'>...Read More</a></p>";
											echo "</div>";
										echo "</div>";						
								}
							?>
						</div>
					</div>					
				</div>	
				</div>	
			</section>
			<!-- End popular-course Area -->
			

			<!-- Start search-course Area -->
			<section class="search-course-area relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row justify-content-between align-items-center">
						<div class="col-lg-6 col-md-6 search-course-left">
							<h1 class="text-white">
								Get reduced fee <br>
								during this Summer!
							</h1>
							<p>
								inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach.
							</p>
							<div class="row details-content">
								<div class="col single-detials">
									<span class="lnr lnr-graduation-hat"></span>
									<a href="#"><h4>Expert Instructors</h4></a>		
									<p>
										Usage of the Internet is becoming more common due to rapid advancement of technology and power.
									</p>						
								</div>
								<div class="col single-detials">
									<span class="lnr lnr-license"></span>
									<a href="#"><h4>Certification</h4></a>		
									<p>
										Usage of the Internet is becoming more common due to rapid advancement of technology and power.
									</p>						
								</div>								
							</div>
						</div>
						<?php
							if(isset($_POST["btn1"]))
							{
								extract($_POST);
								$date=date("y-m-d");
								$qry="insert into feedback (fname,femail,fsubject,fmessage,date) value('$name','$email','$subject','$message','$date')";
								$rs=$con->executequery($qry);
								if(!$rs)
								{
									echo "Feedback Sent";
								}
								else
								{
									echo "Feedback Not Send";
								}
							}
						?>
						<div class="col-lg-4 col-md-6 search-course-right section-gap">
							<form class="form-wrap" action="" method="post">
								<h4 class="text-white pb-20 text-center mb-30">Give Us Your Feedback</h4>		
								<input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required="" ><span id="sname"><span>
								<input type="email" class="form-control" id="email" name="email" placeholder="Your Email Address" required=""><span id="semail"><span>						
								<input type="text" class="form-control" id="subject" name="subject" placeholder="Your Subject" required=""  ><span id="ssubject"><span>
								<textarea class="common-textarea form-control" id="message" name="message" placeholder="Enter Messege" required="" ></textarea>
								<span id="smessage"><span>
								<button class="primary-btn text-uppercase" onClick="return valid();" id="btn1" name="btn1">Submit</button>
							</form>
						</div>
					</div>
				</div>	
			</section>
			<!-- End search-course Area -->
			
		
			 <!-- Start upcoming-event Area -->
			<!--<section class="upcoming-event-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Upcoming Events of our Institute</h1>
								<p>If you are a serious astronomy fanatic like a lot of us</p>
							</div>
						</div>
					</div>								
					<div class="row">
						<div class="active-upcoming-event-carusel">
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<img class="img-fluid" src="img/e1.jpg" alt="">
								</div>
								<div class="detials col-12 col-md-6">
									<p>25th February, 2018</p>
									<a href="#"><h4>The Universe Through
									A Child S Eyes</h4></a>
									<p>
										For most of us, the idea of astronomy is something we directly connect to “stargazing”, telescopes and seeing magnificent displays in the heavens.
									</p>
								</div>
							</div>
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<img class="img-fluid" src="img/e2.jpg" alt="">
								</div>
								<div class="detials col-12 col-md-6">
									<p>25th February, 2018</p>
									<a href="#"><h4>The Universe Through
									A Child S Eyes</h4></a>
									<p>
										For most of us, the idea of astronomy is something we directly connect to “stargazing”, telescopes and seeing magnificent displays in the heavens.
									</p>
								</div>
							</div>	
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<img class="img-fluid" src="img/e1.jpg" alt="">
								</div>
								<div class="detials col-12 col-md-6">
									<p>25th February, 2018</p>
									<a href="#"><h4>The Universe Through
									A Child S Eyes</h4></a>
									<p>
										For most of us, the idea of astronomy is something we directly connect to “stargazing”, telescopes and seeing magnificent displays in the heavens.
									</p>
								</div>
							</div>	
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<img class="img-fluid" src="img/e1.jpg" alt="">
								</div>
								<div class="detials col-12 col-md-6">
									<p>25th February, 2018</p>
									<a href="#"><h4>The Universe Through
									A Child S Eyes</h4></a>
									<p>
										For most of us, the idea of astronomy is something we directly connect to “stargazing”, telescopes and seeing magnificent displays in the heavens.
									</p>
								</div>
							</div>
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<img class="img-fluid" src="img/e2.jpg" alt="">
								</div>
								<div class="detials col-12 col-md-6">
									<p>25th February, 2018</p>
									<a href="#"><h4>The Universe Through
									A Child S Eyes</h4></a>
									<p>
										For most of us, the idea of astronomy is something we directly connect to “stargazing”, telescopes and seeing magnificent displays in the heavens.
									</p>
								</div>
							</div>	
							<div class="single-carusel row align-items-center">
								<div class="col-12 col-md-6 thumb">
									<img class="img-fluid" src="img/e1.jpg" alt="">
								</div>
								<div class="detials col-12 col-md-6">
									<p>25th February, 2018</p>
									<a href="#"><h4>The Universe Through
									A Child S Eyes</h4></a>
									<p>
										For most of us, the idea of astronomy is something we directly connect to “stargazing”, telescopes and seeing magnificent displays in the heavens.
									</p>
								</div>
							</div>																						
						</div>
					</div>
				</div>	
			</section> -->
			<!-- End upcoming-event Area -->
						
			<!-- Start review Area -->
			<section class="review-area section-gap relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row">
						<div class="active-review-carusel">
							<?php
							$qry="select * from notification where status='Active' order by nid desc ";
							$rs=$con->readrecord($qry);
							while($row=mysql_fetch_array($rs))
							{
							
							echo"<div class='single-review item'>";
							echo"<img src='../subadmin/$row[4]' alt='' style='height:50px; width:80px;'>";
								echo"<div class='title justify-content-start d-flex'>";
									echo"<a href=''><h4>".ucwords($row[1])."</h4></a>";
								echo"</div>";
								echo"<p class='text-justify'>".ucwords($row[2])." "."</p>";
							echo"</div>";
							}
							?>																												
						</div>
					</div>
				</div>	
			</section>
			<!-- End review Area -->	
			
			<!-- Start cta-one Area -->
			<section class="cta-one-area relative section-gap">
				<div class="container">
					<div class="overlay overlay-bg"></div>
					<div class="row justify-content-center">
						<div class="wrap">
							<h1 class="text-white">Become an instructor</h1>
							<p>
								There is a moment in the life of any aspiring astronomer that it is time to buy that first telescope. It’s exciting to think about setting up your own viewing station whether that is on the deck.
							</p>
							<a class="primary-btn wh" href="#">Apply for the post</a>								
						</div>					
					</div>
				</div>	
			</section>
			<!-- End cta-one Area -->

			<!-- Start blog Area -->
			<section class="blog-area section-gap" id="blog">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Our Faculties</h1>
								<p>In the history of modern astronomy there is.</p>
							</div>
						</div>
					</div>					
					<div class="row">
						<?php
						$faculty="";
						$qry="select * from facultyinfo where actstatus='Active'  LIMIT 4";
						$rs=$con->readrecord($qry);
						while($row=mysql_fetch_array($rs))
						{
						$faculty.="<div class='col-lg-3 col-md-6 single-blog'>";
							$faculty.="<div class='thumb'>";
								$faculty.="<img class='img-fluid pt-3' src='../docs/$row[4]' style='height:290px;' alt=>";								
							$faculty.="</div>";
							$faculty.="<p class='meta'>$row[3] &nbsp | &nbsp  <a href='#'>$row[6]</a></p>";
							$faculty.="<a href='../docs/$row[4]'>";
								$faculty.="<h5>$row[1]</h5>";
							$faculty.="</a>";
							$faculty.="<p class='text-justify'>$row[5]<a href='faculty.php' class='details-btn d-flex justify-content-center align-items-center'><span class='details'>Details</span><span class='lnr lnr-arrow-right'></span></a></p>";
							$faculty.="";	

						$faculty.="</div>";	

						}
						?>
						<?php echo $faculty; ?>
						
					</div>
				</div>	
			</section>
			<!-- End blog Area -->			
			

			<!-- Start cta-two Area -->
			<!--<section class="cta-two-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 cta-left">
							<h1>Not Yet Satisfied with our Trend?</h1>
						</div>
						<div class="col-lg-4 cta-right">
							<a class="primary-btn wh" href="#">view our blog</a>
						</div>
					</div>
				</div>	
			</section>-->
			<!-- End cta-two Area -->
						
			<?php include("footer.php")?>


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