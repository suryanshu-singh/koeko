<?php
require 'db_conn.php'; 
    session_start();
$hash = $_GET['hash'];
$email=$_GET['id'];
$sql="SELECT * from userlogin WHERE EmailID='".$email."' AND hash='".$hash."'";
$result=mysqli_query($conn,$sql);
if($result)
{
//$row = mysqli_fetch_assoc($result);
// $hashtable=$row['hash'];
 $sql1 = "UPDATE userlogin SET Verify=1 WHERE EmailID='".$email."'";
 if(mysqli_query($conn,$sql1))
 {
 	echo '<script type="text/javascript">window.location.assign("login.php")</script>';
 }
 else
 {
 	echo "Not verified";
 }
}
?>

