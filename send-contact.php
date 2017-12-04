<?php 
    require 'db_conn.php'; 
    session_start();
    if(isset($_POST['submit'])) { 
    $name= mysql_real_escape_string($_POST['name']);
    $email = mysql_real_escape_string($_POST['email']); 
    $subject = mysql_real_escape_string($_POST['subject']); 
    $message = mysql_real_escape_string($_POST['message']); 
    $sql = "INSERT INTO feedback(name,email,subject,message) values('$name','$email','$subject','$message')";
    if(mysqli_query($conn,$sql))
    {    //header('location:loginsuccess.php');
         echo '<script type="text/javascript">alert("Thanks for ur feedback!!");history.go(-1);</script>';
     }
    else 
    {
       echo '<script type="text/javascript">alert("Please try again");history.go(-1);</script>';
    }
} 
?>