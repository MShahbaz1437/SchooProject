
<header id="header" id="home">
	  		<div class="header-top">
	  			<div class="container">
			  		<div class="row">
			  			<div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
			  				<ul>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-behance"></i></a></li>
			  				</ul>			
			  			</div>
			  			<div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
							<?php
							$qry="select tcontact from titlesetup limit 1";
							$rs=$con->readrecord($qry);
							
							while($row=mysql_fetch_array($rs))
							{
								echo "<a href='tel: $row[0]'><span class='lnr lnr-phone-handset'></span> <span class='text'>";
								echo $row[0];
							}
							?>
							</span></a>
			  				
							<?php
							$qry="select temail from titlesetup limit 1";
							$rs=$con->readrecord($qry);
							while($row=mysql_fetch_array($rs))
							{
								echo "<a href='mailto: $row[0]'><span class='lnr lnr-envelope'></span> <span class='text'>";
								echo $row[0];
							}
							?></span></a>			
			  			</div>
			  		</div>			  					
	  			</div>
			</div>
		    <div class="container main-menu">
		    	<div class="row align-items-center justify-content-between d-flex">
			     <?php
				$image=""; 
				$qry="select logo from titlesetup limit 1 ";
				$rs=$con->readrecord($qry);
				while($row=mysql_fetch_array($rs))
				{
					$image=$row[0];
				}  
			      echo "<div id='logo'>";
			        echo "<a href='../docs/$image''><img src='../docs/$image'; style='width:100px;  height:80px;' /></a>";
			      echo "</div>";
				  ?>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
						<?
						$qry="select * from menusetup where mstatus='Active'";
						$rs=$con->readrecord($qry);
						while($row=mysql_fetch_array($rs))
						{
							echo "<li class='menu-has-children'><a href='$row[3]'>$row[1]</a>";
							$submenu="select smname,smdetail from submenu where mid='$row[0]' and smstatus='Active'";
							$rs1=$con->readrecord($submenu);
							if(mysql_num_rows($rs1)>0)
							{
								echo "<ul>"; 
								while($row1=mysql_fetch_array($rs1))
								{
									 echo "<li ><a href='$row1[1]'>$row1[0]</a></li>";
								}
								echo "</ul></li>";
							}
						}
					?>
			        </ul>
			      </nav><!-- #nav-menu-container -->	    		
		    	</div>
		    </div>
		  </header>