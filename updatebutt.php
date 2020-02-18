<?php

include('session.php');

$check = $_SESSION['login_user'];
if (!$check)
{header("location: loginpage.php");}

include 'dbconfig.php';



$paticipant_id = $_POST['participant_id'];
$buttontype = $_POST['buttontype'];
$buttoncol = $_POST['buttoncol'];
$buttonul = $_POST['buttonul'];
$bordercol = $_POST['bordercol'];
$buttfontcol = $_POST['buttfontcoll'];


//trim off rgb value seperately for BUTTON COLOUR to use as out in averaging etc
$trimbuttoncol = trim($buttoncol, 'rgb()');
$trim_explode=explode(",",$trimbuttoncol);
$bcr = $trim_explode[0];
$bcg = $trim_explode[1];
$bcb = $trim_explode[2];


//trim off rgb value seperately for BUTTON COLOUR to use as out in averaging etc
$trimbordercol = trim($bordercol, 'rgb()');
$trim_explode=explode(",",$trimbordercol);
$bbr = $trim_explode[0];
$bbg = $trim_explode[1];
$bbb = $trim_explode[2];


//trim off rgb value seperately for BUTTON COLOUR to use as out in averaging etc
$trimfontcol = trim($buttfontcol, 'rgb()');
$trim_explode=explode(",",$trimfontcol);
$fcr = $trim_explode[0];
$fcg = $trim_explode[1];
$fcb = $trim_explode[2];



//submitting all button variables to style table where participant id = login user
$sql = ("UPDATE  style SET buttontype = '$buttontype', buttoncol = '$buttoncol' , bcr = $bcr, bcg = $bcg, bcb= $bcb, buttonul='$buttonul' , buttonbordercol='$bordercol' ,
bbr='$bbr', bbg ='$bbg', bbb='$bbb',buttonfontcol='$buttfontcol', fcr='$fcr', fcg='$fcg', fcb='$fcb' WHERE participant_id='$check'");

//$sql = ("UPDATE  style SET buttontype = '$buttontype''  WHERE participant_id='$check'");
mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));


?>
