<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>

<?php

//Create connection
$DATABSE_HOST ="localhost";
$DATABSE_USER ="root";
$DATABSE_PASS ="";
$DATABASE_NAME ="distributed";

$con = mysqli_connect($DATABSE_HOST, $DATABSE_USER, $DATABSE_PASS, $DATABASE_NAME);
//check connection
if(mysqli_connect_error()){

    echo "Failed to connct to database" .mysqli_connect_error();

}
if (isset($_REQUEST['username'])) {
    // removes backslashes
    $username = stripslashes($_REQUEST['username']);
    //escapes special characters in a string
    $username = mysqli_real_escape_string($con, $username);
    $email    = stripslashes($_REQUEST['email']);
    $email    = mysqli_real_escape_string($con, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $create_datetime = date("Y-m-d H:i:s");
    $query    = "INSERT into `users` (username, password, email, create_datetime)
                 VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
    $result   = mysqli_query($con, $query);
    if($result)
        {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.html'>Login</a></p>
                  </div>";

        }else {
            echo "
            <div class ='form'>
            <h3>Reqiuired Fields Are missing<h3><br>
            <p class='link'>Click here to <a href='client.html'>Registration</a>again </p>";

        }

}
?>



</body>
</html>
