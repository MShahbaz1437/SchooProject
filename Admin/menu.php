<aside class="app-sidebar">
      <div class="app-sidebar__user"><?php $image=""; $qry="select * from admin where usertypeid='admin'"; $rs=$con->readrecord($qry); while($row=mysql_fetch_array($rs)){$image=$row[11];}  
	  echo "<a href='$image'><img class='app-sidebar__user-avatar' src='$image' style='width:40px;'  ></a>" ;?>
        <div>
          <p class="app-sidebar__user-name"><?php $qry="select * from admin where usertypeid='admin'"; $rs=$con->readrecord($qry); while($row=mysql_fetch_array($rs)){ echo $row[1];}?></p>
          <p class="app-sidebar__user-designation"> <?php $qry="select * from admin where usertypeid='admin'"; $rs=$con->readrecord($qry); while($row=mysql_fetch_array($rs)){ echo $row[2];}?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
			
		<!--<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-align-right"></i><span class="app-menu__label">User Info</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a class="treeview-item" href="userinfoadd.php"><i class="icon fa fa-plus-square"></i>Userinfo Add</a></li>
				<li><a class="treeview-item" href="userinfoview.php"><i class="icon fa fa-eye-slash"></i>Userinfo View</a></li>
			</ul>
        </li>
			-->
		<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-area-chart"></i><span class="app-menu__label">Title Setup</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a class="treeview-item" href="titleadd.php"> <i class="icon fa fa-plus-square"></i>Title Add</a></li>
				<li><a class="treeview-item" href="titleview.php"><i class="icon fa fa-eye-slash"></i>Title View</a></li>
			</ul>
        </li>			
		<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Admin</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a class="treeview-item" href="adminadd.php"><i class="icon fa fa-plus-square"></i>Admin Add</a></li>
				<li><a class="treeview-item" href="adminview.php"><i class="icon fa fa-eye-slash"></i>Admin View</a></li>
			</ul>
        </li>	
			<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Usertype</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a class="treeview-item" href="usertypeadd.php"><i class="icon fa fa-plus-square"></i>Usertype Add</a></li>
				<li><a class="treeview-item" href="usertypeview.php"><i class="icon fa fa-eye-slash"></i>Usertype View</a></li>
			</ul>
			</li>
		<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-child"></i><span class="app-menu__label">Studentinfo</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a class="treeview-item" href="studentinfoadd.php"><i class="icon fa fa-plus-square"></i>Studentinfo Add</a></li>
				<li><a class="treeview-item" href="studentinfoview.php"><i class="icon fa fa-eye-slash"></i>Studentinfo View</a></li>
			</ul>
        </li>
		<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-graduation-cap"></i><span class="app-menu__label">Student Class</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a class="treeview-item" href="studentclassadd.php"><i class="icon fa fa-plus-square"></i>Student Class Add</a></li>
				<li><a class="treeview-item" href="studentclassview.php"><i class="icon fa fa-eye-slash"></i>Student Class View</a></li>
			</ul>
        </li>
		
		<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-bar-chart"></i><span class="app-menu__label">Classinfo</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a class="treeview-item" href="classinfoadd.php"><i class="icon fa fa-plus-square"></i>Classinfo Add</a></li>
				<li><a class="treeview-item" href="classinfoview.php"><i class="icon fa fa-eye-slash"></i>Classinfo View</a></li>
			</ul>
        </li>
		<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-university"></i><span class="app-menu__label">Board</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a class="treeview-item" href="boardadd.php"><i class="icon fa fa-plus-square"></i>Board Add</a></li>
				<li><a class="treeview-item" href="boardview.php"><i class="icon fa fa-eye-slash"></i>Board View</a></li>
			</ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user-circle-o"></i><span class="app-menu__label">Faculty</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a class="treeview-item" href="facultyadd.php"><i class="icon fa fa-plus-square"></i>Faculty Add</a></li>
				<li><a class="treeview-item" href="facultyview.php"><i class="icon fa fa-eye-slash"></i>Faculty View</a></li>
			</ul>
        </li>
		<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-bars"></i><span class="app-menu__label">Menu</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a class="treeview-item" href="menuadd.php"><i class="icon fa fa-plus-square"></i>Menu Add</a></li>
				<li><a class="treeview-item" href="menuview.php"><i class="icon fa fa-eye-slash"></i>Menu View</a></li>
			</ul>
        </li>
		<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-bars"></i><span class="app-menu__label">Sub Menu</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a class="treeview-item" href="submenuadd.php"><i class="icon fa fa-plus-square"></i>Submenu Add</a></li>
				<li><a class="treeview-item" href="submenuview.php"><i class="icon fa fa-eye-slash"></i>Submenu View</a></li>
			</ul>
        </li>		
		<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-align-right"></i><span class="app-menu__label">Permission</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a class="treeview-item" href="permissionadd.php"><i class="icon fa fa-plus-square"></i>Permission Add</a></li>
				<li><a class="treeview-item" href="permissionview.php"><i class="icon fa fa-eye-slash"></i>Permission View</a></li>
			</ul>
        </li>
		<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-picture-o"></i><span class="app-menu__label">Gallery</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a class="treeview-item" href="galleryadd.php"><i class="icon fa fa-plus-square"></i>Gallery Add</a></li>
				<li><a class="treeview-item" href="galleryview.php"><i class="icon fa fa-eye-slash"></i>Gallery View</a></li>
			</ul>
        </li>
		<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-image-o"></i><span class="app-menu__label">GalleryType</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a class="treeview-item" href="gallerytypeadd.php"><i class="icon fa fa-plus-square"></i>GalleryType Add</a></li>
				<li><a class="treeview-item" href="gallerytypeview.php"><i class="icon fa fa-eye-slash"></i>GalleryType View</a></li>
			</ul>
        </li>
		<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-calendar"></i><span class="app-menu__label">Events</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a class="treeview-item" href="eventadd.php"><i class="icon fa fa-plus-square"></i>Events Add</a></li>
				<li><a class="treeview-item" href="eventview.php"><i class="icon fa fa-eye-slash"></i>Events View</a></li>
			</ul>
        </li>	
		<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-calendar"></i><span class="app-menu__label">Event Gallery</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a class="treeview-item" href="eventgalleryadd.php"><i class="icon fa fa-plus-square"></i>Gallery Add</a></li>
				<li><a class="treeview-item" href="eventgalleryview.php"><i class="icon fa fa-eye-slash"></i>Gallery View</a></li>
			</ul>
        </li>
		<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-comment"></i><span class="app-menu__label">Feedback</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a class="treeview-item" href="feedbackview.php"><i class="icon fa fa-eye-slash"></i>Feedback View</a></li>
			</ul>
        </li>
		<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-openid"></i><span class="app-menu__label">Facilities </span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a class="treeview-item" href="facilityadd.php"><i class="icon fa fa-plus-square"></i>Facility Add</a></li>
				<li><a class="treeview-item" href="facilityview.php"><i class="icon fa fa-eye-slash"></i>Facility View</a></li>
			</ul>
        </li>	
		<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-openid"></i><span class="app-menu__label">About </span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a class="treeview-item" href="aboutadd.php"><i class="icon fa fa-plus-square"></i>About Add</a></li>
				<li><a class="treeview-item" href="aboutview.php"><i class="icon fa fa-eye-slash"></i>About View</a></li>
			</ul>
        </li>	
        
      </ul>
    </aside>