<?php
include 'dbconfig.php';
$result = mysqli_query($conn, "SELECT * FROM Q where id='0'");

$row = mysqli_fetch_array($result);
$genderchoice =$row['gender'];
$personality =$row['personality'];


$maresult = mysqli_query($conn, "SELECT *  FROM participants where gender = 'male'");
$feresult = mysqli_query($conn, "SELECT *  FROM participants where gender = 'female'");
$allresult = mysqli_query($conn, "SELECT *  FROM participants ");
$mnum_rows = mysqli_num_rows($maresult);
$fnum_rows = mysqli_num_rows($feresult);
$allnum_rows = mysqli_num_rows($allresult); ?>

<div class = "row">
  <div class = "col-sm-12" id = "gender">
    <table class="table">
            <caption>Gender Data (%)</caption>
<thead>
<tr>
<th>Male</th>
<th>Female</th>
<th>Other</th>
</tr>
</thead>
<tbody>
<tr>
  <td><?php   if ($row['gender']=="x"){ $mtot=(100/$allnum_rows)*$mnum_rows; echo round($mtot);}else if ($row['gender']=="male"){echo"100";}else { echo "0";} ?> </td>
  <td><?php   if ($row['gender']=="x"){$ftot=(100/$allnum_rows)*$fnum_rows; echo round ($ftot);}else if ($row['gender']=="female"){echo"100";}else { echo "0";} ?></td>
  <td><?php  { echo "0";} ?></td>
</tr>
</tbody>
</table>
</div></div>
