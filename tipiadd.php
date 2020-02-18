<?php
include('session.php');

$check = $_SESSION['login_user'];
if (!$check)
{header("location: loginpage.php");}

include 'dbconfig.php';

//raw results
$ex1= $_POST['ex1'];
$ag1=$_POST['ag1'];
$con1=$_POST['con1'];
$em1=$_POST['em1'];
$op1=$_POST['op1'];
$ex2= $_POST['ex2'];
$ag2=$_POST['ag2'];
$con2=$_POST['con2'];
$em2=$_POST['em2'];
$op2=$_POST['op2'];

//calculating results for each personality type
$ex_res = ($ex1+$ex2)/2;
$ag_res = ($ag1+$ag2)/2;
$con_res = ($con1+$con2)/2;
$em_res = ($em1+$em2)/2;
$op_res = ($op1+$op2)/2;
$dom_trait = "none";

//finding highest results and establishing domininat trait
$resarray = array($ex_res ,$ag_res, $con_res, $em_res, $op_res);
$highest = max($resarray);
if ($highest == $ex_res) {$dom_trait = "EXTROVERSION";}else
if ($highest == $ag_res) {$dom_trait = "AGREEABLENESS";}else
if ($highest == $con_res) {$dom_trait = "CONSCIENTIOUSNESS";}else
if ($highest == $em_res) {$dom_trait = "EMOTIONAL";}else
if ($highest == $op_res) {$dom_trait = "OPENNESS";}
//updating tipi table with participants dominant trait

$sql = ("UPDATE  tipi SET ex1 = '$ex1', ex2='$ex2', ag1='$ag1', ag2='$ag2',con1='$con1', con2='$con2',
	em1='$em1',em2='$em2',op1='$op1',op2='$op2',ex_res='$ex_res',ag_res='$ag_res',con_res = '$con_res',
	em_res='$em_res', op_res='$op_res', dom_trait='$dom_trait' WHERE participant_id='$check'");
	mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
	//updating progress to allow access to study section
	$sql1 = ("UPDATE  progress SET tipi = 'y' WHERE participant_id='$check'");
	mysqli_query($conn, $sql1) or die("database error:". mysqli_error($conn));

$sql2 = ("UPDATE  participants SET dom_trait = '$dom_trait' WHERE participant_id='$check'");
mysqli_query($conn, $sql2) or die("database error:". mysqli_error($conn));

include 'profile.php';
exit();



	include 'tipi.php';





?>
