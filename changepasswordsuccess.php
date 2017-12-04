<?php 
    require 'db_conn.php'; 
    session_start();
    if(isset($_POST['submit'])) { 
        $id=$_SESSION["id"];
        $opassword = mysql_real_escape_string($_POST['oldpassword']); 
        $npassword = mysql_real_escape_string($_POST['newpassword']);
    	$rnpassword=mysql_real_escape_string($_POST['retypenewpassword']); 
        $sql = "SELECT * FROM userlogin WHERE EmailID='".$id."'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $password = $row["password"];
    if($password===$opassword)
    {   
        if($npassword===$rnpassword)
        {
            $sql1 = "UPDATE userlogin SET password='$npassword' WHERE EmailID='".$id."'";
            if(mysqli_query($conn,$sql1))
            {    //header('location:loginsuccess.php');
                 echo '<script type="text/javascript">alert(" Password Updated Successfully!!");window.location.assign("dashboard.php")</script>';
             }
        }
        else
            echo '<script type="text/javascript">alert("Password do not match!!");history.go(-1);</script>';
    }
    else 
    {
       echo '<script type="text/javascript">alert("Incorrect Password");history.go(-1);</script>';
    }
} 
?>