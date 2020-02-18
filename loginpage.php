<?php
include('login.php'); // Includes Login Script
//checks if login user is set
if(isset($_SESSION['login_user'])){
header("location: profile.php");

}
//Query to return the total number of particpants already in study to be used later. If less than 200 registration button will appear
$query = mysqli_query($conn, "select * from participants");
$rows = mysqli_num_rows($query);

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
<body>



<div class = "container">
<div class = "row  ">
<div class="col-md-4"></div>
<div class = "col-md-4 tipibox"><h1>Login Here</h1></div>
<div class="col-md-4"></div>
</div>




<div class = "row">
<div  class = "col-md-3"></div>
<div id="login" class = "col-md-6 tipibox">
<br>
<form action="" method="post">
<label>PARTICIPANT ID :</label>
<input id="name" name="part_id" placeholder="username" type="text">
<label>PIN:</label>
<input id="password" name="part_pin" placeholder="**********" type="password">

<br>
<div class = "row">
	<br>
<div  class = "col-md-12 "><input name="submit" class="btn btn-info" type="submit" value=" Login "></div>
</div>


  <br><br>
<span><?php echo $error; ?></span>
</form>

<!-- //code checking the umber of particpants is in the threshold for ethics -->
<?php if ($rows<201):?><a href="registerpage.php" class="btn btn-info" role="button">Register as Participant</a><?php endif; ?>

<br>
</div>

<div  class = "col-md-3"></div>
</div>


<footer class="text-center">
  <div class="container">

  </div>
</footer>
<!-- / FOOTER -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.3.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>
</body>
</html>
