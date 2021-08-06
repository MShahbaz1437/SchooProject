<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<div class="single-footer-widget">
								<h4>Useful Links</h4>
								<?php
									$qry1="select mname,mdetail from menusetup where mstatus='Active'";
									$rs1=$con->readrecord("$qry1");
									while($ro=mysql_fetch_array($rs1))
									{
										echo "<ul>";
										echo "<li><a href='$ro[1]'>$ro[0]</a></li>";
										echo "</ul>";
									}								
								?>							
							</div>
						</div>	
						<div class="col-lg-4 col-md-4 col-sm-4">
							<div class="single-footer-widget">
								<h4>About Us</h4>
								<?php
									$qry1="select * from about";
									$rs1=$con->readrecord("$qry1");
									while($ro=mysql_fetch_array($rs1))
									{
										echo "<p class='text-justify'>".substr($ro[2],0,200)."<a href='about.php'>&nbsp Read More</a></p>";

									}								
								?>							
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="single-footer-widget">
								<h4>Contact Us</h4>
								<?php
									$qry1="select * from titlesetup";
									$rs1=$con->readrecord("$qry1");
									while($ro=mysql_fetch_array($rs1))
									{
										
								echo "<div class='icon'>";
									echo "<span class=''></span>";
									echo "<p class='text-justify  lnr lnr-envelope'>&nbsp $ro[3]</p>";
								echo "</div>";
								echo "<div class='icon'>";
									echo "<span class=''></span>";
									echo "<p class='text-justify lnr lnr-phone-handset'>&nbsp $ro[4]</p>";
								echo "</div>";
								echo "<div class='icon'>";
									echo "<span class=''></span>";
									echo "<p class='text-justify fa fa-fax'>&nbsp $ro[5]</p>";
								echo "</div>";
								echo "<div class='icon'>";
									echo "<span class=''></span>";
									echo "<p class='text-justify lnr lnr-home'>&nbsp $ro[6]</p>";
								echo "</div>";
										

									}								
								?>							
							</div>
						</div>							
						
					</div>
					<div class="footer-bottom row align-items-center justify-content-between">
						<p class="footer-text m-0 col-lg-6 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="www.adssoftware.in" target="_blank">Ads</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
						<div class="col-lg-6 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>						
				</div>
			</footer>	
			<!-- End footer Area -->	