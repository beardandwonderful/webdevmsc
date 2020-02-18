<?php

include('session.php');

$check = $_SESSION['login_user'];
if (!$check)
{header("location: loginpage.php");}

include 'dbconfig.php';



$paticipant_id = $_POST['participant_id'];
$layout = $_POST['layout'];
$cent = $_POST['cent'];


$sql = ("UPDATE  style SET layout = '$layout', contcen = '$cent' WHERE participant_id='$check'");
mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));


?>
