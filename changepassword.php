<?php
	session_start();
	include 'db_conn.php';
	$id=$_SESSION["id"];
	//echo $id;
	$sql = "SELECT * FROM userlogin WHERE EmailID='".$id."'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$name = $row["f_name"]." ".$row["l_name"];
	$mobno = $row["MobNo"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>kọ ẹkọ</title>
	
	<!-- Main CSS file -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/owl.carousel.css" />
	<link rel="stylesheet" href="css/magnific-popup.css" />
	<link rel="stylesheet" href="css/font-awesome.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/responsive.css" />

	
	<!-- Favicon -->
	<link rel="shortcut icon" href="images/icon/favicon.png">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/icon/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/icon/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/icon/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/icon/apple-touch-icon-57-precomposed.png">
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</head>
<body>
	<?php include 'loggedinheader.php';?>
	<section>
		<div class="container body">
	      	<div class="main_container">
	        	<div class="col-md-3 left_col menu_fixed">
	         		<div class="left_col scroll-view">
	            		<div class="clearfix"></div>
	            		<br><br><br><br>
	            		<!-- menu profile quick info -->
	           			<div class="profile clearfix">
	              			<div class="profile_pic">
	                			<img src="images/dp.png" alt="..." class="img-circle profile_img" style="height: 120px">
	              			</div>
	              			<br>
	              			<div class="profile_info">
	               				<span>Welcome,</span>
	                			<h4><?php echo $name; ?></h4>
	             			</div>
	           			</div>
	           			<!-- /menu profile quick info -->
	            		<br />
	            		<!-- sidebar menu -->
	            			<?php include 'sidebar.php'; ?>
	           			<!-- /sidebar menu -->
	          		</div>
	        	</div>
	        	<div class="col-sm-7 col-sm-offset-1">
	        		<br><br><br><br>
	        			<form action="changepasswordsuccess.php" class="contact-form" name="contact-form" method="post">
	        				<center><h4>Change Password</h4></center><br><br>
						<div class="row">
							<div class="col-sm-6">
								<h5>Old Password</h5>
							</div>
							<div class="col-sm-6">
								<input type="password" name="oldpassword" required="required" placeholder="*Old password" value="">
							</div>
							<div class="col-sm-6">
								<h5>New Password</h5>
							</div>
							<div class="col-sm-6">
								<input type="password" name="newpassword" required="required" placeholder="*New password" value="">
							</div>
							<div class="col-sm-6">
								<h5>Retype New Password</h5>
							</div>
							<div class="col-sm-6">
								<input type="password" name="retypenewpassword" required="required" placeholder="*Retype new password" value="">
							</div>
							<div class="col-sm-12">
								<input type="submit" name="submit" value="Save Changes" class="btn btn-send">
							</div>
						</div>
					</form>
	        	</div>
	    	</div>
		</div>
	</section>
</body>
</html>
