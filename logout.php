<?php
$_SESSION['id']="";
session_destroy();
header("Location:index.php");
?>