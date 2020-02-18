<?php

include 'dbconfig.php';


include('session.php');

$check = $_SESSION['login_user'];
if (!$check)
{header("location: loginpage.php");}


$currentelem="Layout";

$result = mysqli_query($conn, "SELECT * FROM style where participant_id='$check'");

if (!$result)
{
	$error = 'Error fetching data: ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}{
$row = mysqli_fetch_array($result);
$defaultlay =$row['layout'];
$defaultcent = $row['contcen'];
}



?>

<head>


	<script src="http://code.jquery.com/jquery-1.11.3.min.js">
	</script>



	<title>TIPI</title>
	<link rel="stylesheet"
			 href="https://fonts.googleapis.com/css?family=Abel">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	</script>
<style>
	body, h1 {
		font-family: 'Abel', serif;

	}
/* ensuring bootstrap columns all match height of their parent rows */
	.row {
	    display: inline-flex;
	    width: 100%;
	}
	.col {
	  flex: 1; /* additionally, equal width */
	}
</style>



</head>


<div class="col-sm-4 text-center studybox "  >
  <p>Current element: <?php echo $currentelem; ?></p>

<img src = "  <?php if($defaultlay == '1') {echo 'img/l1.png';} else {echo 'img/l2.png';}  ?> "  class = "studyimg" id = "elemimg">


</div>
<div class="col-sm-8 text-center studybox">
  <p>Customisation</p>


    <div class = "row">
    <div class="col-sm-4 text-center "> Top Navigation </div>
    <div class="col-sm-4 text-center"> Side Navigation </div>
    <div class="col-sm-4 text-center"> Centre Content </div>
    </div>


    <div class = "row">
    <div class="col-sm-4 text-center "> <img src = "img/l1.png" class = "studyimg"> </div>
    <div class="col-sm-4 text-center">  <img src = "img/l2.png" class = "studyimg"></div>
    <div class="col-sm-4 text-center">  <img src = "img/cent.png" class = "studyimg"></div>
    </div>

    <div class = "row">
    <div class="col-sm-4 text-center ">  <input type="radio" id="l1" name="layout" value = "1"  onClick=" update();changefinal('l1.php'); changeSrc(); " <?php if($defaultlay == '1') echo 'checked'; ?> ></div>
    <div class="col-sm-4 text-center">   <input type="radio" id="l2" name="layout"  value ="2"  onClick="changeSrc(); changefinal('l2.php'); update();" <?php if($defaultlay == '2') echo 'checked'; ?> ></div>
    <div class="col-sm-2 text-center">   <input type="radio" id="cent" name="cent" value = "0"  onClick=" update(); nocent()" <?php if($defaultcent == '0') echo 'checked'; ?>> N</div>	<div class="col-sm-2 text-center">   <input type="radio" id="centy" name="cent" value = "1" onClick=" update(); yescent()" <?php if($defaultcent == '1') echo 'checked'; ?>> Y</div>
    </div>


</div>
