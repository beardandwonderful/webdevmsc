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


<script>

if (document.getElementById("centy").checked){$("#fullcont").addClass("centcont");}
if (document.getElementById("cent").checked){$("#fullcont").removeClass("centcont");}
</script>


</head>
<body>


	<section class = "full">

		<div class = "row " >
			<div  class = "col-sm-12 full" id="fullcont">




				<div class = "row head">
					<div  class = "col-sm-12"></div>
				</div>



				<div class = "row ">


					<div  class = "col-sm-2 butt ">
							<div class = "row butt">
							<div class = "col-sm-12 vcenter"><div ID ="buttonexample" class = "buttonexample">BUTTON HERE</DIV></div>
						</div>
						<div class = "row butt">
							<div class = "col-sm-12 vcenter"><div ID ="buttonexample" class = "buttonexample">BUTTON HERE</DIV></div>
						</div>
						<div class = "row butt">
							<div class = "col-sm-12 vcenter"><div ID ="buttonexample" class = "buttonexample">BUTTON HERE</DIV></div>
						</div>
						<div class = "row butt">
							<div class = "col-sm-12 vcenter"><div ID ="buttonexample" class = "buttonexample">BUTTON HERE</DIV></div>
						</div>
						<div class = "row butt">
							<div class = "col-sm-12 vcenter"><div ID ="buttonexample" class = "buttonexample">BUTTON HERE</DIV></div>
						</div>

					</div>




				<div  class = "col-sm-10 main "></div>

			</div>
		</div></div>




</section>
</body>
</html>
