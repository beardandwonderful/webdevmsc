<?php


include('session.php');

$check = $_SESSION['login_user'];
if (!$check)
{header("location: loginpage.php");}


$currentelem="Colour Scheme";

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
$bannercol= $row['bannercol'];
$navcol = $row['navcol'];
$bodycol = $row['bodycol'];
$bgcol = $row['bgcol'];
}



?>

<head>

  <script src='js/spectrum.js'></script>
  <link rel='stylesheet' href='css/spectrum.css' />
  <script src="http://code.jquery.com/jquery-1.11.3.min.js">
  </script>


  <script>
  $('[id=showPaletteOnly]').spectrum({

      color:   ' <?php if($bannercol == "") {echo 'white';} else {echo $banenrcol;} ?>',
      change: function(color) {

         $('.head').css('background-color',  color.toHexString());
         updatecol();
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

      color:   ' <?php if($navcol == "") {echo 'white';} else {echo $navcol;} ?>',
      change: function(color) {

         $('.butt').css('background-color',  color.toHexString());
         updatecol();


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

      color:   ' <?php if($bodycol == "") {echo 'white';} else {echo $bodycol;} ?>',
      change: function(color) {

         $('.main').css('background-color',  color.toHexString());
         updatecol();


    },
      palette: [
          ['black', 'white', 'blanchedalmond',
          'rgb(255, 128, 0);', 'orange'],
          ['red', 'yellow', 'green', 'blue', 'violet']
      ]

  });
  </script>

  <script>
  $('[id=showPaletteOnly3]').spectrum({
      showPaletteOnly: true,
      showPalette:true,
      color:   ' <?php if($bgcol == "") {echo 'black';} else {echo $bgcol;} ?>',
      change: function(color) {

         $('.fullhere').css('background-color',  color.toHexString());
         updatecol();


    },
      palette: [
          ['black', 'white', 'blanchedalmond',
          'rgb(255, 128, 0);', 'orange'],
          ['red', 'yellow', 'green', 'blue', 'violet']
      ]

  });
  </script>




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



<div class="col-sm-4 text-center studybox "  >
  <p>Current element: <?php echo $currentelem; ?></p>
<div class = "row">



  </div>


</div>
<div class="col-sm-8 text-center studybox">
  <p>Customisation</p>


    <div class = "row">
    <div class="col-sm-3 text-center  "> Banner </div>
    <div class="col-sm-3 text-center "> Navbar </div>
    <div class="col-sm-3 text-center "> Body </div>
    <div class="col-sm-3 text-center"> Page Background </div>
    </div>


    <div class = "row">
    <div class="col-sm-3 text-center ">  <input type='text' id="showPaletteOnly" />  </div>
    <div class="col-sm-3 text-center">   <input type='text' id="showPaletteOnly1" />  </div>
      <div class="col-sm-3 text-center">  <input type='text' id="showPaletteOnly2" />  </div>
        <div class="col-sm-3 text-center"> <input type='text' id="showPaletteOnly3" />  </div>
    </div>
<br><hr>



</div>
