<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<div class="menu_section">
		<ul class="nav side-menu">
				<li><a href="profile.php" class="active"> My Profile</a></li>
				<li><a href="#demo" data-toggle="collapse"> My Groups <span class="fa fa-chevron-down"></span></a>
	            <div>
	            	<ul id="demo" class="collapse" style="list-style-type: circle; !important;">
	            	<?php
	            		$sql = "SELECT * FROM pertogrp WHERE EmailID='".$id."'";
						$result = mysqli_query($conn,$sql);
						while($row = mysqli_fetch_assoc($result))
						{
							$group=$row['Group_Name'];
							echo '<li><a href="chat.php?grp='.$group.'">'.$group.'</a></li>';
						}
					?>
	            	</ul>
	            </div>
	        </li>
	        <li><a href="creategroup.php"> Create Group</a></li>
	        <li><a href="joingroup.php"> Join Group</a></li>
	        <li><a href="feedback.php"> Feedback</a></li>
	    </ul>
	    <br>
	    <br>
	</div>
</div>