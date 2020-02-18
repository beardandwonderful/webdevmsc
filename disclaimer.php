<?php

include 'dbconfig.php';
include('session.php');

$check = $_SESSION['login_user'];
if (!$check)
{header("location: loginpage.php");}

$result = mysqli_query($conn, "SELECT *  FROM progress where participant_ID='$check'");
if (!$result)
{
	$error = 'Error fetching data: ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}{
$row = mysqli_fetch_array($result);
$disc = $row['disc'];


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
					<h1>Participation Discaimer</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<p>Please read the below disclaimer and approve to particpate in the study</p>

				</div>
			</div>


<br><br>

<form action="agreedisc.php" method="post">
<hr>
				<div class=" row text-center ">
					The following study is aimed at trying to find if user interfaces can be better tailored towards different user aspects (age, gender, personality etc).<br><br>
As part of the study, the data you provided as part of the registration, as well as a personality type assessment, will be used to see if any links exist between these elements and your design preferences for user interfaces.<br><br>
You will not be identifiable from your information, and the information will ONLY be used for the purpose of this project. All related data will be destroyed once the study has been successfully completed.<br><br>
Any data held will be password protected, and accessible only by the project worker and supervisor.
Please check the box below to confirm you consent to your information being used in the manner described above and submit to participate in the study.
<div class ="col-md-12 lef">   <br><br><?php if ($disc!=='y'){echo '<input type="RADIO" name="disc" value="y"  > Accept and Particpate</div>';}else {echo 'You have already signed the disclaimer <input type="hidden" name="disc" value="y" checked >';}?>

				</div>

				<div class="form-group row">
				<div class="col-sm-12 ">
					<br>
				<input class="btn btn-primary btn-block " id="mysub" type="submit" value="Submit your response">
				</div>
				</div>
</form>
		</div>
	</section>
</body>
</html>
</html>
