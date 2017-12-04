<?php 
    require 'db_conn.php'; 
    session_start();
    if(isset($_POST['submit'])) { 
        $id=$_SESSION["id"];
        $fname = mysql_real_escape_string($_POST['f_name']); 
        $lname = mysql_real_escape_string($_POST['l_name']);
    	$mobno=mysql_real_escape_string($_POST['MobNo']); 
    $sql = "UPDATE userlogin SET MobNo='$mobno', f_name='$fname', l_name='$lname' WHERE EmailID='".$id."'";
    if(mysqli_query($conn,$sql))
    {    //header('location:loginsuccess.php');
         echo '<script type="text/javascript">alert("Updated Successfully!!");window.location.assign("dashboard.php")</script>';
     }
    else 
    {
       echo '<script type="text/javascript">alert("Please try again");history.go(-1);</script>';
    }
} 
?>