<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
// craete a  connection to the database 
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="distributed";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


if(mysqli_connect_error()){
echo" Failed to connect to the databse".mysqli_connect_error();

}
if (isset($_POST['submit-search'])){

$search = mysqli_real_escape_string($con, $_POST['search']);

$sql = "SELECT * FROM contacts WHERE mobile LIKE '%$search%' OR email LIKE '%$search%' OR Post_Office_Address LIKE '%$search%' OR Reg_No LIKE '%$search%'  ";

$result = mysqli_query($con,$sql);
$queryResult = mysqli_num_rows($result);


if ($queryResult> 0){
while($row = $result->fetch_assoc() ){
    echo "
    <div class='form'><br>
    <h3> Your Results Are :</h3>
    <p>".$row['mobile']."</p>
    <p>".$row['email']."</p>
    <p>".$row['Post_Office_Address']."</p>
    <p>".$row['Reg_No']."</p><br>

   

    <p class=link> <a href='search.html'>Search Again</a></p><br>

    <p class=link> <a href='logout.html'>Logout</a></p>
    </div";
}
} else {

    echo "<div class='form'>
    <p>0 records</p><br>

  <p class='link'>Click here to <a href='search.html'>Search again</a></p><br>
  <p class=link> <a href='logout.php'>Logout </a></p>


    ";
}
}
?>








 </body>
 </html>
