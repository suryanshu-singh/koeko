<html>
<head>
    <title>Signing Up</title>
</head>
<body>
<?php 
        require 'db_conn.php';
        session_start();
        $_SESSION['id']='';
        $fname = $_POST['F_Name'];
        $lname = $_POST['L_Name'];
		$pass  = $_POST['password']; 
        $conpass = $_POST['conpassword'];
        $email = $_POST['email'];
        $mobno = $_POST['mobno'];   
        $token = md5(uniqid(rand(), true));
        $sql="INSERT INTO userlogin values('".$fname."','".$lname."','".$email."','".$mobno."','N','".$token."','".$pass."',0)";
        if(mysqli_query($conn,$sql))
        {
                //$email = 'ayankonardgp@gmail.com';//to the mail id you want to send the mail to
                require 'PHPMailer/PHPMailerAutoload.php';
                $mail = new PHPMailer;

                $mail->isSMTP();                                   // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                            // Enable SMTP authentication
                $mail->Username = 'prakash.khawas2016@vitstudent.ac.in';          // sender's mail id
                $mail->Password = 'v8438i4499T'; // sender's password
                $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                 // TCP port to connect to

                $mail->setFrom('abc@gmail.com', 'suryanshu');
                $mail->addReplyTo('', '');
                $mail->addAddress($email);   // Add a recipient
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                $mail->isHTML(true);  // Set email format to HTML

                $bodyContent = 'Click here to verify your account:<br><a href="http://localhost/koeko/cluster/verify.php?id='.$email.'&hash='.$token.'">http://localhost/koeko/cluster/verify.php?id='.$email.'&hash='.$token.'</a>';//the activation link
                                //$bodyContent .= '<p>This is the HTML email sent from localhost using PHP script by <b>suryanshu</b></p>';

                $mail->Subject = 'Keoko:Verify your account';
                $mail->Body    = $bodyContent;

                if(!$mail->send()) {
                    echo '<script type="text/javascript">alert("There was an error!!");history.go(-1);</script>';
                    //echo 'Hi'.$mail->ErrorInfo;
                } else {
                    $_SESSION['email']=$email;
                    echo '<script type="text/javascript">alert("Mail has been sent to your account!!");window.location.assign("signupsuccess.php")</script>';
                    //echo 'Helloo';
                }
            }
            
            ?>
</body>
</html>