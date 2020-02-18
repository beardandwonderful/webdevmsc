<?php
include 'dbconfig.php';
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
  if (empty($_POST['part_id']) || empty($_POST['part_pin'])) {
    $error = "PLEASE ENTER AN ID AND PIN";
  }
  else
  {
    // Define $username and $password
    $part_id=mysqli_real_escape_string($conn,$_POST['part_id']);
    $part_pin=mysqli_real_escape_string($conn,$_POST['part_pin']);
    // SQL query to fetch information of registered users and finds user match.
    $query = mysqli_query($conn, "select * from participants where participant_ID='$part_id' AND participant_pin='$part_pin'");
    $rows = mysqli_num_rows($query);
    if ($rows == 1) {

      $_SESSION['login_user']=$part_id; // Initializing Session
      if ($_SESSION['login_user'] !==1111){
      header("location: profile.php"); // Redirecting To Other Page
    }
    else {
      header("location: out.php"); // Redirecting To Other Page
    }

    } else {
      $error = "INCORRECT DETAILS PLEASE TRY AGAIN";
    }
  }
}
?>
