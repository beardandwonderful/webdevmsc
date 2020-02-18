<?php

include('session.php');

$check = $_SESSION['login_user'];
if (!$check)
{header("location: loginpage.php");}

include 'dbconfig.php';
//retrieve value of the checkbox Y and update the progress table allowing users to proceed on profile
$disc= $_POST['disc'];
$sql = ("UPDATE  progress SET disc = '$disc' WHERE participant_id='$check'");
mysqli_query($conn, $sql);





header('Refresh:0; url=profile.php');
//exit();
