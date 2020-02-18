<?php


include('session.php');

$check = $_SESSION['login_user'];
if (!$check)
{header("location: loginpage.php");}

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$currentelem = "";
if (strpos($url,'study') !== false) {
$currentelem="Layout";
}


//this script is retrieving specific users already chosen customisation options - this is used to both prefill
//forms as well as apply any already chosen styles.
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

if ($disc!=="y"){header("location: profile.php");}
}



?>
<!DOCTYPE html>
<html>
<head>


	<script src="http://code.jquery.com/jquery-1.11.3.min.js">
	</script>


	<script>
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

 <?php


 if  ($buttonul == '1') {echo '<script>  $(document).ready(function(){ $(".buttonexample").addClass("ul");   });</script>';}


 if    ($buttontype == '1')     {echo '<script>  $(document).ready(function(){$(".buttonexample").removeClass("butt2"); $(".buttonexample").removeClass("butt3"); $(".buttonexample").removeClass("butt4");});</script>';}
else if($buttontype == '2') {echo '<script>$(document).ready(function(){$(".buttonexample").addClass("butt2");$(".buttonexample").removeClass("butt3");$(".buttonexample").removeClass("butt4");});</script>';}
else if($buttontype == '3') {echo '<script>$(document).ready(function(){$(".buttonexample").addClass("butt3");$(".buttonexample").removeClass("butt2");$(".buttonexample").removeClass("butt4");});</script>';}
else if($buttontype == '4') {echo '<script>$(document).ready(function(){$(".buttonexample").removeClass("butt2");$(".buttonexample").removeClass("butt3");$(".buttonexample").addClass("butt4");});</script>';}



 ?>

<script>



function changeSrc() {
    if (document.getElementById("l1").checked) {
    document.getElementById("elemimg").src = "img/L1.png";

	} else if (document.getElementById("l2").checked) {
    document.getElementById("elemimg").src = "img/L2.png";
    }
}

function update()
{

 var participant_id =<?php echo $login_session; ?>;
 var layout= document.querySelector('input[name = "layout"]:checked').value;
  var cent= document.querySelector('input[name = "cent"]:checked').value;
 location.reload();

 $.ajax({
  type: 'post',
  url: 'update.php',
  data: {
   participant_id:participant_id,
   layout:layout,
	 cent:cent,

  },

 });

 return false;
}


function updatebutt()
{
	var participant_id =<?php echo $login_session; ?>;
	var buttontype= document.querySelector('input[name = "buttontype"]:checked').value;
	var buttoncol=$('.buttonexample').css("background-color");
	var bordercol=$('.buttonexample').css("border-color");
	var buttfontcoll=$('.buttonexample').css('color');
	var buttonul= document.querySelector('input[name = "ul"]:checked').value;

	$.ajax({
		type: 'post',
		url: 'updatebutt.php',
		data: {
			participant_id:participant_id,
			buttontype:buttontype,
			buttoncol:buttoncol,
			buttonul:buttonul,
			bordercol:bordercol,
			buttfontcoll:buttfontcoll,
		},
	});
	return false;
}


function updatecol()
{
 var participant_id =<?php echo $login_session; ?>;


	var bannercol=$('.head').css("background-color");
	var navcol=$('.butt').css("background-color");
	var bodycol=$('.main').css("background-color");
	var bgcol=$('.fullhere').css("background-color");




 $.ajax({
  type: 'post',
  url: 'updatecol.php',
  data: {
   participant_id:participant_id,
	 navcol:navcol,
   bannercol:bannercol,
	 bodycol:bodycol,
	 bgcol:bgcol,





  },

 });

 return false;
}

</script>
<script>
function changefinal(_url){
		$.ajax({
				url : _url,
				type : 'post',
				success: function(data) {
				 $('#finalview').html(data);
				},
				error: function() {
				 $('#finalview').text('An error occurred');
				}
		});
}
</script>
<script>
//script to change customisation include
function changecust(_url){ //getting data (in this case url for include) from button

//ajax/JQUERY function to change the DIV custview HTML data to include the new include address
		$.ajax({
				url : _url,
				type : 'post',
				success: function(data) {
				 $('#custview').html(data);
				},
				error: function() {
				 $('#custview').text('An error occurred');
				}
		});

}
</script>
<script>

function yescent(){
$("#fullcont").addClass("centcont");

}

function nocent(){
$("#fullcont").removeClass("centcont");

}


</script>

<script>

function butt1() {
$(".buttonexample").removeClass("butt2");
$(".buttonexample").removeClass("butt3");
$(".buttonexample").removeClass("butt4");
}

function butt2() {
$(".buttonexample").addClass("butt2");
$(".buttonexample").removeClass("butt3");
$(".buttonexample").removeClass("butt4");

}

function butt3() {
$(".buttonexample").addClass("butt3");
$(".buttonexample").removeClass("butt2");
$(".buttonexample").removeClass("butt4");

}

function butt4() {
$(".buttonexample").addClass("butt4");
$(".buttonexample").removeClass("butt3");
$(".buttonexample").removeClass("butt2");
}

function hidespec(){
	 $('.sp-container').css('display','none');
}



</script>
<script>    $(document).ready(function(){ $(".buttonexample").css('background-color',  '<?php echo $buttoncol;?>')   }); </script>
<script>    $(document).ready(function(){ $(".buttonexample").css('border-color',  '<?php echo $buttonbordercol;?>')   }); </script>
<script>    $(document).ready(function(){ $(".buttonexample").css('color',  '<?php echo $buttonfontcol;?>')   }); </script>
<script>    $(document).ready(function(){ $('.butt').css('background-color', '<?php echo $navcol;?> ' )      }); </script>
<script>    $(document).ready(function(){ $('.head').css('background-color', '<?php echo $bannercol;?> ' )      }); </script>
<script>    $(document).ready(function(){ $('.main').css('background-color', '<?php echo $bodycol;?> ' )      }); </script>
<script>    $(document).ready(function(){ $('.fullhere').css('background-color', '<?php echo $bgcol;?> ' )      }); </script>
</head>


<body>

<h1>You are participant: <?php echo $login_session; ?></h1>
	<section>

		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center ">
					<h1>Welcome to the study!</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-center">
					<p>Welcome to the study - Below is a series of elements for a website - work through each and chose the designs outline that YOU FIND APPEALING.</p>
					<p>These responses are personal and there are no right or wrong answers so please be as honest as possible with your responses. Remember this is for YOURSELF, and not to appeal to anyone else. You can move freely back and forth between the options and press SUBMIT when you are happy with your choices.</p>
				</div>
			</div>

	<div class="row">
		<div class="col-sm-3 text-center studybox " onClick="changecust('layoutcust.php'); hidespec()">
			<p>Layout</p>
		</div>
		<div class="col-sm-3 text-center studybox" onClick="changecust('buttoncust.php');">
			<p>Buttons</p>
		</div>
		<div class="col-sm-3 text-center studybox" onClick="changecust('colschemecust.php');" >
			<p>Colour Scheme</p>
		</div>
		<div class="col-sm-3 text-center studybox" style = "background-color:#e0fde0" onClick="location.href='profile.php';" >
			<p>SAVE AND EXIT TO PROFILE</p>
		</div>
	</div>


	<div class="row">
		<div class="col-sm-12 text-center studybox " >
<div id ="custview" class="custview"><?php include 'layoutcust.php';?></div>
</div>

	</div>


	<div class="row">
		<div class="col-sm-12 text-center studybox fullhere " >
			<p>Final View</p>
			 <div id ="finalview" <?php if($defaultcent == '1') echo 'class = "centcont"';?>><?php if($defaultlay == '1') {include 'l1.php';}else{include 'l2.php';} ?></div>
		</div>

	</div>

</div>

	</section>
</body>
</html>
</html>
