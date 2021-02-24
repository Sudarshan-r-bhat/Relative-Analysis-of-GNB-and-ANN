<?php	
		$uname = $_GET['usr'];
		$upass = $_GET['pss'];
		session_start();
 if(isset($_POST['submit']))
 {
	$email=$_POST['email'];
	$otp=$_POST['otp'];
	 require_once('dbconnection.php');
	 $query=mysqli_query($con,"select email,otp from ddos where email='$email' and otp='$otp'") or die(mysqli_error());
	 
	 
	 if(mysqli_num_rows($query)==1)
	 {
	
		$_SESSION['email']=$email;
		$_SESSION['otp']=$otp;
		header('location:index1.php');
	 }
	 
	 else { header('location:error1.php'); }
 }
 ?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Admin - Login</title>  
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>

  <body class="login-img2-body" style="background:url('images/bg-1.jpg') no-repeat right bottom fixed;background-color:#a8e3f5">

    
	<form method="POST" role="form" action="Adminotp.php">
      
    
	  
  <div class="modal fade in" id="myModal" role="dialog" style="display:block;background:rgba(0, 0, 0, 0.35)">
    <div class="modal-dialog modal-lg" style="margin-top:180px;width:370px">
      <div class="modal-content" style="left:9px">
        <div class="modal-header">
          <a type="button" class="close" href="Adminlog in.php">&times;</a>
          <h4 class="modal-title" style="text-align:center">Enter OTP</h4>
        </div>
		<input type="hidden" name="email" value="<?php print $uname;?>">
        <div class="modal-body" style="text-align:center">
          <p><input type="text" class="form-control" name="otp" placeholder="OTP" style="border-radius:0px">
		  </p><br>
          <button type="submit" name="submit" class="btn btn-primary btn-lg" style="border-radius:0px;background:linear-gradient(#234a96, #00256b);border:0px;outline:0px;color:#fff">Submit</button>
        </div>
        <div class="modal-footer" style="text-align:center">
		  <a style="cursor:pointer;padding:0px;border:0px;background-color:transparent;color:#183078">Didn't Recieve Code, Resend Now</a>
        </div>
      </div>
    </div>
  </div></form>

    </div>
	<!--Modal start-->
  </body>
</html>
<?php
		include('dbconnection.php');
		{
			$email=$uname;
			$sql=mysqli_query($con,"SELECT * FROM `ddos` WHERE `email`='$email' ");
			if($a=mysqli_num_rows($sql))
			{
				while($row=mysqli_fetch_array($sql))
				{
					$email=$row['email'];
			//Random string
			$str = "";
			$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
			$max = count($characters) - 1;
			for ($i = 0; $i < 6; $i++) {
				$rand = mt_rand(0, $max);
				$str .= $characters[$rand];
			}
			
			$message=
			'Hello, <b>ADMIN</b><br/><br/>
			As you have requested, we have reset your OTP for '.$email.'.<br/><br/>
			To Log into your account :
			<ul><li>Copy this temporary OTP : <b>'.$str.'<b><br></li>
			<li>Type or paste the temporary OTP to log in to your account.</li>
			</ul><br/>
			<br/>
			
			';
			require 'PHPMailer-master/PHPMailerAutoload.php';

			$mail = new PHPMailer();

			//$mail->SMTPDebug = 3;                               // Enable verbose debug output 	php-php extension - check openssl

			$mail->isSMTP();  
			$mail->SMTPDebug=0;                                    // Set mailer to use SMTP
			$mail->SMTPAuth=true;
			$mail->SMTPSecure = 'ssl'; 
			$mail->Port = 465;
			$mail->Host = 'smtp.gmail.com';                 // Specify main and backup SMTP servers                       
			$mail->Username = 'gulfgarments456@gmail.com';                 // SMTP username
			$mail->Password = 'gulfstream456';                           // SMTP password                                              
			$mail->setFrom('gulfgarments456@gmail.com', 'DDoS attack Project');
			$mail->addAddress($email);     // Add a recipient
			$mail->Subject = 'DDoS - OTP';
			$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			$mail->MsgHTML($message);	
			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				echo "<script>alert('Request sent Successfully. Please ckeck your Email Account');
				</script>";
				$query=mysqli_query($con,"UPDATE `ddos` SET `otp`='$str' WHERE `email`='$email'");
			}
					}
				}
				else
				{
					echo "<script>alert('Request Unsuccessfull.');
					window.location='index.php';
					</script>";
				}
				
		} ?>