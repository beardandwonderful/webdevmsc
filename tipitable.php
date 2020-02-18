<?php
include 'dbconfig.php';
$result = mysqli_query($conn, "SELECT * FROM Q where id='0'");

$row = mysqli_fetch_array($result);
$genderchoice =$row['gender'];
$personality =$row['personality'];

if ($row['gender']!=="x"){
$exresult = mysqli_query($conn, "SELECT *  FROM participants where dom_trait = 'EXTROVERSION' and gender='$genderchoice'");
$agresult = mysqli_query($conn, "SELECT *  FROM participants where dom_trait = 'AGREEABLENESS'and gender='$genderchoice'");
$coresult = mysqli_query($conn, "SELECT *  FROM participants where dom_trait = 'CONSCIENTIOUSNESS'and gender='$genderchoice'");
$emresult = mysqli_query($conn, "SELECT *  FROM participants where dom_trait = 'EMOTIONAL'and gender='$genderchoice'");
$opresult = mysqli_query($conn, "SELECT *  FROM participants where dom_trait = 'OPENNESS'and gender='$genderchoice'");
$allresult = mysqli_query($conn, "SELECT *  FROM participants ");
}else{
  $exresult = mysqli_query($conn, "SELECT *  FROM participants where dom_trait = 'EXTROVERSION' ");
  $agresult = mysqli_query($conn, "SELECT *  FROM participants where dom_trait = 'AGREEABLENESS'");
  $coresult = mysqli_query($conn, "SELECT *  FROM participants where dom_trait = 'CONSCIENTIOUSNESS'");
  $emresult = mysqli_query($conn, "SELECT *  FROM participants where dom_trait = 'EMOTIONAL'");
  $opresult = mysqli_query($conn, "SELECT *  FROM participants where dom_trait = 'OPENNESS'");
  $allresult = mysqli_query($conn, "SELECT *  FROM participants ");
}

$exnum_rows = mysqli_num_rows($exresult);
$agnum_rows = mysqli_num_rows($agresult);
$conum_rows = mysqli_num_rows($coresult);
$emnum_rows = mysqli_num_rows($emresult);
$opnum_rows = mysqli_num_rows($opresult);
$allnum_rows = mysqli_num_rows($allresult); ?>

<div class = "row">
  <div class = "col-sm-12" id = "gender">
    <table class="table">
      <caption>Personality Data (%)</caption>
<thead>
<tr>
<th>Extrovert</th>
<th>Agreeable</th>
<th>Conscientious</th>
<th>Emotional</th>
<th>Open</th>
</tr>
</thead>
<tbody>
<tr>
  <td><?php $extot=(100/$allnum_rows)*$exnum_rows; echo round($extot) ?> </td>
  <td><?php $agtot=(100/$allnum_rows)*$agnum_rows; echo round($agtot) ?></td>
  <td><?php $cotot=(100/$allnum_rows)*$conum_rows; echo round($cotot) ?></td>
  <td><?php $emtot=(100/$allnum_rows)*$emnum_rows; echo round($emtot) ?></td>
  <td><?php $optot=(100/$allnum_rows)*$opnum_rows; echo round($optot) ?></td>
</tr>
</tbody>
</table>
</div></div>
