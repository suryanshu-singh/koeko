<?php 
    require 'db_conn.php'; 
    session_start();
    if(isset($_POST['submit'])) { 
        $id=$_SESSION["id"];
        $sql = "SELECT * FROM userlogin WHERE EmailID='".$id."'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row["f_name"]." ".$row["l_name"];
    $subject = mysql_real_escape_string($_POST['subject']); 
    $message = mysql_real_escape_string($_POST['message']); 
    $sql = "INSERT INTO feedback(name,email,subject,message) values('$name','$id','$subject','$message')";
    if(mysqli_query($conn,$sql))
    {    //header('location:loginsuccess.php');
         echo '<script type="text/javascript">alert("Thanks for your feedback!!");window.location.assign("dashboard.php")</script>';
     }
    else 
    {
       echo '<script type="text/javascript">alert("Please try again");history.go(-1);</script>';
    }
} 
?>