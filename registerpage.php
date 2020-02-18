<?php
include 'dbconfig.php';
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profile.php");


}

//script to return the number of currently enrolled participants as rows to generate a new participant number
$query = mysqli_query($conn, "select * from participants");
$rows = mysqli_num_rows($query);
$new_part_numb = $rows+1;

//function that generates a pin for users
function generatePIN($digits = 4){
    $i = 0; //counter
    $pin = "";
    while($i < $digits){
        $pin .= mt_rand(0, 9);
        $i++;
    }
    return $pin;
}
//specificying ping length
$pin = generatePIN();
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
<div class = "col-md-4 tipibox"><h1>Register here</h1> </div>
<div class="col-md-4"></div>
</div>

<BR>
<div class="row">
	<div class="col-lg-12 text-center">
		<p>Please fill in the below form to register for the study. All data collected will be used ONLY for this study and no other purpose.</p>
		<p>Please make a note of both your participant ID and PIN so you can log in to the system. For safeguarding reasons you can only particpate if you are AT LEAST 18 YEARS OF AGE.</p>
	</div>
</div>



<form action="registerpart.php" method="post" class="text-center tipibox">
<br><br>
<div class = " form-group row">
<div class ="col-md-1"> </div>
<div class ="col-md-3"> <label>PARTICIPANT ID :</label> </div>
<div class ="col-md-4">  <input id="partit" name="part_id" placeholder="<?php echo $new_part_numb; ?>" required value ="<?php echo $new_part_numb; ?>" type="text" class="regfield mid" READONLY> </div>
<div class ="col-md-3"> you will need your Participant ID and Pin to enter the study </div>
<div class ="col-md-1"> </div>
</div>


<br><br>
<div class = " form-group row">
<div class ="col-md-1"> </div>
<div class ="col-md-3"> <label>PARTICIPANT PIN :</label> </div>
<div class ="col-md-4">  <input id="partPIN" name="part_pin" placeholder="<?php echo $pin;?>" required value ="<?php echo $pin; ?>"type="text" class="regfield mid" READONLY> </div>
<div class ="col-md-3">  </div>
<div class ="col-md-1"> </div>
</div>



<br><br>
<div class = " form-group row">
<div class ="col-md-1"> </div>
<div class ="col-md-2"> <label>Gender :</label> </div>
<div class ="col-md-2 lef">
  <input type="RADIO" name="gender" value="male" class="lef" required> Male<br>
  <input type="RADIO" name="gender" value="female"  class="lef"> Female<br>
  <input type="RADIO" name="gender" value="other"  class="lef"> Other</div>
<div class ="col-md-2"> Age:  </div>
<div class ="col-md-2">  <input id="participantage" name="participant_age" placeholder="" type="number" class="regfield" min="18" required> </div>
<div class ="col-md-1"> </div>
</div>





<div class="form-group row">
<div class="col-sm-12 ">
<input class="btn btn-primary btn-block " id="mysub" type="submit" value="Submit your responses">
</div>
</div>


</form>




</div>



<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p>Copyright © MyWebsite. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>
<!-- / FOOTER -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.3.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>
</body>
</html>
