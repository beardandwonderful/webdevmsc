<?php
include 'dbconfig.php';



$sql = ("SELECT * FROM   style WHERE participant_id='$check'");
mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$row = mysqli_fetch_array($result);
$defaultlay = $"vrjrovj";
$defaultcent = $row['contcen'];
header('Location:layoutcust.php');


 ?>
