<?php
//Get values passed from form in login.php
$username = $_POST['user'];
$password = $_POST['pass'];


//Connect to the server and select database
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "login") or die(mysqli_error($con));

//To prevent mysql injection
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);

//Query the database for user
$result = mysqli_query($con, "select * from users where username = '$username' and password='$password'")
          or die("Failed to query database ".mysqli_error());
$row = mysqli_fetch_array($result);
if($row['username'] == $username && $row['password'] == $password){
    echo "Login success!! Welcome ".$row['username'];
}          
else{
    echo "Failed to login";
}
?>