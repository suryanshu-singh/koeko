<?php
session_start();
$id=$_SESSION["id"];
$msgcont = $_POST['msg'];
$grpname = $_POST['grpname'];
include 'db_conn.php';
date_default_timezone_set("Asia/Kolkata");
$msgdate = date('Y-m-d');
$msgtime = date("h:i:s");
$sql="INSERT INTO message(EmailID,Message_Content, Group_Name, Message_Time, Message_Date) VALUES('".$id."','".$msgcont."','".$grpname."','".$msgtime."','".$msgdate."')";
if(mysqli_query($conn,$sql))
    {    //header('location:loginsuccess.php');
        echo '<script type="text/javascript">window.location=\'chat.php?grp='.$grpname.'\';</script>';
     }
    else 
    {
       echo '<script type="text/javascript">alert("Please try again");history.go(-1);</script>';
    }
 
?>