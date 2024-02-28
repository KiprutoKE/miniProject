<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php

//create database connection
$DATABASE_HOST="localhost";
$DATABASE_USER="root";
$DATABASE_PASS="";
$DATABASE_NAME ="distributed";

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if(mysqli_connect_error()){

    echo"Failed to connect to the database" .mysqli_connect_error();
}
if(isset($_REQUEST['mobile'])){

$mobile=  mysqli_real_escape_string ($con, $mobile);
$mobile= stripslashes($_REQUEST['mobile']);
$email    = mysqli_real_escape_string($con, $email);
$email    =  stripslashes($_REQUEST['email']);
$Post_Office_Address   =  mysqli_real_escape_string($con, $Post_Office_Address);
$Post_Office_Address  = stripslashes($_REQUEST['Post_Office_Address']);
$Reg_No   =  mysqli_real_escape_string($con, $Reg_No);
$Reg_No    =stripslashes($_REQUEST['Reg_No']);
$create_datetime = date("Y-m-d H:i:s");

$query = "INSERT into `contacts` (mobile, email, Post_Office_Address, REg_No,  create_datetime)
          VALUES ('$mobile', '$email', '$Post_Office_Address', '$Reg_No', ' $create_datetime')";   

$result = mysqli_query($con, $query);

if($result){
    
        $_SESSION['username'] = $username;
        // Redirect to user dashboard page
        header("Location: search.html");
}else {
    echo"
    <div class='form'>
    <h3>Required fields are missing.</h3><br/>
    <p class='link'>Click here to <a href='contacts.html'>registration</a> again.</p>
    </div>";

}
                                     





}



?>
</body>
</html>