<?php 
    require 'db_conn.php'; 
    session_start();
    if(isset($_POST['submit'])) 
    { 
    $groupname = mysql_real_escape_string($_POST['G_Name']);
    $groupkey = mysql_real_escape_string($_POST['G_Key']); 
    $sql = "SELECT Group_Name , Group_Key, Group_Count,Group_Limit FROM grp WHERE Group_Name= '$groupname' AND Group_Key= '$groupkey'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result); 
    $count = mysqli_num_rows($result);
    if($count >= 1) 
    {
        if($row['Group_Count']<$row['Group_Limit'])
        {
            $sql3= "SELECT * FROM pertogrp WHERE Group_Name= '$groupname' AND EmailID='".$_SESSION['id']."'"; 
            $result3 = mysqli_query($conn,$sql3);  
            $row3= mysqli_fetch_assoc($result3); 
            $count3 = mysqli_num_rows($result3);
            if($count3)
            {
                echo '<script type="text/javascript">alert("You are already in the group");history.go(-1);</script>;';
            }
            else
            {
                    $sql1="INSERT INTO pertogrp values('".$groupname."','".$_SESSION['id']."')";
                    $result1 = mysqli_query($conn,$sql1);
                    $sql2="UPDATE grp set Group_Count=Group_Count+1 where Group_Name='$groupname'";
                    $result2 = mysqli_query($conn,$sql2);
                    header('location:joingroupsuccess.php');
            }
        }
        else
            echo '<script type="text/javascript">alert("Maximum Group Limit Reached");history.go(-1);</script>;';
    }
    else 
    {
        echo '<script type="text/javascript">alert("The group name or key does not match");history.go(-1);</script>';
    }
} 
?>