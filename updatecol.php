<?php

include('session.php');

$check = $_SESSION['login_user'];
if (!$check)
{header("location: loginpage.php");}

include 'dbconfig.php';



$paticipant_id = $_POST['participant_id'];
$bannercol= $_POST['bannercol'];
$navcol = $_POST['navcol'];
$bodycol = $_POST['bodycol'];
$bgcol = $_POST['bgcol'];


$trimbannercol = trim($bannercol, 'rgb()');
$trim_explode=explode(",",$trimbannercol);
$bancr = $trim_explode[0];
$bancg = $trim_explode[1];
$bancb = $trim_explode[2];

$trimnavcol = trim($navcol, 'rgb()');
$trim_explode=explode(",",$trimnavcol);
$navcr = $trim_explode[0];
$navcg = $trim_explode[1];
$navcb = $trim_explode[2];

$trimbodcol = trim($bodycol, 'rgb()');
$trim_explode=explode(",",$trimbodcol);
$bodcr = $trim_explode[0];
$bodcg = $trim_explode[1];
$bodcb = $trim_explode[2];

$trimbgcol = trim($bgcol, 'rgb()');
$trim_explode=explode(",",$trimbgcol);
$bgr = $trim_explode[0];
$bgg = $trim_explode[1];
$bgb = $trim_explode[2];


$sql = ("UPDATE  style SET bannercol = '$bannercol',bancr='$bancr', bancg='$bancg', bancb='$bancb', navcol = '$navcol', navcr='$navcr', navcg='$navcg', navcb='$navcb' , bodycol='$bodycol' , bgcol='$bgcol', bodcr='$bodcr', bodcg='$bodcg', bodcb='$bodcb', bgr='$bgr', bgg='$bgg', bgb='$bgb' WHERE participant_id='$check'");

//$sql = ("UPDATE  style SET buttontype = '$buttontype''  WHERE participant_id='$check'");
mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));


?>
