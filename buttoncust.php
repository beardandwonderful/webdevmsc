<?php


include('session.php');

$check = $_SESSION['login_user'];
if (!$check)
{header("location: loginpage.php");}


$currentelem="Buttons";

$result = mysqli_query($conn, "SELECT * FROM style where participant_id='$check'");

if (!$result)
{
	$error = 'Error fetching data: ' . mysqli_error($link);
	include 'error.html.php';
	exit();
}{
$row = mysqli_fetch_array($result);
$buttonul=$row['buttonul'];
$buttontype = $row['buttontype'];
$buttoncol=$row['buttoncol'];
$buttonbordercol = $row['buttonbordercol'];
$buttonfontcol = $row['buttonfontcol'];
}



?>

<head>

  <script src='js/spectrum.js'></script>
  <link rel='stylesheet' href='css/spectrum.css' />
  <script src="http://code.jquery.com/jquery-1.11.3.min.js">
  </script>


	<script>
	$('[id=showPaletteOnly]').spectrum({
		color:   ' <?php if($buttoncol == "") {echo 'white';} else {echo $buttoncol;} ?>',
		change: function(color) {
			$('.buttonexample').css('background-color',  color.toHexString());
			updatebutt();
		},
		palette: [
			['black', 'white', 'blanchedalmond',
			'rgb(255, 128, 0);', 'orange'],
			['red', 'yellow', 'green', 'blue', 'violet']
		]
	});
	</script>

  <script>
  $('[id=showPaletteOnly1]').spectrum({

      color:   ' <?php if($buttonbordercol == "") {echo 'white';} else {echo $buttonbordercol;} ?>',
      change: function(color) {

         $('.buttonexample').css('border-color',  color.toHexString());
         updatebutt();


    },
      palette: [
          ['black', 'white', 'blanchedalmond',
          'rgb(255, 128, 0);', 'orange'],
          ['red', 'yellow', 'green', 'blue', 'violet']
      ]

  });
  </script>


  <script>
  $('[id=showPaletteOnly2]').spectrum({

      color:   ' <?php if($buttonfontcol == "") {echo 'black';} else {echo $buttonfontcol;} ?>',
      change: function(color) {

         $('.buttonexample').css('color',  color.toHexString());
         updatebutt();


    },
      palette: [
          ['black', 'white', 'blanchedalmond',
          'rgb(255, 128, 0);', 'orange'],
          ['red', 'yellow', 'green', 'blue', 'violet']
      ]

  });
  </script>

	<script>    $(document).ready(function(){ $(".buttonexample").css('background-color',  '<?php echo $buttoncol;?>')   }); </script>
	<script>    $(document).ready(function(){ $(".buttonexample").css('border-color',  '<?php echo $buttonbordercol;?>')   }); </script>
	<script>    $(document).ready(function(){ $(".buttonexample").css('color',  '<?php echo $buttonfontcol;?>')   }); </script>




<script>

function ul() {


  $(".buttonexample").addClass("ul");
}



</script>


<script>

function unul() {


  $(".buttonexample").removeClass("ul");
}

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

  .row {
    display: flex; /* equal height of the children */
  }

  .colx {
    flex: 1; /* additionally, equal width */

    padding: 1em;
    border: solid;
  }
</style>

<script>

</script>

</head>


<?php if($buttontype == '1') {echo '<script> $( document ).ready(butt1());</script>';}
else if($buttontype == '2') {echo '<script> $( document ).ready(butt2());</script>';}
else if($buttontype == '3') {echo '<script> $( document ).ready(butt3());</script>';}
else if($buttontype == '4') {echo '<script> $( document ).ready(butt4());</script>';} ?>
<div class="col-sm-4 text-center studybox "  >
  <p>Current element: <?php echo $currentelem; ?></p>
<div class = "row inalign ">

<div class = "col-sm-2"></div>
    <div class = "col-sm-8 valign "><div ID ="buttonexample" class = "buttonexample ">BUTTON HERE</DIV></div>
<div class = "col-sm-2"></div>
  </div>


</div>
<div class="col-sm-8 text-center studybox">
  <p>Customisation</p>


    <div class = "row">
    <div class="col-sm-3 text-center  "> Simplest </div>
    <div class="col-sm-3 text-center "> Simple </div>
    <div class="col-sm-3 text-center "> Normal </div>
    <div class="col-sm-3 text-center"> Rounded </div>
    </div>


    <div class = "row">
    <div class="col-sm-3 text-center "> <img src = "img/butt1.png" class = "studyimg"    > </div>
    <div class="col-sm-3 text-center">  <img src = "img/butt2.png" class = "studyimg"></div>
    <div class="col-sm-3 text-center">  <img src = "img/butt3.png" class = "studyimg"></div>
    <div class="col-sm-3 text-center">  <img src = "img/butt4.png" class = "studyimg"></div>
    </div>

    <div class = "row">
    <div class="col-sm-3 text-center ">  <input type="radio" id="b1" name="buttontype" value = "1"  onClick="butt1(); updatebutt()"   <?php if($buttontype == '1' || $buttontype == 'NULL' ) echo 'checked'; ?>/> </div>
    <div class="col-sm-3 text-center">   <input type="radio" id="b2" name="buttontype"  value ="2" onClick="butt2(); updatebutt()"  <?php if($buttontype == '2') echo 'checked'; ?>></div>
      <div class="col-sm-3 text-center">   <input type="radio" id="b3" name="buttontype"  value ="3" onClick="butt3(); updatebutt()"  <?php if($buttontype == '3') echo 'checked'; ?>></div>
        <div class="col-sm-3 text-center">   <input type="radio" id="b4" name="buttontype"  value ="4" onClick="butt4(); updatebutt()"   <?php if($buttontype == '4') echo 'checked'; ?>  ></div>
    </div>
<br><hr>

    <div class = "row">
    <div class="col-sm-2 text-center "> Underline </div>
    <div class="col-sm-1 text-center"> <input type="radio" id="ulcheck" name="ul" value = "1"   onclick="ul(); updatebutt()"> <input type="radio" id="ulcheck" name="ul" value = "0"  onClick="unul(); updatebutt()" checked/></div>
    <div class="col-sm-1 text-center">  fill colour</div>
    <div class="col-sm-2 " id="colourPicker"><input type='text' id="showPaletteOnly" />  </div>
    <div class="col-sm-1 text-center">  border/line colour</div>
    <div class="col-sm-2 text-center">  <input type='text' id="showPaletteOnly1"/> </div>
    <div class="col-sm-1 text-center">  font colour</div>
    <div class="col-sm-2 text-center"> <input type='text' id="showPaletteOnly2"/>  </div>

    </div>

</div>
