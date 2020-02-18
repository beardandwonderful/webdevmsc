<?php

include('session.php');

$check = $_SESSION['login_user'];
if (!$check)
{header("location: loginpage.php");}

include 'dbconfig.php';



$genderchoice = $_POST['genderchoice'];
$personality = $_POST['personality'];



$sql = ("UPDATE  Q SET gender = '$genderchoice', personality = '$personality' WHERE id='0'");
mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));


?>
