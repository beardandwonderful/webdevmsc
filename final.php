<?php


include('session.php');

$check = $_SESSION['login_user'];
if (!$check)
{header("location: loginpage.php");}

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$currentelem = "";
if (strpos($url,'study') !== false) {
$currentelem="TEST";
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

<h1>You are participant: <?php echo $login_session; ?></h1>
	<section>

		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center ">
					<h1>Welcome to the study!</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<p>Welcome to the study - Below is a series of elements for a website - work through each and chose the designs outline that YOU FIND APPEALING.</p>
					<p>These responses are personal and there are no right or wrong answers so please be as honest as possible with your responses. Remember this is for YOURSELF, and not to appeal to anyone else. You can move freely back and forth between the options and press SUBMIT when you are happy with your choices.</p>
				</div>
			</div>

	<div class="row">
		<div class="col-lg-4 text-center studybox ">
			<p>Layout</p>
		</div>
		<div class="col-lg-4 text-center studybox">
			<p>Buttons</p>
		</div>
		<div class="col-lg-4 text-center studybox ">
			<p>Colour Scheme</p>
		</div>
	</div>


	<div class="row">
		<div class="col-lg-4 text-center studybox ">
			<p>Current element: <?php echo $currentelem; ?></p>
		</div>
		<div class="col-lg-8 text-center studybox">
			<p>Customisation</p>
		</div>

	</div>


	<div class="row">
		<div class="col-lg-12 text-center studybox ">
			<p>Final View</p>
		</div>

	</div>

</div>
		</div>
	</section>
</body>
</html>
</html>
