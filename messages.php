<?php
	require 'db_conn.php'; 
	session_start();
	$id=$_SESSION['id'];
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
<body style="background: url('images/fx.jpg');">
<div>
	<br><br>
	<?php
		//$sql = "SELECT * FROM userlogin WHERE EmailID='".$id."'";
		$sql="SELECT message.EmailID as ema, userlogin.f_name as fna, message.Message_Date as msgdate, message.Message_Time as msgtime, message.Message_Content as msgcon  FROM message INNER JOIN userlogin ON userlogin.EmailID=message.EmailID WHERE message.Group_Name='$grp' ORDER BY message.Message_Date, message.Message_Time";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_assoc($result))
		{
			if(strcmp($row['ema'],$id))
			{
				?>
				<div class="col-xs-7" style="background-color: rgba(256,256,256,0.5);">
				  	<div class="col-xs-3"><img src="images/dp.png" alt="Avatar" style="height: 5em;"></div>
				  	<div class="col-xs-9" style="padding-top: 2.5%; padding-bottom: 2%;"><p><?php echo $row['msgcon']; ?></p>
				  		<span class="time-right"><?php echo $row['fna']." ".$row['msgdate']." ".$row['msgtime']; ?></span>
				  	</div>
				</div>
				<div class="col-xs-5">&nbsp;</div>
				<div class="col-xs-9">&nbsp;</div>
				<?php
			}
			else
			{
				?>
				<div class="col-xs-5">&nbsp;</div>
				<div class="col-xs-7" style="background-color: rgba(256,256,256,0.5);">
				  	<div class="col-xs-9" style="padding-top: 2.5%; padding-bottom: 2%;">
				  		<p><?php echo $row['msgcon']; ?></p>
				  		<span class="time-right"><?php echo  $row['fna']." ".$row['msgdate']." ".$row['msgtime']; ?></span>
				  	</div>
				  	<div class="col-xs-3"><img src="images/dp.png" alt="Avatar" style="height: 5em;"></div>
				</div>
				<div class="col-xs-9">&nbsp;</div>

			<?php 
			}
		}
		
	?>
	<div id="bottom" class="col-xs-7"></div>
</div>
</body>