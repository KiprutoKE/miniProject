<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<?php

$DATABSE_HOST ="localhost";
$DATABSE_USER ="root";
$DATABSE_PASS ="";
$DATABASE_NAME ="distributed";

$con = mysqli_connect($DATABSE_HOST, $DATABSE_USER, $DATABSE_PASS, $DATABASE_NAME);
//check connection
if(mysqli_connect_error()){
	echo "Failed To Connect To Database".mysqli_connect_error();
}
if(isset($_POST['Reset']) && $_POST['email'])
{
$email = $_POST['email'];

$result = mysqli_query($con,"SELECT * FROM users WHERE email='" . $email. "'");

$row= mysqli_fetch_array($result);

if($row)
  {
     
     $token = md5($email).rand(10,9999);
 
     $expFormat = mktime(
     date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
     );
 
    $expDate = date("Y-m-d H:i:s",$expFormat);
 
    $update = mysqli_query($con,"UPDATE users set  password='" . $password . "', reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $email . "'");
 
    $link = "<a href='www.yourwebsite.com/reset-password.php?key=".$email."&token=".$token."'>Click To Reset password</a>";
 
    include_once("smtpmail/class.phpmailer.php");

     $email = $email; 
     
    $mail = new PHPMailer();
 
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "kiprutofrankline2000@gmail.com";
    // GMAIL password
    $mail->Password = "39281014Frankline";
    $mail->SMTPSecure = "tls";  
    // sets GMAIL as the SMTP server
    $mail->Host = 'smtp.gmail.com';
    // set the SMTP port for the GMAIL server
    $mail->Port = 587;
    $mail->From='franklinekiprutokorir2000@gmail.com';
    $mail->FromName="Frankline Kipruto";
    $mail->AddAddress($email);
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
    if($mail->Send())
    {
      echo "<div class = 'form'>
      <h3> Link Sent </h3>

      <p>Check Your Email and Click on the link sent to your email</p>

      </div>";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }else{
    echo "<div class = 'form'>
    <h3> Error </h3>

    <p>Invalid Email Address.

    <p class='link'>Click here to <a href='ForPass.html'> Go back</a></p><br>

    </div>";
  }
}
?>
</body>
</html>

