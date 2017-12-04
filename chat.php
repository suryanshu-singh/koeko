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
	$grp = $_GET['grp'];
?>
<?php
	if($_SESSION['id']=="")
	{
		echo '<script type="text/javascript">alert("You need to login");window.location=\'login.php\';</script>';
	}
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
	        	<div class="col-md-3 left_col menu_fixed" style="background-color: rgb(230,230,230); !important;">
	         		<div class="left_col scroll-view">
	            		<div class="clearfix"></div>
	            		<br><br><br><br>
	            		<!-- menu profile quick info -->
	           			<div class="profile clearfix">
	              			<div class="profile_pic" style="text-align: center;">
	                			<img src="images/dp.png" alt="..." class="img-circle profile_img" style="height: 120px">
	              			</div>
	              			<br>
	              			<div class="profile_info">
	               				<span>&nbsp;Welcome,</span>
	                			<h4>&nbsp;<?php echo $name; ?></h4>
	             			</div>
	           			</div>
	           			<!-- /menu profile quick info -->

	            		<br />

	            		<!-- sidebar menu -->
	            			<?php include 'sidebar.php'; ?>
	           			<!-- /sidebar menu -->
	          		</div>
	        	</div>
	        	<br><br><br><br><br>
	        	<div class="col-sm-7 col-sm-offset-1">
	        		<iframe src="messages.php?grp=<?php echo($grp); ?>#bottom" height="400px" style="width: 700px;" frameborder="0">
  							<p>Your browser does not support iframes.</p>
					</iframe>
	        	</div>
	        	<div class="col-sm-7 col-sm-offset-1">
	        		<form action="sendmsg.php" class="contact-form" name="contact-form" method="post">
		        		<div class="col-sm-9">
							<input type="text" name="msg" placeholder="Type Here">
							<input type="text" name="grpname" value="<?php echo $grp; ?>" hidden>
						</div>
						<div class="col-sm-3">
							<input type="submit" name="submit" value="Send" class="btn btn-send">
						</div>
					</form>
	        	</div>
	    	</div>
		</div>
	</section>
</body>
</html>
