<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'root';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, "koeko");
   if(! $conn )
   {
     die('Could not connect: ' . mysqli_error());
   }
   mysqli_select_db($conn, 'koeko') or die(mysqli_error());
?>