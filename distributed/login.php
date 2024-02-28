<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
//create a connection
$DATABSE_HOST ="localhost";
$DATABSE_USER ="root";
$DATABSE_PASS ="";
$DATABASE_NAME ="distributed";

$con = mysqli_connect($DATABSE_HOST, $DATABSE_USER, $DATABSE_PASS, $DATABASE_NAME);
//check connection
if(mysqli_connect_error()){

    echo "Failed to connct to database" .mysqli_connect_error();
}
 session_start();

 if(!isset($_POST['username'], $_POST['password'] )){
    echo "<div class='form'>
    <h3> Empty Failed(s)...!!!</h3><br>
    <p class='link'> Click here to <a href='login.html'>Login</a> again.</p>
    </div>";


}
if(empty($_POST['username']) || empty($_POST['password'])) {
    exit('Values Are Empty'); 
}

if (isset($_POST['username'])) {
    $username = stripslashes($_REQUEST['username']);    // removes backslashes
    $username = mysqli_real_escape_string($con, $username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    // Check user is exist in the database
    $query    = "SELECT * FROM `users` WHERE username='$username'
                 AND password='" . md5($password) . "'";
    $result = mysqli_query($con, $query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    if ($rows == 1)
         {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: contacts.html");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.html'>Login</a> again.</p>
                  </div>";

        }
    }







?>
</body>
</html>