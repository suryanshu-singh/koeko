<?php 
    require 'db_conn.php'; 
    session_start();
    //if(isset($_POST['submit'])) { 
    $groupname= mysql_real_escape_string($_GET['groupname']);
    $sql = "SELECT * FROM message WHERE Group_Name= '$groupname' ORDER BY Message_ID";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result))
    {
    		echo $row['Sender']."<br>".$row['Group_Name']."<br>".$row['Message_Content']."<br>".$row['Message_Time']."<br>".$row['Message_Date']."<br>".$row['Message_ID']."<br>"."<br>";
    } 
 
//The name of the directory that we need to create.
$directoryName = 'imagesforkoeko';
 
//Check if the directory already exists.
if(!is_dir($directoryName)){
    //Directory does not exist, so lets create it.
    mkdir($directoryName, 0755);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>kọ ẹkọ</title>
	</head>
<body>
</body>
</html>