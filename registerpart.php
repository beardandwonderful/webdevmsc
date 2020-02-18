<?php


include 'dbconfig.php';


//retrieveing post data from form submission to insert into database
$part_id= $_POST['part_id'];
$part_pin=$_POST['part_pin'];
$gender=$_POST['gender'];
$participant_age=$_POST['participant_age'];


$mysql_insert = "INSERT INTO participants (participant_ID, participant_pin,  gender,age)VALUES('".$part_id."','".$part_pin."','".$gender."','".$participant_age."')";
mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
$mysql_insert1 = "INSERT INTO tipi (participant_ID)VALUES('".$part_id."')";
$mysql_insert2 = "INSERT INTO progress (participant_ID)VALUES('".$part_id."')";
$mysql_insert3 = "INSERT INTO style (participant_ID)VALUES('".$part_id."')";

mysqli_query($conn, $mysql_insert1) or die("database error:". mysqli_error($conn));
mysqli_query($conn, $mysql_insert2) or die("database error:". mysqli_error($conn));
mysqli_query($conn, $mysql_insert3) or die("database error:". mysqli_error($conn));
header('Refresh:5; url=loginpage.php');
//exit();



header('Refresh:5; url=loginpage.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>xxxx</title>
<link rel="stylesheet"
		 href="https://fonts.googleapis.com/css?family=Abel">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">

	</script>
	<style>
		body, h1 {
			font-family: 'Abel', serif;

		}
	</style>





</head>

<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center ">
      <h1>Regsitration Successful</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 text-center">
      <p>You have officially registered - you will shortly be returned to the login screen</p>

    </div>
  </div>
