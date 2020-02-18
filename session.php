<?php
error_reporting(0);
include 'dbconfig.php';

session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($conn, "select  participant_ID from participants where participant_ID='$user_check'" );
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['participant_ID'];

if(!isset($login_session)){

mysql_close($conn); // Closing Connection
header('Location:loginpage.php'); // Redirecting To Home Page
}
?>
