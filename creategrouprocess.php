<?php 
    require 'db_conn.php'; 
    session_start();
    if(isset($_POST['submit'])) { 
    $grpname = mysql_real_escape_string($_POST['G_Name']);
    $grplimit= mysql_real_escape_string($_POST['limit']); 
    $grptype=mysql_real_escape_string($_POST['type']);
    $grpkey=mt_rand(100000,999999);
    //echo $grpkey;
    $sql1 = "select * from grp where Group_Name='$grpname'";
    $result1 = mysqli_query($conn,$sql1);
    $row = mysqli_fetch_assoc($result1);
    $count = mysqli_num_rows($result1);
    //echo $count;
    if ($count)
    {
            echo '<script type="text/javascript">alert("The Group Name already exists!! Choose a different group name");history.go(-1);</script>';
    }
    else
    {
        $sql = "insert into grp(Group_Name,Group_Limit,Group_Type,Group_Key) values('$grpname',$grplimit,' $grptype','$grpkey') ";
        $result = mysqli_query($conn,$sql);
        $sql1="INSERT INTO pertogrp values('".$grpname."','".$_SESSION['id']."')";
        $result1 = mysqli_query($conn,$sql1);
        // $row = mysqli_fetch_assoc($result); 
        // $id = $row["userid"];
        // $count = mysqli_num_rows($result);
        if($result) 
        {
           // $_SESSION['id'] = $myusername;

            $_SESSION['grp']=$grpname;
            $url = "creategroupsuccess.php";
            header("location:$url");
        }
        else 
        {
            echo '<script type="text/javascript">alert("Teachers can only access");history.go(-1);</script>';
        }
    }
}
?>