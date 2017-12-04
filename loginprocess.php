<?php 
    require 'db_conn.php'; 
    session_start();
    if(isset($_POST['submit'])) { 
    $myusername = mysql_real_escape_string($_POST['email']);
    $mypassword = mysql_real_escape_string($_POST['password']); 
    $sql = "SELECT *FROM userlogin WHERE EmailID= '$myusername' AND password = '$mypassword'";
    $result = mysqli_query($conn,$sql);
    //echo $result;
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result); 
    $id = $row["userid"];
    if($count == 1) 
    {
        $_SESSION['id'] = $myusername;
        header('location:dashboard.php');
    }
    else 
    {
        echo '<script type="text/javascript">alert("Your Login Name or Password is invalid");history.go(-1);</script>';
    }
} 
?>