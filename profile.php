<?php
include 'dbconfig.php';
include('session.php');
//checking if login session already exists, if not redirects to the login/register page
$check = $_SESSION['login_user'];
if (!$check)
{header("location: loginpage.php");}
//Checking user progress and storing as variables to control which navigation is displayed
$result = mysqli_query($conn, "SELECT *  FROM progress where participant_ID='$check'");
if (!$result)
{
	$error = 'Error fetching data: ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}{
	$row = mysqli_fetch_array($result);
	$disc = $row['disc'];
	$tipi = $row['tipi'];
	$study = $row['study'];
	$final = $row['final'];
}

if ($login_session==1111){
	  header("location: out.php"); // Redirecting To Other Page
}
?>
<!DOCTYPE html>
<html>
<head>
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
</style>
</head>
<body>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center ">
					<h1>Welcome to your front page</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<p>This is your front page - here you can see the stages of the study and which elements you need to complete.</p>
					<p>Each step of the study needs to be complete in the order you see below</p>
					<h1>You are participant: <?php echo $login_session; ?></h1>
				</div>
			</div>
			<br><br>
			<hr>
			<div class=" row text-center ">
				<div class="col-sm-12 tipibox" onclick="location.href='disclaimer.php';">DISCLAIMER</H4></div>
			</div>
			<?php if ($disc == 'y'): ?>
				<div class=" row text-center ">
					<div class="col-sm-6 tipibox" onclick="location.href='tipi.php';">TIPI Personality test</H4></div>
				</div>
			<?php endif; ?>
			<div class=" row text-center ">
				<?php if ($tipi == 'y'): ?>
					<div class="col-sm-6 tipibox"  onclick="location.href='study.php';" >STUDY</H4></div>
				<?php endif; ?>
				<?php if (study == 'y'): ?>
					<div class="col-sm-6 tipibox">FINAL</H4></div>
				<?php endif; ?>
			</div>
			<div class=" row text-center ">
				<div class="col-sm-12 tipibox"><a href = "signout.php">SIGN OUT</a></div>
			</div>
		</div>
	</section>
</body>
</html>
</html>
